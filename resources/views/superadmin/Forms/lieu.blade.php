@if(!$lieu)
<form action="{{route('supadmin.addlieu')}}" method="post">
	<h1>Editer</h1>
	{{ csrf_field() }}
	<div class="row">
		<div class="col-12 form-group">
			<label for="title">Nom de l'espace *</label>
			<input type="text" id="title" name="label" class="form-control" autofocus>
		</div>
		<div class="col-12 form-group">
      <label for="title">Ville *</label>
      <select name="town" class="form-control">
          @foreach($villes as $v)
            <option value="{{$v}}">{{$v}}</option>
          @endforeach
      </select>
		</div>
		<div class="col-12 form-group">
			<label for="title">Commune *</label>
      <input type="text" id="title" name="district" class="form-control">
		</div>
		<div class="text-center">
			<input type="submit" class="btn btn-success btn-block" value="Sauvegarder">
		</div>
	</div>
</form>
@else
<form action="{{route('supadmin.updatelieu')}}" method="post">
	<h1>Editer</h1>
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$lieu->id}}">
	<div class="row">
		<div class="col-12 form-group">
			<label for="title">Nom de l'espace *</label>
			<input type="text" id="title" name="label" class="form-control" value="{{$lieu->label}}" autofocus>
		</div>
		<div class="col-12 form-group">
			<label for="title">Ville *</label>
			<select name="town" class="form-control">
          @foreach($villes as $v)
            <option value="{{$v}}" {{($v===$lieu->town) ? 'selected' : ''}}>{{$v}}</option>
          @endforeach
      </select>
		</div>
		<div class="col-12 form-group">
      <label for="title">Commune *</label>
     <input type="text" class="form-control" name="district" value="{{$lieu->district}}">
		</div>
		<div class="text-center">
			<input type="submit" class="btn btn-success btn-block" value="Modifier">
		</div>
	</div>
</form>
@endif