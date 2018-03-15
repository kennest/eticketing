<h1>Liste des lieux</h1>
<table id="organisateurs" class="table table-bordered display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom de l'espace</th>
			<th>Ville</th>
			<th>Commune</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($lieux as $l)
		<tr>
			<td>{{$l->id}}</td>
			<td>{{$l->label}}</td>
      <td>{{$l->town}}</td>
      <td>{{$l->district}}</td>
			<td>
					<a href="{{route('supadmin.lieu',['id'=>$l->id])}}" class="btn btn-info">
							modifier
						 </a>
			<a href="#" class="btn btn-danger">
       supprimer
			</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>