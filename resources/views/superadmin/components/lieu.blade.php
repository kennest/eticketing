@extends('layouts.super-admin')
@section('content')
<div class="row">
  <div class="col-6">
    @include('superadmin.Forms.lieu')
  </div>
  <div class="col-6">
    @include('superadmin.Lists.lieu')
  </div>
</div>
@endsection()