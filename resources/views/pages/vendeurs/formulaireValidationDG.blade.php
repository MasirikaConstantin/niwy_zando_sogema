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

	.table-responsive >.table-bordered {
   		border: 1px solid #dee2e6 !important;
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
            {{--
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
							
						</div>
					</div>
				</div>
			</div> --}}

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
										@if($vendeur->vendeur->photo == "" && $vendeur->vendeur->sexe == 'M')
											<img src="{{asset('assets/img/homme.png')}}" alt="Logo Sogema" style="height: 150px; width: 150px; object-fit: contain;" />
										@elseif($vendeur->vendeur->photo == "" && $vendeur->vendeur->sexe == 'F')
											<img src="{{asset('assets/img/femme.png')}}" alt="Logo Sogema" style="height: 150px; width: 150px; object-fit: contain;" />
										@else
											<img src="{{asset('uploaded_files/'.$vendeur->vendeur->photo)}}" alt="Logo Sogema" style="height: 150px; width: 150px; object-fit: contain;" />
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
									<p>{{$vendeur->vendeur->code_unique}}</p>
								</div>
							</div>
							<!-- photo -->
						</div>
					</div>
                    

					<div class="card-body" style="margin-top: 35px;">
						<!-- <div class="separator-solid"></div> -->
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
															{{$vendeur->vendeur->nom}}
															
														</td>
														<td class="text-center">{{$vendeur->vendeur->postnom}}</td>
														<td class="text-center">{{$vendeur->vendeur->prenom}}</td>
														<td class="text-center">{{$vendeur->vendeur->sexe}}</td>
														<td class="text-center">{{$vendeur->vendeur->telephone}}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="invoice-detail">
									<div class="invoice-top">
										<h3 class="title"><strong>Activite</strong></h3>
									</div>
									@if($vendeur->etat != "attente")
									<div class="invoice-item">
										<div class="table-responsive">										

											<table class="table table-striped">
												<thead>
													<tr>
														<td><strong>Article</strong></td>
														<td class="text-center"><strong>Place</strong></td>
														<td class="text-center"><strong>Pavillon</strong></td>
														{{-- <td class="text-right"><strong>Numéro place</strong></td> --}}
														<td class="text-center"><strong>Remise</strong></td>
													</tr>
												</thead>
												<tbody>
													@forelse ($vendeur->vendeurDemande as $dm)
														@if($dm->decision == '1')
														<tr>
															<td class="">
																<span>
																	{{$dm->article->nom}}
																</span>
																<div class="text-primary">
                                                                    
                                                                    <h4 style="font-weight: bold; font-size: 15px;">({{$dm->prix}}$ <span>*</span> <span>{{$dm->mois}} Mois </span>) * {{$dm->quatite}} Place = {{$dm->prix * $dm->mois}}<span>$</span></h4>
                                                                    
                                                                    @if($dm->remise > 0)
                                                                    <h4 style="font-weight: bold; font-size: 15px;">
                                                                        @php
                                                                            $remise = $dm->total * $dm->remise / 100;
                                                                            $totalApayer = $dm->total - $remise;
                                                                        @endphp 
                                                                        <strong class="text-warning" style="font-size: 15px;">Montant à payer <span id="printRemise{{$loop->index}}">{{number_format($totalApayer)}}</span><span>$</span></strong>
                                                                    </h4>
                                                                    @endif
																	<strong class="text-warning" style="font-size: 15px;" id="printRemiseJs{{$loop->index}}"> </strong>
																</div>
																<input type="hidden" name="idVendeurDemande{{$loop->index}}" id="idVendeurDemande{{$loop->index}}" value="{{$dm->id}}" />
																<input type="hidden" name="prix{{$loop->index}}" id="prix{{$loop->index}}" value="{{$dm->prix}}" />
																<input type="hidden" name="mois{{$loop->index}}" id="mois{{$loop->index}}" value="{{$dm->mois}}" />
																<input type="hidden" name="total{{$loop->index}}" id="total{{$loop->index}}" value="{{$dm->total}}" />
																<input type="hidden" name="quantite{{$loop->index}}" id="quantite{{$loop->index}}" value="{{$dm->quatite}}" />

															</td>
															<td class="text-center">
																{{$dm->place->nom}} @if(!empty($dm->place->type_place_id)) {{$dm->place->typePlace->nom}} {{$dm->place->typePlace->dimension}}  @endif 
															</td>
															<td class="text-center">@if(!empty($dm->pavillon_id)){{$dm->pavillon->numero}} / Niveau {{$dm->pavillon->niveau}} @endif</td>
															{{-- <td class="text-center">@if(!empty($dm->emplacement_id)){{$dm->emplacement->numero}} / {{$dm->emplacement->place->orientation}} @endif</td> {{$dm->remise}} --}}
                                                            
                                                            <td class="text-center">
                                                               	<div style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                                    <input type="number" name="remise{{$loop->index}}" id="remise{{$loop->index}}" @if($vendeur->decision_dg == 1) readonly @endif class="form-control" min="0" max="99" value="{{$dm->remise}}" onchange="SaveRemise('{{$loop->index}}');" onkeyup="SaveRemise('{{$loop->index}}');" style="width: 80px !important; height: 40px !important;" placeholder="%" />
																	<div class="text-center border" id="remiseLoaderImg{{$loop->index}}" style="display: none;">
																		<img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 30px;" />
																	</div>
                                                               	</div>
                                                            </td>
														</tr>
														@endif
                                                        
													@empty
														<tr>
															<td colspan="4" class="text-center text-danger fw-bold">Pas de données</td>															
														</tr>
													@endforelse

                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td class="text-center">
                                                            <h4 style="text-transform: uppercase;">TOTAL Général</h4>
                                                        </td>
                                                        <td class="text-center">
                                                            <h4 id="myTotalG" style="font-weight: bold;">
                                                                @if($totalApayerRemise > 0)
                                                                    {{number_format($totalApayerRemise)}} <span>$</span>
                                                                @else
                                                                 {{number_format($totalSum)}} <span>$</span>
                                                                @endif
                                                            </h4>
															<div class="text-center border" id="totalGLoaderImg" style="display: none;">
																<img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 40px;" />
															</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td class="">
                                                            <a @if($vendeur->decision_dg != 1) id="btnSend" href="{{route('vend.terminerDg', $vendeur->id)}}" disabled @endif class="btn bg_background text-white">
																@if($vendeur->decision_dg != 1) Terminer l'operation  @endif
																@if($vendeur->decision_dg == 1) Déjà approuvé @endif
															</a>
                                                        </td>
                                                    </tr>
												</tbody>
											</table>
										</div>
									</div>
									@else
									<div class="row">
										<div class="col-sm-12">
											<h4 class="text-center" style="font-weight: bold;">Dossier non Traité</h4>
										</div>
									</div>
									@endif
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
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script>
	$('#btnPrint').click(function(){
		$("#tabOffPrint").print();
		//window.print();
	});

	function SaveRemise(idLigne){
		let remise = document.getElementById('remise'+idLigne).value; //.style.display = 'none';
		let idVendeurDemande = document.getElementById('idVendeurDemande'+idLigne).value;
		let prix = document.getElementById('prix'+idLigne).value;
		let mois = document.getElementById('mois'+idLigne).value;
		let total = document.getElementById('total'+idLigne).value;
		let quantite = document.getElementById('quantite'+idLigne).value;
		let printRemise = document.getElementById('printRemise'+idLigne);
		let printRemiseJs = document.getElementById('printRemiseJs'+idLigne);
		let remiseLoaderImg = document.getElementById('remiseLoaderImg'+idLigne);
			remiseLoaderImg.style.display = 'block';
		let totalGLoaderImg =  document.getElementById('totalGLoaderImg');
		let myTotalG = document.getElementById('myTotalG');
		let myRemise = 0; 
		let totalApayer = 0;
		
		if(remise >= 0){
			myRemise = (total * remise) / 100;
			totalApayer = total - myRemise;
			//console.log(totalApayer.toLocaleString('en-US'))
			totalGLoaderImg.style.display = 'block';
			myTotalG.style.display = 'none';
			if(printRemise){
				printRemise.innerHTML = totalApayer.toLocaleString('en-US');
				//remiseLoaderImg.style.display = 'none';
			}else if(printRemiseJs){
				printRemiseJs.innerHTML = `Montant à payer <span>${totalApayer.toLocaleString('en-US')}</span> <span>$</span>`;
			}

			axios.post("{{route('vend.saveRemise')}}", {
				idVendeurDemande,
				remise

			}, {
				headers: { 'Content-Type': 'multipart/form-data' }
			})
			.then(function(response) {
				const reponse = response.data; //myData 
				// document.getElementById('btnSend').innerHTML = "Enregistrer";
				// document.getElementById('btnSend').removeAttribute("disabled"); 
				document.getElementById('myTotalG').innerHTML = reponse.myData.toLocaleString('en-US') + '$';
				remiseLoaderImg.style.display = 'none';
				totalGLoaderImg.style.display = 'none';
				myTotalG.style.display = 'block';
				// console.log(reponse)         
			}).catch(function(error) {
				alert(error);
				console.log(error);
			});		

		}
	}

	// document.getElementById('formSend').addEventListener('submit', function(e) {
    //     document.getElementById('btnSend').innerHTML = " En cours...";
    //     document.getElementById('btnSend').setAttribute("disabled", true);
    // });

	document.getElementById('btnSend').addEventListener('click', function(e) {
		document.getElementById('btnSend').innerHTML = " En cours...";
		document.getElementById('btnSend').setAttribute("disabled", true);
	});
</script>
@endsection