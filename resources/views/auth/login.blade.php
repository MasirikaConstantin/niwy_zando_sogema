<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('assets/img/icon.ico')}}" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{asset('assets/css/fonts.min.css')}}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files {{asset('')}} -->
	<link rel="stylesheet" href="{{asset('assets/login/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/login/css/atlantis.css')}}" />
    <style>
        /* .bg-secondary-gradient{
            background-color: #1D6FB8 !important;
        } */
        .bg-Color {
            background-color: #1D6FB8 !important;
        }
        .btn-Color {
            background-color: #1D6FB8 !important;
            color: #ffffff;
        }
    </style>
</head>
<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradientM bg-Color">
			<h1 class="title fw-bold text-white mb-3">SOGEMA</h1>
			<p class="subtitle text-white op-7">CREATES A SOLUTION FOR YOU</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <form id="formSend" method="POST" action="{{ route('login') }}">
                @csrf            
                <div class="container container-login container-transparent animated fadeIn">
                    <div class="row">
                        <div class="col-sm-8">
                            <img src="{{asset('assets/img/logoSogema.png')}}" alt="Logo sogema" style="height: 100px;" />
                        </div>
                    </div>
                    <h3 class="text-center mt-3">Connexion</h3>
                    <div class="login-form">
                        <div class="form-group">
                            <label for="username" class="placeholder"><b>Email</b></label>
                            <input id="username" name="email" id="email" type="text" class="form-control" required />
                            
                            @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="placeholder"><b>Password</b></label>
                            <!-- <a href="#" class="link float-right">Forget Password ?</a> -->
                            <div class="position-relative">
                                <input id="password" name="password" id="password" type="password" class="form-control" required />
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-action-d-flex mb-3">
                            <div class="custom-control custom-checkbox">
                                <!-- <input type="checkbox" class="custom-control-input" id="rememberme"> -->
                                <!-- <label class="custom-control-label m-0" for="rememberme">Remember Me</label> -->
                            </div>
                            <!-- <a href="#" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign In</a> -->
                            <button id="btnSend" type="submit" class="btn btn-secondaryM btn-Color col-md-5 float-right mt-3 mt-sm-0 fw-bold">Connexion</button>
                        </div>
                        <!-- <div class="login-account">
                            <span class="msg">Don't have an account yet ?</span>
                            <a href="#" id="show-signup" class="link">Sign Up</a>
                        </div> -->
                    </div>
                </div>
            </form>
		</div>
	</div>
	<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<!-- <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script> -->
	<script src="{{asset('assets/js/atlantis.min.js')}}"></script> 
    <script>
        document.getElementById('formSend').addEventListener('submit', function(e) {
            //e.preventDefault();
            document.getElementById('btnSend').innerHTML = "En cours...";
            document.getElementById('btnSend').setAttribute("disabled", true);
        });
    </script>
</body>
</html>