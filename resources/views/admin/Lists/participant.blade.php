<h1>Liste des Participants</h1>
<table id="organisateurs" class="table table-bordered display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom de Du participant</th>
			<th>Profession</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($participants as $p)
		<tr>
			<td>{{$p->id}}</td>
			<td>{{$p->name}}</td>
      <td>{{$p->profession}}</td>
			<td>
					<a href="{{route('admin.participants',['id'=>$p->id])}}" class="btn btn-info">
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