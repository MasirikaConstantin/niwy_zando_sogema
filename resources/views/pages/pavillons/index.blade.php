@extends('layout.main')
@section('title', 'Liste des pavillons')
@section('styles')
{{-- <link href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.7.0/dt-2.0.8/datatables.min.css" rel="stylesheet" /> --}}

<style>
    
</style>
@endsection
@section('content')
<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="row mt-4 pl-4 pr-3 mb-2" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between ;">
                <div>
                    <h4 style="font-weight: bold;">Listes des pavillons</h4>
                </div>
                <div>
                    <a href="" class="btn bg_background colorText" data-toggle="modal" data-target="#ajoutPavillon">Ajouter pavillon</a>
                </div>
            </div>

            <div class="card">
                <button type="button" class="btn btn-primaryM colorText bg_background" style="font-size: 17px;">
                    Total pavillons&nbsp;
                    <span class="badge badge-light" style="font-size: 18px;">{{ $pavillonsCounts }}</span>
                </button>
                <form id="formSendSearch" action="#" method="GET">
                    <div class="row mt-2 ml-2">
                        <div class="col-sm-10 col-md-7 col-lg-5">
                            <input type="text" name="search" id="search" value="{{request()->get('search')}}" class="form-control" placeholder="Recherche pavillon" />
                        </div>
                        {{-- <div class="col-sm-4">
                            <button id="btnSendSearch" type="submit" class="btn bg_background colorText">
                                <i class="fas fa-search"></i>
                            </button>
                        </div> --}}
                    </div>
                </form>
                <div class="card-body">
                    <div class="dt-responsive">
                        {{-- id="simpletableM" --}}
                        <table id="myTabable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr >
                                    <th style="font-size: 18px;">{{ __('Pavillon')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Niveau')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody id="myTab">
                                <tr class="justify-content-center myLoaderImg">
                                    <td colspan="7" class="justify-content-center text-center">
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

<div class="modal custom-modal fade" id="ajoutPavillon" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3 style="text-align: center">Ajouter Pavillon</h3>
                </div>
                <br />
                {{-- {{ route('article.store') }} --}}
                <div class="modal-btn delete-action">
                    <form id="formSend" action="{{ route('pavillon.store') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="nom">Pavillon <span class="isRequired">*</span></label>
                                <input type="text" name="nom" id="nom" value="{{old('nom')}}" class="form-control" placeholder="Saisir le nom du pavillon" required />
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="niveau">Niveau <span class="isRequired">*</span></label>
                                <select name="niveau" id="niveau" class="form-control" required>
                                    <option value="">--Choisir--</option>
                                    <option value="0">Niveau 0</option>
                                    <option value="1">Niveau 1</option>
                                    <option value="2">Niveau 2</option>
                                    <option value="3">Niveau 3</option>
                                </select>
                                @error('niveau')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button id="btnSend" type="submit" class="btn btn-block bg_background colorText">Enregistrer</button>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn-block btn btn-danger">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/axios.min.js')}}"></script>
{{-- <script src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.7.0/dt-2.0.8/datatables.min.js"></script> --}}
    <script>
        window.onload = function(){
            getDataPavillons();
            function getDataPavillons(){
                // document.getElementById('myLoaderImg').style.display = "block";
                axios.get("{{route('pavillon.index')}}",{
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                })
                .then(function (response) {
                    var reponse = response.data;
                    if(reponse != "") {
                        document.getElementById('myLoaderImg').style.display = "none";
                        //getDataElevesCount();
                    }
                    document.getElementById('myTab').innerHTML = reponse;
                    //console.log(reponse);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                    alert(error);
                })
            }
        }

        document.getElementById('search').addEventListener('keyup',mySearch);
        function mySearch(){            
            let myTabDatas = document.querySelectorAll(".myTabData");
            myTabDatas.forEach(function(element) {
                element.style.display = 'none';
            });
            //console.log( document.querySelectorAll(".myTabData"));
            document.getElementById('myTab').innerHTML = `
                <tr class="justify-content-center myLoaderImg">
                    <td colspan="7" class="justify-content-center text-center">                            
                        <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
                    </td>
                </tr>`;
            let getValueInput = document.getElementById('search').value
            axios.get("{{route('pavillon.search')}}",{
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                params: {
                    getValueInput
                },
            })
            .then(function (response) {
                var reponse = response.data;
                if(reponse != "") {
                    document.getElementById('myLoaderImg').style.display = "none";
                }
                document.getElementById('myTab').innerHTML = reponse;
                //console.log(reponse);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
                alert(error);
            })
        }

        document.getElementById('formSend').addEventListener('submit', function(e){
            document.getElementById('btnSend').innerHTML = "En cours ...";
            document.getElementById('btnSend').setAttribute("disabled", true);
        });

        // function modifcation(idVal){
        //     document.getElementById('formSendModif'+idVal).addEventListener('submit', function(e){
        //         document.getElementById('btnSendModif'+idVal).innerHTML = "En cours ...";
        //         document.getElementById('btnSendModif'+idVal).setAttribute("disabled", true);
        //     });
        // }
    </script>
@endsection