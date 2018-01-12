@extends('layouts.super-admin')
@section('content')
<div class="row">
  <div class="col-6">
    @include('superadmin.Forms.banner')
  </div>
  <div class="col-6">
    @include('superadmin.Lists.banner')
  </div>
</div>
@endsection()