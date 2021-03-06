@extends('layouts.admin') 
@section('content')
<p>&nbsp;</p>
<div class="col-12">
	@include('errors.validation')
</div>
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">
			Publier un evenement
		</h3>
	</div>
	<div class="card-body">
		@if($event)
		<form class="" method="POST" enctype="multipart/form-data" action="{{route('admin.update.event')}}">
			{{ csrf_field() }}
			<div class="col-4 form-group">
				<label for="title">Titre *</label>
				<input type="text" name="title" class="form-control" value="{{$event->title}}" autofocus>
			</div>
			<div class="row">
				<div class="col-4 form-group">
					<label for="">Type de l'evenements *:</label>
					<select id="souscat" name="type" class="form-control">
						<option disabled selected>Choisir le Type</option>
						@foreach($types as $type)
						<option value="{{$type->id}}" {{($event->type->id===$type->id) ? 'selected' : ''}}>{{$type->type}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-4 form-group">
					<label for="orangeForm-pass">Lieu *:</label>
					<select name="lieu" class="form-control">
						@foreach($lieux as $lieu)
						<option value="{{$lieu->id}}" {{($event->lieu->id===$lieu->id) ? 'selected' : ''}}>{{$lieu->label}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-6 form-group">
					<p>
						<img class="thumbnail" height="150" width="150" src="{{Storage::url($event->picture)}}">
					</p>
					<label for="">Affiche *:</label>
					<input type="file" name="picture" class="form-control">
				</div>
				<div class="col-6 form-group">
					@if($participants)
					<label for="orangeForm-pass">Participants*:</label>
					<select id="part" name="participants[]" class="form-control" multiple="true">
					<option disabled selected>Choisir les participants</option>
					@foreach($participants as $p)
					<option value="{{$p->id}}">{{$p->name}}</option>
					@endforeach
				</select>
				@else
				<a class="btn btn-info" href="{{route('admin.participants')}}">Ajouter un participants</a>
				@endif
				</div>
			</div>
			<div class="form-group">
				<label for="">Description</label>
				<textarea name="description" rows="3" class="form-control" placeholder="Ajouter une Description...">{{$event->description}}</textarea>
			</div>
			@if(Auth::user()->role==1)
			<div class="row">
				<div class="col-6 form-group">
					<label for="">Nombre de Tickets</label>
					<input type="number" name="tickets" value="{{$event->tickets}}" class="form-control" placeholder="0">
				</div>
				<fieldset>
					<legend>Repartition des tickets:</legend>
					<div class="row">
						<div class="col-6">
							<div class="input-group">
								<span class="input-group-addon">VIP</span>
								<input type="number" name="vip" class="form-control" placeholder="0 ticket">
							</div>
						</div>
						<div class="col-6">
							<div class="input-group">
								<input type="number" name="prixvip" class="form-control" placeholder="0">
								<span class="input-group-addon">FCFA</span>
							</div>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-6">
							<div class="input-group">
								<span class="input-group-addon">PUBLIC</span>
								<input type="number" name="public" class="form-control" placeholder="0 ticket">
							</div>
						</div>
						<div class="col-6">
							<div class="input-group">
								<input type="number" name="prixpublic" class="form-control" placeholder="0">
								<span class="input-group-addon">FCFA</span>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			@endif
			<hr/>
			<div class="row">
				<div class="col-6 form-group">
					<label for="">Date de debut *:</label>
					<input type="date" name="begin" class="form-control" value="{{$event->begin}}">
				</div>
				<div class="col-6 form-group">
					<label for="orangeForm-pass">Date de Fin *:</label>
					<input type="date" name="end" class="form-control" value="{{$event->end}}">
				</div>
			</div>

			<div class="text-center">
				<input type="submit" class="btn btn-success btn-block" value="PUBLIER">
			</div>
		</form>
		@else
		<form class="" method="POST" enctype="multipart/form-data" action="{{route('admin.save.event')}}">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-4 form-group">
					<label for="title">Titre *</label>
					<input type="text" id="title" name="title" class="form-control" autofocus>
				</div>
				<div class="col-4 form-group">
					<label for="orangeForm-pass">Sous-Categorie*:</label>
					<select id="souscat" name="type" class="form-control">
						<option disabled selected>Choisir la sous-categorie</option>
						@foreach($types as $type)
						<option value="{{$type->id}}">{{$type->type}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-4 form-group">
					<label for="orangeForm-pass">Lieu *:</label>
					<select name="lieu" class="form-control">
						<option disabled selected>Choisir le Lieu</option>
						@foreach($lieux as $lieu)
						<option value="{{$lieu->id}}">{{$lieu->label}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-6 form-group">
					<label for="orangeForm-email">Affiche *:</label>
					<input type="file" name="picture" class="form-control">
				</div>
				
				<div class="col-6 form-group">
				@if($participants)
					<label for="orangeForm-pass">Participants*:</label>
					<select id="part" name="participants[]" class="form-control" multiple="true">
					<option disabled selected>Choisir les participants</option>
					@foreach($participants as $p)
					<option value="{{$p->id}}">{{$p->name}}</option>
					@endforeach
				</select>
				@else
				<a class="btn btn-info" href="{{route('admin.participants')}}">Ajouter un participants</a>
				@endif
				</div>
			</div>
			<div class="form-group">
				<label for="orangeForm-email">Description</label>
				<textarea name="description" rows="3" class="form-control" placeholder="Ajouter une Description..."></textarea>
			</div>
			<hr/> @if(Auth::user()->role==1)
			<div class="row">
				<div class="col-6 form-group">
					<label for="orangeForm-pass">Nombre de Tickets</label>
					<input type="number" name="tickets" class="form-control" placeholder="0">
				</div>
				<fieldset class="col-6">
					<legend>Repartition des tickets:</legend>
					<div class="row">
						<div class="col-6">
							<div class="input-group">
								<span class="input-group-addon">VIP</span>
								<input type="number" name="vip" class="form-control" placeholder="0 ticket">
							</div>
						</div>
						<div class="col-6">
							<div class="input-group">
								<input type="number" name="prixvip" class="form-control" placeholder="0">
								<span class="input-group-addon">FCFA</span>
							</div>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-lg-6">
							<div class="input-group">
								<span class="input-group-addon">PUBLIC</span>
								<input type="number" name="public" class="form-control" placeholder="0 ticket">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
								<input type="number" name="prixpublic" class="form-control" placeholder="0">
								<span class="input-group-addon">FCFA</span>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<hr/> @endif
			<div class="row">
				<div class="col-6 form-group">
					<label for="orangeForm-pass">Date de debut *:</label>
					<input type="date" name="begin" class="form-control">
				</div>
				<div class=" col-6 form-group">
					<label for="orangeForm-pass">Date de Fin *:</label>
					<input type="date" name="end" class="form-control">
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-success btn-block" value="PUBLIER">
			</div>
		</form>
		@endif
	</div>
</div>
<!-- Form register -->
@endsection
 
@section('scripts')
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
</script>
@endsection