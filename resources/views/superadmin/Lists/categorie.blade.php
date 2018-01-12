<h1>Liste Categories</h1>
<table id="organisateurs" class="table table-bordered display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom de l'espace</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($categories as $c)
		<tr>
			<td>{{$c->id}}</td>
			<td>{{$c->categorie}}</td>
			<td>
					<a href="{{route('supadmin.categorie',['id'=>$c->id])}}" class="btn btn-info">
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