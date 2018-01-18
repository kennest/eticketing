@extends('../../layouts.app') 
@section('content')
<div class="modal" id="registrationModal" style="position: relative; display: block;">
  <div class="modal-dialog modal-lg" role="document">
    <div id="bs4wizard" class="modal-content">
      <div class="box-head box-head-accent-2" style="position: absolute;"></div>
      <div class="modal-header">
        <!-- Nav tabs -->
        <ul class="nav nav-pills" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#account" role="tab" aria-controls="home" aria-selected="true">
              <h2>Compte</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="profile" aria-selected="false">
              <h2>Moyen de paiement</h2>
            </a>
          </li>
        </ul>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
      </div>
      <div class="modal-body">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="account" role="tabpanel" aria-labelledby="home-tab">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Important</h4>
                <p class="lead">Pour vous eviter de remplir un long formulaire,cliquez sur le bouton ci-dessous 
                  pour que <br><b class="alert-link"><i class="fa fa-facebook-official"></i>Facebook</b> nous renvois les donnees necessaires</p>
                <em>
                    <p class="lead">Merci de votre comprehension</p>
                </em>
              </div>
            <div class="form-group">
              <div id="result">
                  <div class="card text-center">
                      <div class="card-header">
                        Vos Informations
                      </div>
                      <div class="card-block">
                        <img src="" class="img-profile img-thumbnail" height="90" width="90">
                        <h4 class="card-title"></h4>
                        <p class="card-text"></p>
                        <p class="gender"></p>        
                      </div>
                      <div class="card-footer text-muted">
                        
                      </div>
                    </div>
              </div>
              <label>Telephone: <span class="label-danger">*</span></label>
              <input type="text" placeholder="Votre Numero de  telephone..." class="form-control">
              <a href="#" class="btn btn-info" id="fb-login">
                <i class="fa fa-facebook"></i>  Continuer avec Facebook
              </a>
            </div>
          </div>
          <div class="tab-pane" id="payment" role="tabpanel" aria-labelledby="profile-tab">
            <h2>Achat</h2>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div id="wizardBtn">
          <button type="button" class="btn btn-common prev-step">Back</button>
          <button type="button" class="btn btn-warning next-step">Save and Continue</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('scripts')
<script>
  $(document).ready(function(){
    $("#result .card").hide();
  });
  $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    });
  $(".next-step").click(function (e) {
    e.preventDefault()
    $('#myTab a[href="#payment"]').removeClass('disabled');
    $('#myTab a[href="#payment"]').tab('show');
  });
  $(".prev-step").click(function (e) {
    e.preventDefault()
    $('#myTab a[href="#account"]').tab('show');
  });
  $("#fb-login").click(function (e) {
    e.preventDefault()
    FB.login(function(response) {
      if (response.authResponse) {
       console.log('Welcome!  Fetching your information.... '+response.authResponse);
       FB.api('/me',{fields:'id,name,picture,email,birthday,gender'}, function(response) {
         console.log('Good to see you, ' + response.last_name + '.'+response.birthday);
         $("#result .card").show('slow');
         $("#result .img-profile").attr('src',response.picture.data.url);
         $("#result .card-title").text(response.name);
         $("#result .card-text").text(response.email);
         $("#result .gender").text(response.gender);
         $("#result .card-footer").text(response.birthday);
         $("#fb-login").hide();
       });
      } else {
       console.log('User cancelled login or did not fully authorize.');
      }
  },{scope: 'email,public_profile,user_birthday,user_friends'});
  });
</script>
@endsection