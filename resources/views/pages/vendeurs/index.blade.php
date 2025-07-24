@extends('layout.main')
@section('title', 'Liste des vendeurs')
@section('styles')
<style>
    .btn {
        padding-left: 10px !important;
        padding-top: 5px !important;
        padding-bottom: 5px !important;
        padding-right: 10px !important;
    }

    .mystyleInput {
        height: 30px !important;
    }
</style>
@endsection
@section('content')
<div class="row pl-4 pr-4 mt-5">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div
                style="display: flex; align-items: center; justify-items: center; justify-content: space-between; flex-wrap: wrap;">
                <div>
                    <h4 class="card-title pl-4 pt-3">Liste des vendeurs <span
                            class="fw-bold bg_background colorText pl-3 pr-3 pt-1 pb-1"
                            style="border-radius: 6px;">{{$vendeurCounts}}</span></h4>
                </div>
                <form id="formSend" action="#" method="POST">
                    @csrf
                    <div class="pr-4 pt-3"
                        style="display: flex; align-items: center; justify-items: center; justify-content: space-between;">

                        <input type="date" name="searchByDateDebut" id="searchByDateDebut"
                            class="form-control mystyleInput" required />
                        <input type="date" name="searchByDateFin" id="searchByDateFin"
                            class="form-control mystyleInput ml-2" required />
                        <button id="btnSend" type="submit" class="btn btn-primary ml-2">Recherche</button>

                    </div>
                </form>

                <form id="formSendSearch" action="#" method="POST">
                    <div class="pr-4 pt-3"
                        style="display: flex; align-items: center; justify-items: center; justify-content: space-between;">
                        <input type="text" id="myInputRecherche" class="form-control mystyleInput"
                            placeholder="Recherche par nom , postnom, prenom" />

                        <button id="btnSendSearch" type="submit" class="btn btn-primary ml-2"
                            title="Recherche par nom, postnom, prenom">
                            <i id="iconSearch" class="fas fa-search colorText"></i>
                            <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..."
                                id="myLoaderImgSearch" style="height: 20px; display: none;" />
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('N°')}}</th>
                                <th>{{ __('Noms')}}</th>
                                <th class="text-center">{{ __('Telephone') }}</th>
                                <th class="text-center">Date enregistrement</th>
                                <th class="text-center">{{ __('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody id="myTab">
                            <tr class="justify-content-center myLoaderImg">
                                <td colspan="6" class="justify-content-center text-center">
                                    <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..."
                                        id="myLoaderImg" style="height: 100px;" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

<script>
    getDataVendeurs();
    function getDataVendeurs(){
    axios.get("{{route('get-vendeurs')}}",{
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
    })
    .then(function (response) {
        var vendeurs = response.data;
        var html = '';
        
        if(vendeurs.length > 0) {
            document.getElementById('myLoaderImg').style.display = "none";
            
            vendeurs.forEach(function(vendeur, index) {
                html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${vendeur.nom} ${vendeur.postnom} ${vendeur.prenom}</td>
                    <td class="text-center">${vendeur.telephone}</td>
                    <td class="text-center">${new Date(vendeur.created_at).toLocaleDateString()}</td>
                    <td class="text-center">
                        <a href="{{ route('vend.show', '') }}/${vendeur.id}" class="btn btn-primary btn-sm" title="Voir détails">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-info btn-sm" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                `;
            });
        } else {
            html = `<tr><td colspan="5" class="text-center">Aucun vendeur trouvé</td></tr>`;
        }
        
        document.getElementById('myTab').innerHTML = html;
    })
    .catch(function (error) {
        console.log(error);
        document.getElementById('myTab').innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-danger">
                    Erreur lors du chargement des données
                </td>
            </tr>
        `;
    })
}

document.getElementById('formSend').addEventListener('submit', function(e) {
    e.preventDefault();
    let myTab = document.getElementById('myTab');
    let getDateDebutValue = document.getElementById('searchByDateDebut').value;
    let getDateFinValue = document.getElementById('searchByDateFin').value;

    document.getElementById('btnSend').innerHTML = " En cours...";
    document.getElementById('btnSend').setAttribute("disabled", true);

    myTab.innerHTML = `<tr class="justify-content-center myLoaderImg">
        <td colspan="5" class="justify-content-center text-center">
            <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
        </td>
    </tr>`;
   
    axios.post("{{route('get-searchAllByDate')}}", {
        getDateDebutValue,
        getDateFinValue
    })
    .then(function(response) {
        var vendeurs = response.data;
        var html = '';
        
        if(vendeurs.length > 0) {
            vendeurs.forEach(function(vendeur, index) {
                html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${vendeur.nom} ${vendeur.postnom} ${vendeur.prenom}</td>
                    <td class="text-center">${vendeur.telephone}</td>
                    <td class="text-center">${new Date(vendeur.created_at).toLocaleDateString()}</td>
                    <td class="text-center">
                        <a href="{{ route('vend.show', '') }}/${vendeur.id}" class="btn btn-primary btn-sm" title="Voir détails">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-info btn-sm" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                `;
            });
        } else {
            html = `<tr><td colspan="5" class="text-center">Aucun vendeur trouvé pour cette période</td></tr>`;
        }
        
        myTab.innerHTML = html;
        document.getElementById('btnSend').innerHTML = "Recherche";
        document.getElementById("btnSend").removeAttribute("disabled");
    }).catch(function(error) {
        console.log(error);
        myTab.innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-danger">
                    Erreur lors de la recherche
                </td>
            </tr>
        `;
        document.getElementById('btnSend').innerHTML = "Recherche";
        document.getElementById("btnSend").removeAttribute("disabled");
    });
});

document.getElementById('formSendSearch').addEventListener('submit', function(e) {
    e.preventDefault();
    let myTab = document.getElementById('myTab');
    let myInputRecherche = document.getElementById('myInputRecherche').value;            
    let myLoaderImgSearch = document.getElementById('myLoaderImgSearch');
        myLoaderImgSearch.style.display = "block";
    let iconSearch = document.getElementById('iconSearch');
        iconSearch.style.display = "none";

    document.getElementById('btnSendSearch').setAttribute("disabled", true);

    myTab.innerHTML = `<tr class="justify-content-center myLoaderImg">
        <td colspan="5" class="justify-content-center text-center">
            <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
        </td>
    </tr>`;
   
    axios.post("{{route('get-searchAllByName')}}", {
        myInputRecherche
    })
    .then(function(response) {
        var vendeurs = response.data;
        var html = '';
        
        if(vendeurs.length > 0) {
            vendeurs.forEach(function(vendeur, index) {
                html += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${vendeur.nom} ${vendeur.postnom} ${vendeur.prenom}</td>
                    <td class="text-center">${vendeur.telephone}</td>
                    <td class="text-center">${new Date(vendeur.created_at).toLocaleDateString()}</td>
                    <td class="text-center">
                       <a href="{{ route('vend.show', '') }}/${vendeur.id}" class="btn btn-primary btn-sm" title="Voir détails">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-info btn-sm" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                `;
            });
        } else {
            html = `<tr><td colspan="5" class="text-center">Aucun vendeur trouvé pour "${myInputRecherche}"</td></tr>`;
        }
        
        myTab.innerHTML = html;
        iconSearch.style.display = "block";
        document.getElementById("btnSendSearch").removeAttribute("disabled");
        myLoaderImgSearch.style.display = "none";
    }).catch(function(error) {
        console.log(error);
        myTab.innerHTML = `
            <tr>
                <td colspan="5" class="text-center text-danger">
                    Erreur lors de la recherche
                </td>
            </tr>
        `;
        iconSearch.style.display = "block";
        document.getElementById("btnSendSearch").removeAttribute("disabled");
        myLoaderImgSearch.style.display = "none";
    });
});

    $(document).ready(function() {
       
	});
</script>
@endsection