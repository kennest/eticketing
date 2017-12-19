@extends('layouts.admin')
@section('content')
    <h3 style="margin-top: 15px;" class="alert alert-success text-center">Les Evenements publiés par vous</h3>
    <div class="row">
    @foreach($events as $e)
            <div class="card col-4" style="padding-left: 0px;padding-right: 0px;">
                <img class="card-img-top" src="{{Storage::url($e->picture)}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$e->title}}</h4>
                    <p class="card-text">
                    <p>
                        <a class="btn btn-outline-primary" data-toggle="collapse" href="#{{$e->uuid}}" aria-expanded="false" aria-controls="collapseExample">
                            Voir La description
                        </a>
                    </p>
                    <div class="collapse" id="{{$e->uuid}}">
                        <div class="card card-block">
                            <em>{{$e->description}}</em>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{Jenssegers\Date\Date::parse($e->begin)->format('l j F Y')}}&nbsp;<strong>au</strong>&nbsp;{{Jenssegers\Date\Date::parse($e->end)->format('l j F Y')}}</li>
                    @if(Auth::user()->role==1)
                    <li class="list-group-item">{{$e->tickets}} ticket(s) , vendus 0</li>
                    @endif
                    <li class="list-group-item">
                        <strong>
                        {{$e->type->type}}
                        </strong>
                    </li>
                </ul>
                <div class="card-body">
                    <a href="{{route('admin.form.event',['uuid'=>$e->uuid])}}" class="card-link">Modifier</a>
                    <a href="#" class="card-link">Supprimer</a>
                </div>
            </div>
    @endforeach
    </div>
    <ul class="pagination">
        {!! $events->links() !!}
    </ul>
    <p>
        <a class="btn btn-block btn-info" href="{{ URL::previous()}}">Retour</a>
    </p>
@endsection