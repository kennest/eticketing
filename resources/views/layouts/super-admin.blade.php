<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }} | Tableau de Bord</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet"> {!! Charts::styles() !!}
	<style>
		.logo {
			background-image: url("../imgs/logo.png");
			background-repeat: no-repeat;
		}
	</style>
</head>

<body id="adminlogin">
		<!--Navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="#">
				<img alt="Brand" src="{{asset('imgs/logo.png')}}">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
			 aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item {{{ (Request::is('superadmin') ? 'active' : '') }}}">
						<a class="nav-link" href="{{route('supadmin.index')}}">Tableau de bord
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item {{{ (Request::is('superadmin/organisateurs') ? 'active' : '') }}}">
						<a class="nav-link" href="{{route('supadmin.org')}}">Organisateur</a>
					</li>
					<li class="nav-item {{{ (Request::is('superadmin/parametres') ? 'active' : '') }}}">
						<a class="nav-link" href="{{route('supadmin.params')}}">Parametres</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
						 aria-expanded="true">
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
							<li class="dropdown-item">
								<a class="" href="#">Profil</a>
							</li>
							<li class="dropdown-item">
								<a class="" href="#">Stats</a>
							</li>
							<li class="dropdown-item">
								<a class="" href="{{route('admin.logout')}}">Se Deconnecter</a>
							</li>
						</ul>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search">
					<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</nav>
		<!--/.Navbar-->
		<div class="container">
			@yield('content')
    </div>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	@yield('scripts')
</body>

</html>