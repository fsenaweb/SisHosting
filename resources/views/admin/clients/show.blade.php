@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $result->name }} -
                        @if($result->type == '1')
                            <small class="text-muted">Pessoa Física</small>
                        @else
                            <small class="text-muted">Pessoa Jurídica</small>
                        @endif
                    </h2>
                    <hr>
                    @if($result->company_name == null)

                    @else
                        <h4 class="text-muted"><strong>Razão Social: </strong> {{ $result->company_name }}</h4>
                    @endif
                    <h4 class="text-muted"><strong>E-mails: </strong> {{ $result->email . ' - ' . $result->email_second }}</h4>
                    <h4 class="text-muted"><strong>Telefone: </strong> {{ $result->phone }}</h4>
                    <h4 class="text-muted"><strong>CPF/CNPJ: </strong> {{ $result->cpf_cnpj }}</h4>
                    <hr>
                    <h3>Endereço</h3>
                    <h4 class="text-muted"><strong>Endereço: </strong> {{ $result->address . ',' . $result->number }}</h4>
                    @if($result->complement == null)

                    @else
                        <h4 class="text-muted"><strong>Complemento: </strong> {{ $result->complement }}</h4>
                    @endif
                    <h4 class="text-muted"><strong>Bairro: </strong> {{ $result->district}}</h4>
                    <h4 class="text-muted"><strong>CEP: </strong> {{ $result->postal_code}}</h4>
                    <h4 class="text-muted"><strong>Cidade/UF: </strong> {{ $result->city . '/' . $result->state}}</h4>
                    @if($result->type_register == '1')
                        <h4 class="text-muted"><strong>Classificação: </strong> Ativo</h4>
                    @else
                        <h4 class="text-muted"><strong>Classificação: </strong> Prospecto</h4>
                    @endif
                    <h4 class="text-muted"><strong>Observação: </strong></h4>
                    <h4 class="text-muted">{{ $result->information}}</h4>
                </div>
            </div>
            <a href="{{ url()->previous() }}"><button class="btn btn-default">Voltar</button></a>
        </div>
    </div>

@stop