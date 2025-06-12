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
            <div class="card-body">
                <div class="table-responsive">
                    <h3 class="card-title pl-4 pt-3 text-center" style="text-transform: uppercase;">
                        Contrat non disponoble pour le <br />
                        <strong class="bg-warning"> {{$placeNames}}</strong>
                    </h3> 
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