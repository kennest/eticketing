@extends('../../layouts/app') 
@section('styles')
<style>
  .img-link:hover {
    background-color: aqua;
  }
  #wz-content{
    position: relative;
    margin: 5% 3% 3% 3%;
  }
</style>
@endsection
@section('content')
<div id="wz-content">
    <form method="post" action="https://secure.sycapay.net/checkresponsive ">
        <input type="hidden" name="token" value="{{session('token')}}">
        <input type="hidden" name="amount" value="{{session('smajti1.wizard.payment.set-cart-data.montant')}}">
        <input type="hidden" name="currency" value="XOF">
        <input type="hidden" name="urls" value="{{route('success')}}">
        <input type="hidden" name="urlc" value="{{route('wizard.step')}}">
        <input type="hidden" name="commande" value="COM_TEST">
        <input type="hidden" name="merchandid" value="C_56713FBF3E6A4">
        <input type="hidden" name="typpaie" id="typpaie" value="payement">
        <input type="submit" class="btn btn-success" value="valider">
    </form>
</div>
@endsection