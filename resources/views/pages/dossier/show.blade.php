@extends('layout.main')

@section('title')
Détails du Dossier #{{ $dossier->id }}
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
                <a href="#">Informations sur dossier</a>
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
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Dossier #{{ $dossier->id }} - {{ $dossier->vendeur->nom }}</h4>
            <div class="card-tools">
                <span class="badge badge-{{ $dossier->etat == 'attente' ? 'warning' : 'success' }}">
                    {{ ucfirst($dossier->etat) }}
                </span>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5>Informations du vendeur</h5>
                    <p><strong>Nom:</strong> {{ $dossier->vendeur->nom }}</p>
                    <p><strong>Email:</strong> {{ $dossier->vendeur->email ?? 'N/A' }}</p>
                    <p><strong>Téléphone:</strong> {{ $dossier->vendeur->telephone ?? 'N/A' }}</p>
                </div>
                
                <div class="col-md-4">
                    <h5>Informations du dossier</h5>
                    <p><strong>Date de création:</strong> {{ $dossier->datecreation }}</p>
                    <p><strong>État:</strong> {{ ucfirst($dossier->etat) }}</p>
                    <p><strong>Nombre de demandes:</strong> {{ $dossier->vendeurDemandes->count() }}</p>
                </div>

                <div class="col-md-4">
                    <h5>Profil </h5>
                    <img src="{{ $dossier->vendeur->imageUrl() }}" alt="..." class="img-thumbnail overflow-hidden" width="150" height="150">
                </div>
            </div>
            
            <hr>
            
            <h5>Demandes</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Article</th>
                            <th>Place</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Mois</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach($dossier->vendeurDemandes as $demande)
                        <tr>
                            <td>{{ $demande->article->nom }}</td>
                            <td>{{ $demande->place->nom ?? 'N/A' }}</td>
                            <td>{{ $demande->quantite }}</td>
                            <td>{{ number_format($demande->prix, 0, ',', ' ') }} $</td>
                            <td>{{ $demande->mois }}</td>
                            <td>{{ number_format($demande->total, 0, ',', ' ') }} $</td>
                        </tr>
                        @php $grandTotal += $demande->total; @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="table-info">
                            <th colspan="5">Total général</th>
                            <th>{{ number_format($grandTotal, 0, ',', ' ') }} $</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
        <div class="card-footer">
            <a href="{{ route('dossier.index') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('dossier.edit', $dossier->id) }}" class="btn btn-primary">Modifier</a>
        </div>
    </div>
</div>
@endsection