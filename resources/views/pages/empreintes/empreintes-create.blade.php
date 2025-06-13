@extends('layout.main')

@section('title')
Créer les Empreintes
@endsection

@section('contentHeader')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Empreinte</h4>
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
        </ul>
    </div>
</div>
@endsection

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Enregistrement des empreintes pour {{ $vendeur->nom }} {{ $vendeur->prenom }}</h6>
                        <p class="text-sm">Veuillez scanner les 10 doigts un par un</p>
                    </div>
                    <div class="card-body">
                        <!-- Scanner Status -->
                        <div id="scanner-status" class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i> Connectez le lecteur d'empreintes
                        </div>

                        <!-- Finger Selection -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="mb-3">Main droite</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_droite1">Pouce</button>
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_droite2">Index</button>
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_droite3">Majeur</button>
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_droite4">Annulaire</button>
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_droite5">Auriculaire</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-3">Main gauche</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_gauche1">Pouce</button>
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_gauche2">Index</button>
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_gauche3">Majeur</button>
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_gauche4">Annulaire</button>
                                    <button class="btn btn-outline-primary finger-btn" data-finger="doigt_gauche5">Auriculaire</button>
                                </div>
                            </div>
                        </div>

                        <!-- Fingerprint Preview -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div id="image-container" class="text-center mb-3" style="display: none;">
                                    <img id="fingerprint-image" src="" class="img-thumbnail" style="max-height: 200px;">
                                    <div class="mt-2">
                                        <span id="current-finger" class="badge badge-primary"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quality-indicator">
                                    <h6>Qualité de l'empreinte</h6>
                                    <div class="progress">
                                        <div id="quality-bar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                                    </div>
                                    <small id="quality-text" class="text-muted">Non évaluée</small>
                                </div>
                            </div>
                        </div>
<style>
    button {
        margin-right: 5px;
    }
</style>
                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-center gap-6 mr-2">
                            <button id="start-btn" class="btn btn-primary ">
                                <i class="fas fa-fingerprint me-2"></i> Démarrer la capture
                            </button>
                            <button id="save-btn" class="btn btn-success" disabled>
                                <i class="fas fa-save me-2"></i> Enregistrer
                            </button>
                            <button id="reset-btn" class="btn btn-warning">
                                <i class="fas fa-redo me-2"></i> Réinitialiser
                            </button>

                            <a href="{{ route('dossier.create',["vendeur"=>$vendeur->id]) }}" id="" class="btn btn-success">
                                <i class="fas fa-redo me-2"></i> Réinitialiser
                            </a>
                        </div>

                        <!-- Progress -->
                        <div class="mt-4">
                            <h6>Progression</h6>
                            <div class="progress">
                                <div id="global-prprogress-textogress" class="progress-bar bg-success" role="progressbar" style="width: 0%"></div>
                            </div>
                            <small id="progress-text" class="text-muted">0/10 doigts enregistrés</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/digitalpersona/sdk/websdk.client.bundle.min.js') }}"></script>
    <script src="{{ asset('js/digitalpersona/sdk/fingerprint.sdk.min.js') }}"></script>
    <script>
        const vendeurId = {{ $vendeur->id }};
        const saveUrl = "{{ route('empreintes.store') }}";
        const csrfToken = "{{ csrf_token() }}";
        const redirectUrl = "{{ route('vend.show', $vendeur->id) }}";
    </script>
    <script src="{{ asset('js/empreintes.js') }}"></script>
@endsection