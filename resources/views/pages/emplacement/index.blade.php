@extends('layout.main')
@section('title', 'Liste des Emplacements')
@section('styles')
<style>
    
</style>
@endsection
@section('content')

<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-10">
            <div class="row mt-4 pl-4 pr-3 mb-2" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between ;">
                <div>
                    <h4 style="font-weight: bold;">Listes des emplacements</h4>
                </div>
                <div>
                    <a href="" class="btn bg_background colorText" data-toggle="modal" data-target="#ajoutArticle">Ajouter un emplacement</a>
                </div>
            </div>

            <div class="card">
                <!-- <button id="myvidage" type="button">Vide</button> -->
                <button type="button" class="btn btn-primaryM colorText bg_background" style="font-size: 17px;">
                    Total&nbsp;
                    <span class="badge badge-light" style="font-size: 18px;"> {{$emplacementsCounts}}</span>
                </button>
                {{-- <form id="formSendSearch" action="{{route('article.search')}}" method="GET">
                    <div class="row mt-2 ml-2">
                        <div class="col-sm-10 col-md-7 col-lg-5">
                            <input type="text" name="q" id="q" value="{{request()->get('q')}}" class="form-control" placeholder="recherche par nom article" />
                        </div>
                        <div class="col-sm-4">
                            <button id="btnSendSearch" type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> --}}
                <div class="card-body">
                    <div class="dt-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr >
                                    <th style="font-size: 18px;">{{ __('Pavillon')}}</th>
                                    <th style="font-size: 18px;">{{ __('Numéro')}}</th>
                                    <th style="font-size: 18px;">{{ __('Orientation')}}</th>
                                    <th style="font-size: 18px;">{{ __('Place')}}</th>                                    
                                    <th style="font-size: 18px;">{{ __('Etat')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody id="myTab">
                                <tr class="justify-content-center text-center myLoaderImg">
                                    <td colspan="6" class="justify-content-center text-center">                                    
                                        <img src="{{asset('assets/img/loading.gif')}}" alt="Chargement en cours..." id="myLoaderImg" style="height: 100px;" />
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

<div class="modal custom-modal fade" id="ajoutArticle" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3 style="text-align: center">Enregistrement emplacement</h3>
                </div>
                <br />
                {{-- {{ route('article.store') }} --}}
                <div class="modal-btn delete-action">
                    <form id="formSend" action="{{ route('emplacement.store') }}" method="POST">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="pavillonId" class="fw-bold">Pavillon <span class="isRequired">*</span></label>
                                <select name="pavillonId" id="pavillonId" class="form-control" required>
                                    <option value="">--Choisir--</option>
                                    @forelse ($pavillons as $pv)
                                        <option value="{{$pv->id}}">{{$pv->numero}} / Niveau {{$pv->niveau}}</option>
                                    @empty                                                                    
                                    @endforelse
                                </select>
                                @error('pavillonId')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="placeId" class="fw-bold">Place <span class="isRequired">*</span></label>
                                <select name="placeId" id="placeId" class="form-control" required>
                                    <option value="">--Choisir--</option>
                                    @forelse ($places as $pl)
                                        <option value="{{$pl->id}}">{{$pl->nom}} @if(!empty($pl->type_place_id)) {{$pl->typePlace->nom}} {{$pl->typePlace->dimension}} @endif Orientation {{$pl->orientation}}</option>
                                    @empty                                                                    
                                    @endforelse
                                </select>
                                @error('placeId')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="articleId" class="fw-bold">Article <span class="isRequired">*</span></label>
                                <select name="articleId" id="articleId" class="form-control" required>
                                    <option value="">--Choisir--</option>
                                    @forelse ($articles as $pl)
                                        <option value="{{$pl->id}}">{{$pl->nom}} </option>
                                    @empty                                                                    
                                    @endforelse
                                </select>
                                @error('articleId')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="numero" class="fw-bold">Numero <span class="isRequired">*</span></label>
                                <input type="text" name="numero" id="numero" value="{{old('numero')}}" class="form-control" placeholder="Saisir le numéro" required />
                                @error('numero')
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
    <script>
        // document.getElementById('formSendModif').addEventListener('submit', function(e){
        //     document.getElementById('btnSendModif').innerHTML = "En cours ...";
        //     document.getElementById('btnSendModif').setAttribute("disabled", true);
        // });

        document.getElementById('formSend').addEventListener('submit', function(e){
            document.getElementById('btnSend').innerHTML = "En cours ...";
            document.getElementById('btnSend').setAttribute("disabled", true);
        });
        
        function modifcation(idVal){
            document.getElementById('formSendModif'+idVal).addEventListener('submit', function(e){
                document.getElementById('btnSendModif'+idVal).innerHTML = "En cours ...";
                document.getElementById('btnSendModif'+idVal).setAttribute("disabled", true);
            });
        }
        
        function btnDelete(idVal){
            // document.getElementById('formSend'+idVal).addEventListener('submit', function(e){
                document.getElementById('btnSendSup'+idVal).innerHTML = "En cours ...";
                document.getElementById('btnSendSup'+idVal).setAttribute("disabled", true);
            // });
        }
                
        // document.getElementById('formSendSearch').addEventListener('submit', function(e){
        //     document.getElementById('btnSendSearch').innerHTML = "En cours ...";
        //     document.getElementById('btnSendSearch').setAttribute("disabled", true);
        // });

        window.onload = function(){
            getDataEmplacements();
            function getDataEmplacements(){
                //document.getElementById('myLoaderImg').style.display = "block";
                axios.get("{{route('emplacement.index')}}",{
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
                    //console.log(reponse.length);
                    //console.log(reponse);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                    alert(error);
                })
            }
        }
    </script>
@endsection