@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Domínios</strong></h4>
                            <p class="card-category"><strong>Editando dados</strong></p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ url()->previous() }}">
                                <button class="btn btn-facebook">Voltar</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Encontrado(s) erro(s) ao preencher o formulário:</strong><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li >{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('domains.update', $result->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="client">Cliente</label>
                                <select name="client_id" class="form-control" id="client">
                                    @foreach($client as $cli)
                                        <option value="{{ $cli->id }}" {{ $cli->id == $result->client->id ? 'selected' : '' }}>{{ $cli->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="domain" class="bmd-label-floating">Domínio</label>
                                <input name="domain" type="text" class="form-control" id="domain" value="{{ $result->domain }}" placeholder="ex.: dominio.com.br">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="plan">Plano</label>
                                <select name="plan_id" class="form-control" id="plan">
                                    @foreach($plan as $pl)
                                        <option value="{{ $pl->id }}" {{ $pl->id == $result->plan_id ? 'selected' : '' }}>{{ $pl->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-info">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop