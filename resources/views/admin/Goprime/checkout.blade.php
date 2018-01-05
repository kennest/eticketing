@extends('layouts.admin') 
@section('content')
<p>&nbsp;</p>
<div class="alert alert-info">
  <h1>Passer en Prime</h1>
  <p class="lead">Pour passer en mode prime,veuillez nous contacter afin que nous puissions signer un contrat</p>
  <p>Vous recevrez par la suite un code d'activation par email ou par sms.</p>
  <p><strong>Service Clients:</strong> (+225) 22 41 29 16 / 51 10 07 25</p>
  <p><strong>Email:</strong> INFOS@IPWAV.COM</p>
  <form>
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Code d'Activation..." aria-label="Code d'activation..." aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary">Soumettre</button>
      </div>
    </div>
  </form>
 <a href="" class="btn btn-info btn-block">Retour</a>
</div>
@endsection