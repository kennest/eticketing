@extends('layouts.admin')

@section('content')
    <div class="container" style="margin-top: 150px;">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <!--Panel-->
                <div class="card">
                    <h3 class="card-header default-color white-text">Administrateur Login:</h3>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-12 control-label">E-Mail</label>

                                <div class="col-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-12 control-label">Password</label>

                                <div class="col-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Sauvegarder ma session
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        Se connecter
                                    </button>

                                    <a href="{{ route('password.request') }}">
                                        Mot de passe oublié?
                                    </a>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('password.request') }}">
                                        Créer un compte
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <p>&nbsp;</p>
                <a href="{{route('home')}}" class="btn btn-block btn-primary">Retour</a>
            </div>
        </div>
    </div>
@endsection
