@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Domínios</strong></h4>
                            <p class="card-category"><strong>Nova fatura</strong></p>
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
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('domains.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="client">Cliente</label>
                                <select name="client_id" class="form-control" id="client">
                                    @foreach($client as $cli)
                                        <option value="{{ $cli->id }}">{{ $cli->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="domain" class="bmd-label-floating">Domínio</label>
                                <input name="domain" type="text" class="form-control" id="domain" value="{{ old('domain') }}" placeholder="ex.: dominio.com.br">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="plan">Plano</label>
                                <select name="plan_id" class="form-control" id="plan">
                                    @foreach($plan as $pl)
                                        <option value="{{ $pl->id }}">{{ $pl->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="payment">Forma de Pagamento</label>
                                <select name="payment" class="form-control" id="payment">
                                    <option value="1">Depósito Bancário</option>
                                    <option value="2">Boleto Bancário</option>
                                    <option value="3">Paypal</option>
                                    <option value="4">Cartão de crédito</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="day_invoice">Dia Vencimento</label>
                                <select name="day_invoice" class="form-control" id="day_invoice">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="frequency">Periodicidade</label>
                                <select name="frequency" class="form-control" id="frequency">
                                    <option value="1">Mensal</option>
                                    <option value="2">Trimestral</option>
                                    <option value="3">Semestral</option>
                                    <option value="4">Anual</option>
                                    <option value="5">Bianual</option>
                                    <option value="6">Trianual</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="first_data_invoice" class="bmd-label-floating">Data Primeira Fatura</label>
                                <input name="first_data_invoice" type="date" class="form-control" id="first_data_invoice" value="{{ old('first_data_invoice') }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="first_amount_invoice" class="bmd-label-floating">Valor Primeira Fatura</label>
                                <input name="first_amount_invoice" type="text" class="form-control" id="first_amount_invoice" value="{{ old('first_amount_invoice') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="amount_invoice" class="bmd-label-floating">Valor faturas</label>
                                <input name="amount_invoice" type="text" class="form-control" id="amount_invoice" value="{{ old('amount_invoice') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="information">Observação</label>
                                <textarea name="information" class="form-control" id="information"
                                          rows="4">{{ old('information') }}</textarea>
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