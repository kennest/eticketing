@extends('layouts.admin')

@section('content')
    <div style="position: relative; left: 43%; color: white;" class="logo">
    </div>
    <div class="container" style="margin-top: 80px;">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <!--Panel-->
                <div class="card" style="padding:0px 15px 15px 15px;">
                    <h3 class="card-header default-color white-text">Création de compte:</h3>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.register.submit') }}">
                                @include('errors.validation')
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Nom *:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nom ou raison Social">
                            </div>
                            <div class="form-group">
                                <label for="email">Email * :</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe * :</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Retapez le Mot de passe * :</label>
                                <input type="password" id="password2" name="password2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Choisir votre type de compte *:</label>
                                <div class="alert alert-info">
                                    <p><em><strong>SIMPLE:</strong> vous bénéficirez seulement du service de mise en ligne et de gestion de vos évenement</em></p>
                                    <p><em><strong>PRIME:</strong> vous bénéficirez du service SIMPLE en plus du service de  gestion de vente de tickets de notre plateforme</em></p>
                                </div>
                                <select class="form-control" name="type">
                                    <option value="0" selected>SIMPLE</option>
                                    <option value="1">PRIME</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Soumettre</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p>&nbsp;</p>
                <a href="{{route('home')}}" class="btn btn-block btn-primary">Retour</a>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
@endsection
