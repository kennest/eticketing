@if(!$banner)
<form action="{{route('supadmin.addbanner')}}" method="post" enctype="multipart/form-data">
  <h1>Editer</h1>
  {{ csrf_field() }}
  <div class="row">
    <div class="col-12 form-group">
      <label for="title">Bannière *</label>
      <input type="file"  name="picture" class="form-control" autofocus>
    </div>
    <div class="col-12 form-group">
      <label for="">Description:</label>
      <textarea name="description" id="" class="form-control"></textarea>
    </div>
    <div class="form-group text-center">
      <input type="submit" class="btn btn-success btn-block" value="Sauvegarder">
    </div>
  </div>
</form>
@else
<form action="{{route('supadmin.updatebanner')}}" method="post" enctype="multipart/form-data">
    <h1>Editer</h1>
    {{ csrf_field() }}
    <div class="row">
      <input type="hidden" name="id" value="{{$banner->id}}">
      <div class="col-12 form-group">
          <img src="{{Storage::url($banner->picture)}}" alt="" srcset="" height="200" width="200">
      </div>
      <div class="col-12 form-group">
        <label for="title">Bannière *</label>
        <hr/>
        <input type="file"  name="picture" value="" class="form-control" autofocus>
      </div>
      <div class="col-12 form-group">
        <label for="">Description:</label>
        <textarea name="description"  class="form-control">{{$banner->description}}</textarea>
      </div>
      <div class="form-group text-center">
        <input type="submit" class="btn btn-success btn-block" value="Modifier">
      </div>
    </div>
  </form>
@endif