@extends('layout.main')

@section('title')
Créer un vendeur
@endsection

@section('styles')

{{-- @vite('resources/css/app.css') --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
</style>

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
        <div class="wizard-container wizard-round col-md-10 card">
            <form id="formSend" action="{{route('vend.StoreAjax')}}" method="POST" enctype="multipart/form-data" class="card-body">
                @csrf
                <div class="wizard-body">
                    <div class="row bg_background text-center justify-content-center">
                        <h3 class="wizard-title text-white pt-2 pb-2 text-center animate__animated animate__bounce animate__delay-2s" style="font-size: 24px;"><b>Formulaire d'identification</b></h3>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="about">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom" class="form-label">Nom <span class="isRequired">*</span></label>
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror mystyleInput" name="nom" id="nom" value="{{old('nom')}}" required placeholder="Saisir le nom" aria-describedby="emailHelp">
                                        @error('nom')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="postnom" class="form-label">Postnom</label>
                                        <input type="text" class="form-control mystyleInput" name="postnom" value="{{old('postnom')}}" id="postnom" placeholder="Saisir post-nom" aria-describedby="emailHelp" />
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Picture :</label>
                                        <div class="input-file input-file-image">
                                            <img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
                                            <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*" />
                                            <label for="uploadImg" class=" label-input-file btn btn-primary">Upload a Image</label>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prenom" class="form-label">Prénom <span class="isRequired">*</span></label>
                                        <input type="text" class="form-control mystyleInput @error('prenom') is-invalid @enderror" name="prenom" id="prenom" value="{{old('prenom')}}" placeholder="Saisir prénom" required aria-describedby="emailHelp">
                                        @error('prenom')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sexe" class="form-label">Sexe <span class="isRequired">*</span></label>
                                        <select name="sexe" id="sexe" class="form-control mystyleInput @error('sexe') is-invalid @enderror selected2" required>
                                            <option value="">--Choisir--</option>
                                            <option value="M" {{'M' == 'sexe' ? 'selected' : ''}}>Homme</option>
                                            <option value="F" {{'F' == 'sexe' ? 'selected' : ''}}>Femme</option>
                                            {{-- <option value="Autre" {{'F' == 'Autre' ? 'selected' : ''}}>Autre</option> --}}
                                        </select>
                                        @error('sexe')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lieu_naissance" class="form-label">Lieu de naissance</label>
                                        <input type="text" class="form-control mystyleInput" name="lieu_naissance" value="{{old('lieu_naissance')}}" id="lieu_naissance" placeholder="Saisir lieu naissance" aria-describedby="emailHelp">
                                        @error('lieu_naissance')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_naissance" class="form-label">Date de naissance</label>
                                        <input type="date" class="form-control mystyleInput @error('date_naissance') is-invalid @enderror" name="date_naissance" id="date_naissance" value="{{old('date_naissance')}}" required placeholder="Saisir date_naissance" aria-describedby="emailHelp">
                                        @error('date_naissance')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="residence" class="form-label">Residence <span class="isRequired">*</span></label>
                                        <input type="text" class="form-control mystyleInput @error('residence') is-invalid @enderror" name="residence" id="residence" required value="{{old('residence')}}" placeholder="Saisir residence" aria-describedby="emailHelp">
                                        @error('residence')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="commune" class="form-label">commune <span class="isRequired">*</span></label>
                                        <input type="text" class="form-control mystyleInput @error('commune') is-invalid @enderror" name="commune" id="commune" value="{{old('commune')}}" required placeholder="Saisir commune" aria-describedby="emailHelp">
                                        @error('commune')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telephone" class="form-label">Téléphone <span class="isRequired">*</span></label>
                                        <input type="text" class="form-control mystyleInput @error('telephone') is-invalid @enderror" name="telephone" id="telephone" value="{{old('telephone')}}" required placeholder="Saisir telephone" aria-describedby="emailHelp">
                                        @error('telephone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="etat_civil" class="form-label">Etat-civil </label>
                                        <select name="etat_civil" id="etat_civil" class="form-control mystyleInput @error('etat_civil') is-invalid @enderror selected2">
                                            <option value="">--Choisir--</option>
                                            <option value="Célibataire" {{ old('etat_civil') == "Célibataire" ? "selected" : "" }}>Célibataire</option>
                                            <option value="Marié" {{ old('etat_civil') == "Marié" ? "selected" : "" }}>Marié</option>
                                            <option value="Divorce" {{ old('etat_civil') == "Divorce" ? "selected" : "" }}>Divorce</option>
                                            <option value="veuf/veuve" {{ old('etat_civil') == "veuf/veuve" ? "selected" : "" }}>veuf/veuve</option>
                                        </select>
                                        @error('etat_civil')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationalite" class="form-label">Nationalite <span class="isRequired">*</span></label>
                                        <input type="text" class="form-control mystyleInput @error('nationalite') is-invalid @enderror" name="nationalite" id="nationalite" value="{{old('nationalite')}}" required placeholder="Saisir nationalite" />
                                        @error('nationalite')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>                             

                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="numero_patente" class="form-label">Numéro patente</label>
                                        <input type="text" class="form-control mystyleInput @error('numero_patente') is-invalid @enderror" name="numero_patente" id="numero_patente" value="{{old('numero_patente')}}" placeholder="Saisir patente" />
                                        @error('numero_patente')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="piece_identite" class="form-label">Piece d'identite <span class="isRequired">*</span></label>
                                        {{-- <input type="text" class="form-control mystyleInput @error('piece_identite') is-invalid @enderror" name="piece_identite" id="piece_identite" value="{{old('piece_identite')}}" placeholder="Saisir piece_identite"> --}}
                                        <select name="piece_identite" id="piece_identite" onchange="afficheDateExpirationPassport()" class="form-control selected2 @error('piece_identite') is-invalid @enderror">
                                            <option value="">--Choisir--</option>
                                            <option value="Carte d'électeur">Carte d'électeur</option>
                                            <option value="passport">Passport</option>
                                        </select>
                                        @error('piece_identite')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="numero_national" class="form-label">Numéro national</label>
                                        <input type="text" class="form-control mystyleInput @error('numero_national') is-invalid @enderror" name="numero_national" id="numero_national" max="18" value="{{old('numero_national')}}" placeholder="piece identite date expiration" />
                                        @error('numero_national')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>                                

                                <div class="col-md-6" style="display: none" id="id_date_passport">
                                    <div class="form-group">
                                        <label for="piece_identite_date_expiration" class="form-label">Date d'expiration du passport</label>
                                        <input type="text" class="form-control mystyleInput @error('piece_identite_date_expiration') is-invalid @enderror" name="piece_identite_date_expiration" id="piece_identite_date_expiration" value="{{old('piece_identite_date_expiration')}}" placeholder="piece identite date expiration" aria-describedby="emailHelp">
                                        @error('piece_identite_date_expiration')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control mystyleInput @error('email') is-invalid @enderror" name="email" id="email" max="100" value="{{old('email')}}" placeholder="Saisir l'email" />
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="rccm" class="form-label">RCCM / PATENTE</label>
                                        <br />
                                        
                                        <div>
                                            <input type="radio" name="rccm_patente" id="rccm" value="rccm" />
                                            <label for="rccm" style="margin-right: 20px;">RCCM</label>

                                            <input type="radio" name="rccm_patente" id="patente" value="patente" />
                                            <label for="patente">PATENTE</label>
                                        </div>
                                        
                                        <input type="text" class="form-control mystyleInput @error('rccm') is-invalid @enderror" name="rccm" id="rccm" max="150" value="{{old('rccm')}}" placeholder="RCCM OU PATENTE">
                                        @error('rccm')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="personne_de_reference" class="form-label">Nom+ADRESSE+TELEPHONE personne de reference</label>
                                        <!-- <input type="text" class="form-control mystyleInput @error('personne_de_reference') is-invalid @enderror" name="personne_de_reference" id="personne_de_reference" value="{{old('personne_de_reference')}}" required placeholder="personne_de_reference" aria-describedby="emailHelp"> -->
                                         <textarea name="personne_de_reference" id="personne_de_reference" rows="4" class="form-control mystyleInput @error('personne_de_reference') is-invalid @enderror"></textarea>
                                        @error('personne_de_reference')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="statut" class="form-label">Statut</label>
                                        {{-- <input type="text" class="form-control mystyleInput @error('piece_identite') is-invalid @enderror" name="piece_identite" id="piece_identite" value="{{old('piece_identite')}}" placeholder="Saisir piece_identite"> --}}
                                        <select name="statut" id="statut" class="form-control selected2 @error('statut') is-invalid @enderror" required>
                                            <option value="">--Choisir--</option>
                                            <option value="1">Ancien</option>
                                            <option value="0">Nouveau</option>
                                        </select>
                                        @error('statut')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
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
                                </div>


                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_pavillon_id" class="form-label fw-bold">Type pavillon</label>
                                        <select name="type_pavillon_id" id="type_pavillon_id" class="form-control mystyleInput @error('type_pavillon_id') is-invalid @enderror" required>
                                            <option value="">--Choisir--</option>
                                            <option value="1" {{ old('type_pavillon_id') == '1' ? 'selected' : '' }}>Simple</option>
                                            <option value="2" {{ old('type_pavillon_id') == '2' ? 'selected' : '' }}>Multiple</option>
                                        </select>
                                        @error('type_pavillon_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="row mt-3">
                                <div class="col-sm-12 mb-3">
                                    <label for="pavillon_id" class="form-label fw-bold">Pavillon</label>
                                    <select name="pavillon_id[]" id="pavillon_id" class="form-control selected2 mystyleInput @error('pavillon_id') is-invalid @enderror" multiple="multiple" required>
                                        <option value="">--Choisir--</option>
                                        @forelse($pavillons as $item)
                                        <option value="{{$item->id}}" {{ old('pavillon_id') == $item->id ? 'selected' : '' }}>{{$item->numero}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('pavillon_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->

                            <!-- <div class="row mt-3">
                                <div class="col-sm-12 mb-3">
                                    <h2 style="font-weight: bold;"><span class="bg-primary p-1 pl-2 pr-2 text-white">Maison</span></h2>
                                </div>
                                <div class="col-sm-7">
                                    <label for="maison_article_id" class="form-label fw-bold">Article</label>
                                    <select name="maison_article_id[]" id="maison_article_id" class="form-control selected2" multiple="multiple">
                                        <option value="">--Choisir--</option>
                                        @forelse($articles as $item)
                                        <option value="{{$item->id}}" {{ (collect(old('maison_article_id'))->contains($item->id)) ? 'selected':'' }}>{{$item->nom}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('maison_article_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <label for="maison_nbr" class="form-label fw-bold">Nbr maison</label>
                                    <input type="number" class="form-control mystyleInput @error('maison_nbr') is-invalid @enderror" name="maison_nbr" id="maison_nbr" value="{{old('maison_nbr')}}" placeholder="Saisir nbr maison" aria-describedby="maison_nbr">
                                    @error('maison_nbr')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->

                            <!-- <div class="row mt-3">
                                <div class="col-sm-12 mb-3">
                                    <h2 style="font-weight: bold;"><span class="bg-primary p-1 pl-2 pr-2 text-white fw-bold">Table</span></h2>
                                </div>
                                <div class="col-sm-7">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Article</label>
                                    <select name="table_article_id[]" id="table_article_id" class="form-control selected2" multiple="multiple">
                                        <option value="">--Choisir--</option>
                                        @forelse($articles as $item)
                                            <option value="{{$item->id}}" {{ (collect(old('table_article_id'))->contains($item->id)) ? 'selected':'' }}>{{$item->nom}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('table_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <label for="table_nbr" class="form-label fw-bold">Nbr table</label>
                                    <input type="number" class="form-control mystyleInput @error('table_nbr') is-invalid @enderror" name="table_nbr" id="table_nbr" value="{{old('table_nbr')}}" placeholder="Saisir nbr table" aria-describedby="nbr_table">
                                    @error('table_nbr')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->

                            <!-- <div class="row mt-3">
                                <div class="col-sm-12 mb-3">
                                    <h2 style="font-weight: bold;"><span class="bg-primary p-1 pl-2 pr-2 text-white">Autre</span></h2>
                                </div>
                                <div class="col-sm-7">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Article</label>
                                    <select name="autre_article_id[]" id="autre_article_id" class="form-control selected2" multiple="multiple">
                                        <option value="">--Choisir--</option>
                                        @forelse($articles as $item)
                                        <option value="{{$item->id}}" {{ (collect(old('autre_article_id'))->contains($item->id)) ? 'selected':'' }}>{{$item->nom}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('autre_article_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <label for="autre_nbr" class="form-label fw-bold">Nbr Autre</label>
                                    <input type="number" class="form-control mystyleInput @error('autre_nbr') is-invalid @enderror" name="autre_nbr" id="autre_nbr" value="{{old('autre_nbr')}}" placeholder="Saisir nbr autre" aria-describedby="autre_nbr">
                                    @error('autre_nbr')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> -->

                            <div id="removeRow0" class="row mt-3">
                                <div class="col-sm-4">
                                    {{-- <h4>Secteur d'activité<span class="isRequired">*</span></h4> --}}
                                    {{-- multiple="multiple" --}}
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4>
                                            Secteur d'activité<span class="isRequired">*</span>
                                        </h4>
                                        {{-- <h4 id="articleQuantite0">                                            
                                        </h4>   --}}
                                        <input type="hidden" name="inputarticleQuantite0" id="inputarticleQuantite0" value="0" />                                      
                                    </div>
                                    <select name="article0" id="articleId0" onchange="getEmplacementByIdArticle('0')" class="form-control selected2" required>
                                        <option value="">--Choisir--</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    {{-- <h4>Place <span class="isRequired">*</span></h4> --}}
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4>
                                            Place <span class="isRequired">*</span>
                                        </h4>
                                        <h4 id="placePrix0">                                            
                                        </h4>  
                                        <input type="hidden" name="placePrixInput0" id="placePrixInput0" value="0" />                                      
                                    </div>
                                    <select name="place0" id="place0" onchange="getPrixPlace('0');" disabled class="form-control selected2M" required>
                                        <option value="">--Choisir--</option>                                        
                                    </select>
                                    <div class="text-center border" id="placeLoaderImg0" style="display: none;">
                                        <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 40px;" />
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <h4>Quantité
                                        {{-- <span id="quantiteDispo0" style="background-color: #ffffff; color: #1D6FB8; font-weight: bold;"></span> --}}
                                    </h4>
                                    <input type="number" name="quantite0" id="quantite0" onchange="getQuantitePlace('0');" disabled onkeyup="getQuantitePlace('0');" min="1" max="" value="0" class="form-control" required />
                                    <h6 id="quantiteStock0" style="background-color: #ffffff; color: #1D6FB8; font-weight: bold; display: none;">Stock dispo <span id="quantiteDispo0"></span></h6>
                                </div>
                                <div class="col-sm-1" style="padding-left: 0px !important; padding-right: 0px !important;">
                                    <h4>Mois</h4>
                                    <input type="number" name="mois0" id="mois0" onchange="getQuantitePlace('0');" onkeyup="getQuantitePlace('0');" value="7" min="7" class="form-control" placeholder="Mois" />
                                </div>
                                <div class="col-sm-1">
                                    <h4>Total</h4>
                                    <h2 id="printPrix0" style="font-size: 14px;"></h2>
                                    <input type="hidden" name="totalInput0" id="totalInput0" value="0" />
                                </div>
                            </div>

                            <div id="addRowSelect" class="rowM">                                
                            </div>

                            <h1 class="mt-4"><Button  id="btnAddRowSelect" type="button" class="btn bg_background text-white" style="font-weight: bold;">Ajouter une activité</Button></h1>
                            
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-2">
                        <button id="btnSend" type="submit" class="btn bg_background text-white" style="position: relative;">
                            <!-- <div id="mySaveLoader" class="col-sm-12M" style="position: relative;">
                                <img src="{{asset('assets/img/loading.gif')}}" alt="img loading" style="height: 20px;"/> 
                            </div> -->
                            Enregistrer
                        </button>
                    </div>
                </div>

                <!-- <div class="wizard-action">
                    <div class="pull-righ mt-3">
                        <button id="btnSend" type="submit" class="btn bg_background text-white">Enregistrer</button>
                        <input type="button" class="btn btn-finish btn-danger" name="finish" value="Finish" style="display: none;">
                    </div>
                    <div class="clearfix"></div>
                </div> -->
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
<script src="{{asset('assets/js/axios.min.js')}}"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // function AddSelectMy(idVal){
        //     console.log('cs,s');
        // }
        let couterNbr = 1;
        $('#btnAddRowSelect').click(function() {
            let couterNbrAdd = couterNbr++;
            
            $('#addRowSelect').append(`
                <div id="removeRow${couterNbrAdd}" class="row mt-3">
                    <div class="col-sm-4">
                        <h4>Article <span class="isRequired">*</span></h4>
                        <select name="article${couterNbrAdd}" id="articleId${couterNbrAdd}" onchange="getEmplacementByIdArticle('${couterNbrAdd}')" class="form-control selected2" required>
                            <option value="">--Choisir--</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <div class="d-flex flex-row justify-content-between">
                            <h4>
                                Place <span class="isRequired">*</span>
                            </h4>
                            <h4 id="placePrix${couterNbrAdd}">                                            
                            </h4>
                            <input type="hidden" name="placePrixInput${couterNbrAdd}" id="placePrixInput${couterNbrAdd}" value="0" />
                        </div>
                        <select name="place${couterNbrAdd}" id="place${couterNbrAdd}" onchange="getPrixPlace('${couterNbrAdd}');" disabled class="form-control" required>
                            <option value="">--Choisir--</option>
                        </select>
                        <div class="text-center border" id="placeLoaderImg${couterNbrAdd}" style="display: none;">
                            <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 40px;" />
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <h4>Quantité</h4>
                        <input type="number" name="quantite${couterNbrAdd}" id="quantite${couterNbrAdd}" onchange="getQuantitePlace('${couterNbrAdd}');" onkeyup="getQuantitePlace('${couterNbrAdd}');" min="1" max="" value="0" disabled class="form-control" required />
                        <h6 id="quantiteStock${couterNbrAdd}" style="background-color: #ffffff; color: #1D6FB8; font-weight: bold; display: none;">Stock dispo <span id="quantiteDispo${couterNbrAdd}"></span></h6>
                    </div>
                    <div class="col-sm-1" style="padding-left: 0px !important; padding-right: 0px !important;">
                        <h4>Mois</h4>
                        <input type="number" name="mois${couterNbrAdd}" id="mois${couterNbrAdd}" onchange="getQuantitePlace('${couterNbrAdd}');" onkeyup="getQuantitePlace('${couterNbrAdd}');" value="7" min="7" class="form-control" placeholder="Mois" />
                    </div>
                    <div class="col-sm-1">
                        <h4>Total</h4>
                        <h2 id="printPrix${couterNbrAdd}" style="font-size: 14px;"></h2>
                        <input type="hidden" name="totalInput${couterNbrAdd}" id="totalInput${couterNbrAdd}" value="0" />
                    </div>
                   
                    <div class="col-sm-1">
                        <h4 style="color: transparent;">-</h4>
                        <button type="button" class="btn bg_background text-white" onclick="removeRow(${couterNbrAdd});">X</button>
                    </div>
                </div>
            `);
            getListeArticles(`${couterNbrAdd}`);
            $('#articleId'+`${couterNbrAdd}`).select2();
           // console.log(couterNbrAdd);
            if(couterNbrAdd == "10"){
                console.log('Nbr = '+ couterNbrAdd)
                document.getElementById('btnAddRowSelect').setAttribute("disabled", true);                
                document.getElementById('btnAddRowSelect').innerHTML = "Vous avez atteint le nombre limité pour cette page";                
            } //else{ console.log(couterNbrAdd)}

        });
    	//$('.selected2').select2();
    });

    function PlaceSelectChange(idVal){
        let getPlaceNbr = document.getElementById('place'+idVal);
        getPlaceNbr.value
        if(getPlaceNbr.value == 4){
            document.getElementById('place'+idVal);
            document.getElementById('maitreCubeLigne'+idVal).style.display = 'block';
            //maitreCubeLigne
        }else{
            document.getElementById('maitreCubeLigne'+idVal).style.display = 'none';
        }
       // console.log('Val '+ idVal + ' ' + getPlaceNbr.value);
    }

    function removeRow(idVal){
        document.getElementById('removeRow'+idVal).remove();
    }

    getListeArticles(idInput=0);
    function getListeArticles(idInput){
        axios.get("{{route('getAllArticles')}}")
        .then(function(response) {
            let produits = response.data;
            //console.log(produits);
            var options = "";
            document.getElementById('articleId'+idInput).innerHTML = '<option value="">--Choisir--</option>';
            let typeArticle;
            for (let i in produits) {
                //options+= '<option value="'+ niveaux[i].id +'">'+niveaux[i].libelle+'</option> '
                options = document.createElement('option');
                options.value = `${produits[i].id}`;
                options.innerHTML += `${produits[i].nom}`;
                document.getElementById('articleId'+idInput).appendChild(options);                
            }   
            //console.log(produits)       
        }).catch(function(error) {
            alert(error);
            //console.log(error);
        });
    };

    //getPrixPlace(idInput=0);
    function getPrixPlace(idPlace){ //place.getPrixById
        let getValueSelectId = document.getElementById('place'+idPlace).value;
        let quantiteDispoSpane = document.getElementById('quantiteDispo'+idPlace);
        axios.get("{{route('place.getPrixById')}}",{
            params: {
                idPlace: getValueSelectId
            }
        })
        .then(function(response) {
            let produits = response.data;

            let countEmplacementByPlace = produits.emplacements.length;
                quantiteDispoSpane.innerHTML = "(" + countEmplacementByPlace + ")";

            document.getElementById('quantite'+idPlace).removeAttribute("disabled");
            document.getElementById('quantite'+idPlace).value = '0';
            document.getElementById('quantite'+idPlace).setAttribute("max", countEmplacementByPlace);

            let prixPlace;
            produits.prix === null ? prixPlace=0 : prixPlace = produits.prix ; 
            document.getElementById('placePrix'+idPlace).innerHTML = prixPlace +" $";  
            document.getElementById('placePrixInput'+idPlace).value = prixPlace;  
            let quantite = document.getElementById('quantite'+idPlace).value;   
            document.getElementById('printPrix'+idPlace).innerHTML = '0';               
            document.getElementById('printPrix'+idPlace).innerHTML = (prixPlace * quantite) +" $";  
            //console.log(countEmplacementByPlace);                
        }).catch(function(error) {
            alert(error);
            //console.log(error);
        });
    }

    function getQuantitePlace(idPlace){
        let quantite = document.getElementById('quantite'+idPlace).value;  //placePrix0     
        let placePrixInput = Number(document.getElementById('placePrixInput'+idPlace).value);   
        let mois = document.getElementById('mois'+idPlace).value;          
        //let total = quantite * placePrixInput;
        let total = (placePrixInput * mois) * quantite;
        document.getElementById('printPrix'+idPlace).innerHTML = total +" $";
        document.getElementById('totalInput'+idPlace).value = total;
        //console.log(total)
    }

    function afficheDateExpirationPassport() {
       let piece_identite =  document.getElementById('piece_identite').value;
       if(piece_identite == 'passport') {
        document.getElementById('id_date_passport').style.display = "block";
       }
       else {
        document.getElementById('id_date_passport').style.display = "none";
       }
        console.log(piece_identite)
    }

    function getEmplacementByIdArticle(idSecteurActivite) {
        let secteurActiviteId = document.getElementById('articleId'+idSecteurActivite).value;
        document.getElementById('placeLoaderImg'+idSecteurActivite).style.display = "block";
        document.getElementById('place'+idSecteurActivite).style.display = "none";
        let quantiteInput = document.getElementById('quantite'+idSecteurActivite);

        axios.get("{{route('getEmplacementByIdArticle')}}",{
            params : {
				secteurActiviteId
			}
        })
        .then(function(response) {
            let reponse = response.data;   
            let countEmplacement = reponse.emplacements.length;
            
            //console.log(countEmplacement);
            document.getElementById('place'+idSecteurActivite).style.display = "block";
            if(countEmplacement > 0){
                document.getElementById('place'+idSecteurActivite).removeAttribute("disabled");
                //quantiteInput.removeAttribute("disabled");
                //console.log(reponse.places);
                document.getElementById('place'+idSecteurActivite).innerHTML = '';
                document.getElementById('place'+idSecteurActivite).innerHTML = '<option value="">--Choisir--</option>';
                for (let i in reponse.places) {
                    options = document.createElement('option');
                    options.value = `${reponse.places[i].unique_id_place}`;
                    options.innerHTML += `${reponse.places[i].place_nom} ${reponse.places[i].type_place_nom} ${reponse.places[i].dimension} ${reponse.places[i].place_orientation}`;
                    document.getElementById('place'+idSecteurActivite).appendChild(options);
                }
            }else{
                document.getElementById('place'+idSecteurActivite).innerHTML = '<option value="">Place non disponible</option>';
                document.getElementById('place'+idSecteurActivite).setAttribute("disabled", true);
            }
            document.getElementById('quantiteStock'+idSecteurActivite).style.display = "block"; //quantite0
            let quantiteDispo = document.getElementById('quantiteDispo'+idSecteurActivite).innerHTML = "(" + countEmplacement + ")";

            document.getElementById('placeLoaderImg'+idSecteurActivite).style.display = "none";  
        }).catch(function(error) {
            alert(error);
            console.log(error);
        });
    }


</script>
<script>
    // document.getElementById('formSend').addEventListener('submit', function(e) {
    //     document.getElementById('btnSend').innerHTML = " En cours...";
    //     document.getElementById('btnSend').setAttribute("disabled", true);
    // });

    document.getElementById('formSend').addEventListener('submit', function(e) {
        e.preventDefault();
        document.getElementById('btnSend').innerHTML = " En cours...";
        document.getElementById('btnSend').setAttribute("disabled", true);
       
        const myForm = document.getElementById('formSend');

        const formDatas = new FormData(myForm);
        axios.post("{{route('vend.StoreAjax')}}", formDatas, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(response) {
            const reponse = response.data;
            document.getElementById('btnSend').innerHTML = "Enregistrer";
            document.getElementById('btnSend').removeAttribute("disabled");  
            if(reponse.statut == "saveSuccess"){
                Swal.fire({
                    title: "Enregistrement",
                    text: reponse.message,
                    icon: 'success',
                    confirmButtonText: `Ok &nbsp;<i class="fa fa-arrow-right"></i>`,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        //reponse.myData
                        window.location.href = "{{route('vend.create')}}"; //reponse.myUrl;
                    }
                });
            }
            if(reponse.statut == "errorValidate"){
                console.log(reponse.errorsValidateMessage);
                alert(reponse.errorsValidateMessage)
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
</script>
@endsection