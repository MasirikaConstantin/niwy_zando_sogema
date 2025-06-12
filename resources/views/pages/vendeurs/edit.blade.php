@extends('layout.main')

@section('title')
Créer un vendeur
@endsection

@section('styles')

{{-- @vite('resources/css/app.css') --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> --}}

<style>
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
    /* .input-file .form-control, .input-file .form-control-file, .input-file input[type=file] {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: relative;
        z-index: 100 !important;
    } */

    /* select {
        background-color: red !important;
        color: #D71212;
        border: 1px solid #cccccc;
    } */

    .video-container{
        width: 300px !important;
        height: 300px !important;
        border: 1px solid #000;
        overflow: hidden;
    }
    .video-container video{
        width: 100%;
        height: 100%;
        object-fit: cover;
        border: 1px solid red;
    }

    #canvas-container {
        width: 100px;
        height: 150px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<link rel="stylesheet" href="{{asset('assets/formWizard/style.css')}}" />
@endsection

@section('contentHeader')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Vendeur</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Création</a>
            </li>
            <!-- <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Basic Tables</a>
            </li> -->
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="page-inner">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row bg_background text-center justify-content-center">
                <div class="col-sm-12 ">
                    <h3 class="wizard-title text-white pt-2 pb-2 text-center animate__animated animate__bounce animate__delay-2s" style="font-size: 24px;">
                        <b>Formulaire d'identification</b>
                    </h3>
                </div>
            </div>

            <div class="multisteps-form">
                <!--progress bar-->
                <div class="row mt-3">
                    <div class="col-12 col-lg-12 ml-auto mr-auto mb-4">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="Information personnel">IDENTITE</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Demande de place">DEMANDE</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Capture photo">CAPTURE PHOTO</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Capture empreint">CAPTURE EMPREINT</button>
                        </div>
                    </div>
                </div>   
                
                <!--form panels-->
                {{-- <form id="formSend" action="{{route('vend.StoreAjax')}}" method="POST" class="multisteps-form__form" style="height: auto !important;" enctype="multipart/form-data">
                    @csrf --}}
                    <div class="row">
                        <div class="col-12 col-lg-12 m-auto multisteps-form__form">
                            {{-- <form id="formSend" action="{{route('vend.StoreAjax')}}" method="POST" class="multisteps-form__form" enctype="multipart/form-data"> --}}

                                <!-- steep 1 -->
                                <form id="formSendIdentite" action="{{route('vend.editIdentiteUpdate', $vendeur->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="multisteps-form__panel shadow p-4M pl-4 pr-4 rounded bg-white js-active">
                                        <h3 class="multisteps-form__title pt-4">IDENTITE</h3>
                                        <div class="multisteps-form__content">
                                            <div class="form-row mt-4M">
                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="nom" class="form-label">Nom <span class="isRequired">*</span></label>
                                                        <input type="text" class="form-control @error('nom') is-invalid @enderror mystyleInput" name="nom" id="nom" value="{{$vendeur->nom}}" placeholder="Saisir le nom" />
                                                        @error('nom')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="postnom" class="form-label">Postnom</label>
                                                        <input type="text" class="form-control mystyleInput" name="postnom" value="{{$vendeur->postnom}}" id="postnom" placeholder="Saisir post-nom" />
                                                        @error('prenom')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="prenom" class="form-label">Prénom <span class="isRequired">*</span></label>
                                                        <input type="text" class="form-control mystyleInput @error('prenom') is-invalid @enderror" name="prenom" id="prenom" value="{{$vendeur->prenom}}" placeholder="Saisir prénom" />
                                                        @error('prenom')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="sexe" class="form-label">Sexe <span class="isRequired">*</span></label>
                                                        <select name="sexe" id="sexe" class="form-control mystyleInput @error('sexe') is-invalid @enderror selected2">
                                                            <option value="">--Choisir--</option>
                                                            <option value="M" {{'M' == $vendeur->sexe ? 'selected' : ''}}>Homme</option>
                                                            <option value="F" {{'F' == $vendeur->sexe ? 'selected' : ''}}>Femme</option>
                                                            {{-- <option value="Autre" {{'F' == 'Autre' ? 'selected' : ''}}>Autre</option> --}}
                                                        </select>
                                                        @error('sexe')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="lieu_naissance" class="form-label">Lieu de naissance</label>
                                                        <input type="text" class="form-control mystyleInput" name="lieu_naissance" value="{{$vendeur->lieu_naissance}}" id="lieu_naissance" placeholder="Saisir lieu naissance" />
                                                        @error('lieu_naissance')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="date_naissance" class="form-label">Date de naissance</label>
                                                        <input type="date" class="form-control mystyleInput @error('date_naissance') is-invalid @enderror" name="date_naissance" id="date_naissance" value="{{$vendeur->date_naissance}}" placeholder="Saisir date_naissance" />
                                                        @error('date_naissance')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="residence" class="form-label">Residence <span class="isRequired">*</span></label>
                                                        <input type="text" class="form-control mystyleInput @error('residence') is-invalid @enderror" name="residence" id="residence" value="{{$vendeur->residence}}" placeholder="Saisir residence" />
                                                        @error('residence')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="commune" class="form-label">commune <span class="isRequired">*</span></label>
                                                        {{-- <input type="text" class="form-control mystyleInput @error('commune') is-invalid @enderror" name="commune" id="commune" value="{{$vendeur->commune}}" placeholder="Saisir commune" /> --}}
                                                        <select name="commune" id="commune" class="form-control selected2 @error('commune') is-invalid @enderror">
                                                            <option value="">--Choisir--</option>
                                                            <option value="Bandalungwa" {{ $vendeur->commune == "Bandalungwa" ? "selected" : "" }}>Bandalungwa</option>
                                                            <option value="Barumbu" {{ $vendeur->commune == "Barumbu" ? "selected" : "" }}>Barumbu</option>
                                                            <option value="Bumbu" {{ $vendeur->commune == "Bumbu" ? "selected" : "" }}>Bumbu</option>
                                                            <option value="Gombe" {{ $vendeur->commune == "Gombe" ? "selected" : "" }}>Gombe</option>
                                                            <option value="Kalamu" {{ $vendeur->commune == "Kalamu" ? "selected" : "" }}>Kalamu</option>
                                                            <option value="Kasa-Vubu" {{ $vendeur->commune == "Kasa-Vubu" ? "selected" : "" }}>Kasa-Vubu</option>
                                                            <option value="Kimbanseke" {{ $vendeur->commune == "Kimbanseke" ? "selected" : "" }}>Kimbanseke</option>
                                                            <option value="Kinshasa" {{ $vendeur->commune == "Kinshasa" ? "selected" : "" }}>Kinshasa</option>
                                                            <option value="Kintambo" {{ $vendeur->commune == "Kintambo" ? "selected" : "" }}>Kintambo</option>
                                                            <option value="Kisenso" {{ $vendeur->commune == "Kisenso" ? "selected" : "" }}>Kisenso</option>
                                                            <option value="Lemba" {{ $vendeur->commune == "Lemba" ? "selected" : "" }}>Lemba</option>
                                                            <option value="Limete" {{ $vendeur->commune == "Limete" ? "selected" : "" }}>Limete</option>
                                                            <option value="Lingwala" {{ $vendeur->commune == "Lingwala" ? "selected" : "" }}>Lingwala</option>
                                                            <option value="Makala" {{ $vendeur->commune == "Makala" ? "selected" : "" }}>Makala</option>
                                                            <option value="Maluku" {{ $vendeur->commune == "Maluku" ? "selected" : "" }}>Maluku</option>
                                                            <option value="Masina" {{ $vendeur->commune == "Masina" ? "selected" : "" }}>Masina</option>
                                                            <option value="Matete" {{ $vendeur->commune == "Matete" ? "selected" : "" }}>Matete</option>
                                                            <option value="Mont-Ngafula" {{ $vendeur->commune == "Mont-Ngafula" ? "selected" : "" }}>Mont-Ngafula</option>
                                                            <option value="Ndjili" {{ $vendeur->commune == "Ndjili" ? "selected" : "" }}>Ndjili</option>
                                                            <option value="Ngaba" {{ $vendeur->commune == "Ngaba" ? "selected" : "" }}>Ngaba</option>
                                                            <option value="Ngaliema" {{ $vendeur->commune == "Ngaliema" ? "selected" : "" }}>Ngaliema</option>
                                                            <option value="Ngiri-Ngiri" {{ $vendeur->commune == "Ngiri-Ngiri" ? "selected" : "" }}>Ngiri-Ngiri</option>
                                                            <option value="Nsele" {{ $vendeur->commune == "Nsele" ? "selected" : "" }}>Nsele</option>
                                                            <option value="Selembao" {{ $vendeur->commune == "Selembao" ? "selected" : "" }}>Selembao</option>                                                        
                                                        </select>
                                                        @error('commune')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="telephone" class="form-label">Téléphone <span class="isRequired">*</span></label>
                                                        <input type="text" class="form-control mystyleInput @error('telephone') is-invalid @enderror" name="telephone" id="telephone" value="{{$vendeur->telephone}}" placeholder="Saisir telephone" />
                                                        @error('telephone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="etat_civil" class="form-label">Etat-civil </label>
                                                        <select name="etat_civil" id="etat_civil" class="form-control mystyleInput @error('etat_civil') is-invalid @enderror selected2">
                                                            <option value="">--Choisir--</option>
                                                            <option value="Célibataire" {{ $vendeur->etat_civil == "Célibataire" ? "selected" : "" }}>Célibataire</option>
                                                            <option value="Marié" {{ $vendeur->etat_civil == "Marié" ? "selected" : "" }}>Marié</option>
                                                            <option value="Divorce" {{ $vendeur->etat_civil == "Divorce" ? "selected" : "" }}>Divorce</option>
                                                            <option value="veuf/veuve" {{ $vendeur->etat_civil == "veuf/veuve" ? "selected" : "" }}>veuf/veuve</option>
                                                        </select>
                                                        @error('etat_civil')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="nationalite" class="form-label">Nationalite <span class="isRequired">*</span></label>
                                                        <input type="text" class="form-control mystyleInput @error('nationalite') is-invalid @enderror" name="nationalite" id="nationalite" value="{{$vendeur->nationalite}}" placeholder="Saisir nationalite" />
                                                        @error('nationalite')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="piece_identite" class="form-label">Piece d'identite <span class="isRequired">*</span></label>
                                                        <select name="piece_identite" id="piece_identite" onchange="afficheDateExpirationPassport()" class="form-control selected2 @error('piece_identite') is-invalid @enderror">
                                                            <option value="">--Choisir--</option>
                                                            <option value="Carte d'électeur" {{$vendeur->piece_identite ? "selected" : ""}}>Carte d'électeur</option>
                                                            <option value="passport" {{$vendeur->piece_identite ? "selected" : ""}}>Passport</option>
                                                        </select>
                                                        @error('piece_identite')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="numero_national" class="form-label">Numéro national</label>
                                                        <input type="text" class="form-control mystyleInput @error('numero_national') is-invalid @enderror" name="numero_national" id="numero_national" max="18" value="{{$vendeur->numero_national}}" placeholder="piece identite date expiration" />
                                                        @error('numero_national')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0" id="id_date_passport">
                                                    <div class="form-group">
                                                        <label for="piece_identite_date_expiration" class="form-label">Date d'expiration du passport</label>
                                                        <input type="date" class="form-control mystyleInput @error('piece_identite_date_expiration') is-invalid @enderror" name="piece_identite_date_expiration" id="piece_identite_date_expiration" value="{{$vendeur->piece_identite_date_expiration}}" placeholder="piece identite date expiration" />
                                                        @error('piece_identite_date_expiration')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                    <div class="form-group">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="text" class="form-control mystyleInput @error('email') is-invalid @enderror" name="email" id="email" max="100" value="{{$vendeur->email}}" placeholder="Saisir l'email" />
                                                        @error('email')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>                                       
                                                
                                            </div>

                                            <div class="button-row d-flex mt-4 justify-content-end">
                                                <button id="btnSendIdentite" class="btn btn-success ml-autoM mb-4 mr-3" type="submit" title="Passer à l'étape suivante 2">Sauvegarder</button>
                                                <button id="steep1" class="btn btn-primary ml-autoM js-btn-next mb-4" type="button" title="Passer à l'étape suivante 2">Suivant</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--steep 2-->
                                <div class="multisteps-form__panel shadow p-4M pl-4 pr-4 rounded bg-white">
                                    <h3 class="multisteps-form__title pt-4">DEMANDE</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="rccm" class="form-label">RCCM / PATENTE -- {{$vendeur->rccm_patente}}</label>
                                                    <br />
                                                    
                                                    <div>
                                                        <input type="radio" name="rccm_patente" id="rccm" value="rccm" {{$vendeur->rccm_patente == "rccm" ? "checked" : ""}} />
                                                        <label for="rccm" style="margin-right: 20px;">RCCM</label>
            
                                                        <input type="radio" name="rccm_patente" id="patente" value="patente" {{$vendeur->rccm_patente == "patente" ? "checked" : ""}} />
                                                        <label for="patente">PATENTE</label>
                                                    </div>
                                                    
                                                    <input type="text" class="form-control mystyleInput @error('rccm') is-invalid @enderror" name="rccm" id="rccm" max="150" value="{{$vendeur->numero_patente}}" placeholder="RCCM OU PATENTE">
                                                    @error('rccm')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">   
                                                <div class="form-group">   
                                                    <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Anciennetés <span class="isRequired">*</span></label>
                                                    <br />                                          
                                                    <label for="statut" class="form-label">Statut</label>
                                                    <select name="statut" id="statut" class="form-control selected2 @error('statut') is-invalid @enderror">
                                                        <option value="">--Choisir--</option>
                                                        <option value="1" {{$vendeur->ancien_nouveau == '1' ? "selected" : ''}}>Ancien</option>
                                                        <option value="0" {{$vendeur->ancien_nouveau == '0' ? "selected" : ''}}>Nouveau</option>
                                                    </select>
                                                    @error('statut')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label>Picture :</label>
                                                    <div class="input-file input-file-image" style="display: flex; flex-direction: row; align-items: center; gap: 12px;">
                                                        <img class="img-upload-preview img-circleM imgHidden" id="imageOpen" style="width: 100px; height: 100px; display: none;" src="http://placehold.it/100x100" alt="preview" />
                                                        <div>
                                                            <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*" />
                                                            <label for="uploadImg" class=" label-input-file btn btn-primary">Télécharger la photo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            
                                            <div class="row mt-3">
                                                <div class="col-sm-12">
                                                    <h4>
                                                        Secteur d'activité<span class="isRequired">*</span>
                                                    </h4>
                                                </div>
                                                <div class="col-sm-12">                                                
                                                    @forelse($vendeur->vendeurDemande as $dm)
                                                    <div id="removeRow{{$dm->id}}" class="row mt-3">                                                        
                                                        <div class="col-sm-4">
                                                            <h4>Article <span class="isRequired">*</span></h4>
                                                            <select name="article{{$dm->id}}" id="articleId{{$dm->id}}" onchange="getEmplacementByIdArticle('{{$dm->id}}')" class="form-control selected2">
                                                                {{-- <option value="">--Choisir--</option> --}}
                                                                <option value="{{$dm->id}}">{{$dm->article->nom}} {{$dm->id}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="d-flex flex-row justify-content-between">
                                                                <h4>
                                                                    Place <span class="isRequired">*</span>
                                                                </h4>
                                                                <h4 id="placePrix{{$dm->id}}">
                                                                    {{$dm->prix}}$                                    
                                                                </h4>
                                                                <input type="hidden" name="placePrixInput{{$dm->id}}" id="placePrixInput{{$dm->id}}" value="{{$dm->prix}}" />
                                                            </div>
                                                            <select name="place{{$dm->id}}" id="place{{$dm->id}}" onchange="getPrixPlace('{{$dm->id}}');" disabled class="form-control">
                                                                <option value="{{$dm->id}}">{{$dm->place->nom}} {{$dm->place->typePlace->nom}}</option>
                                                            </select>
                                                            <div class="text-center border" id="placeLoaderImg{{$dm->id}}" style="display: none;">
                                                                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 40px;" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <h4>Quantité</h4>
                                                            <input type="number" name="quantite{{$dm->id}}" id="quantite{{$dm->id}}" onchange="getQuantitePlace('{{$dm->id}}');" onkeyup="getQuantitePlace('{{$dm->id}}');" min="1" max="" value="{{$dm->quatite}}" disabled class="form-control" />
                                                            <h6 id="quantiteStock{{$dm->id}}" style="background-color: #ffffff; color: #1D6FB8; font-weight: bold; display: none;">Stock dispo <span id="quantiteDispo{{$dm->id}}"></span></h6>
                                                        </div>
                                                        <div class="col-sm-1" style="padding-left: 0px !important; padding-right: 0px !important;">
                                                            <h4>Mois</h4>
                                                            <input type="number" name="mois{{$dm->id}}" id="mois{{$dm->id}}" onchange="getQuantitePlace('{{$dm->id}}');" onkeyup="getQuantitePlace('{{$dm->id}}');" value="{{$dm->mois}}" min="7" class="form-control" placeholder="Mois" />
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <h4>Total</h4>
                                                            <h2 id="printPrix{{$dm->id}}" style="font-size: 14px;">{{$dm->total}}$</h2>
                                                            <input type="hidden" name="totalInput{{$dm->id}}" id="totalInput{{$dm->id}}" value="{{$dm->total}}" />
                                                        </div>
                                                        
                                                        <div class="col-sm-1">
                                                            <h4 style="color: transparent;">-</h4>
                                                            <button type="button" class="btn bg_background text-white" title="Supprimer l'article" onclick="supprimer('{{$dm->id}}');">
                                                                <span id="iconDelete{{$dm->id}}">X</span>
                                                                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg{{$dm->id}}" style="width: 20px; display: none;" />
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @empty
                                                    @endforelse  
                                                </div>                                          
                                            </div>                                        
                                        </div>

                                        <div class="button-row d-flex mt-4 pb-4">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Précédant</button>
                                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Suivant</button>
                                        </div>
                                    </div>
                                </div>

                                <!--steep 3-->
                                <div class="multisteps-form__panel shadow p-4M pl-4 pr-4 rounded bg-white">
                                    <h3 class="multisteps-form__title pt-4">Photo</h3>
                                    <div class="multisteps-form__content">
                                        <div class="row justify-content-center">
                                            <div class="mt-4" style="display: flex; justify-content: center; gap: 15px;">
                                                <div class="video-container">
                                                    <video id="video" autoplay></video>
                                                </div>
                                                <div style="margin-left: 2px; min-height: 150px; min-width: 100px;">
                                                    <img id="printImage" src="{{asset('assets/img/100x100.png')}}" style="height: 300px; width: 200px; object-fit: cover;" />    
                                                    <h5 class="text-center">Photo profil</h5>                                            
                                                </div>
    
                                                <div style="display: flex; flex-direction: column; gap: 20px; justify-content: center; margin-top: 10px">
                                                    <div>
                                                        <button type="button" id="demarrageCamera" class="btn btn-primary">Demarrage camera</button>
                                                    </div>
                                                    <div>
                                                        <button type="button" id="capturePhoto" class="btn btn-primary text-white">Capture une photo</button>
                                                    </div>
                                                    <div>
                                                        <label type="button" id="customLabel" for="getPhotoMyPc" class="btn btn-primary text-white">Telecharger une photo</label>
                                                        <input type="file" name="getPhotoMyPc" id="getPhotoMyPc" accept="image/*" style="display: none;" />
                                                    </div>
                                                </div>
                                            </div> 
                    
                                            <div>
                                                <canvas id="canvas" width="600" height="600" style="display: none;"></canvas>
                                                {{-- <input type="file" id="capturePhoto" /> --}}
                                                {{-- <label for="">image1</label> --}}
                                                <input type="text" name="image_data" id="image_data" style="width: 100%; height: 30px; display: none;" />
                                            </div>
                    
                                            
                                        </div>
                                        <div class="row">
                                            <div class="button-row d-flex mt-4 pb-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Précédant</button>
                                                <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Suivant</button>
                                                {{-- <button id="btnSend" class="btn btn-success ml-auto" type="submit" title="Send">Enregistrer</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--steep 4-->
                                <div class="multisteps-form__panel shadow p-4M pl-4 pr-4 rounded bg-white">
                                    <h3 class="multisteps-form__title pt-4">Empreint</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-rowM row mt-4M justify-content-center">
                                            <div class="col-sm-2 text-center">
                                                <button type="button" id="ModalFingerprintGetImages" data-toggle="modal" data-target="#ModalFingerprint" class="btn btn-primary text-white">Capture empreinte</button>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <input type="hidden" id="operation" value="0" /> <br />
                                            <!-- id du vendeur -->
                                            <input type="hidden" id="CEAN_PERSONNE" value="" /> <br />
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_droite1_input" id="doigt_droite1_input" class="form-control" placeholder="doigt_droite1" />
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_droite2_input" id="doigt_droite2_input" class="form-control" placeholder="doigt_droite2" />
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_droite3_input" id="doigt_droite3_input" class="form-control" placeholder="doigt_droite3" />
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_droite4_input" id="doigt_droite4_input" class="form-control" placeholder="doigt_droite4" />
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_droite5_input" id="doigt_droite5_input" class="form-control" placeholder="doigt_droite5" />
                                            </div>
                    
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_gauche1_input" id="doigt_gauche1_input" class="form-control" placeholder="doigt_gauche1" />
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_gauche2_input" id="doigt_gauche2_input" class="form-control" placeholder="doigt_gauche2" />
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_gauche3_input" id="doigt_gauche3_input" class="form-control" placeholder="doigt_gauche3" />
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_gauche4_input" id="doigt_gauche4_input" class="form-control" placeholder="doigt_gauche4" />
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="hidden" name="doigt_gauche5_input" id="doigt_gauche5_input" class="form-control" placeholder="doigt_gauche5" />
                                            </div>
                                        </div>

                                        <div class="row pb-4">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Précédant</button>
                                                {{-- <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Suivant</button> --}}
                                                <button id="btnSend" class="btn btn-success ml-auto" type="submit" title="Send">Enregistrer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>

@include('pages.empreint.modalGetEmpreint')

@endsection

@section('scripts')
<!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
<script src="{{asset('assets/js/axios.min.js')}}"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/formWizard/script.js')}}"></script>
@include('pages.empreint.scriptGetEmpreint')

<script>
    // document.getElementById('formSend').addEventListener('submit', function(e) {
    //     document.getElementById('btnSend').innerHTML = " En cours...";
    //     document.getElementById('btnSend').setAttribute("disabled", true);
    // });

    document.getElementById('formSendIdentite').addEventListener('submit', function(e) {
        e.preventDefault();
        document.getElementById('btnSendIdentite').innerHTML = " En cours...";
        document.getElementById('btnSendIdentite').setAttribute("disabled", true);
       
        const myForm = document.getElementById('formSendIdentite');

        const formDatas = new FormData(myForm);
        axios.post("{{route('vend.editIdentiteUpdate', $vendeur->id)}}", formDatas, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            const reponse = response.data;
            document.getElementById('btnSendIdentite').innerHTML = "Sauvegarder";
            document.getElementById('btnSendIdentite').removeAttribute("disabled");  
            if(reponse.statut == "saveSuccess"){
                Swal.fire({
                    title: "Modification",
                    text: reponse.message,
                    icon: 'success',
                    confirmButtonText: `Ok &nbsp;<i class="fa fa-arrow-right"></i>`,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        //reponse.myData
                        //window.location.href = "{{route('vend.create')}}"; //reponse.myUrl;
                    }
                });
            }
            if(reponse.statut == "errorValidate"){
                // Si la validation échoue, afficher les erreurs
                let errors = reponse.errorsValidateMessage;
                let errorMessage = '';

                // Concaténer les messages d'erreur
                for (let field in errors) {
                    errorMessage += errors[field].join(' ') + '<br />';
                }
                console.log(reponse.errorsValidateMessage);
                //alert(reponse.errorsValidateMessage)
                // Afficher les erreurs dans SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur de validation',
                    html: errorMessage,
                });
            }
            console.log(reponse)         
        }).catch(function(error) {
            alert(error);
            console.log(error);
        });
    });

    document.getElementById('uploadImg').addEventListener('change', function(e){
        let nameImage = document.getElementById('uploadImg').files[0];
        let reader = new FileReader();
        reader.readAsDataURL(nameImage);
        reader.addEventListener('load', (event) => displayImage(event, nameImage));
    });
    function displayImage(event, nameImage){
        document.querySelector(".imgHidden").style.display = 'block';
        document.getElementById('imageOpen').src = event.target.result;
        //console.log(event.target.result);
    }

    function supprimer(articleId)
    {
        //console.log(articleId)
        //document.getElementById('removeRow'+articleId).remove();

        Swal.fire({
            title: "Supprimer",
            text: "Voulez-vous supprimer cet article ?",
            icon: 'question',
            confirmButtonText: `OUI &nbsp;<i class="fa fa-arrow-right"></i>`,
            confirmButtonColor: "#3085d6",
            showCancelButton: true,
            cancelButtonText: "Non",
        }).then((result) => {
            if (result.isConfirmed) {
               //console.log('MITC') 
               //alert('MITC')
                let iconDelete = document.getElementById('iconDelete'+articleId); //.style.display = "none";
                    iconDelete.style.display = "none";
                let myLoaderImg = document.getElementById('myLoaderImg'+articleId); //.style.display = "block";  
                    myLoaderImg.style.display = "block";  
                axios.post("{{route('deleteOneDemade')}}", {
                    article_id: articleId
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    const reponse = response.data;
                    // document.getElementById('btnSendIdentite').innerHTML = "Sauvegarder";
                    // document.getElementById('btnSendIdentite').removeAttribute("disabled");                    
                    
                    if(reponse.statut == "success"){
                        myLoaderImg.style.display = "none";
                        document.getElementById('removeRow'+articleId).remove();
                        iconDelete.style.display = "block";
                    } 
                    console.log(reponse)
                }).catch(function(error) {
                    alert(error);
                    console.log(error);
                });
            }
        });

        // axios.post("{{route('deleteOneDemade')}}", {
        //     article_id: articleId
        // }, {
        //     headers: {
        //         'Content-Type': 'multipart/form-data'
        //     }
        // })
        // .then(function(response) {
        //     const reponse = response.data;
        //     // document.getElementById('btnSendIdentite').innerHTML = "Sauvegarder";
        //     // document.getElementById('btnSendIdentite').removeAttribute("disabled"); 
        //     if(reponse.statut == "saveSuccess"){
        //         Swal.fire({
        //             title: "Supprimer",
        //             text: "Voulez-vous supprimer cet article ?",
        //             icon: 'question',
        //             confirmButtonText: `Ok &nbsp;<i class="fa fa-arrow-right"></i>`,
        //         })
        //         .then((result) => {
        //             if (result.isConfirmed) {
        //                 document.getElementById('removeRow'+articleId).remove();
        //             }
        //         });
        //     } 
        //     console.log(reponse)
        // }).catch(function(error) {
        //     alert(error);
        //     console.log(error);
        // });
    }
</script>
@include('pages.vendeurs.script')
@endsection