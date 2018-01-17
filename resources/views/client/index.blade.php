@extends('../layouts.app')

@section('content')
<section id="portfolio" class="section">
    <div class="container">
      <div class="section-header">
        <h3 class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">Cette Semaine</h3>
        <h2 class="section-title wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">A l'affiche</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="controls text-center wow fadeInUp" data-wow-delay=".6s">
            <a class="control mixitup-control-active btn btn-common" data-filter="all">Tous</a> 
            @foreach($types as $t)
            <a class="control btn btn-common" data-filter=".{{$t->type}}">{{$t->type}}</a>
            @endforeach
          </div>
          <div id="portfolio" class="row wow fadeInUp" data-wow-delay="0.8s">
            @foreach($types as $t) 
            @foreach($t->activeevents as $e)
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix {{$e->type->type}}">
              <div class="portfolio-item">
                <div class="portfolio-img">
                  <img src="{{Storage::url($e->picture)}}" alt="" />
                </div>
                <div class="portfoli-content">
                  <div class="sup-desc-wrap">
                    <div class="sup-desc-inner">
                      <div class="sup-meta-wrap">
                        <a class="sup-title" href="{{route('details',['uuid'=>$e->uuid])}}">
                          <h4>{{$e->title}}</h4>
                        </a>
                        <p class="sup-description"><em>{{$e->lieu->label}}</em></p>
                        <p class="sup-description">{{$e->description}}</p>
                        <a href="#" class="sup-title btn btn-primary">Payer</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach 
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--div id="why" class="why">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="section-header">
            <h3 class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">Who We Are</h3>
            <h2 class="section-title wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">Why choose Us</h2>
          </div>
          <div class="why-item wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="icon">
              <i class="icon-fire"></i>
            </div>
            <div class="why-content">
              <h3>Do Believe in Quality</h3>
              <p>Our key to success is the excellent quality of work That we hold across all our projects.</p>
            </div>
          </div>
          <div class="why-item wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
            <div class="icon">
              <i class="icon-energy"></i>
            </div>
            <div class="why-content">
              <h3>Simple and fast</h3>
              <p>Our key to success is the excellent quality of work That we hold across all our projects.</p>
            </div>
          </div>
          <div class="why-item wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
            <div class="icon">
              <i class="icon-heart"></i>
            </div>
            <div class="why-content">
              <h3>Intuitive and convenience</h3>
              <p>Our key to success is the excellent quality of work That we hold across all our projects.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div id="testimonial" class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="touch-slider" class="owl-carousel owl-theme">
              <div class="item active text-center">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo conseq uatuis aute irure dolor.</p>
                <div class="client-info">
                  <h2 class="client-name">Jhon Nash</h2>
                  <h4 class="client-details">Founder & CEO, JN Inc.</h4>
                </div>
                <img class="img-member" src="img/testimonial/img1.png" alt="">
              </div>
              <div class="item text-center">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo conseq uatuis aute irure dolor.</p>
                <div class="client-info">
                  <h2 class="client-name">Jhon Nash</h2>
                  <h4 class="client-details">Founder & CEO, JN Inc.</h4>
                </div>
                <img class="img-member" src="img/testimonial/img2.png" alt="">
              </div>
              <div class="item text-center">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                  magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo conseq uatuis aute irure dolor.</p>
                <div class="client-info">
                  <h2 class="client-name">Jhon Nash</h2>
                  <h4 class="client-details">Founder & CEO, JN Inc.</h4>
                </div>
                <img class="img-member" src="img/testimonial/img3.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->
  <section id="team" class="team-area section">
    <div class="container">
      <div class="section-header">
        <h3 class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">A voir aussi</h3>
        <h2 class="section-title wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">Top Evènements</h2>
      </div>
      <div class="row">
            @foreach($types as $t) 
            @foreach($t->activeevents as $e)
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="single-team wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="400ms">
            <img src="{{Storage::url($e->picture)}}" alt="{{$e->title}}">
            <div class="team-content">
              <h4 class="tem-member">{{$e->title}}</h4>
              <h6><b>{{$e->lieu->label}}</b></h6>
              <ul class="alert alert-info">
                    <li class="">
                            {{Jenssegers\Date\Date::parse($e->begin)->format('l j F Y')}}
                    </li>
                    <li><b>Au</b></li>
                    <li class="">
                            {{Jenssegers\Date\Date::parse($e->end)->format('l j F Y')}}
                    </li>
                    <li>
                      <a class="alert-link" href="{{route('details',['uuid'=>$e->uuid])}}">En savoir plus...</a>
                    </li>
                  </ul>
                  <p>&nbsp;</p>
              <button type="button" class="btn btn-warning">
                    Tickets <span class="badge badge-light">{{$e->tickets}}</span>
              </button>
              <!--p>{{$e->description}}</p-->
              <!--ul class="team-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li><a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a>
                </li>
              </ul-->
              <p>&nbsp;</p>
              <a href="#" class="btn btn-info btn-block">j'achète</a>
            </div>
          </div>
        </div>
        @endforeach
        @endforeach
      </div>
    </div>
  </section>
  <section class="great-started section">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="great-started-text text-center">
            <h4 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">Vous êtes Organisateur d'evènements </h4>
            <h2 class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms">Nous somme prêts à vous accompagner</h2>
            <a href="#" class="btn btn-common wow fadeInUp" data-wow-duration="3000ms" data-wow-delay="100ms">Enregistrer-vous</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('scripts')
<script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel();
          });
</script>
@endsection