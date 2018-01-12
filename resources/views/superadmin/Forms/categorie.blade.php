@if(!$categorie)
<form action="{{route('supadmin.addcat')}}" method="post">
  <h1>Editer</h1>
  {{ csrf_field() }}
  <div class="row">
    <div class="col-12 form-group">
      <label for="title">Categorie *</label>
      <input type="text" id="categorie" name="categorie" class="form-control" autofocus>
    </div>
    <div class="text-center">
      <input type="submit" class="btn btn-success btn-block" value="Sauvegarder">
    </div>
  </div>
</form>
@else
<form action="{{route('supadmin.updatecat')}}" method="post">
    <h1>Editer</h1>
    {{ csrf_field() }}
    <div class="row">
      <div class="col-12 form-group">
        <label for="title">Categorie *</label>
        <input type="text" id="categorie" name="categorie" value="{{$categorie->categorie}}" class="form-control" autofocus>
      </div>
      <div class="text-center">
        <input type="submit" class="btn btn-success btn-block" value="Modifier">
      </div>
    </div>
  </form>
@endif