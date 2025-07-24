@extends('layout.main')

    @section('title', 'Liste des Dossiers')
    @section('header', 'Liste des Dossiers')

@section('styles')
  
</style>
<link rel="stylesheet" href="{{asset('assets/formWizard/style.css')}}" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <a href="#">Liste</a>
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
    <h1 class="mb-2">Liste des Dossiers</h1>
    <div class="text-center">
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalLong">
            Créer un nouveau dossier
          </button>
    </div>
    <div style="overflow-x: auto; max-height: 600px;">
        
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>#</th>
                <th>Vendeur</th>
                <th>État</th>
                <th>Date de Traitement</th>
                <th>Date de Paiement</th>
                <th>Date Validation DG</th>
                <th>Décision DG</th>
                <th>Agent Traitant</th>
                <th>Nombre de Tables</th>
                <th>Statut</th>
                <th>Agent Banque</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody >
            @foreach($dossiers as $dossier)
            <tr>
                <td>{{ $dossier->id }}</td>
                <td>{{ $dossier->vendeur->nom ?? 'N/A' }}</td>
                <td>{{ $dossier->etat }}</td>
                <td>{{ $dossier->datecreation ? $dossier->datecreation->format('d/m/Y') : 'N/A' }}</td>
                <td>{{ $dossier->date_paiment ? $dossier->date_paiment->format('d/m/Y H:i') : 'N/A' }}</td>
                <td>{{ $dossier->date_validation_dg ? $dossier->date_validation_dg->format('d/m/Y H:i') : 'N/A' }}</td>
                <td>{{ $dossier->decision_dg ? 'Approuvé' : 'Rejeté' }}</td>
                <td>{{ $dossier->agent->name ?? 'N/A' }}</td>
                <td>{{ $dossier->vendeurDemandes->sum('quantite') }}</td>
                <td>{{ $dossier->statut }}</td>
                <td>{{ $dossier->agentBanque }}</td>
                <td>
                    <!--a href="{{ route('dossier.show', $dossier->id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('dossier.edit', $dossier->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('dossier.destroy', $dossier->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce dossier ?')">Supprimer</button>
                    </form-->

                    <div class="btn-group" role="group">
                        <button type="button" class="btn bg_background colorText dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{route('vend.fichePDF', $dossier->id)}}" class="dropdown-item dropdownActive">Voir la demande</a>
                            {{-- <a href="#" class="dropdown-item dropdownActive">Voir demande validé</a> --}}
                            {{-- <a href="#" class="dropdown-item dropdownActive">Voir demande payé</a> --}}
                            {{-- <a class="dropdown-item dropdownActive" href="{{route('vend.fichePDF', $dossier->id)}}">Voir le dossier</a> --}}
                            @if($dossier->etat == "attente")
                                <a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$dossier->id)}}">Validation</a>
                            @endif 
                            {{-- data-toggle="modal" data-target="#detailsInfos{{ $dossier->id }}" --}}
                            {{-- || $dossier->etat == "payer" --}}
                            @if($dossier->etat == "traiter" || $dossier->etat == "valider")
                                {{-- <a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$dossier->id)}}">Déjà traité</a> --}}
                                @if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "DG")
                                    <a class="dropdown-item dropdownActive" href="{{route('vend.detailsVendeurValidationDG',$dossier->id)}}">Approuver</a>
                                @endif 
                                {{-- @else
                                    <a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$dossier->id)}}">Validation</a>
                                --}}
                            @elseif($dossier->etat == "payer")
                                {{-- <a class="dropdown-item dropdownActive" href="{{route('vend.detailsInfosVendeurPourValidation',$dossier->id)}}">Validation</a> --}}
                                <a class="dropdown-item dropdownActive" href="{{route('vend.vendeurContrat', $dossier->id)}}">Imprimer le Contrat</a>
                            @endif
                            {{-- <a class="dropdown-item dropdownActive" href="#">Supprimer</a> --}} 
                            @if($dossier->etat == "attente" || $dossier->etat != "payer")
                                <a class="dropdown-item dropdownActive" href="{{route('vend.edit', $dossier->id)}}">Modification</a>   
                            @endif  
                            
                            <a class="dropdown-item dropdownActive" href="{{route('vend.ajouterDemande', $dossier->id)}}">Ajouter une demade</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="mt-3">
          
  <!-- Modal -->
  
