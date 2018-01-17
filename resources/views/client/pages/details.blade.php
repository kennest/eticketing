@extends('../../layouts/app') 
@section('content')
<p>&nbsp;</p>
<div class="row">
  <dic class="col-6">
      <div class="text-center">
          <h4><em>{{$event->title}}</em></h4>
          <hr>
      </div>
    <img src="{{Storage::url($event->picture)}}" class="img-thumbnail" alt="">
  </dic>
  <div class="col-6">
      
  </div>
  <div class="col-6"></div>
</div>
@endsection