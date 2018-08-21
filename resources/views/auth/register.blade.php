@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('pseudo_membre') ? ' has-error' : '' }}">
                            <label for="pseudo_membre" class="col-md-4 control-label">Pseudonyme :</label>

                            <div class="col-md-6">
                                <input id="pseudo_membre" type="text" class="form-control" name="pseudo_membre" value="{{ old('pseudo_membre') }}" required autofocus>

                                @if ($errors->has('pseudo_membre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pseudo_membre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adresse e-mail :</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nom_membre') ? ' has-error' : '' }}">
                            <label for="nom_membre" class="col-md-4 control-label">Nom :</label>

                            <div class="col-md-6">
                                <input id="nom_membre" type="nom_membre" class="form-control" name="nom_membre" value="{{ old('nom_membre') }}" required>

                                @if ($errors->has('nom_membre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom_membre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('prenom_membre') ? ' has-error' : '' }}">
                            <label for="prenom_membre" class="col-md-4 control-label">Prénom :</label>

                            <div class="col-md-6">
                                <input id="prenom_membre" type="prenom_membre" class="form-control" name="prenom_membre" value="{{ old('prenom_membre') }}" required>

                                @if ($errors->has('prenom_membre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom_membre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe :</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe :</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    S'inscrire
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
