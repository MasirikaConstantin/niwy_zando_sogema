@extends('layout.main')

@section('title')
	Formulaire de validation vendeur
@endsection

@section('styles')
<style>
    .card .card-header, .card-light .card-header {
        /* padding: 1rem 1.25rem;
        background-color: transparent; */
        border-bottom: 1px solid #ffffff !important;
    }
    .myInputTail{
        height: 45px !important;
    }

	.select2-container--default .select2-selection--single {
        height: 40px !important;
        /* width: 100% !important; */
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 40px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px !important;
        /* width: 100% !important; */
    }
</style>
@endsection

@section('content')
<div class="row justify-content-center pl-4 pr-4" style="position: relative;">
	<div class="col-12 col-lg-12 col-xl-12">
		
		<div class="row mt-3">
			<div class="col-md-12">
				
				<div class="card card-invoice">

					<div class="card-header">
						
						<div class="invoice-header">
							
							<div class="row justify-content-center mb-3" style="margin-top: 10px; position: relative !important;">
								{{-- <div class="col-3"></div> --}}
								<div class="col-6 col-lg-6 col-xl-6 bg-dangerM">
									<h3 class="invoice-title text-center text-uppercase fw-bold" style="padding: 0 !important; margin-bottom: 0 !important;">
										INFORMATION VENDEUR
									</h3>
									<div class="row justify-content-center">
										<div class="col-9" style="border-bottom: 1px solid #000;"></div>
									</div>
									<h3 class="invoice-title text-center text-uppercase mt-3">
										{{$vendeur->code_unique}}
									</h3>
								</div>
							</div>

							<div class="row border mt-4 ml-2 mr-2">
                                <div class="col-sm-4" style="border-right: 0.5px solid #dee2e6;">
                                    <h4 style="font-weight: bold;">Nom:</h4>
                                    <h4>{{$vendeur->nom}}</h4>
                                </div>
                                <div class="col-sm-4" style="border-right: 0.5px solid #dee2e6;">
                                    <h4 style="font-weight: bold;">Postnom:</h4>
                                    <h4>{{$vendeur->postnom}}</h4>
                                </div>
                                <div class="col-sm-4">
                                    <h4 style="font-weight: bold;">Prenom:</h4>
                                    <h4>{{$vendeur->prenom}}</h4>
                                </div>
                            </div>
						</div>
					</div>

					<form id="formSend" action="{{route('vend.detailsInfosVendeurPourValidationStore', $vendeur->id)}}" method="POST">
						@csrf
						<div class="card-body" style="margin-top: 35px;">
							<!-- <div class="separator-solid"></div> -->

							{{-- <div class="row">
								@forelse($places as $pl)
									<div class="col-sm-2">
										<div class="card p-3 colorText text-center" style="border: 1px solid #00000038; background-color: #1d6fb8d4; max-height: 88px;">
											<span>{{$pl->nom}} @if(!empty($pl->type_place_id)) {{$pl->typePlace->nom}} {{$pl->typePlace->dimension}}  @endif</span>
											<h4>
												{{$pl->emplacements->where('etat', 0)->count()}}
											</h4>
										</div>
									</div>
								@empty
								@endforelse
							</div> --}}

							<div class="row pl-4 pr-4">
								<div class="col-md-12">						

									<div class="invoice-detail">
										{{-- <div class="invoice-top">
											<h3 class="title"><strong>Activite</strong></h3>
										</div> --}}
										<div class="invoice-item">
											@forelse ($vendeur->vendeurDemande as $dm)
											<div class="row justify-content-center mb-3" style="border-bottom: 1px solid #00000042 ">
												<div class="col-sm-3 bg-dangerM">
													<h4 style="font-weight: bold;" class="">Secteur Activite</h4>
													<span>
														{{$dm->article->nom}}
													</span>
													<h6>
														({{$dm->prix}}$ <span>*</span> <span>{{$dm->mois}} Mois </span>) * {{$dm->quatite}} = {{$dm->prix * $dm->mois}}<span>$</span>
													</h6>
													<input type="hidden" name="demande{{$loop->index}}" id="demande{{$loop->index}}" value="{{$dm->id}}" />
												</div>
												<div class="col-sm-2 bg-primaryM">
													<h4 style="font-weight: bold;">Place</h4>
													<select name="place{{$loop->index}}" id="place{{$loop->index}}" disabled class="form-control myInputTail selected2M" required>
														{{-- <option value="">--Choisir--</option> --}}
														@forelse($places as $item)
															<option value="{{$item->id}}" {{$item->id == $dm->place_id ? 'selected': '' }}>
																{{$item->nom}} @if(!empty($item->type_place_id)) {{$item->typePlace->nom}} {{$item->typePlace->dimension}}  @endif
															</option>
														@empty
														@endforelse
													</select>
												</div>
												<div class="col-sm-2">
													<h4 style="font-weight: bold;">Pavillon</h4>
													<select name="pavillon{{$loop->index}}" id="pavillon{{$loop->index}}" onchange="getEmplacementByPavillon('{{$loop->index}}')" class="form-control myInputTail selected2">
														<option value="">--Choisir--</option>
														{{-- @forelse($pavillons as $pv)
															<option value="{{$pv->id}}" {{$pv->id == $dm->pavillon_id ? 'selected': '' }}>{{$pv->numero}} / niveau {{$pv->niveau}}</option>
														@empty
														@endforelse --}}

														@php 
															$controller = new App\Http\Controllers\PavillonController();
															$resultat = $controller->getPavillonBySecteurActiviterIdAndPlaceId($dm->article->id, $dm->place_id);
														@endphp

														@forelse($resultat as $pv)
															<option value="{{$pv->pavillonsId}}" {{$pv->pavillonsId == $dm->pavillon_id ? 'selected': '' }}>{{$pv->pavillonNumero}} / niveau {{$pv->pavillonNiveau}}</option>
														@empty
														@endforelse														
													</select>
												</div>
												<div class="col-sm-2 bg-primaryM">
													<h4 style="font-weight: bold;">Numero Place</h4>
													<select name="emplacement{{$loop->index}}" id="emplacement{{$loop->index}}" onchange="emptyDecisionChamp('{{$loop->index}}')" disabled class="form-control selected2">
														<option value="">--Choisir--</option>
														@forelse($emplacements as $empl)
															<option value="{{$empl->id}}" {{$empl->id == $dm->emplacement_id  ? 'selected': '' }}>{{$empl->numero}}</option>
														@empty
														@endforelse
													</select>

													<div class="text-center border" id="emplacementLoaderImg{{$loop->index}}" style="display: none;">
														<img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 40px;" />
													</div>

													<h6 id="quantiteStock{{$loop->index}}" style="background-color: #ffffff; color: #1D6FB8; font-weight: bold; display: none;">Stock dispo <span id="quantiteDispo{{$loop->index}}"></span></h6>													
												</div>
												<div class="col-sm-2 bg-dangerM">
													<div class="row">
														<div class="col-sm-12">
															<h4 style="font-weight: bold;">Décision</h4>
														</div>
													</div>
													{{-- <div class="row">
														<div class="col-sm-12">
															<input type="radio" name="decision{{$loop->index}}" id="decisionA{{$loop->index}}" onchange="saveDecision('{{$loop->index}}')" checked class="form-controlM" value="1" />
															<label for="decisionA{{$loop->index}}" style="font-size: 16px !important; font-weight: bold !important;">Valider</label>
														</div>
														<div class="col-sm-12">
															<input type="radio" name="decision{{$loop->index}}" id="decisionR{{$loop->index}}" onchange="saveDecision('{{$loop->index}}')" class="form-controlM" value="0" />
															<label for="decisionR{{$loop->index}}" style="font-size: 16px !important; font-weight: bold !important;">Rejeter</label>
														</div>
													</div> --}}
													<select name="decision{{$loop->index}}" id="decision{{$loop->index}}" disabled onchange="saveDecision('{{$loop->index}}')" class="form-control myInputTail selected2M" required>
														<option value="">--Choisir--</option>
														
														<option value="1" {{$dm->decision == "1" ? 'selected': ''}}>Valider</option>
														<option value="0" {{$dm->decision == "0" ? 'selected': ''}}>Rejeter</option>				
																												
													</select>													
												</div>
												<div class="col-sm-1">
													<div class="row">
														<div class="col-sm-12">
															<h4 style="font-weight: bold;" class="text-white">-</h4>
														</div>
													</div>												
													
													<div id="decisionSymboleDiv{{$loop->index}}">
														@if($dm->decision == "1" && !empty($dm->emplacement->etat) && $dm->emplacement->etat == 1)
														<button type="button" id="decisionSymboleV{{$loop->index}}" class="btn btn-icon btn-round btn-success" style="background-color: #1d6fb8d4;">
															<i class="fa fa-check"></i>
														</button>
														@endif

														@if($dm->decision == "0")										
														<button type="button" id="decisionSymboleR{{$loop->index}}" title="impossible de cliquez" class="btn btn-icon btn-round btn-dangerM">
															<i class="flaticon-error text-danger" style="font-weight: bold; font-size: 30px;"></i>
														</button>
														@endif														
													</div>	

													<div class="text-center border" id="decisionSymboleLoaderImg{{$loop->index}}" style="display: none;">
														<img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 40px;" />
													</div>										
												</div>
											</div>
											@empty
											<div class="row">
												<div class="col-sm-12 justify-content-center text-center text-danger">
													Pas de données
												</div>
											</div>
											@endforelse
										</div>
									</div>	
								</div>	
							</div>

							<div class="row mt-3">
								<div class="col-sm-9"></div>
								<div class="col-sm-2 text-right">
									<a @if($vendeur->etat == "attente") id="btnSend" href="{{route('vend.vendeurTraiter', $vendeur->id)}}" @endif class="btn bg_background text-white" style="text-transform: uppercase;">							
										@if($vendeur->etat == "attente") Terminer @endif
										@if($vendeur->etat == "traiter" || $vendeur->etat == "payer" || $vendeur->etat == "valider") Déjà traité @endif
									</a>
								</div>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script>
	document.getElementById('btnSend').addEventListener('click', function(e) {
        document.getElementById('btnSend').innerHTML = " En cours...";
        document.getElementById('btnSend').setAttribute("disabled", true);
    });

	function getEmplacementByPavillon(idLignePv){
		let pavillon_id = document.getElementById('pavillon'+idLignePv).value;
		let place_id = document.getElementById('place'+idLignePv).value;
		let quantiteStock = document.getElementById('quantiteStock'+idLignePv); 
		let quantiteDispo = document.getElementById('quantiteDispo'+idLignePv); 
		let emplacementLoaderImg = document.getElementById('emplacementLoaderImg'+idLignePv); 
			emplacementLoaderImg.style.display = "block";	

		//document.getElementById('emplacement'+idLignePv).style.display = "none";
		let emplacement = document.getElementById('emplacement'+idLignePv);
		let select2Container = emplacement.nextElementSibling;
		if (select2Container.classList.contains('select2-container'))
		{
        	select2Container.style.display = 'none';
        }
		//return console.log(place_id);
		axios.get("{{route('getEmplacementByPavillon')}}", {
			params : {
				pavillon_id,
				place_id
			}
		})
        .then(function(response) {
            let produits = response.data;
            //console.log(produits);
            var options = "";

			emplacementLoaderImg.style.display = "none";
			if (select2Container.classList.contains('select2-container'))
			{
				select2Container.style.display = 'block';
			}	
            document.getElementById('emplacement'+idLignePv).innerHTML = '<option value="">--Choisir--</option>';
            //return console.log(produits);
            // let typeArticle;
            for (let i in produits) {
                //options+= '<option value="'+ niveaux[i].id +'">'+niveaux[i].libelle+'</option> '
                options = document.createElement('option');
                options.value = `${produits[i].id}`;
                options.innerHTML += `${produits[i].numero} / ${produits[i].place.orientation}`;			
                document.getElementById('emplacement'+idLignePv).appendChild(options);                
            }

			let tabTails = produits.length; 
			let myEmplacement = document.getElementById('emplacement'+idLignePv);
			let decision = document.getElementById('decision'+idLignePv);

			quantiteStock.style.display = "block";
			//quantiteDispo
			//"(" + produits.length + ")";
			if(tabTails == "0"){ 
				myEmplacement.disabled = true;
				myEmplacement.innerHTML = '<option value="">Pas de numéro</option>';
				decision.disabled = true;
				quantiteStock.innerHTML = `<span class="text-danger">Stock dispo ${produits.length}</span>`;
			}else{
				myEmplacement.disabled = false;
				//decision.disabled = false;
				quantiteStock.innerHTML = `<span class="text-primary">Stock dispo ${produits.length}</span>`;
			}
            //console.log(produits.length)       
            //console.log(produits)       
        }).catch(function(error) {
            alert(error);
            //console.log(error);
        });
	}

	function emptyDecisionChamp(idLignePv){
		let emplacement = document.getElementById('emplacement'+idLignePv).value;
		let decision = document.getElementById('decision'+idLignePv);
		let index = 0;
		//let decisionValue = document.getElementById('decision'+idLignePv).innerHTML = '<option value="">--Choisir--</option>';
		if(emplacement == null || emplacement == "")
		{
			decision.disabled = true;
		}else{
			decision.disabled = false;
			//"Number 20"
		}
		//document.getElementById('decision'+idLignePv).value = "20"  //'<option value="">Number 20</option>';;
		// document.getElementById('decision'+idLignePv).selectedIndex = index;
		// console.log(index); //decision.options.length
	}

	function saveDecision(idLignePv){
		let pavillon_id = document.getElementById('pavillon'+idLignePv).value;
		let emplacement_id = document.getElementById('emplacement'+idLignePv).value;
		let decisionValue = document.getElementById('decision'+idLignePv).value;
		let decision = document.getElementById('decision'+idLignePv);
			decision.style.display = "none";
		let demandeId = document.getElementById('demande'+idLignePv).value;
		let decisionSymboleV = document.getElementById('decisionSymboleV'+idLignePv);
		let decisionSymboleR = document.getElementById('decisionSymboleR'+idLignePv);
		let decisionSymboleDiv = document.getElementById('decisionSymboleDiv'+idLignePv);
			
		let decisionSymboleLoaderImg = document.getElementById('decisionSymboleLoaderImg'+idLignePv);
			decisionSymboleLoaderImg.style.display = "block";
		
		axios.post("{{route('saveDecision')}}", {
			pavillon_id,
			emplacement_id,
			decisionValue,
			demandeId
		})
        .then(function(response) {
            let reponse = response.data.myData;
			if(reponse.decision == "1" && reponse.emplacement.etat == 1){
				if(decisionSymboleV){decisionSymboleV.style.display = "block";}
				//console.log("decision 1 emplacement 1"); 
				decisionSymboleDiv.innerHTML =
				`<button type="button" id="decisionSymboleVJs${idLignePv}" class="btn btn-icon btn-round btn-success" style="background-color: #1d6fb8d4;">
					<i class="fa fa-check"></i>
				</button>`;
			}else if(reponse.decision == "0"){
				if(decisionSymboleV){ decisionSymboleV.style.display = "none"; }
				if(decisionSymboleR){ decisionSymboleR.style.display = "block"; }

				decisionSymboleDiv.innerHTML = 
				`<button type="button" id="decisionSymboleRjS${idLignePv}" title="impossible de cliquez" class="btn btn-icon btn-round btn-dangerM">
					<i class="flaticon-error text-danger" style="font-weight: bold; font-size: 30px;"></i>
				</button>`;
				//console.log("decision 0");   
			}
			else{
				if(decisionSymboleV){ decisionSymboleV.style.display = "none"; }
				if(decisionSymboleR){ decisionSymboleR.style.display = "none"; }
				//console.log("decision sinon"); 
			}

			decision.style.display = "block";
			decisionSymboleLoaderImg.style.display = "none";
 
        }).catch(function(error) {
            alert(error);
            console.log(error);
        });
	}
	
</script>
@endsection