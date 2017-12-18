@extends('layouts.admin')

@section('content')
    <p>&nbsp;</p>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h1>
           Bienvenue <strong>{{Auth::user()->name}}</strong> ! Vous pouvez maintenant publier vos événements.C'est gratuit!!!
       </h1>
    </div>

    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h1>
           {{Auth::user()->evenements()->count()}} événement(s) actuellement
        </h1>
    </div>

    @if(Auth::user()->role==0)
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h1>
            Votre compte est actuellement en Mode <strong>SIMPLE</strong>,
            <p>Vous ne pouvez donc pas beneficier du service de vente de ticket de notre plateforme</p>
        </h1>
        <p>
            <a href="{{route('admin.goprime')}}" class="btn btn-info">
                Passer en mode <strong>PRIME</strong>
            </a>
        </p>
    </div>
    @endif
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Vos Statistiques</h3>
        </div>
        <div class="card-body">
            Panel content
        </div>
        <div class="card-footer">Panel footer</div>
    </div>
            <!--/.Carousel Wrapper-->
@endsection
