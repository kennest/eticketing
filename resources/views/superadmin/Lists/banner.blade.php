<h1>Liste des Bannieres</h1>
<table id="bannieres" class="table table-bordered display" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Id</th>
      <th>Image</th>
      <th>Description</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($banners as $b)
		<tr>
			<td>{{$b->id}}</td>
			<td>
        <img src="{{Storage::url($b->picture)}}" alt="" srcset="" class="img img-thumbnail" height="150" width="200">
      </td>
      <td>{{$b->description}}</td>
			<td>
					<a href="{{route('supadmin.banner',['id'=>$b->id])}}" class="btn btn-info">
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