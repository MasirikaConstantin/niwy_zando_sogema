@extends('layout.main')
@section('title', 'Liste des type place')
@section('styles')
<style>
    /* .selectDimension */
    select option {
       font-size: 130%;
       vertical-align: super;
    }
</style>
@endsection
@section('content')
<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="row mt-4 pl-4 pr-3 mb-2" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between ;">
                <div>
                    <h4 style="font-weight: bold;">Liste des type place</h4>
                </div>
                <div>
                    <a href="" class="btn bg_background colorText" data-toggle="modal" data-target="#ajoutTypePlace">Ajouter type place</a>
                </div>
            </div>

            <div class="card">
                <!-- <button id="myvidage" type="button">Vide</button> -->
                <button type="button" class="btn btn-primaryM colorText bg_background" style="font-size: 17px;">
                    Total&nbsp;
                    <span class="badge badge-light" style="font-size: 18px;">{{ $placeTypes->count() }}</span>
                </button>
                <div class="card-body">
                    <div class="dt-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr >
                                    <th style="font-size: 18px;">{{ __('Type place')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Dimension')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($placeTypes as $item)
                                <tr>
                                    <td style="font-size: 18px;">{{ $item->nom}}</td>                                    
                                    <td class="text-center" style="font-size: 18px;">@if(!empty($item->dimension)) {{ $item->dimension}}@endif</td>                                    
                                    <td style="font-size: 18px;" class="text-center">
                                        {{-- <a class="dropdown-item btn" href="{{ route('dashboard',[$item->id]) }}"><i class="fa fa-th m-r-5"></i> Détails</a>
                                        <a class="dropdown-item btn" href="{{ route('dashboard') }}"><i class="fa fa-edit m-r-5"></i> Modifier</a>
                                        <a class="dropdown-item btn btn-dark" href="#" data-toggle="modal" data-target="#delete{{ $item->id }}"><i class="fa fa-trash m-r-5"></i> Supprimer</a> --}}
                                        
                                        <!-- <a class="dropdown-itemM btnM btn-hover mr-1" href="{{ route('dashboard',[$item->id]) }}" title="Détails"><i class="fa fa-th m-r-5"></i></a> -->
                                        <a class="bg_background colorText btn-hover p-2 rounded mr-1" href="#" title="Modifier" data-toggle="modal" data-target="#edit{{ $item->id }}"><i class="fa fa-edit m-r-5"></i></a>
                                        {{-- <a class="dropdown-itemM btnM btn-hover" href="#" data-toggle="modal" data-target="#delete{{ $item->id }}" title="Supprimer"><i class="fa fa-trash m-r-5 text-danger"></i></a> --}}
                                        
                                    </td>
                                </tr>

                                <div class="modal custom-modal fade" id="edit{{ $item->id }}" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="form-header">
                                                    <h3 style="text-align: center">Modification</h3>
                                                </div>
                                                <br />
                                                <div class="modal-btn delete-action">
                                                    <form id="formSendModif{{$item->id}}" action="{{ route('typePlace.update',$item->id) }}" method="POST">
                                                        @csrf
                                                        <div class="row mb-4">
                                                            <div class="col-sm-6">
                                                                <label for="nom">Type place <span class="isRequired">*</span></label>
                                                                <input type="text" name="nom" id="nom" value="{{$item->nom}}" class="form-control" placeholder="Saisir un type place Ex: T1" required />
                                                                @error('nom')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="col-sm-4">
                                                                <label for="dimension">Dimension <span class="isRequired">*</span></label>
                                                                <select name="dimension" id="dimension" class="form-control" required>
                                                                    <option value="">--Choisir--</option>
                                                                    <option value="12m&sup2" {{$item->dimension == '12m&sup2' ? 'selected' : ''}}>12<span>m&sup2</span></option>
                                                                    <option value="13m&sup2" {{$item->dimension == '13m&sup2' ? 'selected' : ''}}>13<span>m&sup2</span></option>
                                                                    <option value="24m&sup2" {{$item->dimension == '24m&sup2' ? 'selected' : ''}}>24<span>m&sup2</span></option>
                                                                    <option value="48m&sup2" {{$item->dimension == '48m&sup2' ? 'selected' : ''}}>48<span>m&sup2</span></option>
                                                                </select>
                                                                @error('dimension')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <button type="submit" id="btnSendModif{{$item->id}}" onclick="modifcation({{$item->id}})" class="btn btn-block bg_background colorText">Enregistrer</button>
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

                                <div class="modal custom-modal fade" id="delete{{ $item->id }}" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="form-header">
                                                    <h3 style="text-align: center">Suppression</h3>
                                                    <p style="text-align: center">Voulez-vous supprimer {{ $item->nom }} ?</p>
                                                </div>
                                                <br>
                                                <div class="modal-btn delete-action">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <a id="btnSendSup{{$item->id}}" onclick="btnDelete('{{$item->id}}')" href="{{ route('article.destroy', $item->id) }}" class="btn btn-danger btn-block">Supprimer</a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <a href="javascript:void(0);" data-dismiss="modal" class="btn-block btn btn-primary">Annuler</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal custom-modal fade" id="ajoutTypePlace" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3 style="text-align: center">Enregistrement Type place</h3>
                </div>
                <br />
                {{-- {{ route('article.store') }} --}}
                <div class="modal-btn delete-action">
                    <form id="formSend" action="{{ route('typePlace.store') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <label for="nom">Type place <span class="isRequired">*</span></label>
                                <input type="text" name="nom" id="nom" value="{{old('nom')}}" class="form-control" placeholder="Saisir un type place Ex: T1" required />
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-4">
                                <label for="dimension">Dimension <span class="isRequired">*</span></label>
                                <select name="dimension" id="dimension" class="form-control" required>
                                    <option value="">--Choisir--</option>
                                    <option value="1m" {{$item->dimension == '1m' ? 'selected' : ''}}>1m<span></span></option>
                                    <option value="12m&sup2" {{$item->dimension == '12m&sup2' ? 'selected' : ''}}>12<span>m&sup2</span></option>
                                    <option value="13m&sup2" {{$item->dimension == '13m&sup2' ? 'selected' : ''}}>13<span>m&sup2</span></option>
                                    <option value="24m&sup2" {{$item->dimension == '24m&sup2' ? 'selected' : ''}}>24<span>m&sup2</span></option>
                                    <option value="48m&sup2" {{$item->dimension == '48m&sup2' ? 'selected' : ''}}>48<span>m&sup2</span></option>
                                    <option value="145m&sup2" {{$item->dimension == '145m&sup2' ? 'selected' : ''}}>145<span>m&sup2</span></option>
                                </select>
                                @error('dimension')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row" style="margin-top:20px;">
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

        
        document.getElementById('formSendSearch').addEventListener('submit', function(e){
            document.getElementById('btnSendSearch').innerHTML = "En cours ...";
            document.getElementById('btnSendSearch').setAttribute("disabled", true);
        });
        
        
    </script>
@endsection