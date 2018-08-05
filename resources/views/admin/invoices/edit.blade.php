@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Faturas</strong></h4>
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

                    <form action="{{ route('invoices.update', $result->invoice_id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="pay_input" value="0">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <h3>{{ $result->domain }} </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="date_payment" class="bmd-label-floating">Vencimento</label>
                                <input name="date_payment" type="date" class="form-control" id="date_payment" value="{{ $result->date_payment }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="amount" class="bmd-label-floating">Valor Fatura R$</label>
                                <input name="amount" type="text" class="form-control" id="amount" value="{{ \App\Helpers\Helper::formatNumber($result->amount, 'BR') }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-info">Alterar </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop