@extends('layouts.super-admin')
@section('content')
<div class="row">
  <div class="col-6">
    @include('superadmin.Forms.categorie')
  </div>
  <div class="col-6">
    @include('superadmin.Lists.categorie')
  </div>
</div>
@endsection()