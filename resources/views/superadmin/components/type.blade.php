@extends('layouts.super-admin')
@section('content')
<div class="row">
  <div class="col-6">
    @include('superadmin.Forms.type')
  </div>
  <div class="col-6">
    @include('superadmin.Lists.type')
  </div>
</div>
@endsection()