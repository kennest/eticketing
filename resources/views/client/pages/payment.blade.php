@extends('../../layouts.app') 
@section('content')
<div class="row" hidden>
  <input type="hidden" id="" value="{{$event->classeTickets[0]->price}}">
</div>
<div class="modal" id="registrationModal" style="position: relative; display: block;">
  <div class="modal-dialog modal-lg" role="document">
    <div id="bs4wizard" class="modal-content">
      <div class="box-head box-head-accent-2" style="position: absolute;"></div>
      <div class="modal-header">
        <!-- Nav tabs -->
        <ul class="nav nav-pills text-uppercase" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#account" role="tab" aria-controls="home" aria-selected="true">
              <h6>Compte</h6>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#choice" role="tab" aria-controls="profile" aria-selected="false">
              <h6>Choix et reception de Ticket</h6>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="profile" aria-selected="false">
              <h6>Moyen de paiement</h6>
            </a>
          </li>
        </ul>
      </div>
      <div class="modal-body">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="account" role="tabpanel" aria-labelledby="home-tab">
            <div class="alert alert-info" role="alert" id="alert">
              <h4 class="alert-heading">Important</h4>
              <p class="lead">Pour vous eviter de remplir un long formulaire,cliquez sur le bouton ci-dessous pour que <br><b class="alert-link"><i class="fa fa-facebook-official"></i>Facebook</b>                nous renvois les donnees necessaires</p>
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
                    <p class="birthday"></p>
                  </div>
                  <div class="card-footer text-muted">
                  </div>
                </div>
              </div>
              <input type="text" id="number" name="number" placeholder="Numero de  telephone..." class="form-control col-3" autofocus>
              <a href="#" class="btn btn-info" id="fb-login">
                <i class="fa fa-facebook"></i>  Continuer avec Facebook
              </a>
              <div id="fb-loader">
                <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                <span class="sr-only">Loading...</span>
              </div>
              <a href="#" class="btn btn-danger" id="fb-logout">
                  <i class="fa fa-facebook"></i>  Ce n'est pas mon compte facebook...
                </a>
            </div>
          </div>
          <div class="tab-pane" id="choice" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row text-center">
              <div class="col-12">
                <h6>Panier</h6>
                <table class="table table-primary" id="cart">
                  <thead class="thead-inverse">
                    <tr>
                      <th>Classe</th>
                      <th>Quantité</th>
                      <th>Prix unitaire</th>
                      <th>Total</th>
                      <th>Restant(s)</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($event->classeTickets as $ct)
                    <tr>
                      <th scope="row">{{$ct->class}}</th>
                      <td>
                        <input type="number" class="form-control" id="{{$ct->class}}" value="0"  min="0" max="{{$ct->quantity}}">
                      </td>
                      <td >
                          <input type="number" class="form-control" id="{{$ct->class}}_price" value="{{$ct->price}}" disabled>
                      </td>
                      <td>
                        <input type="number" class="form-control" id="{{$ct->class}}_total" value="0" disabled>
                      </td>
                      <td>{{$ct->quantity}}</td>
                    </tr>
                    @endforeach
                    <tr></tr>
                      <td colspan="3" scope="row">Total</td>
                      <td>
                        <input type="number" class="form-control" id="montant" value="0" disabled>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <h6 class="alert-heading">Quels sont les numeros qui doivents recevoir les tickets?</h6>
                    <p></p>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-success" id="btn-add-dest">Ajouter un numero ...</button>
                        <p>&nbsp;</p>
                      </div>
                    <p class="mb-0">Lancez vous!</p>
                  </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="payment" role="tabpanel" aria-labelledby="profile-tab">
            <h2>Achat</h2>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div id="wizardBtn">
          <button type="button" class="btn btn-common prev-step">Retour</button>
          <button type="button" class="btn btn-warning next-step" data-action1="{{route('store')}}" data-action2="">Enregistrer et continuer...</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('scripts')
<script>
  $(document).ready(function(){
    var user_data;
    $("#result .card").hide();
    $("#fb-logout").hide();
    $("#fb-loader").hide('slow');
    $(".next-step").prop("disabled", true);
  });
  //JS pour les Tabs
  $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    });
    //Au click sur le btn save et continue on store les infos en session et on continue a l'etape suivante
  $(".next-step").click(function (e) {
    e.preventDefault()
    var number=$("#number").val();
    if(number){
      user_data.number=number;
      $.ajax({
        type: "POST",
        url:$(this).attr('data-action1'),
        dataType: 'json',
        data: { 'user': user_data ,'_token': '{{ csrf_token()}}'},
        success: function(resp) {
          $('#myTab a[href="#choice"]').removeClass('disabled');
          $('#myTab li:eq(1) a').tab('show');
        },    
      });
    }else{
      alert('Entrer votre Numero,il est obligatoire');
      $("#number").css('background-color','red');
      $("#number").focus();
    }
    
  });

//Auto-Calcul des valeurs du panier
$( "#cart .form-control" ).change(function() {
  var id=$(this).attr('id');
  var qte=Math.round($("#"+id).val());
  var price=$("#"+id+"_price").val();
  var mt=Math.round($("#"+id+"_total").val(qte*price));
  var tot=0;
  $("*[id*='_total']").each(function (i, el) {
    //It'll be an array of elements
   var x=$(this).val();
   tot=(parseInt(tot)+parseInt(x)); 
});
  $("#montant").val(tot)
});


  //Au clique sur le btn Back on revient au Tab precedent
  $(".prev-step").click(function (e) {
    e.preventDefault()
    $('#myTab a[href="#account"]').tab('show');
  });
  //Au click sur le btn facebook login on recupere les infos de l'utilisateur
  $("#fb-login").click(function (e) {
    e.preventDefault()
    $("#fb-loader").show('slow');
    FB.login(function(response) {
      console.log(JSON.stringify(response.authResponse.accessToken));
      $("#fb-login").hide();
      if (response.authResponse) {
       console.log('Welcome!  Fetching your information.... '+response.authResponse);
       FB.api('/me',{fields:'id,name,picture,email,birthday,gender'}, function(response) {
         console.log('Good to see you, ' + response.last_name + '.'+response.birthday);
         user_data=response;
         $(".next-step").prop("disabled", false);
         $("#result .card").show('slow');
         $("#result .img-profile").attr('src',response.picture.data.url);
         $("#result .card-title").text(response.name);
         $("#result .card-text").text(response.email);
         $("#result .gender").text(response.gender);
         $("#result .birthday").text(response.birthday);
         $("#result .card-footer").text('ID:'+response.id);
         $("#alert").hide('slow');
         $("#fb-logout").show('slow');
         $("#fb-loader").hide('slow');
       });
      } else {
        $("#fb-login").show('slow');
       console.log('User cancelled login or did not fully authorize.');
      }
  },{scope: 'email,public_profile,user_birthday,user_friends'});
  });
  //Deconnecte de Facebook
  $("#fb-logout").click(function(e){
    e.preventDefault();
    FB.logout(user_data.authResponse);
  });
</script>
<script src="{{asset('js/jquery.mask.min.js')}}"></script>
<script>
    $(document).ready(function(){
      $('#number').mask('00000000');
    });
</script>
@endsection