<!-- Modifiez votre modal comme ceci -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Ajout de modal-lg pour plus d'espace -->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Créer un nouveau dossier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="createDossierForm" action="{{ route('dossier.store') }}" method="POST">
            @csrf
            
            <!-- Champ de recherche -->
            <div class="form-group">
              <label for="vendeurSearch">Rechercher un vendeur</label>
              <input type="text" class="form-control" id="vendeurSearch" placeholder="Entrez le nom du vendeur...">
              <div id="searchResults" class="mt-2" style="max-height: 300px; overflow-y: auto; display: none;">
                <!-- Les résultats apparaîtront ici -->
              </div>
            </div>
            
            <!-- Champ caché pour stocker l'ID du vendeur sélectionné -->
            <input type="hidden" name="vendeur_id" id="selectedVendeurId">
            
            <!-- Affichage du vendeur sélectionné -->
            <div id="selectedVendeur" class="alert alert-info mt-3 " style="display: none;">
              <div class="">
                <strong>Vendeur sélectionné :</strong> <span id="selectedVendeurName"></span>
              <button type="button" class="close" title="Annuler" onclick="clearSelection()">
                <span>&times;</span>
              </button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submitForm()">Créer</button>
              </div>
            </div>
      
          </form>
        </div>
        
      </div>
    </div>
</div>
    </div>
</div>

@endsection
@section("scripts")
<script src="{{asset('assets/js/axios.min.js')}}"></script>

<script>
    // Recherche instantanée
    document.getElementById('vendeurSearch').addEventListener('input', function(e) {
        const query = e.target.value.trim();
        
        if (query.length < 2) {
            document.getElementById('searchResults').style.display = 'none';
            return;
        }
        
        axios.get('/api/vendeurs/search', {
            params: { q: query }
        })
        .then(response => {
            const results = response.data;
            const resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = '';
            
            if (results.length === 0) {
                resultsContainer.innerHTML = '<div class="p-2">Aucun résultat trouvé</div>';
            } else {
                results.forEach(vendeur => {
                    const div = document.createElement('div');
                    div.className = 'list-group-item list-group-item-action ';
                    div.innerHTML = `${vendeur.nom} - (${vendeur.code_unique}) (${vendeur.email || 'N/A'})`;
                    div.onclick = () => selectVendeur(vendeur);
                    resultsContainer.appendChild(div);
                });
            }
            
            resultsContainer.style.display = 'block';
        })
        .catch(error => {
            console.error('Erreur lors de la recherche:', error);
        });
    });

    // Sélection d'un vendeur
    function selectVendeur(vendeur) {
        document.getElementById('selectedVendeurId').value = vendeur.id;
        document.getElementById('selectedVendeurName').textContent = `${vendeur.nom} (${vendeur.email || 'N/A'})`;
        document.getElementById('selectedVendeur').style.display = 'block';
        document.getElementById('searchResults').style.display = 'none';
        document.getElementById('vendeurSearch').value = '';
    }

    // Effacer la sélection
    function clearSelection() {
        document.getElementById('selectedVendeurId').value = '';
        document.getElementById('selectedVendeur').style.display = 'none';
    }

    // Soumettre le formulaire
    function submitForm() {
    const id = document.getElementById('selectedVendeurId').value;
    
    if (!id) {
        alert('Veuillez sélectionner un vendeur');
        return;
    }
    
    window.location.href = `/dossier/create/${id}`;
}
</script>
@endsection