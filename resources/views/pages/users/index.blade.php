@extends('layout.main')
@section('title', 'Liste des utilisateurs')
@section('styles')
    {{-- <link rel="stylesheet" href="{{asset('assets/js/plugin/datatables/datatables.min.js')}}" /> --}}
<style>
    
</style>
@endsection
@section('content')
<div class="row pl-4 pr-4 mt-3">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row mt-4 pl-4 pr-3 mb-2" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between ;">
            <div>
                <h4 style="font-weight: bold;">Liste des utilisateurs</h4>
            </div>
            <div>
                <a href="{{route('user.create')}}" class="btn bg_background colorText">Ajout un utiliteur</a>
            </div>
        </div>

        <div class="card">
            <div class="row">
                {{-- <div class="col-sm-8">
                    <form action="{{route('seacheuser')}}" method="GET">
                        <div class="row mt-2 ml-2">
                            <div class="col-sm-12 col-md-8 col-lg-8">
                                <input type="text" name="q" id="q" value="{{request()->get('q')}}" class="form-control" placeholder="recherche par Username ou Nom est prenom" />
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div> --}}
                <div class="col-sm-4 bg-successM text-rightM  pr-4 pl-5 mt-2">
                    Total&nbsp;
                    <span class="badge badge-light" style="font-size: 18px;">{{ $users_count }}</span>
                </div>
                {{-- <input type="text" id="myInputRecherche" placeholder="Recherche" /> --}}
            </div>
            <div class="card-body">
                <div class="dt-responsiveM table-responsive">
                    <table id="simpletable_dataTable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('Nom')}}</th>
                                <th>{{ __('Postnom')}}</th>
                                <th>{{ __('Prenom')}}</th>
                                <th>{{ __('Sexe')}}</th>
                                <th>{{ __('Rôle') }}</th>
                                @if(Auth::user()->role->name == "Super Admin")
                                <th>{{ __('Username') }}</th>
                                @endif
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->nom}}</td>
                                <td>{{ $item->postnom }}</td>
                                <td>{{ $item->prenom}}</td>
                                <td>{{ $item->sexe}}</td>                                    
                                <td>{{ $item->role->name}}</td>
                                @if(Auth::user()->role->name == "Super Admin")
                                <td>{{ $item->email}}</td>
                                @endif
                                <td>
                                    @if ($item->status == "1")
                                    <span class="btn-sm btn-primary">Active</span>
                                    @else
                                    <span class="badge bg-danger text-white">Desactivé</span>
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::user()->role->name == "Super Admin")
                                    <!-- <a class="dropdown-itemM btnM btn-hover mr-1" href="{{ route('dashboard',[$item->id]) }}" title="Détails"><i class="fa fa-th m-r-5"></i></a> -->
                                    {{-- <a class="dropdown-itemM btnM btn-hover mr-1" href="{{ route('user.edit',[$item->id]) }}" title="Modifier"><i class="fa fa-edit m-r-5"></i></a> --}}
                                    <!-- <a class="dropdown-itemM btnM btn-darkM btn-hover" href="#" data-toggle="modal" data-target="#delete{{ $item->id }}" title="Supprimer"><i class="fa fa-trash m-r-5"></i></a> -->
                                    {{-- <a class="dropdown-itemM btnM btn-darkM btn-hover" href="#" data-toggle="modal" data-target="#status{{ $item->id }}" title="Changer status"><i class="fas fa-eye-slash ml-2"></i></a> --}}
                                    @endif
                                    {{-- <a class="dropdown-itemM btnM btn-hover mr-1" href="{{ route('user.angentSaved',[$item->id]) }}" title="Voir enregistrement par agent"><i class="fas fa-plus ml-3"></i></a> --}}

                                    {{-- @if(Auth::user()->role->name == "Super Admin")
                                    <a class="dropdown-itemM btnM btn-hover mr-1" href="{{ route('user.angentSaved',[$item->id]) }}" data-toggle="modal" data-target="#passwordreset{{ $item->id }}" title="Reinitialiser le mot de passe"><i class="fa fa-undo"></i></a>
                                    @endif --}}
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn bg_background colorText dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                              Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item dropdownActive" href="{{ route('user.edit',[$item->id]) }}" title="Modifier">
                                                    <i class="fa fa-edit m-r-5M"></i> Modification
                                                </a>

                                                <a class="dropdown-item dropdownActive" href="#" data-toggle="modal" data-target="#status{{ $item->id }}" title="Changer status">
                                                    @if ($item->status == "1") 
                                                        <i class="fas fa-eye-slash ml-2M"></i> Desactiver 
                                                    @else
                                                        Activer
                                                    @endif
                                                </a>                                          
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal custom-modal fade" id="status{{ $item->id }}" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="form-header">
                                                <h3 style="text-align: center">@if ($item->status == "1") Desactiver! @else Actiiver! @endif</h3>
                                                <p style="text-align: center">Voulez-vous @if ($item->status == "1") Desactiver @else Activer @endif l'utilisateur {{$item->email}} ?</p>
                                            </div>
                                            <br>
                                            <div class="modal-btn delete-action">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a id="btnStatut{{$item->id}}" href="{{ route('userStatus',[$item->id]) }}" onclick="changeMessage('{{$item->id}}')" class="btn btn-danger btn-block">Oui</a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn-block btn" style="background-color: #969699 !important; color: #fff;">Annuler</a>
                                                    </div>
                                                </div>
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
                                                <p style="text-align: center">Voulez-vous supprimer ce projet {{ $item->intitule }}?</p>
                                            </div>
                                            <br>
                                            <div class="modal-btn delete-action">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="{{ route('dashboard') }}" method="POST">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button data-toggle="tooltip" type="submit" style="color:white" class="btn btn-danger btn-block">
                                                                Supprimer
                                                            </button>
                                                        </form>
                                                        {{-- <a href="javascript:void(0);" class="btn btn-danger btn-block">Supprimer</a> --}}
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

                            <div class="modal custom-modal fade" id="passwordreset{{ $item->id }}" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="form-header">
                                                <h5 style="text-align: center">Voulez-vous reinitialiser le mot de passe de {{$item->email}} ?</h5>
                                                <p style="text-align: center"></p>
                                            </div>
                                            <br>
                                            <div class="modal-btn delete-action">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a href="{{ route('passewordReset',[$item->id]) }}" class="btn btn-primary btn-block">Oui</a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn-block btn btn-danger ">Annuler</a>
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
@endsection

@section('scripts')
<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>
<script>

    function changeMessage(idVal){
        // document.getElementById('formSend'+idVal).addEventListener('submit', function(e){
            document.getElementById('btnStatut'+idVal).innerHTML = "En cours ...";
            document.getElementById('btnStatut'+idVal).setAttribute("disabled", true);
        // });
    }

    $(document).ready(function() {
        // $('#simpletable_dataTable').DataTable({
        //     "paging": false,
        //     "ordering": false,
        // });

        //$(document).ready(function() {
            //window.addEventListener("DOMContentLoaded", function() {
                // var myTable = $('#simpletable_dataTable').DataTable({
                //     "paging": false,
                //     "ordering": false,
                // });

                // $('#myInputRecherche').on('keyup', function(){
                //     myTable.search(this.value).draw();
                // });
           // });
	    //});
	});
</script>
@endsection