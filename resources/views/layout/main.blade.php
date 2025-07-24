<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('assets/img/icon.ico')}}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- <script src="https://cdn.tailwindcss.com"></script> -->
	<!-- Fonts and icons -->
	<script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>

	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset("assets/css/fonts.min.css")}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- <script>
	@ vite(['resources/css/app.css', 'resources/js/app.js'])

		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script> -->

	<!-- CSS Files -->
	<!-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/css/atlantis.css')}}" />
	<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}" /> -->

	<!-- CSS Just for demo purpose, don't include it in your project -->
	
	<link rel="stylesheet" href="{{asset('assets/myAllCss.css')}}" />
	<!-- <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" /> -->
    <style>
        .logo-header[data-background-color="blue"] {
            /* background: #1572E8 !important; */
            background: #1D6FB8 !important;
            /* background: none !important; */
        }
        .navbar-header[data-background-color="blue2"] {
            /* background: #1269DB !important; */
            background: #1D6FB8 !important;
            /* background: none !important; */
        }
        .sidebar, .sidebar[data-background-color="white"] {
            /* background: #37A9E1 !important; */
            background: #1D6FB8 !important;
        }

        .sidebar.sidebar-style-2 .nav.nav-primary > .nav-item.active > a {
            /* background: #1572E8 !important; */
            /* background: #37A9E1 !important; */
            background: #ffffff30 !important;
        }

        .colorText{
            color: #ffffff !important;
        }

		.bg_background{
			background: #1D6FB8 !important;
		}

		/* style.css */
		.loader {
			border: 16px solid #f3f3f3; /* Light grey */
			border-top: 16px solid #3498db; /* Blue */
			border-radius: 50%;
			width: 120px;
			height: 120px;
			animation: spin 2s linear infinite;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(560deg); }
		}

		/* #mySaveLoader{
			z-index: 100000;
			position: absolute;
			
			width: 100%;
			margin: auto;
			border: 2px solid red;
		}
		#mySaveLoader img{
			position: relative;
			top: 30%;
		} */
		.dropdownActive:hover{
			background: #85787830 !important;
			font-size: 16px !important;
    	}
		.dropdownActive{
			font-size: 14px !important;
		}

		.isRequired{
        	font-weight: bold;
        	font-size: 18px;
			color: red;
    	}

		.form-control {
			border-color: #c9c9c9 !important;
		}
    </style>
	@yield('styles')
</head>
<body>
	
	{{-- <div id="loader" class="loader"></div> --}}

	<!-- <div id="mySaveLoader" class="col-sm-12M">
    	<img src="{{asset('assets/img/loading.gif')}}" alt="img loading"/>
    </div> -->

	{{-- style="display:none;" --}}
	<div id="content" class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">				
				<a href="{{route('dashboard')}}" class="logo text-center text-white" style="font-weight: bold; font-size: 20px;">
                    <!-- <img src="{{asset('assets/img/logo.svg')}}" alt="navbar brand" class="navbar-brand"> -->
                    <!-- <img src="{{asset('assets/img/logoSogema.png')}}" alt="navbar brand" class="navbar-brand" style="height: 100px;" /> -->
					<span>SOGEMA</span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			@include('include.topbar')
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		@include('include.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content"> 

				@yield('contentHeader')

				@yield('content')
				
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<!-- <nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav> -->
					<div class="copyright ml-auto">
						<!-- 2024, <i class="fa fa-heart heart text-danger"></i> by <a href="">Niwy Sogema zando</a> -->
					</div>				
				</div>
			</footer>
		</div>
		
	</div>
	
	<script src="{{asset('assets/js/myAllJs.js')}}"></script>

	<script>
		$(document).ready(function() {

    		//$('.selected2').select2();

			// window.addEventListener("load", function() {
			// 	const loader = document.getElementById("loader");
			// 	const content = document.getElementById("content");

			// 	loader.style.display = "none";
			// 	content.style.display = "block";
			// 	$('.selected2').select2();
			// });

			//$('#myTabable').DataTable();
			// $('#btnPrint').click(function(){
            // 	$("#tabOffPrint").print();
          	// 	//window.print();
        	// });

			//$('#myTabable').DataTable();
    	});
		
	</script>
    
	@yield('scripts')
</body>
</html>