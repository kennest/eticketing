@extends('layouts.super-admin') @section('content')
<h1>Parametres</h1>
<div class="row">
	<ul class="col-12 nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lieux</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Categories</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Autres</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
		</li>
	</ul>
	<!-- Tab panes -->
	<div class="col-12 tab-content">
		<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
			<h1>Lieu</h1>
		</div>
		<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<h1>Categorie</h1>
		</div>
		<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
<h1>Autres</h1>
		</div>
		<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">

		</div>
	</div>
</div>
@endsection() 
@section('scripts')
@endsection()