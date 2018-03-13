@extends('../../../layouts/app') 
@section('content')
<ol>
    @foreach($wizard->all() as $key => $_step)
        <li>
            @if($step->index == $_step->index)
                <strong>{{ $_step::$label }}</strong>
            @elseif($step->index > $_step->index)
                <a href="{{ route('wizard.step', [$_step::$slug]) }}">{{ $_step::$label }}</a>
            @else
                {{ $_step::$label }}
            @endif
        </li>
    @endforeach
</ol>
<form action="{{ route('wizard.step.post', ['step'=>$step::$slug]) }}" method="POST">
    {{ csrf_field() }}
 @include('errors.validation')
    @include($step::$view, compact('step', 'errors'))

    <span>Etape {{ $step->number }}/{{ $wizard->limit() }}</span>

    @if ($wizard->hasPrev())
        <a class="btn btn-warning" href="{{ route('wizard.step', ['step' => $wizard->prevSlug()]) }}">Back</a>
    @else
        <a class="btn btn-warning" href="#">Back</a>
    @endif

    @if ($wizard->hasNext())
        <button class="btn btn-info" type="submit">Next</button>
    @else
        <button class="btn btn-success" type="submit">Done</button>
    @endif
</form>
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    var user_data;
    var payment_data;
    var ticket={};
    $("#result .card").hide();
    $("#fb-logout").hide();
    $("#fb-loader").hide('slow');
    $(".next-step").prop("disabled", true);
    $(".last-step").hide();
    $(".buy").hide();
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
        url:$(this).attr('data-action'),
        dataType: 'json',
        data: { 'user': user_data ,'_token': '{{ csrf_token()}}','flag':'user_data'},
        success: function(resp) {
          $(".next-step").hide();
          $(".last-step").show();
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

  $(".last-step").click(function (e) {
    e.preventDefault();
      $.ajax({
        type: "POST",
        url:$(this).attr('data-action'),
        dataType: 'json',
        data: { 'payment': payment_data ,'_token': '{{ csrf_token()}}','flag':'payment_data'},
        success: function(resp) {
          $(".last-step").hide();
          $(".buy").show();
          $('#myTab a[href="#payment"]').removeClass('disabled');
          $('#myTab li:eq(2) a').tab('show');
        },    
      });
  });

  $("#plusieurs").change(function (e) {
    e.preventDefault();
    $("#destinataire").html("");
    $("#cart .qte").each(function(){
      var qte=$(this).val();
      //alert(qte+' :'+$(this).attr('ticket-class'));
      //var class=$(this).attr('ticket-class');
      for(i=1;i<=qte;i++){
        var input="<input class='form-control "+$(this).attr('ticket-class')+"_num' name='destinataires[]'  placeholder='"+$(this).attr('ticket-class')+"' /><br/>";
        $("#destinataire").append(input);
      }
    });
  });

  $("#unique").change(function (e) {
    e.preventDefault();
    $("#destinataire").html("");
    var input="<input class='form-control dest' name='destinataires[]' placeholder='Numero...' /><br/>"
    $("#destinataire").html(input);
  });

//Auto-Calcul des valeurs du panier
$( "#cart .form-control" ).change(function() {
  var id=$(this).attr('id');
  var qte=Math.round($("#"+id).val());
  var price=$("#"+id+"_price").val();
  var mt=Math.round($("#"+id+"_total").val(qte*price));
  var tot=0;
  ticket={'class':id,'qte':qte};

  $("*[id*='_total']").each(function (i, el) {
    //It'll be an array of elements
   var x=$(this).val();
   tot=(parseInt(tot)+parseInt(x)); 
});
  $("#montant").val(tot);
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