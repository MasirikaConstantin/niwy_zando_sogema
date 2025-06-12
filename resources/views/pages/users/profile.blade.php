@extends('layout.main')
@section('title', "Modification d'un utilisateurs")
@section('styles')
<style>
    
</style>
@endsection
@section('content')
<div class="row pl-5 pr-5 mt-3">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card mt-2">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <h5 style="font-weight: bold;" style="text-transform: uppercase">Modification profile</h5>
                    </div>
                </div>
                <form id="formSend" action="{{route('user.monCompteUpdate', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nom<span class="isRequired"> *</span></label>
                                <input class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $user->nom }}" type="text">
                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Postnom</label>
                                <input class="form-control @error('postnom') is-invalid @enderror" name="postnom" value="{{ $user->postnom }}" type="text">
                                @error('postnom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Prenom</label>
                                <input class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $user->prenom }}" type="text">
                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Sexe<span class="isRequired"> *</span></label>
                                <select name="sexe" class="form-control @error('sexe') is-invalid @enderror">
                                    <option value="" selected>----Choisir----</option>
                                    <option value="Homme" {{$user->sexe == "Homme" ? 'selected' : ""}}>{{ __('Homme') }}</option>
                                    <option value="Femme" {{$user->sexe == "Femme" ? 'selected' : ""}}>{{ __('Femme') }}</option>
                                </select>
                                @error('sexe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Email<span class="isRequired"> *</span></label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" type="email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <div class="form-group">
                                <label>Profile</label>                               
                                <div class="input-file input-file-image" style="display: flex; flex-direction: row; align-items: center; gap: 12px;">
                                    <img class="img-upload-preview img-circleM imgHidden" id="imageOpen" style="width: 100px; height: 100px; display: none; object-fit: cover;" src="http://placehold.it/100x100" alt="preview" />
                                    @if($user->avatar != "")
                                        <img class="img-upload-preview img-circleM" id="imageOpenExiste" style="width: 100px; height: 100px; object-fit: cover;" src="{{asset('uploaded_files/'.$user->avatar)}}" alt="preview" />
                                    @endif
                                    <div>
                                        <input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*" />
                                        <label for="uploadImg" class=" label-input-file btn btn-primary">Télécharger la photo</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 offset-md-4M">
                            <div class="form-group">
                                <label><span class="isRequired" style="color: #ffffff !important;">-saved</span></label>
                                <button id="btnSend" type="submit" class="btn btn-blockM btn-primary submit-btn">Sauvegarder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <h5 style="font-weight: bold;" style="text-transform: uppercase">Modification mot de passe</h5>
                    </div>
                </div>
                <form id="formSendPwd" action="{{route('user.monCompteUpdatePwd', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Mot de passe actuel<span class="isRequired"> *</span></label>
                                <input class="form-control @error('pwd') is-invalid @enderror" name="pwd" type="text" autocomplete="off" required />
                                @error('pwd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nouveau mot de passe<span class="isRequired"> *</span></label>
                                <input class="form-control @error('pwdNouveau') is-invalid @enderror" name="pwdNouveau" type="text" autocomplete="off" required />
                                @error('pwdNouveau')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="col-md-2 offset-md-4M">
                            <div class="form-group">
                                <label><span class="isRequired" style="color: #ffffff !important;">-saved</span></label>
                                <button id="btnSendPwd" type="submit" class="btn btn-blockM btn-primary submit-btn">Sauvegarder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        document.getElementById('formSend').addEventListener('submit', function(e){
            document.getElementById('btnSend').innerHTML = "En cours ...";
            document.getElementById('btnSend').setAttribute("disabled", true);
        });

        document.getElementById('formSendPwd').addEventListener('submit', function(e){
            document.getElementById('btnSendPwd').innerHTML = "En cours ...";
            document.getElementById('btnSendPwd').setAttribute("disabled", true);
        });

        document.getElementById('uploadImg').addEventListener('change', function(e){
            let nameImage = document.getElementById('uploadImg').files[0];
            let reader = new FileReader();
            reader.readAsDataURL(nameImage);
            reader.addEventListener('load', (event) => displayImage(event, nameImage));
        });
        function displayImage(event, nameImage){
            document.querySelector(".imgHidden").style.display = 'block';
            document.getElementById('imageOpen').src = event.target.result;
            //console.log(event.target.result);
            document.querySelector("#imageOpenExiste").style.display = 'none';            
        }
    </script>
@endsection