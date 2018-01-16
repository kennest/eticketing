@extends('layouts.admin')

@section('content')
  <div class="row">
    <div class="col-12">
      @include('errors.validation')
    </div>
    <div class="col-6">
      @include('admin.Forms.participant')
    </div>
    <div class="col-6">
      @include('admin.Lists.participant')
    </div>
  </div>
@endsection()