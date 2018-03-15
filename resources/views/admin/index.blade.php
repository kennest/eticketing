@extends('layouts.admin') 
@section('content')
<p>&nbsp;</p>
@if(Auth::user()->role==0)
<div class="alert alert-warning alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<h1>
		Votre compte est actuellement en Mode
		<strong>SIMPLE</strong>,
		<p>Vous ne pouvez donc pas beneficier du service de vente de ticket de notre plateforme et aussi de Statistiques supplémentaire.</p>
	</h1>
	<p>
		<a href="{{route('admin.goprime')}}" class="btn btn-info">
			Passer en mode
			<strong>PRIME</strong>
		</a>
	</p>
</div>
@endif
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Vue Statistique</h3>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-6">
				{!! $eventsByTypeChart->html() !!}
			</div>
			<div class="col-6">
				{!! $eventsByLieuChart->html() !!}
			</div>
			<div class="col-12">
				{!! $eventsByDateChart->html() !!}
			</div>
		</div>
	</div>
	<div class="card-footer">
		<h5>
		Vous avez {{Auth::user()->evenements()->count()}} événement(s) actuellement
		</h5>
	</div>
</div>
<!--/.Carousel Wrapper-->
{!! Charts::scripts() !!} 
{!! $eventsByTypeChart->script() !!} 
{!! $eventsByLieuChart->script() !!} 
{!! $eventsByDateChart->script()!!} 
@endsection