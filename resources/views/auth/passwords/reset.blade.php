@extends('layouts.login')

@section('content')
    <div class="panel-heading">Solicitação de Nova Senha</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                                </span>
                        </div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="E-mail" required autofocus>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fa fa-key"></i>
                              </span>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Senha" required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fa fa-key"></i>
                              </span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha" required>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info btn-block">
                        Cadastrar nova senha
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
