@extends('layouts.super-admin') @section('content')
<h1>Organisateur</h1>
<table id="organisateurs" class="table table-bordered display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>email</th>
			<th>Mode</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($organisateurs as $o)
		<tr>
			<td>{{$o->id}}</td>
			<td>{{$o->name}}</td>
			<td>{{$o->email}}</td>
			<td>
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
					@if($o->role==1)
					<label class="btn btn-success active">
						<input type="radio" name="options" id="prime" data="{{$o->id}}" autocomplete="off" checked> Prime
					</label>
					<label class="btn btn-success">
						<input type="radio" name="options" id="simple" data="{{$o->id}}" autocomplete="off"> Simple
					</label>
					@else
					<label class="btn btn-success">
						<input type="radio" name="options" id="prime" data="{{$o->id}}" autocomplete="off" checked> Prime
					</label>
					<label class="btn btn-success active">
						<input type="radio" name="options" id="simple" data="{{$o->id}}" autocomplete="off"> Simple
					</label>
					@endif

				</div>
			</td>
			<td>
			<a href="" class="btn btn-danger">
       supprimer
      </a>
      <a href="{{route('supadmin.toggle',['id'=>$o->id])}}" class="btn btn-info">
          Changer de mode
        </a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection() @section('scripts')
<script>
	$(document).ready(function(){
    $('.table').DataTable();
    $("#prime")
});

</script>
@endsection()