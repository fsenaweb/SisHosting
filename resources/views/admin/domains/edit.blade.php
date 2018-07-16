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
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="payment">Forma de Pagamento</label>
                                <select name="payment" class="form-control" id="payment">
                                    <option value="1" {{ $result->plan_id == '1' ? 'selected' : '' }}>Depósito Bancário</option>
                                    <option value="2" {{ $result->plan_id == '2' ? 'selected' : '' }}>Boleto Bancário</option>
                                    <option value="3" {{ $result->plan_id == '3' ? 'selected' : '' }}>Paypal</option>
                                    <option value="4" {{ $result->plan_id == '4' ? 'selected' : '' }}>Cartão de crédito</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="day_invoice">Dia Vencimento</label>
                                <select name="day_invoice" class="form-control" id="day_invoice">
                                    <option value="10" {{ $result->day_invoice == '10' ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ $result->day_invoice == '20' ? 'selected' : '' }}>20</option>
                                    <option value="30" {{ $result->day_invoice == '30' ? 'selected' : '' }}>30</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="frequency">Periodicidade</label>
                                <select name="frequency" class="form-control" id="frequency">
                                    <option value="1" {{ $result->frequency == '1' ? 'selected' : '' }}>Mensal</option>
                                    <option value="2" {{ $result->frequency == '2' ? 'selected' : '' }}>Trimestral</option>
                                    <option value="3" {{ $result->frequency == '3' ? 'selected' : '' }}>Semestral</option>
                                    <option value="4" {{ $result->frequency == '4' ? 'selected' : '' }}>Anual</option>
                                    <option value="5" {{ $result->frequency == '5' ? 'selected' : '' }}>Bianual</option>
                                    <option value="6" {{ $result->frequency == '6' ? 'selected' : '' }}>Trianual</option>
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