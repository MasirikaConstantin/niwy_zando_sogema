<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<ul class="nav nav-primary">
				<!-- {{request()->segment(1) == 'dashbord' ?'active': ''}} -->
				<li class="nav-item @if(request()->segment(1) == 'dashbord' || request()->segment(1) == 'home' || request()->segment(1) == '') active @endif mb-2">
					<a href="{{route('dashboard')}}">
						<i class="fas fa-home mr-3 colorText"></i>
						<p class="colorText">Tableau de bord</p>
						<!-- <span class="badge badge-success">4</span> -->
					</a>
				</li>

				@if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "Admin" || Auth::user()->role->name == "AgentTerrain" || Auth::user()->role->name == "DG")

				<li class="nav-item {{request()->segment(1) == 'vendeur' ? 'submenu active': ''}}">
					<a data-toggle="collapse" href="#dashboard" class="collapsedM" aria-expanded="false">
						<i class="fas fa-store mr-3 colorText"></i>
						<p class="colorText">Vendeurs</p>
						<span class="caret colorText"></span>
					</a>
					<div class="collapse {{request()->segment(1) == 'vendeur' ? 'show': ''}}" id="dashboard">
						<ul class="nav nav-collapse">
							<li>
								{{-- <a href="{{route('vend.create')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'create' ? 'border pl-2 pr-2': ''}}">Création</span>
								</a> --}}
								<a href="{{route('selectChoixSave')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'create' ? 'border pl-2 pr-2': ''}}">Création</span>
								</a>
							</li>

							<li>
								<a href="{{route('dossier.index')}}">
									<span class="sub-item colorText {{request()->segment(1) == 'dossier' ? 'border pl-2 pr-2': ''}}">Dossier</span>
								</a>
							</li>
							@if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "Admin")
							<li>
								<a href="{{route('vend.index')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'liste' ? 'border pl-2 pr-2': ''}}">Liste</span>
								</a>
							</li>

							
							@endif
							<li>
								<a href="{{route('vend.listVendeurParEtat','attente')}}">
									<span class="sub-item colorText {{request()->segment(3) == 'attente' ? 'border pl-2 pr-2': ''}}">En attente</span>
								</a>
							</li>
							@if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "Admin" || Auth::user()->role->name == "DG")
							<li>
								<a href="{{route('vend.listVendeurParEtat','traiter')}}">
									<span class="sub-item colorText {{request()->segment(3) == 'traiter' ? 'border pl-2 pr-2': ''}}">Traité</span>
								</a>
							</li>									

							<li>
								<a href="{{route('vend.listVendeurParEtat','valider')}}">
									<span class="sub-item colorText {{request()->segment(3) == 'valider' ? 'border pl-2 pr-2': ''}}">Validé</span>
								</a>
							</li>
							<li>
								<a href="{{route('vend.listVendeurParEtat','payer')}}">
									<span class="sub-item colorText {{request()->segment(3) == 'payer' ? 'border pl-2 pr-2': ''}}">Payé</span>
								</a>
							</li>
							{{-- <li>
								<a href="{{route('vend.delaiPaiementDepasse')}}">
									<span class="sub-item colorText {{request()->segment(3) == 'delai-paiement-depasse' ? 'border pl-2 pr-2': ''}}">Délai de paiement dépassé</span>
								</a>
							</li> --}}
							@endif
						</ul>
					</div>
				</li>
				@endif

				<!-- <li class="nav-item active">
					<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="dashboard">
						<ul class="nav nav-collapse">
							<li>
								<a href="">
									<span class="sub-item">créer vendeur</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="sub-item">Liste vendeur</span>
								</a>
							</li>
						</ul>
					</div>
				</li> -->
				
				<!-- <li class="nav-item active mb-2">
					<a href="">
						<i class="fas fa-store mr-3"></i>
						<p>Vendeurs</p>
						<span class="badge badge-success">4</span>  vend.createv2
					</a>
				</li> -->

				{{-- <li class="nav-item mb-2 {{request()->segment(1) == 'article' ? 'submenu active': ''}}">
					<a href="{{route('article.index')}}">
						<i class="fas fa-newspaper colorText"></i>
						<p class="colorText">Article</p>
					</a>
				</li> --}}

				{{-- <li class="nav-item mb-2 {{request()->segment(1) == 'emplacement' ? 'submenu active': ''}}">
					<a href="{{route('emplacement.index')}}">
						<i class="fas fa-newspaper colorText"></i>
						<p class="colorText">Emplacement</p>
					</a>
				</li> --}}

				{{-- <li class="nav-item activeM mb-2">
					<a href="">
						<i class="fas fa-road colorText"></i>
						<p class="colorText">Pavillon</p>
					</a>
				</li> --}}

				@if(Auth::user()->role->name == "Super Admin")
				<li class="nav-item mb-2 {{request()->segment(1) == 'user' ? 'submenu active': ''}}">
					<a href="{{route('user.index')}}">
						<i class="fas fa-users colorText"></i>
						<p class="colorText">Utilisateur</p>
					</a>
				</li>
				@endif

				@if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "Banque")
				<li class="nav-item mb-2 {{request()->segment(1) == 'search' ? 'submenu active': ''}}">
					<a href="{{route('searchVendeurForm')}}" class="nav-link active">
						<i class="fas fa-store mr-3 colorText"></i>
						<p class="colorText">Recherche vendeur</p>
					</a>
				</li>
				@endif

				@if(Auth::user()->role->name == "Super Admin" || Auth::user()->role->name == "Admin")
				<li class="nav-item {{request()->segment(1) == 'parametre' ? 'submenu active': ''}}">
					<a data-toggle="collapse" href="#parametre" class="collapsed" aria-expanded="false">
						<i class="fa fa-cog mr-3 colorText"></i>
						<p class="colorText">Paramètre</p>
						<span class="caret colorText"></span>
					</a>
					<div class="collapse {{request()->segment(1) == 'parametre' ? 'show': ''}}" id="parametre">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('pavillon.index')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'pavillon' ? 'border pl-2 pr-2': ''}}">Pavillon</span>
								</a>
							</li>

							<li>
								<a href="{{route('typePlace.index')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'typeplace' ? 'border pl-2 pr-2': ''}}">Type de place</span>
								</a>
							</li>

							<li>
								<a href="{{route('place.index')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'place' ? 'border pl-2 pr-2': ''}}">Place</span>
								</a>
							</li>

							<li>
								<a href="{{route('emplacement.index')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'emplacement' ? 'border pl-2 pr-2': ''}}">Emplacement</span>
								</a>
							</li>

							<li>
								<a href="{{route('article.index')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'article' ? 'border pl-2 pr-2': ''}}">Article</span>
								</a>
							</li>							
						</ul>
					</div>
				</li>

				<li class="nav-item {{request()->segment(1) == 'statistique' ? 'submenu active': ''}}">
					<a data-toggle="collapse" href="#statistique" class="collapsed" aria-expanded="false">
						<i class="flaticon-graph mr-3 colorText"></i>
						<p class="colorText">Statistique</p>
						<span class="caret colorText"></span>
					</a>
					<div class="collapse {{request()->segment(1) == 'statistique' ? 'show': ''}}" id="statistique">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{route('statistiquePavillons')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'pavillons' ? 'border pl-2 pr-2': ''}}">Pavillon</span>
								</a>
							</li>
							<li>
								<a href="{{route('statistiquePlace')}}">
									<span class="sub-item colorText {{request()->segment(2) == 'places' ? 'border pl-2 pr-2': ''}}">Place</span>
								</a>
							</li>														
						</ul>
					</div>
				</li>
				@endif						

				<!-- <li class="mx-4 mt-2">
					<a href="http://themekita.com/atlantis-bootstrap-dashboard.html" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span>Buy Pro</a> 
				</li> -->
			</ul>
		</div>
	</div>
</div>