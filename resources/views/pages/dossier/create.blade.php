@extends('layout.main')

@section('title')
Créer un Dossier
@endsection

@section('contentHeader')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dossier</h4>
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
<div class="container">
    <div class="multisteps-form__panel shadow p-4 pl-4 pr-4 rounded bg-white">
        <h3 class="multisteps-form__title pt-4">OUVRIR UN DOSSIER POUR {{ $vendeur->nom }}</h3>
        
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('dossier.store') }}" method="POST" id="dossierForm">
            @csrf
            <input type="hidden" name="vendeur_id" value="{{ $vendeur->id }}">
            
            <div class="multisteps-form__content">
                <div id="demandes-container">
                    <div class="demande-row" data-index="0">
                        <div class="row mt-3">
                            <div class="col-sm-4">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4>Secteur d'activité<span class="isRequired">*</span></h4>
                                </div>
                                <select name="demandes[0][article_id]" class="form-control article-select" data-index="0" required>
                                    <option value="">--Choisir--</option>
                                    @foreach($articles as $article)
                                        <option value="{{ $article->id }}">{{ $article->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4>Place <span class="isRequired">*</span></h4>
                                    <h4 class="place-prix" data-index="0"></h4>
                                </div>
                                <select name="demandes[0][place_id]" class="form-control place-select" data-index="0" disabled required>
                                    <option value="">--Choisir--</option>
                                </select>
                                <div class="text-center border place-loader" data-index="0" style="display: none;">
                                    <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement..." style="height: 40px;" />
                                </div>
                            </div>
                            
                            <div class="col-sm-2">
                                <h4>Quantité</h4>
                                <input type="number" name="demandes[0][quantite]" class="form-control quantite-input" data-index="0" min="1" value="1" disabled required />
                                <h6 class="quantite-stock" data-index="0" style="color: #1D6FB8; font-weight: bold; display: none;">
                                    Stock dispo: <span class="quantite-dispo" data-index="0"></span>
                                </h6>
                            </div>
                            
                            <div class="col-sm-1">
                                <h4>Mois</h4>
                                <input type="number" name="demandes[0][mois]" class="form-control mois-input" data-index="0" value="7" min="7" required />
                            </div>
                            
                            <div class="col-sm-1">
                                <h4>Total</h4>
                                <h2 class="total-prix" data-index="0" style="font-size: 14px;">0 $</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="button" id="add-demande" class="btn bg_background text-white" style="font-weight: bold;">
                        Ajouter une activité
                    </button>
                </div>

                <div class="row pb-4">
                    <div class="button-row d-flex mt-4 col-12">
                        <a href="{{ route('dossier.index') }}" class="btn btn-secondary">Retour</a>
                        <button type="submit" class="btn btn-success ml-auto">Enregistrer le dossier</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<script>
$(document).ready(function() {
    let demandeIndex = 1;
    const maxDemandes = 10;

    // Ajouter une nouvelle demande
    $('#add-demande').click(function() {
        if (demandeIndex >= maxDemandes) {
            alert('Vous avez atteint le nombre maximum de demandes');
            return;
        }

        const newDemandeHtml = `
            <div class="demande-row" data-index="${demandeIndex}">
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <h4>Article <span class="isRequired">*</span></h4>
                        <select name="demandes[${demandeIndex}][article_id]" class="form-control article-select" data-index="${demandeIndex}" required>
                            <option value="">--Choisir--</option>
                            @foreach($articles as $article)
                                <option value="{{ $article->id }}">{{ $article->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <div class="d-flex flex-row justify-content-between">
                            <h4>Place <span class="isRequired">*</span></h4>
                            <h4 class="place-prix" data-index="${demandeIndex}"></h4>
                        </div>
                        <select name="demandes[${demandeIndex}][place_id]" class="form-control place-select" data-index="${demandeIndex}" disabled required>
                            <option value="">--Choisir--</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <h4>Quantité</h4>
                        <input type="number" name="demandes[${demandeIndex}][quantite]" class="form-control quantite-input" data-index="${demandeIndex}" min="1" value="1" disabled required />
                        <h6 class="quantite-stock" data-index="${demandeIndex}" style="color: #1D6FB8; font-weight: bold; display: none;">
                            Stock dispo: <span class="quantite-dispo" data-index="${demandeIndex}"></span>
                        </h6>
                    </div>
                    <div class="col-sm-1">
                        <h4>Mois</h4>
                        <input type="number" name="demandes[${demandeIndex}][mois]" class="form-control mois-input" data-index="${demandeIndex}" value="7" min="7" required />
                    </div>
                    <div class="col-sm-1">
                        <h4>Total</h4>
                        <h2 class="total-prix" data-index="${demandeIndex}" style="font-size: 14px;">0 $</h2>
                    </div>
                    <div class="col-sm-1">
                        <h4 style="color: transparent;">-</h4>
                        <button type="button" class="btn btn-danger remove-demande">X</button>
                    </div>
                </div>
            </div>
        `;

        $('#demandes-container').append(newDemandeHtml);
        demandeIndex++;

        if (demandeIndex >= maxDemandes) {
            $('#add-demande').prop('disabled', true).text('Limite atteinte');
        }
    });

    // Supprimer une demande
    $(document).on('click', '.remove-demande', function() {
        $(this).closest('.demande-row').remove();
        demandeIndex--;
        $('#add-demande').prop('disabled', false).text('Ajouter une activité');
    });

    // Changement d'article
    $(document).on('change', '.article-select', function() {
        const index = $(this).data('index');
        const articleId = $(this).val();
        
        if (articleId) {
            loadPlaces(articleId, index);
        } else {
            resetPlace(index);
        }
    });

    // Changement de place
    $(document).on('change', '.place-select', function() {
        const index = $(this).data('index');
        const placeId = $(this).val();
        
        if (placeId) {
            loadPlacePrix(placeId, index);
        }
    });

    // Changement de quantité ou mois
    $(document).on('input change', '.quantite-input, .mois-input', function() {
        const index = $(this).data('index');
        calculateTotal(index);
    });

    function loadPlaces(articleId, index) {
        $(`.place-select[data-index="${index}"]`).prop('disabled', true);
        
        axios.get('{{ route("getEmplacementByIdArticle") }}', {
            params: { secteurActiviteId: articleId }
        })
        .then(function(response) {
            const places = response.data.places;
            const emplacements = response.data.emplacements;
            
            let placeSelect = $(`.place-select[data-index="${index}"]`);
            placeSelect.html('<option value="">--Choisir--</option>');
            
            if (places.length > 0) {
                places.forEach(place => {
                    placeSelect.append(`<option value="${place.unique_id_place}">${place.place_nom} ${place.type_place_nom} ${place.place_orientation}</option>`);
                });
                placeSelect.prop('disabled', false);
            } else {
                placeSelect.html('<option value="">Place non disponible</option>');
            }
            
            $(`.quantite-dispo[data-index="${index}"]`).text(`(${emplacements.length})`);
            $(`.quantite-stock[data-index="${index}"]`).show();
        })
        .catch(function(error) {
            console.error('Erreur:', error);
        });
    }

    function loadPlacePrix(placeId, index) {
        axios.get('{{ route("place.getPrixById") }}', {
            params: { idPlace: placeId }
        })
        .then(function(response) {
            const place = response.data;
            const prix = place.prix || 0;
            
            $(`.place-prix[data-index="${index}"]`).text(`${prix} $`);
            $(`.quantite-input[data-index="${index}"]`)
                .prop('disabled', false)
                .attr('max', place.emplacements.length);
            
            calculateTotal(index);
        })
        .catch(function(error) {
            console.error('Erreur:', error);
        });
    }

    function calculateTotal(index) {
        const quantite = parseInt($(`.quantite-input[data-index="${index}"]`).val()) || 0;
        const mois = parseInt($(`.mois-input[data-index="${index}"]`).val()) || 7;
        const prixText = $(`.place-prix[data-index="${index}"]`).text();
        const prix = parseInt(prixText.replace(' $', '')) || 0;
        
        const total = (prix * mois) * quantite;
        $(`.total-prix[data-index="${index}"]`).text(`${total} $`);
    }

    function resetPlace(index) {
        $(`.place-select[data-index="${index}"]`).html('<option value="">--Choisir--</option>').prop('disabled', true);
        $(`.place-prix[data-index="${index}"]`).text('');
        $(`.quantite-input[data-index="${index}"]`).prop('disabled', true).val('1');
        $(`.total-prix[data-index="${index}"]`).text('0 $');
        $(`.quantite-stock[data-index="${index}"]`).hide();
    }
});
</script>
@endsection