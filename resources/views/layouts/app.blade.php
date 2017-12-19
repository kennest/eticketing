<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
	<div id="app">

		<header>
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
				<a class="navbar-brand" href="#">Carousel</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#">Disabled</a>
						</li>
					</ul>
					<form class="form-inline mt-2 mt-md-0">
						<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>
		</header>

		<main role="main">

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="first-slide" src="http://via.placeholder.com/1500x750" alt="First slide">
						<div class="container">
							<div class="carousel-caption text-left">
								<h1>Example headline.</h1>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam
									id dolor id nibh ultricies vehicula ut id elit.</p>
								<p>
									<a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>
								</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="second-slide" src="http://via.placeholder.com/1500x750" alt="Second slide">
						<div class="container">
							<div class="carousel-caption">
								<h1>Another example headline.</h1>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam
									id dolor id nibh ultricies vehicula ut id elit.</p>
								<p>
									<a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a>
								</p>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="third-slide" src="http://via.placeholder.com/1500x750" alt="Third slide">
						<div class="container">
							<div class="carousel-caption text-right">
								<h1>One more for good measure.</h1>
								<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam
									id dolor id nibh ultricies vehicula ut id elit.</p>
								<p>
									<a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>


			<!-- Marketing messaging and featurettes
      ================================================== -->
			<!-- Wrap the rest of the page in another container to center all the content. -->

			<div class="container marketing">

				<hr class="featurette-divider">
				<!-- Example row of columns -->
				<div class="row">
					<div class="col-lg-4">
						<img class="rounded" src="http://via.placeholder.com/140x140" alt="Generic placeholder image">
						<h2>Heading</h2>
						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum
							nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
						</p>
						<p>
							<a class="btn btn-primary" href="#" role="button">View details &raquo;</a>
						</p>
					</div>
					<div class="col-lg-4">
						<img class="rounded" src="http://via.placeholder.com/140x140" alt="Generic placeholder image">
						<h2>Heading</h2>
						<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum
							nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
						</p>
						<p>
							<a class="btn btn-primary" href="#" role="button">View details &raquo;</a>
						</p>
					</div>
					<div class="col-lg-4">
						<img class="rounded" src="http://via.placeholder.com/140x140" alt="Generic placeholder image">
						<h2>Heading</h2>
						<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod
							semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
						<p>
							<a class="btn btn-primary" href="#" role="button">View details &raquo;</a>
						</p>
					</div>
				</div>

				<!-- /END THE FEATURETTES -->

			</div>
			<!-- /.container -->


			<!-- FOOTER -->
			<nav class="navbar fixed-bottom navbar-expand navbar-dark bg-primary">
				<footer class="container">
					<p class="float-right">
						<a href="#">Back to top</a>
					</p>
					<p>&copy; 2017 Company, Inc. &middot;
						<a href="#">Privacy</a> &middot;
						<a href="#">Terms</a>
					</p>
				</footer>
			</nav>
		</main>
	</div>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>