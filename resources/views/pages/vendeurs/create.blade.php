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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Désactiver uniquement le bouton "Suivant" de l'étape 1 au chargement
        $('#steep1').prop('disabled', true);
    
        // Fonction pour valider l'étape 1
        function validateStep1() {
            let isValid = true;
            const requiredFields = [
                '#nom', '#prenom', '#sexe', '#residence',
                '#commune', '#telephone', '#nationalite', '#piece_identite'
            ];
    
            requiredFields.forEach(field => {
                const value = $(field).val();
                if (!value || value.trim() === '') {
                    isValid = false;
                    $(field).addClass('is-invalid');
                } else {
                    $(field).removeClass('is-invalid');
                }
            });
    
            $('#steep1').prop('disabled', !isValid);
            return isValid;
        }
    
        // Écouter les changements dans l'étape 1
        $('#formSend input, #formSend select').on('input change', function() {
            if ($(this).closest('.multisteps-form__panel').hasClass('js-active')) {
                validateStep1();
            }
        });
    
        // Gérer le bouton "Suivant" de l'étape 1
        $('#steep1').click(function(e) {
            if (!validateStep1()) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs obligatoires (*) de l\'étape 1.');
            }
            // La navigation est gérée par le plugin multistep
        });
    
        // Activer toujours le bouton "Suivant" de l'étape 2
        $('.multisteps-form__panel').not(':first').find('.js-btn-next').prop('disabled', false);
    
        // Gérer la capture d'image (exemple)
        $('#capturePhoto').click(function() {
            // ... Votre logique de capture d'image ...
            // Après capture, activer le bouton (si nécessaire)
            $(this).closest('.multisteps-form__panel').find('.js-btn-next').prop('disabled', false);
        });
    });
    </script>
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
                        @if(request()->input('enregistrement') == "pre-enregistrement")
                            <b>Formulaire de pré-enregistrement d'identification</b>
                        @else
                            Formulaire d'identification
                        @endif                        
                    </h3>
                </div>
            </div>

            <div class="multisteps-form">
                <!--progress bar-->
                <div class="row mt-3">
                    <div class="col-12 col-lg-12 ml-auto mr-auto mb-4">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="Information personnel">IDENTITE</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Capture photo">CAPTURE PHOTO</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Capture empreint">CAPTURE EMPREINT</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Demande de place">DEMANDE</button>

                        </div>
                    </div>
                </div>   
                
                <!--form panels-->
                {{-- <form id="formSend" action="{{route('vend.StoreAjax')}}" method="POST" class="multisteps-form__form" style="height: auto !important;" enctype="multipart/form-data">
                    @csrf --}}
                    <div class="row">
                        <div class="col-12 col-lg-12 m-auto">
                            <form id="formSend" action="{{route('vend.StoreAjax')}}" method="POST" class="multisteps-form__form" enctype="multipart/form-data">
                                @csrf

                                <!-- steep 1 -->
                                <div class="multisteps-form__panel shadow p-4M pl-4 pr-4 rounded bg-white js-active">
                                    <h3 class="multisteps-form__title pt-4">IDENTITE</h3>
                                    <input type="hidden" class="form-control @error('etat') is-invalid @enderror mystyleInput" name="etat" id="etat" value="{{request()->input('enregistrement')}}" placeholder="Saisir l'etat" />
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4M">
                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="nom" class="form-label">Nom <span class="isRequired">*</span></label>
                                                    <input type="text" class="form-control @error('nom') is-invalid @enderror mystyleInput" name="nom" id="nom" value="{{old('nom')}}" placeholder="Saisir le nom" />
                                                    @error('nom')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="postnom" class="form-label">Postnom</label>
                                                    <input type="text" class="form-control mystyleInput" name="postnom" value="{{old('postnom')}}" id="postnom" placeholder="Saisir post-nom" />
                                                    @error('prenom')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="prenom" class="form-label">Prénom <span class="isRequired">*</span></label>
                                                    <input type="text" class="form-control mystyleInput @error('prenom') is-invalid @enderror" name="prenom" id="prenom" value="{{old('prenom')}}" placeholder="Saisir prénom" />
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
                                                        <option value="M" {{'M' == 'sexe' ? 'selected' : ''}}>Homme</option>
                                                        <option value="F" {{'F' == 'sexe' ? 'selected' : ''}}>Femme</option>
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
                                                    <input type="text" class="form-control mystyleInput" name="lieu_naissance" value="{{old('lieu_naissance')}}" id="lieu_naissance" placeholder="Saisir lieu naissance" />
                                                    @error('lieu_naissance')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="date_naissance" class="form-label">Date de naissance</label>
                                                    <input type="date" class="form-control mystyleInput @error('date_naissance') is-invalid @enderror" name="date_naissance" id="date_naissance" value="{{old('date_naissance')}}" placeholder="Saisir date_naissance" />
                                                    @error('date_naissance')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="residence" class="form-label">Residence <span class="isRequired">*</span></label>
                                                    <input type="text" class="form-control mystyleInput @error('residence') is-invalid @enderror" name="residence" id="residence" value="{{old('residence')}}" placeholder="Saisir residence" />
                                                    @error('residence')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="commune" class="form-label">Commune <span class="isRequired">*</span></label>
                                                    {{-- <input type="text" class="form-control mystyleInput @error('commune') is-invalid @enderror" name="commune" id="commune" value="{{old('commune')}}" placeholder="Saisir commune" /> --}}
                                                    <select name="commune" id="commune" class="form-control selected2 @error('commune') is-invalid @enderror">
                                                        <option value="">--Choisir--</option>
                                                        <option value="Bandalungwa" {{ old('commune') == "Bandalungwa" ? "selected" : "" }}>Bandalungwa</option>
                                                        <option value="Barumbu" {{ old('commune') == "Barumbu" ? "selected" : "" }}>Barumbu</option>
                                                        <option value="Bumbu" {{ old('commune') == "Bumbu" ? "selected" : "" }}>Bumbu</option>
                                                        <option value="Gombe" {{ old('commune') == "Gombe" ? "selected" : "" }}>Gombe</option>
                                                        <option value="Kalamu" {{ old('commune') == "Kalamu" ? "selected" : "" }}>Kalamu</option>
                                                        <option value="Kasa-Vubu" {{ old('commune') == "Kasa-Vubu" ? "selected" : "" }}>Kasa-Vubu</option>
                                                        <option value="Kimbanseke" {{ old('commune') == "Kimbanseke" ? "selected" : "" }}>Kimbanseke</option>
                                                        <option value="Kinshasa" {{ old('commune') == "Kinshasa" ? "selected" : "" }}>Kinshasa</option>
                                                        <option value="Kintambo" {{ old('commune') == "Kintambo" ? "selected" : "" }}>Kintambo</option>
                                                        <option value="Kisenso" {{ old('commune') == "Kisenso" ? "selected" : "" }}>Kisenso</option>
                                                        <option value="Lemba" {{ old('commune') == "Lemba" ? "selected" : "" }}>Lemba</option>
                                                        <option value="Limete" {{ old('commune') == "Limete" ? "selected" : "" }}>Limete</option>
                                                        <option value="Lingwala" {{ old('commune') == "Lingwala" ? "selected" : "" }}>Lingwala</option>
                                                        <option value="Makala" {{ old('commune') == "Makala" ? "selected" : "" }}>Makala</option>
                                                        <option value="Maluku" {{ old('commune') == "Maluku" ? "selected" : "" }}>Maluku</option>
                                                        <option value="Masina" {{ old('commune') == "Masina" ? "selected" : "" }}>Masina</option>
                                                        <option value="Matete" {{ old('commune') == "Matete" ? "selected" : "" }}>Matete</option>
                                                        <option value="Mont-Ngafula" {{ old('commune') == "Mont-Ngafula" ? "selected" : "" }}>Mont-Ngafula</option>
                                                        <option value="Ndjili" {{ old('commune') == "Ndjili" ? "selected" : "" }}>Ndjili</option>
                                                        <option value="Ngaba" {{ old('commune') == "Ngaba" ? "selected" : "" }}>Ngaba</option>
                                                        <option value="Ngaliema" {{ old('commune') == "Ngaliema" ? "selected" : "" }}>Ngaliema</option>
                                                        <option value="Ngiri-Ngiri" {{ old('commune') == "Ngiri-Ngiri" ? "selected" : "" }}>Ngiri-Ngiri</option>
                                                        <option value="Nsele" {{ old('commune') == "Nsele" ? "selected" : "" }}>Nsele</option>
                                                        <option value="Selembao" {{ old('commune') == "Selembao" ? "selected" : "" }}>Selembao</option>                                                        
                                                    </select>
                                                    @error('commune')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="telephone" class="form-label">Téléphone <span class="isRequired">*</span></label>
                                                    <input type="text" class="form-control mystyleInput @error('telephone') is-invalid @enderror" name="telephone" id="telephone" value="{{old('telephone')}}" placeholder="Saisir telephone" />
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

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="nationalite" class="form-label">Nationalite <span class="isRequired">*</span></label>
                                                    <input type="text" class="form-control mystyleInput @error('nationalite') is-invalid @enderror" name="nationalite" id="nationalite" value="{{old('nationalite')}}" placeholder="Saisir nationalite" />
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
                                                        <option value="Carte d'électeur">Carte d'électeur</option>
                                                        <option value="passport">Passport</option>
                                                    </select>
                                                    @error('piece_identite')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="numero_national" class="form-label">Numéro national</label>
                                                    <input type="text" class="form-control mystyleInput @error('numero_national') is-invalid @enderror" name="numero_national" id="numero_national" max="18" value="{{old('numero_national')}}" placeholder="piece identite date expiration" />
                                                    @error('numero_national')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0" style="display: none" id="id_date_passport">
                                                <div class="form-group">
                                                    <label for="piece_identite_date_expiration" class="form-label">Date d'expiration du passport</label>
                                                    <input type="date" class="form-control mystyleInput @error('piece_identite_date_expiration') is-invalid @enderror" name="piece_identite_date_expiration" id="piece_identite_date_expiration" value="{{old('piece_identite_date_expiration')}}" placeholder="piece identite date expiration" />
                                                    @error('piece_identite_date_expiration')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" class="form-control mystyleInput @error('email') is-invalid @enderror" name="email" id="email" max="100" value="{{old('email')}}" placeholder="Saisir l'email" />
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>                                       
                                            

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
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

                                            <div class="col-12 col-sm-6 mt-4 mt-sm-0">   
                                                <div class="form-group">   
                                                    <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Anciennetés <span class="isRequired">*</span></label>
                                                    <br />                                          
                                                    <label for="statut" class="form-label">Statut</label>
                                                    <select name="statut" id="statut" class="form-control selected2 @error('statut') is-invalid @enderror">
                                                        <option value="">--Choisir--</option>
                                                        <option value="1">Ancien</option>
                                                        <option value="0">Nouveau</option>
                                                    </select>
                                                    @error('statut')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="button-row d-flex mt-4">
                                            <button id="steep1" class="btn btn-primary ml-auto js-btn-next mb-4" type="button" title="Passer à l'étape suivante 2">Suivant</button>
                                        </div>
                                    </div>
                                </div>

                                <!--steep 2-->
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

                                <!--steep 3-->
                                <div class="multisteps-form__panel shadow p-4M pl-4 pr-4 rounded bg-white">
                                    <h3 class="multisteps-form__title pt-4">Empreint</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-rowM row mt-4M justify-content-center">
                                            <div class="col-sm-2 text-center">
                                                {{-- <button type="button" id="ModalFingerprintGetImages" data-toggle="modal" data-target="#ModalFingerprint" class="btn btn-primary text-white">Capture empreinte</button> --}}
                                                <button type="button" id="captureEmpreint" class="btn btn-primary text-white">Capturer empreinte</button>
                                            </div>
                                        </div>

                                        {{-- <div class="row"> --}}
                                            <div class="mt-4" style="display: flex; justify-content: center; gap: 15px;">
                                                <div class="video-container">
                                                    {{-- <video id="video" autoplay></video> --}}
                                                    <img id="imageEmpreintGif" src="{{asset('assets/img/fingerprin_8vwp1zlx.gif')}}" alt="" style="display: none;" />
                                                    <img id="successLoard" src="{{asset('assets/img/successLoard.gif')}}" alt="" style="display: none; width: 200px; height: 300px; object-fit: cover;" />
                                                </div>
                                                <div style="margin-left: 2px; min-height: 150px; min-width: 100px; border: 1px solid blue;">
                                                    <img id="printImage" src="{{asset('assets/img/imgEmpreint.png')}}" style="height: 300px; width: 200px; object-fit: cover;" />
                                                </div>
                                            </div>                 
                                        {{-- </div> --}}
                                        
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

                                        

                                        <div class="button-row d-flex mt-4 pb-4">
                                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Précédant</button>
                                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Suivant</button>
                                        </div>
                                    </div>
                                </div>

                                <!--steep 4-->
                                <div class="multisteps-form__panel shadow p-4M pl-4 pr-4 rounded bg-white">
                                    <h3 class="multisteps-form__title pt-4">OUVRIR UN DOSSIER</h3>
                                    <div class="multisteps-form__content">
                                        <div class="form-row mt-4">
                                            

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
                                                    <select name="article0" id="articleId0" onchange="getEmplacementByIdArticle('0')" class="form-control selected2">
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
                                                    <select name="place0" id="place0" onchange="getPrixPlace('0');" disabled class="form-control selected2M">
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
                                                    <input type="number" name="quantite0" id="quantite0" onchange="getQuantitePlace('0');" disabled onkeyup="getQuantitePlace('0');" min="1" max="" value="0" class="form-control" />
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
                                        </div>
                                        <h1 class="mt-4">
                                            <Button  id="btnAddRowSelect" type="button" class="btn bg_background text-white" style="font-weight: bold;">Ajouter une activité</Button>
                                        </h1> 
                                        <div class="row pb-4">
                                            <div class="button-row d-flex mt-4 col-12">
                                                <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Précédant</button>
                                                {{-- <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Suivant</button> --}}
                                                <button id="btnSend" class="btn btn-success ml-auto" type="submit" title="Send">Enregistrer</button>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>

                            </form>
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
                            <select name="article${couterNbrAdd}" id="articleId${couterNbrAdd}" onchange="getEmplacementByIdArticle('${couterNbrAdd}')" class="form-control selected2">
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
                            <select name="place${couterNbrAdd}" id="place${couterNbrAdd}" onchange="getPrixPlace('${couterNbrAdd}');" disabled class="form-control">
                                <option value="">--Choisir--</option>
                            </select>
                            <div class="text-center border" id="placeLoaderImg${couterNbrAdd}" style="display: none;">
                                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." style="height: 40px;" />
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <h4>Quantité</h4>
                            <input type="number" name="quantite${couterNbrAdd}" id="quantite${couterNbrAdd}" onchange="getQuantitePlace('${couterNbrAdd}');" onkeyup="getQuantitePlace('${couterNbrAdd}');" min="1" max="" value="0" disabled class="form-control" />
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
            $('.selected2').select2();
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
                
                console.log(reponse);
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
                        // ${reponse.places[i].dimension}
                        options.innerHTML += `${reponse.places[i].place_nom} ${reponse.places[i].type_place_nom} ${reponse.places[i].place_orientation}`;
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

        const imageEmpreintGif = document.getElementById('imageEmpreintGif');
        const successLoard = document.getElementById('successLoard');
        document.getElementById('captureEmpreint').addEventListener('click', function(e){
            imageEmpreintGif.style.display = 'block';
            setTimeout(() => {
                imageEmpreintGif.style.display = 'none';
                successLoard.style.display = 'block';
                // successLoard
                setTimeout(function() {
                    successLoard.style.display = 'none'; // Appel d'une autre fonction ici
                }, 4000);
            }, "5000");
            console.log('ddd')
        });
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

    </script>
    @include('pages.vendeurs.script')
@endsection