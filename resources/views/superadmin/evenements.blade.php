@extends('layouts.super-admin') 
@section('content')
<h1>Evenements</h1>
<table id="evenements" class="table table-bordered display" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Titre</th>
      <th>Sous-categories</th>
      <th>Lieu</th>
      <th>Affiche</th>
      <th>Participant(s)</th>
      <th>Description</th>
      <th>Date debut</th>
      <th>Date de fin</th>
      <th>Statut</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($events as $e)
    <tr>
      <td>{{$e->id}}</td>
      <td>{{$e->title}}</td>
      <td><b>{{$e->type->type}}</b></td>
      <td>{{$e->lieu->label}}</td>
      <td><img src="{{Storage::url($e->picture)}}" class="img-thumbnail" height="80" width="80" alt="{{$e->title}}"></td>
      <td>
        <ol class="list-unstyled">
          @foreach($e->participants as $p)
          <li><b>*{{$p->name}}</b></li>
          @endforeach
        </ol>
      </td>
      <td>{{$e->description}}</td>
      <td>{{Jenssegers\Date\Date::parse($e->begin)->format('l j F Y')}}</td>
      <td>{{Jenssegers\Date\Date::parse($e->end)->format('l j F Y')}}</td>
      <td>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          @if($e->statut==1)
          <label class="btn btn-success active">
						<input type="radio" name="options" id="prime" data="{{$e->id}}" autocomplete="off" checked> Actif
					</label> @else
          <label class="btn btn-warning active">
						<input type="radio" name="options" id="simple" data="{{$e->id}}" autocomplete="off"> Inactif
					</label> @endif
        </div>
      </td>
      <td>
        <a href="#" class="btn btn-danger">
       supprimer
			</a>
        <a href="{{route('supadmin.togglestate',['id'=>$e->id])}}" class="btn btn-info">
          @if($e->statut==0)
          Activer 
          @else
           Desactiver
          @endif
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    $('.table').DataTable();
    $("#prime")
});
</script>
@endsection