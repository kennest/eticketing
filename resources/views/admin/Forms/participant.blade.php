<p>&nbsp;</p>
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">
			Editer un participant
		</h3>
	</div>
	<div class="card-body">
		@if($participant)
		<form action="{{route('admin.update.participant')}}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{$participant->id}}">
			<div class="form-group">
				<label for="name">Nom:</label>
				<input type="text" class="form-control" value="{{$participant->name}}" name="name" id="name" placeholder="Nom du participant..." autofocus>
			</div>
			<div class="form-group">
				<label for="prof">Profession:</label>
				<input type="text" class="form-control" value="{{$participant->profession}}" name="profession" id="prof" placeholder="Profession..." autofocus>
			</div>
			<div class="form-group">
				<input type="submit" value="Enregistrer" class="btn btn-success btn-block">
			</div>
		</form>
		@else
		<form action="{{route('admin.add.participant')}}" method="post">
				{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Nom:</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Nom du participant..." autofocus>
			</div>
			<div class="form-group">
				<label for="prof">Profession:</label>
				<input type="text" class="form-control" name="profession" id="prof" placeholder="Profession..." autofocus>
			</div>
			<div class="form-group">
				<input type="submit" value="Enregistrer" class="btn btn-success btn-block">
			</div>
		</form>
		@endif
	</div>
</div>