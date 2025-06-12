@extends('layout.main')
@section('title', 'Liste des articles')
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
                    <h4 style="font-weight: bold;">Liste des places</h4>
                </div>
                <div>
                    <a href="" class="btn bg_background colorText" data-toggle="modal" data-target="#ajoutPlace">Ajouter place</a>
                </div>
            </div>

            <div class="card">
                <!-- <button id="myvidage" type="button">Vide</button> -->
                <button type="button" class="btn btn-primaryM colorText bg_background" style="font-size: 17px;">
                    Total&nbsp;
                    <span class="badge badge-light" style="font-size: 18px;">{{ $places->count() }}</span>
                </button>
                {{-- <form id="formSendSearch" action="{{route('article.search')}}" method="GET">
                    <div class="row mt-2 ml-2">
                        <div class="col-sm-10 col-md-7 col-lg-5">
                            <input type="text" name="q" id="q" value="{{request()->get('q')}}" class="form-control" placeholder="recherche par nom article" />
                        </div>
                        <div class="col-sm-4">
                            <button id="btnSendSearch" type="submit" class="btn bg_background colorText">
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
                                    <th style="font-size: 18px;">{{ __('Place')}}</th>
                                    <th style="font-size: 18px;">{{ __('Type Place')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Prix')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Orientation')}}</th>
                                    <th class="text-center" style="font-size: 18px;">{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($places as $item)
                                <tr>
                                    <td style="font-size: 18px;">{{ $item->nom}}</td>       
                                    <td style="font-size: 18px;">@if(!empty($item->type_place_id)) {{ $item->typePlace->nom}} {{ $item->typePlace->dimension}} @endif</td>                                    
                                    <td class="text-center" style="font-size: 18px;">@if(!empty($item->prix)) {{ $item->prix}} <span style="font-weight: bold;">$</span> @endif</td>   
                                    <td class="text-center" style="font-size: 18px;">{{ $item->orientation}}</td>                                   
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
                                                    <form id="formSendModif{{$item->id}}" action="{{ route('place.update',$item->id) }}" method="POST">
                                                        @csrf
                                                        <div class="row mb-4">
                                                            <div class="col-sm-12">
                                                                <input type="text" name="nom" id="nom" value="{{$item->nom}}" class="form-control" />
                                                                @error('nom')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-sm-12 mt-3">
                                                                <label for="typePlace">Type Place<span class="isRequired">*</span></label>
                                                                <select name="typePlace" id="typePlace" class="form-control" required>
                                                                    <option value="">--Choisir--</option>
                                                                    @forelse($placeTypes as $type)
                                                                    <option value="{{$type->id}}" {{$type->id == $item->type_place_id ? 'selected' : ''}}>{{$type->nom}} {{$type->dimension}}</option>
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                                @error('typePlace')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="col-sm-12 mt-3">
                                                                <label for="prix">Prix <span class="isRequired">*</span></label>
                                                                <input type="number" name="prix" id="prix" value="{{$item->prix}}" class="form-control" placeholder="Saisir le prix Ex: 60 pas de signe de dollard" required />
                                                                @error('prix')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="col-sm-12 mt-3">
                                                                <label for="orientation">Orientation<span class="isRequired">*</span></label>
                                                                <select name="orientation" id="orientation" class="form-control" required>
                                                                    <option value="">--Choisir--</option>
                                                                    <option value="IN" {{$item->orientation == 'IN' ? 'selected' : ''}}>IN</option>
                                                                    <option value="EX" {{$item->orientation == 'EX' ? 'selected' : ''}}>EX</option>
                                                                </select>
                                                                @error('orientation')
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

<div class="modal custom-modal fade" id="ajoutPlace" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3 style="text-align: center">Enregistrement place</h3>
                </div>
                <br />
                {{-- {{ route('article.store') }} --}}
                <div class="modal-btn delete-action">
                    <form id="formSend" action="{{ route('place.store') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="nom">Nom <span class="isRequired">*</span></label>
                                <input type="text" name="nom" id="nom" value="{{old('nom')}}" class="form-control" placeholder="Saisir une place" required />
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="typePlace">Type Place<span class="isRequired">*</span></label>
                                <select name="typePlace" id="typePlace" class="form-control" required>
                                    <option value="">--Choisir--</option>
                                    @forelse($placeTypes as $item)
                                    <option value="{{$item->id}}">{{$item->nom}} {{$item->dimension}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('typePlace')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="prix">Prix <span class="isRequired">*</span></label>
                                <input type="number" name="prix" id="prix" value="{{old('prix')}}" class="form-control" placeholder="Saisir le prix Ex: 60 pas de signe de dollard" required />
                                @error('prix')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="orientation">Orientation<span class="isRequired">*</span></label>
                                <select name="orientation" id="orientation" class="form-control" required>
                                    <option value="">--Choisir--</option>
                                    <option value="IN">IN</option>
                                    <option value="EX">EX</option>
                                </select>
                                @error('orientation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>                            

                            {{-- <div class="col-sm-12 mt-3">
                                <label for="mettre">Type<sup>2</sup <span>*</span></label>
                                <select name="mettre" id="mettre" class="form-control">
                                    <option value="">--Choisir--</option>
                                    <option value="">12M<sup>2</sup></option>
                                </select>
                                @error('mettre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
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