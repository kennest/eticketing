@if(!$type)
<form action="{{route('supadmin.addtype')}}" method="post">
	<h1>Editer</h1>
	{{ csrf_field() }}
	<div class="row">
		<div class="col-12 form-group">
			<label for="title">Sous-Categorie *</label>
			<input type="text" id="title" name="type" class="form-control" autofocus>
		</div>
		<div class="col-12 form-group">
			<label for="title">Categorie *</label>
			<select name="categorie_id" class="form-control">
				@foreach($categories as $c)
				<option value="{{$c->id}}">{{$c->categorie}}</option>
				@endforeach()
			</select>
		</div>
		<div class="text-center">
			<input type="submit" class="btn btn-success btn-block" value="Sauvegarder">
		</div>
	</div>
</form>
@else
<form action="{{route('supadmin.updatetype')}}" method="post">
  <h1>Editer</h1>
  {{ csrf_field() }}
  <input type="hidden" name="id" value="{{$type->id}}">
	<div class="row">
		<div class="col-12 form-group">
			<label for="title">Sous-Categorie *</label>
			<input type="text" id="title" name="type" value="{{$type->type}}" class="form-control" autofocus>
		</div>
		<div class="col-12 form-group">
			<label for="title">Categorie *</label>
			<select name="categorie_id" class="form-control">
				@foreach($categories as $c)
				<option value="{{$c->id}}" {{($c->id===$type->categorie->id) ? 'selected' : ''}}>{{$c->categorie}}</option>
				@endforeach()
			</select>
		</div>
		<div class="text-center">
			<input type="submit" class="btn btn-success btn-block" value="Sauvegarder">
		</div>
	</div>
</form>
@endif