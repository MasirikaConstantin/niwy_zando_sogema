@extends('layout.main')
@section('title', 'Recherche un vendeur')
@section('styles')
<style>
    
</style>
@endsection
@section('content')
<div class="page-inner">
    <div class="row justify-content-center">
        <div class="col-md-9 card">
            <form id="formSend" action="{{route('searchVendeurStore')}}" method="get">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <input type="text" name="searchForm" id="searchForm" class="form-control @error('searchForm') is-invalid @enderror" value="KN/ZD/2024/" placeholder="code unique" aria-describedby="emailHelp" />
                        @error('searchForm')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <button id="btnSend" class="btn btn-primary form-control mt-3M">Recherche</button>
                    </div>                    
                </div>
            </form>
        </div>
    </div>

    @if(!empty($vendeur))
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="row pl-4 mt-4">
                    <div class="col-sm-12">
                        <h3><strong>Code trouvé: {{$vendeur->code_unique}}</strong></h3>
                    </div>
                </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('Nom')}}</th>
                                <th>{{ __('Postnom')}}</th>
                                <th>{{ __('Prenom')}}</th>
                                <th>{{ __('Sexe')}}</th>
                                <th>{{ __('Telephone') }}</th>
                                <th>Numéro bancaire</th>
                                <th>{{ __('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($vendeur->etat == "attente")
                            <tr>
                                <td colspan="7" class="text-danger">Impossible de faire le paiement</td>
                            </tr>
                            @else
                                <tr>
                                    <td>@if(!empty($vendeur->nom)){{ $vendeur->nom}}@endif</td>
                                    <td>@if(!empty($vendeur->postnom)){{ $vendeur->postnom }}@endif</td>
                                    <td>@if(!empty($vendeur->prenom)){{ $vendeur->vendeur}}@endif</td>
                                    <td>@if(!empty($vendeur->sexe)){{ $vendeur->sexe}}@endif</td>
                                    <td>@if(!empty($vendeur->telephone)){{ $vendeur->telephone}}@endif</td>
                                    <td>{{$vendeur->numCompteBancaire}}</td>
                                    <td class="text-center"> 
                                        @if($vendeur->etat == 'payer')
                                        <span class="text-danger">Déjà payé</span>
                                        @elseif($vendeur->etat == 'traiter')
                                            <a class="dropdown-itemM btnM btn-hover mr-1" href="#" data-toggle="modal" data-target="#addNumBanque"  title="Ajouter les information de la banque"><i class="fa fa-edit m-r-5" style="font-size: 20px;"></i></a>   
                                        @endif                                
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="modal custom-modal fade" id="addNumBanque" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3 style="text-align: center">Ajouter numéro du compte bancaire</h3>
                    </div>
                    <br />
                    <div class="modal-btn delete-action">
                        <form id="formSendModif" action="{{ route('vendeurUpdateBanque',$vendeur->id) }}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <input type="text" name="numCompte" id="numCompte" value="" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="submit" id="btnSendModif" class="btn btn-block bg_background colorText">Enregistrer</button>
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
    @endif

</div>
@endsection

@section('scripts')
<script>
    document.getElementById('formSend').addEventListener('submit', function(e) {
        //e.preventDefault();
        document.getElementById('btnSend').innerHTML = "En cours...";
        document.getElementById('btnSend').setAttribute("disabled", true);
    });

    document.getElementById('formSendModif').addEventListener('submit', function(e) {
        //e.preventDefault();
        document.getElementById('btnSendModif').innerHTML = "En cours...";
        document.getElementById('btnSendModif').setAttribute("disabled", true);
    });
</script>
@endsection