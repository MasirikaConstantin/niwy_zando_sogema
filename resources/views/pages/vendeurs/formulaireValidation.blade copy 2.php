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

	/* .table-responsive {
		width: 100% !important;
		overflow-x: auto;
		-webkit-overflow-scrolling: touch;
		-ms-overflow-style: -ms-autohiding-scrollbar;
	} */
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

							<div class="row justify-content-center">
								<div class="col-sm-2 col-lg-2">
									<div class="card p-3 colorText" style="border: 1px solid #00000038; background-color: #1d6fb8d4; max-height: 88px;">
										<div class="d-flex align-items-center justify-content-center">
											<span class="stamp stamp-md bg-secondary mr-3">
												{{-- <i class="fa fa-dollar-sign"></i> --}}
											</span>
											<div>
												<h5 class="mb-1M text-center">
													<b>
														<a href="#" style="font-size: 16px;">{{$placeNumber['magasin']}} <br /> 
														<small class="fw-bold" style="font-size: 16px;">Magasin</small></a>
													</b>
												</h5>
												{{-- <small class="text-muted">12 waiting payments</small> --}}
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-2 col-lg-2">
									<div class="card p-3 colorText" style="border: 1px solid #00000038; background-color: #6610f2a3; max-height: 88px;">
										<div class="d-flex align-items-center justify-content-center">
											<span class="stamp stamp-md bg-secondary mr-3">
												{{-- <i class="fa fa-dollar-sign"></i> --}}
											</span>
											<div>
												<h5 class="mb-1M text-center">
													<b>
														<a href="#" style="font-size: 16px;">{{$placeNumber['etalage']}} <br /> 
														<small class="fw-bold" style="font-size: 16px;">Etalage</small></a>
													</b>
												</h5>
												{{-- <small class="text-muted">12 waiting payments</small> --}}
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-2 col-lg-2">
									<div class="card p-3 colorText" style="border: 1px solid #00000038; background-color: #2FB7C3; max-height: 88px;">
										<div class="d-flex align-items-center justify-content-center">
											{{-- <span class="stamp stamp-md bg-secondary mr-3">
												<i class="fa fa-dollar-sign"></i>
											</span> --}}
											<div>
												<h5 class="mb-1M text-center">
													<b>
														<a href="#" style="font-size: 16px;">{{$placeNumber['kiosque']}}<br /> 
														<small class="fw-bold" style="font-size: 16px;">Kiosque</small></a>
													</b>
												</h5>
												{{-- <small class="text-muted">12 waiting payments</small> --}}
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-2 col-lg-2">
									<div class="card p-3 colorText" style="border: 1px solid #00000038; background-color: #37A9E1; max-height: 88px;">
										<div class="d-flex align-items-center justify-content-center">
											{{-- <span class="stamp stamp-md bg-secondary mr-3">
												<i class="fa fa-dollar-sign"></i>
											</span> --}}
											<div>
												<h5 class="mb-1M text-center">
													<b>
														<a href="#" style="font-size: 16px;">{{$placeNumber['entrepot']}} <br /> 
														<small class="fw-bold" style="font-size: 16px;">Entrepôt</small></a>
													</b>
												</h5>
												{{-- <small class="text-muted">12 waiting payments</small> --}}
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-2 col-lg-2 myHeightCard">
									<div class="card p-3 colorText" style="border: 1px solid #00000038; background-color: #6f42c1; max-height: 88px;">
										<div class="d-flex align-items-center justify-content-center">
											{{-- <span class="stamp stamp-md bg-secondary mr-3">
												<i class="fa fa-dollar-sign"></i>
											</span> --}}
											<div>
												<h5 class="mb-1M text-center">
													<b>
														<a href="#" style="font-size: 16px;">{{$placeNumber['chambreFroide']}} <br /> 
														<small class="fw-bold" style="font-size: 16px;">Chambre froide</small></a>
													</b>
												</h5>
												{{-- <small class="text-muted">12 waiting payments</small> --}}
											</div>
										</div>
									</div>
								</div>
								
							</div>

							<div class="row pl-4 pr-4">
								<div class="col-md-12">						

									<div class="invoice-detail">
										{{-- <div class="invoice-top">
											<h3 class="title"><strong>Activite</strong></h3>
										</div> --}}
										<div class="invoice-item">
											<div class="table-responsive">
												<table class="table table-stripedM">
													<thead>
														<tr>
															{{-- style="width: 20%; background-color: red;" --}}
															<td><strong>Article</strong></td>
															<td><strong>Place</strong></td>
															<td><strong>Quantité</strong></td>
															<td><strong>Décision</strong></td>
														</tr>
													</thead>
													<tbody>
														@php 
															$index;
														@endphp
														@forelse ($vendeur->places as $place)
															@php $index = $loop->index @endphp
															<tr>
																<td>
																	<input type="hidden" name="posseder{{$loop->index}}" value="{{$place->pivot->id}} {{$place->pivot->decision}}" @if( $place->pivot->decision == "valider" ||  $place->pivot->decision == "rejeter") disabled @endif />
																	
																	@forelse ($vendeur->articles as $article)
																		@if($article->pivot->place_id == $place->id)
																			{{-- <input type="hidden" name="concerner{{$index}}" value="{{$article->pivot->id}}" /> --}}
																			<span class="bg_background colorText p-1" style="border-radius: 6px; font-size: 14px;">{{$article->nom}}</span> 
																			{{-- <h4>Article <span class="isRequired">*</span></h4>--}}
																			{{-- <select name="article0[]" id="articleId{{$index}}" style="width: 100%;" class="form-control selected2" multiple="multiple" required>
																				<option value="">--Choisir--</option>
																			</select>  --}}
																		@endif
																	@empty
																	{{-- Vide --}}
																	@endforelse

																	{{-- <select name="article{{$index}}[]" id="articleId{{$index}}" class="selected2 form-control" multiple="multiple" required>
																		@forelse ($vendeur->articles as $article)
																			
																				<option value="{{ $article->id }}" {{$article->pivot->place_id == $place->id ? 'selected' : ''}} >{{ $article->nom }}</option>
																		
																		@empty
																			Vide
																		@endforelse
																	</select> --}}
																</td>

																<td>
																	{{-- {{$place->nom}} --}}
																	{{-- <div class="col-sm-3"> --}}
																		{{-- <h4>Place <span class="isRequired">*</span></h4> --}}
																		<select name="place{{$loop->index}}" id="place{{$loop->index}}" {{ $place->pivot->decision == "valider" ||  $place->pivot->decision == "rejeter" ? 'disabled' : '' }}  class="form-control myInputTail" required>
																			{{-- <option value="">--Choisir--</option> --}}
																			@forelse($places as $item)
																				<option value="{{$item->id}}" {{$item->id == $place->id ? 'selected': '' }}>{{$item->nom}}</option>
																			@empty
																			@endforelse
																		</select>
																	{{-- </div> --}}
																</td>
																<td>
																	{{-- {{$place->pivot->nbr}} --}}
																	{{-- <h4>Quantité</h4> --}}
																	<input type="number" name="quantite{{$loop->index}}" id="quantite{{$loop->index}}" @if($place->pivot->nbr_retenu != null || $place->pivot->nbr_retenu != 0 ) value="{{$place->pivot->nbr_retenu}}" @else value="{{$place->pivot->nbr}}" @endif {{ $place->pivot->decision == "valider" ||  $place->pivot->decision == "rejeter" ? 'disabled' : '' }} class="form-control myInputTail" style="max-width: 80px" />
																</td>																
																<td>
																	<select name="decision{{$loop->index}}" id="decision{{$loop->index}}"class="form-control myInputTail" {{ $place->pivot->decision == "valider" ||  $place->pivot->decision == "rejeter" ? 'disabled' : '' }} required>
																		<option value="">--Choisir--</option>
																		<option value="valider" {{$place->pivot->decision == "valider" ? 'selected' : ''}}>Valider</option>
																		<option value="rejeter" {{$place->pivot->decision == "rejeter" ? 'selected' : ''}}>Rejeter</option>																	
																	</select>
																</td>
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

							<div class="row mt-3">
								<div class="col-sm-9"></div>
								<div class="col-sm-2 text-right">
									<button id="btnSend" type="submit" class="btn bg_background text-white" @if($vendeur->etat == "traiter") disabled @endif>
										<!-- <div id="mySaveLoader" class="col-sm-12M" style="position: relative;">
											<img src="{{asset('assets/img/loading.gif')}}" alt="img loading" style="height: 20px;"/> 
										</div> -->
										Terminer
									</button>
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
<script>
	document.getElementById('formSend').addEventListener('submit', function(e) {
        document.getElementById('btnSend').innerHTML = " En cours...";
        document.getElementById('btnSend').setAttribute("disabled", true);
    });
</script>
@endsection