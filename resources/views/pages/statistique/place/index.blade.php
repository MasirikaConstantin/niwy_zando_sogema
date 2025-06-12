@extends('layout.main')
@section('title', 'Liste des emplacements')
@section('styles')
{{-- <link href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.7.0/dt-2.0.8/datatables.min.css" rel="stylesheet" /> --}}

<style>
    tbody tr a{
        color: #000000 !important;
        text-decoration: none !important;
    }
</style>
@endsection

@section('contentHeader')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Statistique</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-graph"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Emplacement</a>
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
<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-10">
            <div class="row mt-4 pl-4 pr-3 mb-2" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between ;">
                <div>
                    <h2 style="font-weight: bold;">Statistique des emplacements</h2>
                </div>
            </div>

            <div class="card">
                <button type="button" class="btn btn-primaryM colorText bg_background" style="font-size: 17px;">
                    Total emplacement&nbsp;
                    <span id="placeCount" class="badge badge-light" style="font-size: 18px;">
                        {{-- {{$placesCounts}} --}}
                        0
                    </span>
                </button>
                <form id="formSendSearch" action="#" method="GET" class="row mt-2 ml-2">
                    {{-- <div class="row mt-2 ml-2"> --}}
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            {{-- value="{{request()->get('search')}}" --}}
                            <input type="text" name="myInputRecherche" id="myInputRecherche" class="form-control" autocomplete="off" placeholder="Recherche pavillon" />
                        </div>
                        <div class="col-sm-2">
                            <button id="btnSendSearch" type="submit" class="btn bg_background colorText" title="Recherche">
                                <i id="iconSearch" class="fas fa-search"></i>
                                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImgSearch" style="height: 20px; display: none;" />
                            </button>

                            <button onclick="actualiser();" type="button" class="btn bg_background colorText ml-3" title="Atualiser la liste">
                                <i id="iconaCtualiser" class="fas fa-sync"></i>
                                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImgActualiser" style="height: 20px; display: none;" />
                            </button>
                        </div>
                        <div class="col-sm-2 bg-primaryM">
                            <a id="btnprint" href="#" class="ml-2" title="format pdf">
                                <img src="{{asset('assets/img/pdf.svg')}}" alt="" style="height: 35px; width: 30px; object-fit: cover;" />
                            </a>
                        </div>
                    {{-- </div> --}}
                </form>
                <div class="card-body">
                    <div class="dt-responsive">
                        <table id="myTabable" class="table table-stripedM table-bordered nowrap">
                            <thead>
                                <tr >
                                    <th style="font-size: 16px;">{{ __('Emplacement')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Type place')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Orientation')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Emplacement totals')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Emplacement occupé')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Emplacement libre')}}</th>
                                </tr>
                            </thead>
                            <tbody id="myTab">
                                <tr class="justify-content-center myLoaderImg">
                                    <td colspan="6" class="justify-content-center text-center">
                                        <!-- <div class="col-sm-12 bg-dangerM justify-content-center text-center"> -->
                                            <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
                                        <!-- </div> -->
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/axios.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery_print/jQuery.print.js')}}"></script>

<script>
    window.onload = function(){
        getDataStatistiquePlace();
    }

    function getDataStatistiquePlace() {
        // document.getElementById('myLoaderImg').style.display = "block";
        axios.get("{{route('statistiquePlace')}}",{
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
        })
        .then(function (response) {
            var reponse = response.data;
            if(reponse != "") {
                let myLoaderImg = document.getElementById('myLoaderImg');//.style.display = "none";
                if(myLoaderImg){
                    myLoaderImg.style.display = "none";
                }
            }
            document.getElementById('myTab').innerHTML = reponse;
            //console.log(reponse);
            statistiquePlaceCount();
        })
        .catch(function (error) {
            // handle error
            console.log(error);
            alert(error);
        })
    }
    
    document.getElementById('formSendSearch').addEventListener('submit', function(e) {
        e.preventDefault();

        let myInputRecherche = document.getElementById('myInputRecherche').value;       
        //document.getElementById('btnSendSearch').innerHTML = " En cours...";
        document.getElementById('btnSendSearch').setAttribute("disabled", true);
        let myLoaderImgSearch = document.getElementById('myLoaderImgSearch');
            myLoaderImgSearch.style.display = "block";
        let iconSearch = document.getElementById('iconSearch');
            iconSearch.style.display = "none";
        
        myTab.innerHTML = `<tr class="justify-content-center myLoaderImg">
            <td colspan="6" class="justify-content-center text-center">
                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
            </td>
        </tr>`;

        //console.log(myInputRecherche)   
        axios.get("{{route('statistiquePlace')}}", {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            params:{
                myInputRecherche
            }
        })
        .then(function(response) {
            var reponse = response.data;
            myTab.innerHTML = reponse;
            //document.getElementById('btnSendSearch').innerHTML = "Recherche";
            iconSearch.style.display = "block";
            document.getElementById("btnSendSearch").removeAttribute("disabled");
            myLoaderImgSearch.style.display = "none";
            
            //statistiquePlacesSearchCount();

            //console.log(reponse)         
            //console.log("=== End send search ===")         
        }).catch(function(error) {
            alert(error);
            console.log(error);
        });
    });

    /* function statistiquePlacesSearchCount()
    {
        let myInputRecherche = document.getElementById('myInputRecherche').value;       
        axios.get("{{route('statistiquePavillonsSearch')}}", {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            params:{
                counter: 'counter',
                myInputRecherche
            }
        })
        .then(function(response) {
            var reponse = response.data;
            document.getElementById('pavillonCount').innerHTML = reponse.myDataCounts;
            //console.log(reponse) 
            //console.log("=== End send count ===")            
        }).catch(function(error) {
            alert(error);
            console.log(error);
        }); 
    } */

    function statistiquePlaceCount()
    {
        axios.get("{{route('statistiquePlace')}}",{
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            params:{
                counter: 'counter'
            }
        })
        .then(function(response) {
            var reponse = response.data;
            //console.log(reponse);
            document.getElementById('placeCount').innerHTML = reponse.myDataCounts;
            //console.log(reponse.myDataCounts)         
        }).catch(function(error) {
            alert(error);
            console.log(error);
        }); 
    } 

    function actualiser(){
        //let myLoaderImg = document.getElementById('myLoaderImg');//.style.display = "none";
        let myTab = document.getElementById('myTab');
        myTab.innerHTML = `<tr class="justify-content-center myLoaderImg">
            <td colspan="6" class="justify-content-center text-center">
                <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
            </td>
        </tr>`;

        let iconaCtualiser = document.getElementById('iconaCtualiser');
            iconaCtualiser.style.display = "none";
        let myLoaderImgActualiser = document.getElementById('myLoaderImgActualiser');
            myLoaderImgActualiser.style.display = "block";
        
            getDataStatistiquePlace();

        iconaCtualiser.style.display = "block";
        myLoaderImgActualiser.style.display = "none";
        let myInputRecherche = document.getElementById('myInputRecherche').value = "";     
    } 

    document.querySelector("#btnprint").addEventListener('click', function(){
        myprint();
    });

    // myprint();
    function myprint(){
        $("#myTabable").print({
        addGlobalStyles : true,
        stylesheet : null,
        rejectWindow : true,
        });
    }
</script> 
@endsection