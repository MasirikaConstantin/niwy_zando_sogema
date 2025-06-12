@extends('layout.main')
@section('title', 'Liste des vendeurs')
@section('styles')
<style>
    
</style>
@endsection

@section('content')
<div class="row pl-4 pr-4 mt-5 justify-content-center">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="card">
            <h3 class="card-title pl-4 pt-3">Liste de place concernant: <strong>{{$vendeur->nom}} {{$vendeur->postnom}} {{$vendeur->prenom}}</strong> </h3>
            {{-- <h2 class="card-title pl-4 pt-3">
                {{$vendeur->nom}} {{$vendeur->postnom}} {{$vendeur->prenom}}
            </h2> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table id="simpletable_dataTable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                {{-- <th class="text-center">{{ __('N°')}}</th> --}}
                                {{-- <th class="text-center">{{ __('Noms')}}</th>                                 --}}
                                <th class="text-center">{{ __('Place')}}</th>
                                <th class="text-center">{{ __('Quantité')}}</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody id="myTab">
                            @forelse ($vendeurDemande as $item)
                                <tr>
                                    {{-- <td class="text-center"></td> --}}
                                    {{-- <td class="text-center">{{$vendeur->nom}} {{$vendeur->postnom}} {{$vendeur->prenom}}</td> --}}
                                    <td class="text-center">{{$item->placeNom}} {{$item->placeType}}</td>
                                    <td class="text-center">
                                        {{$item->placeNumber}}
                                    </td>
                                    <td class="text-center">
                                        <a id="btnSend{{$loop->index}}" href="{{route("vend.contratImprimer", ['placeName' => $item->placeNom, 'placeType' => $item->placeType,'vendeurId'=>$vendeur->id])}}" onclick="btnSend({{$loop->index}})" class="btn btn-primary">Imprimer</a>
                                    </td>
                                </tr>
                            @empty 
                            <tr>
                                <td colspan="3">
                                    <h3 class="text-danger text-center">Pas de données ou il doit faire un paiement </h3>
                                </td>
                            </tr>                               
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- <script src="{{asset('assets/plugins/jquery_print/dist/jQuery.print.min.js')}}"></script> --}}
<script>
    function btnSend(idLigne)
    {
        // document.getElementById('btnSend'+idLigne).addEventListener('click', function(e) {
            document.getElementById('btnSend'+idLigne).innerHTML = " En cours...";
            document.getElementById('btnSend'+idLigne).setAttribute("disabled", true);
        // });
    }
</script>
@endsection