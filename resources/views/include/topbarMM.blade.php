<nav class="navbar navbar-header navbar-expand-lgM" data-background-color="blue2">				
	<div class="container-fluid">
		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
			<li class="nav-item toggle-nav-search hidden-caret">
				<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
					<i class="fa fa-search"></i>
				</a>
			</li>
			<!-- <li class="nav-item dropdown hidden-caret">
				<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-envelope"></i>
				</a>
				<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
					<li>
						<div class="dropdown-title d-flex justify-content-between align-items-center">
							Messages 									
							<a href="#" class="small">Mark all as read</a>
						</div>
					</li>
					<li>
						<div class="message-notif-scroll scrollbar-outer">
							<div class="notif-center">
								<a href="#">
									<div class="notif-img"> 
										<img src="{{asset('assets_v2/img/jm_denis.jpg')}}" alt="Img Profile">
									</div>
									<div class="notif-content">
										<span class="subject">Jimmy Denis</span>
										<span class="block">
											How are you ?
										</span>
										<span class="time">5 minutes ago</span> 
									</div>
								</a>
								
							</div>
						</div>
					</li>
					<li>
						<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
					</li>
				</ul>
			</li> -->

			<!-- <li class="nav-item dropdown hidden-caret">
				<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-bell"></i>
					<span class="notification">4</span>
				</a>
				<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
					<li>
						<div class="dropdown-title">You have 4 new notification</div>
					</li>
					<li>
						<div class="notif-scroll scrollbar-outer">
							<div class="notif-center">
								<a href="#">
									<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
									<div class="notif-content">
										<span class="block">
											New user registered
										</span>
										<span class="time">5 minutes ago</span> 
									</div>
								</a>
							</div>
						</div>
					</li>
					<li>
						<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
					</li>
				</ul>
			</li> -->

			<li class="nav-item dropdown hidden-caret">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
					<div class="avatar-sm">
						<img src="{{asset('assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
					</div>
				</a>
				<ul class="dropdown-menu dropdown-user animated fadeIn">
					<div class="dropdown-user-scroll scrollbar-outer">
						<li>
							<div class="user-box">
								<div class="avatar-lg"><img src="{{asset('assets/img/profile.jpg')}}" alt="image profile" class="avatar-img rounded"></div>
								<div class="u-text">
									<h4>Hizrian</h4>
									<p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">My Profile</a>
							
							<div class="dropdown-divider"></div>
							<a href="route('logout')" class="btn btn-primary btn-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>Déconnexion</b></a>
							<form id="logout-form" method="POST" action="{{ route('logout') }}" class="mt-5M">
								@csrf
							</form>
							<!-- <a class="dropdown-item" href="#">Logout</a> -->
						</li>
					</div>
				</ul>
			</li>
		</ul>
	</div>
</nav>