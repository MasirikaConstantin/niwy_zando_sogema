<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('assets/img/icon.ico')}}" type="image/x-icon"/>
	
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
    </style>
	@yield('styles')
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">				
				<a href="{{route('dashboard')}}" class="logo text-center text-white" style="font-weight: bold; font-size: 20px;">
                    <!-- <img src="{{asset('assets/img/logo.svg')}}" alt="navbar brand" class="navbar-brand"> -->
                    <!-- <img src="{{asset('assets/img/logoSogema.png')}}" alt="navbar brand" class="navbar-brand" style="height: 100px;" /> -->
					<!-- <span>Niwy Zando</span> -->
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
	<!--   Core JS Files  -->
	<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery UI -->
	<script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- Moment JS -->
	<script src="{{asset('assets/js/plugin/moment/moment.min.js')}}"></script>

	<!-- Bootstrap Toggle -->
	<script src="{{asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

	<script src="{{asset('assets/js/plugin/bootstrap-wizard/bootstrapwizard.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


	<!-- Chart JS -->
	<script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify {{asset('assets_v2/')}} -->
	<script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Sweet Alert -->
	<!-- <script src="{{asset('assets_v2/js/plugin/sweetalert/sweetalert.min.js')}}"></script> -->

	<!-- Atlantis JS -->
	<!-- <script src="{{asset('assets_v2/js/bootstrapwizard.js')}}"></script> -->
	<script src="{{asset('assets/js/atlantis.min.js')}}"></script>
	
	<!-- Select2 -->
	<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{asset('assets/js/setting-demo.js')}}"></script>
	<script src="{{asset('assets/js/demo.js')}}"></script>
	<script src="{{asset('assets/js/axios.min.js')}}"></script>

	<script>
		$(document).ready(function() {
    		$('.selected2').select2();
    	});
	</script>
    
	@yield('scripts')
</body>
</html>