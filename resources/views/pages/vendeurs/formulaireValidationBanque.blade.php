@extends('layout.main')

@section('title')
	Fiche paiement de vendeur 
@endsection

@section('styles')
<style>
	.fontSizeTitle{
		font-size: 16px;
		text-transform: uppercase;
	}
	.fontSizeInfo{
		font-size: 16px;
		text-transform: uppercase;
	}
	.card .card-header, .card-light .card-header {
        /* padding: 1rem 1.25rem;
        background-color: transparent; */
        border-bottom: 1px solid #ffffff !important;
    }

	.table-responsive >.table-bordered {
   		border: 1px solid #dee2e6 !important;
	}
</style>
@endsection

@section('content')
<div class="row justify-content-center" style="position: relative;">
    <div class="col-12 col-lg-10 col-xl-9">
        <div class="row mt-3">
            <div id="tabOffPrint" class="col-md-12">
                <div class="card card-invoice">
                    
                    <div class="card-header">						
						<div class="invoice-header">							
							<div class="row justify-content-center mb-3" style="margin-top: 100px; position: relative !important;">

								<div class="col-3 bg-successM" style="position: absolute; top: -40px; left: 10px;">
									<img src="{{asset('assets/img/logoSogema.png')}}" alt="Logo Sogema" style="height: 50px;" />
									<div style="width: inherit; margin: auto; justify-content: center;">
										<!-- <img src="{{asset('assets/img/profilSogema.png')}}" alt="Logo Sogema" style="height: 150px; width: 150px; object-fit: contain;" /> -->
										@if($vendeur->photo == "" && $vendeur->sexe == 'M')
											<img src="{{asset('assets/img/homme.png')}}" alt="Logo Sogema" style="height: 150px; width: 150px; object-fit: contain;" />
										@elseif($vendeur->photo == "" && $vendeur->sexe == 'F')
											<img src="{{asset('assets/img/femme.png')}}" alt="Logo Sogema" style="height: 150px; width: 150px; object-fit: contain;" />
										@else
											<img src="{{asset('uploaded_files/'.$vendeur->photo)}}" alt="Logo Sogema" style="height: 150px; width: 150px; object-fit: contain;" />
										@endif
									</div>
								</div>
								<div class="col-3"></div>
								<div class="col-6 col-lg-6 col-xl-6 bg-dangerM">
									<h3 class="invoice-title text-center text-uppercase fw-bold" style="padding: 0 !important; margin-bottom: 0 !important;">
										MARCHE CENTRAL DE KINSHASA
									</h3>
									<div class="row justify-content-center">
										<div class="col-9" style="border-bottom: 1px solid #000;"></div>
									</div>
									<h3 class="invoice-title text-center text-uppercase mt-3">
										Fiche signalitique de location
									</h3>
								</div>
								<div class="col-3 bg-successM">
									<!-- <img src="{{asset('assets/img/profilSogema.png')}}" alt="Logo Sogema" style="height: 150px; width: 150px; object-fit: contain;" /> -->
									
									{{$qrcodeifos}}
									<p>{{$vendeur->code_unique}}</p>
								</div>
							</div>
							<!-- photo -->
						</div>
					</div>

                    <div class="card-body" style="margin-top: 35px;">
                        <div class="row pl-4 pr-4">
							<div class="col-md-12">
                                <div class="invoice-detail">
									<div class="invoice-top">
										<h3 class="title"><strong>Identité</strong></h3>
									</div>
									<div class="invoice-item">
										<div class="table-responsive">								
											<table class="table table-bordered">
												<thead>
													<tr>
														<td class="text-center"><strong>Nom</strong></td>
														<td class="text-center"><strong>Post-nom</strong></td>
														<td class="text-center"><strong>Prénom</strong></td>
														<td class="text-center"><strong>Sexe</strong></td>
														<td class="text-center"><strong>Téléphone</strong></td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="text-center">
															{{$vendeur->nom}}
															
														</td>
														<td class="text-center">{{$vendeur->postnom}}</td>
														<td class="text-center">{{$vendeur->prenom}}</td>
														<td class="text-center">{{$vendeur->sexe}}</td>
														<td class="text-center">{{$vendeur->telephone}}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

                                	
                            </div>
                        </div>
                    </div>
					<div id="tabOffPrint" class="col-md-12">
						<div class="card card-invoice">
							<div class="card-body">
								<div class="d-flex justify-content-between align-items-center flex-wrap">
									<h4 class="card-title pl-4 pt-3">Liste des dossiers pour ce vendeur 
										<span class="fw-bold bg_background colorText pl-3 pr-3 pt-1 pb-1" style="border-radius: 6px;">
											{{$dossiers->count()}}
										</span>
									</h4>
									
								</div>
								
								<div class="table-responsive mt-3">
									<table id="dossiersTable" class="table table-striped table-bordered nowrap">
										<thead class="thead-dark">
											<tr>
												<th>N°</th>
												<th>Numéro Dossier</th>
												<th class="text-center">État</th>
												<th class="text-center">Date Création</th>
												<th class="text-center">Actions</th>
											</tr>
										</thead>
										<tbody id="myTabs">
											@forelse($dossiers as $index => $dossier)
											<tr>
												<td>{{$index + 1}}</td>
												<td>Dossier #{{$dossier->numdossier }}</td>
												<td class="text-center">{{$dossier->etat}}</td>
												<td class="text-center">{{$dossier->datecreation ? ($dossier->datecreation)->format('d/m/Y') : 'N/A'}}</td>
												<td class="text-center">
													<input type="hidden" id="currentUserId" value="{{ auth()->id() }}">
													<button data-toggle="modal" data-target="#dossierModal" onclick="loadDossierModal({{ $dossier->id }}, document.getElementById('currentUserId').value)" class="btn btn-primary btn-sm" title="Voir détails">
														<i class="fas fa-eye"></i>
													</button>
													@if($dossier->etat === 'attente')
													<a href="/dossiers/{{$dossier->id}}/edit" class="btn btn-info btn-sm" title="Modifier">
														<i class="fas fa-edit"></i>
														</a>
													@endif
												</td>
											</tr>
											@empty
												<tr>
													<td colspan="6" class="text-center text-danger fw-bold">Pas de données</td>
												</tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="dossierModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails du Dossier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent">
                <!-- Contenu chargé dynamiquement -->
                <div class="text-center p-4">
                    <i class="fas fa-spinner fa-spin fa-2x"></i>
                    <p>Chargement en cours...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/axios.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        

		// Fonction pour charger le modal
	async function loadDossierModal(dossierId, userId) {
		const modal = $('#dossierModal');
		const content = $('#modalContent');
		
		content.html('<div class="text-center p-5"><i class="fas fa-spinner fa-spin fa-3x"></i></div>');
		modal.modal('show');

		try {
			const response = await axios.get(`/api/dossiers/${dossierId}?user_id=${userId}`);

			content.html(response.data);
			// Initialisez les événements après chargement
			initModalEvents(userId);
		} catch (error) {
			content.html(`<div class="alert alert-danger">Erreur de chargement: ${error.message}</div>`);
		}
	}

	// Gestion du formulaire dans le modal
	function initModalEvents(userId) {
		document.getElementById('formSend')?.addEventListener('submit', async function(e) {
			e.preventDefault();
			const formData = new FormData(this);
			formData.append('user_id', userId); // Ajoute l'ID utilisateur

			try {
				const response = await axios.post("{{ route('vend.saveDecisionBanque') }}", formData, {
					headers: {
						'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
						'Content-Type': 'multipart/form-data'
					}
				});

				if (response.data.success) {
					Swal.fire('Succès!', response.data.message, 'success');
					$('#dossierModal').modal('hide');
				}
			} catch (error) {
				Swal.fire('Erreur!', error.response?.data?.message || 'Erreur inconnue', 'error');
			}
		});
	}
		

		// Fonction pour charger les données QR code (si nécessaire)
		function loadQrCodeData(vendeurId) {
			return axios.get(`/api/vendeurs/${vendeurId}/qrcode`);
		}
		// À placer dans votre fichier JavaScript principal
document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('submit', async function(e) {
        if (e.target.id === 'formSend') {
            e.preventDefault();
            const form = e.target;
            const btn = form.querySelector('button[type="submit"]');
            
            btn.innerHTML = "En cours...";
            btn.disabled = true;
            try {
                const response = await axios.post(form.action, new FormData(form), {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                if (response.data.success) {
					alert("Enregistrement effectué avec succés");

                    window.location.href = "{{ route('searchVendeurForm') }}";
                }
            } catch (error) {
                console.error(error);
                alert("Erreur lors de l'envoi du formulaire");
            } finally {
                btn.innerHTML = "Valider";
                btn.disabled = false;
            }
        }
    });
});
    </script>
@endsection