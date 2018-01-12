<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{env('APP_NAME')}}</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
	<div class="container-fluid">
		<div class="row justify-content-md-center">
			<div class="col-6 card card-primary">
				<div class="card-header">
					<div class="card-title">
            <h1>Entrer le code de connexion</h1>
          </div>
				</div>
				<div class="card-body">
          <form action="{{route('supadmin.dologin')}}" class="form:post" method="POST">
              {{ csrf_field() }}
            <div class="form-group">
              <label>Code</label>
              <input type="text" name="code" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" value="Connexion" class="btn btn-block btn-primary">
            </div>
          </form>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>