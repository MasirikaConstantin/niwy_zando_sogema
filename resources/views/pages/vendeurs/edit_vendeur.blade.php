@extends('layout.main')

@section('title')
Détails vendeur
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
                <a href="#">Affichage</a>
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
                        <h6>Modification du vendeur</h6>
                    </div>
                    <div class="card-body">
                        <form id="formUpdate" method="POST" action="{{ route('vend.updateVendeur', $vendeur->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom">Nom *</label>
                                        <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $vendeur->nom) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prenom">Prénom *</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $vendeur->prenom) }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="postnom">Postnom</label>
                                        <input type="text" class="form-control" id="postnom" name="postnom" value="{{ old('postnom', $vendeur->postnom) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sexe">Sexe *</label>
                                        <select class="form-control" id="sexe" name="sexe" required>
                                            <option value="M" {{ old('sexe', $vendeur->sexe) == 'M' ? 'selected' : '' }}>Masculin</option>
                                            <option value="F" {{ old('sexe', $vendeur->sexe) == 'F' ? 'selected' : '' }}>Féminin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date_naissance">Date naissance</label>
                                        <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $vendeur->date_naissance) }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lieu_naissance">Lieu naissance *</label>
                                        <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" value="{{ old('lieu_naissance', $vendeur->lieu_naissance) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nationalite">Nationalité</label>
                                        <input type="text" class="form-control" id="nationalite" name="nationalite" value="{{ old('nationalite', $vendeur->nationalite) }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="telephone">Téléphone *</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $vendeur->telephone) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $vendeur->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="etat_civil">État civil</label>
                                        <select class="form-control" id="etat_civil" name="etat_civil">
                                            <option value="Célibataire" {{ old('etat_civil', $vendeur->etat_civil) == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                                            <option value="Marié" {{ old('etat_civil', $vendeur->etat_civil) == 'Marié' ? 'selected' : '' }}>Marié</option>
                                            <option value="Divorcé" {{ old('etat_civil', $vendeur->etat_civil) == 'Divorcé' ? 'selected' : '' }}>Divorcé</option>
                                            <option value="Veuf/Veuve" {{ old('etat_civil', $vendeur->etat_civil) == 'Veuf/Veuve' ? 'selected' : '' }}>Veuf/Veuve</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="residence">Résidence *</label>
                                        <input type="text" class="form-control" id="residence" name="residence" value="{{ old('residence', $vendeur->residence) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="commune">Commune</label>
                                        <input type="text" class="form-control" id="commune" name="commune" value="{{ old('commune', $vendeur->commune) }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type document *</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rccm_patente" id="rccm" value="rccm" {{ old('rccm_patente', $vendeur->rccm_patente) == 'rccm' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="rccm">RCCM</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rccm_patente" id="patente" value="patente" {{ old('rccm_patente', $vendeur->rccm_patente) == 'patente' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="patente">Patente</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Champ RCCM (visible seulement si rccm_patente = rccm) -->
                                    <div class="form-group" id="rccm-field" style="{{ old('rccm_patente', $vendeur->rccm_patente) != 'rccm' ? 'display:none;' : '' }}">
                                        <label for="rccm">Numéro RCCM *</label>
                                        <input type="text" class="form-control" id="rccm" name="rccm" value="{{ old('rccm', $vendeur->rccm) }}">
                                    </div>
                                    <!-- Champ Patente (visible seulement si rccm_patente = patente) -->
                                    <div class="form-group" id="patente-field" style="{{ old('rccm_patente', $vendeur->rccm_patente) != 'patente' ? 'display:none;' : '' }}">
                                        <label for="numero_patente">Numéro Patente *</label>
                                        <input type="text" class="form-control" id="numero_patente" name="numero_patente" value="{{ old('numero_patente', $vendeur->numero_patente) }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="piece_identite">Pièce identité</label>
                                        <select class="form-control" id="piece_identite" name="piece_identite">
                                            <option value="Carte d'électeur" {{ old('piece_identite', $vendeur->piece_identite) == "Carte d'électeur" ? 'selected' : '' }}>Carte d'électeur</option>
                                            <option value="Passeport" {{ old('piece_identite', $vendeur->piece_identite) == 'Passeport' ? 'selected' : '' }}>Passeport</option>
                                            <option value="Permis de conduire" {{ old('piece_identite', $vendeur->piece_identite) == 'Permis de conduire' ? 'selected' : '' }}>Permis de conduire</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="piece_identite_date_expiration">Date expiration</label>
                                        <input type="date" class="form-control" id="piece_identite_date_expiration" name="piece_identite_date_expiration" value="{{ old('piece_identite_date_expiration', $vendeur->piece_identite_date_expiration) }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="numero_national">Numéro national</label>
                                        <input type="text" class="form-control" id="numero_national" name="numero_national" value="{{ old('numero_national', $vendeur->numero_national) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="statut">Statut</label>
                                        <select class="form-control" id="statut" name="statut">
                                            <option value="1" {{ old('statut', $vendeur->ancien_nouveau) == 1 ? 'selected' : '' }}>Ancien</option>
                                            <option value="0" {{ old('statut', $vendeur->ancien_nouveau) == 0 ? 'selected' : '' }}>Nouveau</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        @if($vendeur->photo)
                                            <div class="mb-2">
                                                <img src="{{ asset('uploaded_files/'.$vendeur->photo) }}" class="img-thumbnail" style="max-width: 100px;">
                                            </div>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="getPhotoMyPc" name="getPhotoMyPc" accept="image/*">
                                            <label class="custom-file-label" for="getPhotoMyPc">Changer la photo</label>
                                        </div>
                                        @error("getPhotoMyPc")
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ou capture photo</label>
                                        <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#cameraModal">
                                            <i class="fas fa-camera"></i> Prendre une photo
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary" id="btnUpdate">
                                    <i class="fas fa-save"></i> Mettre à jour
                                </button>
                                <a href="{{ route('vend.show', $vendeur->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Annuler
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Camera Modal -->
    <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Prendre une photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div id="my_camera" style="width:100%; margin: 0 auto;"></div>
                    <input type="hidden" name="image_data" id="image_data">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" onclick="take_snapshot()">
                        <i class="fas fa-camera"></i> Capturer
                    </button>
                </div>
            </div>
        </div>
    </div>

<!-- WebcamJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script>
// Initialize camera
Webcam.set({
    width: 320,
    height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90
});

$('#cameraModal').on('shown.bs.modal', function () {
    Webcam.attach('#my_camera');
});

$('#cameraModal').on('hidden.bs.modal', function () {
    Webcam.reset();
});

function take_snapshot() {
    Webcam.snap(function(data_uri) {
        document.getElementById('image_data').value = data_uri;
        $('#cameraModal').modal('hide');
    });
}

// Update file input label
document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    var fileName = document.getElementById("getPhotoMyPc").files[0].name;
    var nextSibling = e.target.nextElementSibling;
    nextSibling.innerText = fileName;
});

// Afficher/cacher les champs RCCM/Patente dynamiquement
document.querySelectorAll('input[name="rccm_patente"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.getElementById('rccm-field').style.display = this.value === 'rccm' ? 'block' : 'none';
        document.getElementById('patente-field').style.display = this.value === 'patente' ? 'block' : 'none';
    });
});
</script>
    @endsection