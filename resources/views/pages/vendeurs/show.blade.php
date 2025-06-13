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
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5>Fiche du vendeur</h5>
                            <div>
                                <a href="{{ route('vend.editvendeur', $vendeur->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <a href="{{ route('vend.createEmpreintes', ['id'=>$vendeur->id]) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-fingerprint"></i> Empreintes
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Photo et info de base -->
                            <div class="col-md-4 text-center">
                                @if($vendeur->photo)
                                    <img src="{{ asset('uploaded_files/'.$vendeur->photo) }}" class="img-thumbnail mb-3" style="max-width: 200px;">
                                @else
                                    <div class="bg-light p-5 mb-3 text-center">
                                        <i class="fas fa-user-circle fa-5x text-muted"></i>
                                    </div>
                                @endif
                                
                                <h4>{{ $vendeur->nom }} {{ $vendeur->postnom }} {{ $vendeur->prenom }}</h4>
                                <p class="text-muted">{{ $vendeur->code_unique }}</p>
                                
                                <div class="mt-3">
                                    <span class="badge badge-{{ $vendeur->ancien_nouveau ? 'success' : 'warning' }}">
                                        {{ $vendeur->ancien_nouveau ? 'Ancien' : 'Nouveau' }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Détails -->
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Informations personnelles</h6>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Sexe:</span>
                                                <strong>{{ $vendeur->sexe }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Date naissance:</span>
                                                <strong>{{ $vendeur->date_naissance }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Lieu naissance:</span>
                                                <strong>{{ $vendeur->lieu_naissance }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Nationalité:</span>
                                                <strong>{{ $vendeur->nationalite }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>État civil:</span>
                                                <strong>{{ $vendeur->etat_civil }}</strong>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <h6>Coordonnées</h6>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Téléphone:</span>
                                                <strong>{{ $vendeur->telephone }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Email:</span>
                                                <strong>{{ $vendeur->email }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Résidence:</span>
                                                <strong>{{ $vendeur->residence }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Commune:</span>
                                                <strong>{{ $vendeur->commune }}</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <h6>Informations professionnelles</h6>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Type:</span>
                                                <strong>{{ $vendeur->rccm_patente == 'rccm' ? 'RCCM' : 'Patente' }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Numéro:</span>
                                                <strong>{{ $vendeur->rccm_patente == 'rccm' ? $vendeur->rccm : $vendeur->numero_patente }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Numéro national:</span>
                                                <strong>{{ $vendeur->numero_national }}</strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>Pièce identité:</span>
                                                <strong>{{ $vendeur->piece_identite }} (Exp: {{ $vendeur->piece_identite_date_expiration }})</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                @if($vendeur->dossiers->count() > 0)
    <div class="card mb-4">
        <div class="card-header">
            <h6>Dossiers du vendeur</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>État</th>
                            <th>Date Création</th>
                            <th>Date Traitement</th>
                            <th>Date Paiement</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendeur->dossiers as $dossier)
                            <tr>
                                <td>{{ $dossier->id }}</td>
                                <td>
                                    <span class="badge 
                                        @if($dossier->etat == 'attente') badge-warning
                                        @elseif($dossier->etat == 'traité') badge-primary
                                        @elseif($dossier->etat == 'payé') badge-success
                                        @elseif($dossier->etat == 'validé') badge-info
                                        @else badge-secondary @endif">
                                        {{ ucfirst($dossier->etat) }}
                                    </span>
                                </td>
                                <td>{{ $dossier->datecreation ?? 'N/A' }}</td>
                                <td>{{ $dossier->date_traitement ?? 'N/A' }}</td>
                                <td>{{ $dossier->date_paiment ?? 'N/A' }}</td>
                                <td>{{ $dossier->statut ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('dossiers.show', $dossier->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Voir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">
        Ce vendeur n'a aucun dossier associé.
    </div>
@endif

                <!-- Section empreintes -->
                @if($vendeur->empreint)
                <div class="card mb-4">
                    <div class="card-header">
                        <h6>Empreintes digitales</h6>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <h6>Main droite</h6>
                                @for($i = 1; $i <= 5; $i++)
                                    <div class="finger-box mb-3">
                                        <p>Doigt {{ $i }}</p>
                                        @if($vendeur->empreint->{'doigt_droite'.$i})
                                            <div class="fingerprint-placeholder bg-success text-white">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        @else
                                            <div class="fingerprint-placeholder bg-light">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        @endif
                                    </div>
                                @endfor
                            </div>
                            <div class="col-md-6">
                                <h6>Main gauche</h6>
                                @for($i = 1; $i <= 5; $i++)
                                    <div class="finger-box mb-3">
                                        <p>Doigt {{ $i }}</p>
                                        @if($vendeur->empreint->{'doigt_gauche'.$i})
                                            <div class="fingerprint-placeholder bg-success text-white">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        @else
                                            <div class="fingerprint-placeholder bg-light">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        @endif
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

<style>
.finger-box {
    display: inline-block;
    margin: 0 10px;
}
.fingerprint-placeholder {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}
</style>
@endsection