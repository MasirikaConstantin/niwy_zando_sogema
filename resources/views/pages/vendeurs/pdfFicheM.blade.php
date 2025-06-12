@extends('layout.main')

@section('title')
	Fiche signalitique de 
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
</style>
@endsection

@section('content')

<div class="row justify-content-center" style="position: relative;">
	<div class="col-12 col-lg-10 col-xl-9">
		<div class="row align-items-center">
			<div class="col">
				<!-- <h6 class="page-pretitle">
					Payments
				</h6> -->
				<!-- <h4 class="page-title">Invoice #FDS9876KD</h4> -->
			</div>
			<div class="col-auto">
				<!-- <a href="#" class="btn btn-light btn-border">
					Download
				</a> -->
				<!-- <a href="#" class="btn btn-primary ml-2">
					Pay
				</a> -->
			</div>
		</div>
		<!-- <div class="page-divider"></div> -->
		<div class="row mt-3">
			<div class="col-2">
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
					<div class="btn-group" role="group">
						<button type="button" class="btn bg_background colorText dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							Action
						</button>
						<div class="dropdown-menu">
							<a id="btnPrint" class="dropdown-item dropdownActive" href="#">Imprimer</a>
							@if($vendeur->etat == "traiter")
								<a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$vendeur->id)}}">Déjà Valider</a>
							@else
								<a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$vendeur->id)}}">Validation</a>
							@endif
							{{-- <a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$vendeur->id)}}">Validation</a> --}}
						</div>
					</div>
				</div>
			</div>
			<div id="tabOffPrint" class="col-md-12">
				
				<div class="card card-invoice">

					<!-- <div style="position: absolute; top: 50px; left: 30px; width: 200px;">
						<div>
							<img src="{{asset('assets/img/logoSogema.png')}}" alt="Logo Sogema" style="height: 50px;" />
						</div>
						<div style="width: inherit; margin: auto; justify-content: center;">
							<img src="{{asset('assets/img/profilSogema.png')}}" alt="Logo Sogema" style="height: 150px; width: 150px; object-fit: contain;" />
						</div>
					</div> -->

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
						<!-- <div class="separator-solid"></div> -->
						<div class="row pl-4 pr-4">
							<div class="col-md-12">

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">NOM</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->nom}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">post-nom</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->postnom}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">prenom</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->prenom}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">sexe</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->sexe}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">Lieu et Date de naissance</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->lieu_naissance}} {{$vendeur->date_naissance}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">Adresse</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->residence}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">Numero de télephone</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->telephone}}</span></div>
								</div>

								<!-- <div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">Nom de la banque</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">M</span></div>
								</div> -->

								@if($vendeur->numCompteBancaire != "")
								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">Numero compte</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">M</span></div>
								</div>
								@endif

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">numero patente</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->numero_patente}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">Numero rccm</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->rccm}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">numero piece d'identite/passeport</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->piece_identite}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">Date d'expiration du passeport</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->piece_identite_date_expiration}}</span></div>
								</div>

								<div class="mb-3" style="display: flex; flex-direction: row; align-items: center;">
									<div><strong class="fontSizeTitle">Nom + Adresse + télephone personne de reference</strong></div>
									<div style="flex-grow: 4; padding-bottom: 0 !important; border-bottom: 2px dotted #000;">:<span class="fontSizeInfo ml-3">{{$vendeur->personne_de_reference}}</span></div>
								</div>								

								<div class="invoice-detail">
									<div class="invoice-top">
										<h3 class="title"><strong>Activite</strong></h3>
									</div>
									<div class="invoice-item">
										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>
														<td><strong>Article</strong></td>
														<td class="text-center"><strong>Place</strong></td>
														<td class="text-center"><strong>Quantité</strong></td>
														<td class="text-right"><strong>M<sup>3</sup></strong></td>
													</tr>
												</thead>
												<tbody>
													@forelse ($vendeur->places as $place)
														<tr>
															<td class="">
																@forelse ($vendeur->articles as $article)
																	@if($article->pivot->place_id == $place->id) <span class="bg_background colorText p-1" style="border-radius: 6px; font-size: 14px;">{{$article->nom}}</span> @endif
																@empty
																Vide
																@endforelse
															</td>
															<td class="text-center">{{$place->nom}}</td>
															<td class="text-center">{{$place->pivot->nbr}}</td>
															<td class="text-right">{{$place->pivot->maitre_cube}}</td>
														</tr>
													@empty
														<tr>
															<td colspan="4" class="text-center text-danger fw-bold">Pas de données</td>															
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
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/plugins/jquery_print/dist/jQuery.print.min.js')}}"></script>
<script>
	$('#btnPrint').click(function(){
		$("#tabOffPrint").print();
		//window.print();
	});
</script>
@endsection