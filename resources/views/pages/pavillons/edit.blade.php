@extends('layout.main')
@section('title', 'Liste des pavillons')
@section('styles')
<style>
    
</style>
@endsection
@section('content')
<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="card mt-5">                              
                <div class="card-body">
                    <div class="card-title mb-3">
                        <h4>Modification Pavillon</h4>
                    </div> 

                    <form id="formSend" action="{{route('pavillon.update', $pavillon->id)}}" method="POST">
                        @csrf
                        <div class="row mt-2 ml-2M">
                            <div class="col-sm-12">
                                <input type="text" name="nom" id="nom" value="{{$pavillon->numero}}" class="form-control" placeholder="Saisir le nom du pavillon" required />
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
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <button id="btnSend" type="submit" class="btn btn-block btn-primary">Enregistrer</button>
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
{{-- <script src="{{asset('assets/js/axios.min.js')}}"></script> --}}
<script>
    document.getElementById('formSend').addEventListener('submit', function(e){
        document.getElementById('btnSend').innerHTML = "En cours ...";
        document.getElementById('btnSend').setAttribute("disabled", true);
    });
</script>

@endsection