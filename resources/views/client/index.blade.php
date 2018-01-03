@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <fb:login-button 
        scope="public_profile,email"
        onlogin="checkLoginState();">
      </fb:login-button>
    </div>


</div>
@endsection
