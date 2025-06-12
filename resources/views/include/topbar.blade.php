<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">				
	<div class="container-fluid">					
		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
			<li class="nav-item toggle-nav-search hidden-caret">
				<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
					<i class="fa fa-search"></i>
				</a>
			</li>
		
			<li class="nav-item dropdown hidden-caret">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
					<div class="avatar-sm">
						<!-- profilSogema.png  ../assets/img/profile.jpg -->
						{{-- <img src="{{asset('assets/img/profilSogema.png')}}" alt="..." class="avatar-img rounded-circle"> --}}
						<img src="{{asset('uploaded_files/'. Auth::user()->avatar)}}" alt="..." class="avatar-img rounded-circle">
					</div>
				</a>
				<ul class="dropdown-menu dropdown-user animated fadeIn">
					<div class="dropdown-user-scroll scrollbar-outer">
						<li>
							<div class="user-box">
								<div class="avatar-lg">
									{{-- <img src="{{asset('assets/img/profilSogema.png')}}" alt="image profile" class="avatar-img rounded"> --}}
									<img src="{{asset('uploaded_files/'. Auth::user()->avatar)}}" alt="image profile" class="avatar-img rounded">
								</div>
								<div class="u-text">
									<h4>{{Auth::user()->fullname()}}</h4>
									<p class="text-muted">{{Auth::user()->email}}</p>
									<p class="text-muted">{{Auth::user()->role->name}}</p>
									<!-- <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a> -->
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							@auth
							<a class="dropdown-item" href="{{route('monCompte', auth()->user()->id)}}">Mon compte</a>
							@endauth
							<div class="dropdown-divider"></div>
							<a href="route('logout')" class="btn btn-primary btn-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>Déconnexion</b></a>
							<form id="logout-form" method="POST" action="{{ route('logout') }}" class="mt-5M">
								@csrf
							</form>
						</li>
					</div>
				</ul>
			</li>
		</ul>
	</div>
</nav>