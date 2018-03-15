<h1>Liste Types</h1>
<table id="organisateurs" class="table table-bordered display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Id</th>
      <th>Libelle</th>
      <th>Categorie</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($types as $t)
		<tr>
			<td>{{$t->id}}</td>
      <td>{{$t->type}}</td>
      <td>{{$t->categorie->categorie}}</td>
			<td>
					<a href="{{route('supadmin.type',['id'=>$t->id])}}" class="btn btn-info">
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