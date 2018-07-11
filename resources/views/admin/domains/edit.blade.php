@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Clientes</strong></h4>
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

                    <form action="{{ route('clients.update', $result->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="row" style="padding-left: 2vw;">
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="1"  @if($result->type ==  1) checked="checked" @endif> Pessoa Física
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="2" @if($result->type !=  1) checked="checked" @endif> Pessoa Jurídica
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <h6 class="title">Dados pessoais</h6>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="name" class="bmd-label-floating">Nome Completo</label>
                                <input name="name" type="text" class="form-control" id="name" value="{{ $result->name }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone" class="bmd-label-floating">Telefone</label>
                                <input name="phone" type="text" class="form-control" id="phone" value="{{ $result->phone }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email" class="bmd-label-floating">E-mail principal</label>
                                <input name="email" type="email" class="form-control" id="email" value="{{ $result->email }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email_second" class="bmd-label-floating">E-mail secundário</label>
                                <input name="email_second" type="email" class="form-control" id="email_second" value="{{ $result->email_second }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="cpf_cnpj" class="bmd-label-floating">CPF/CNPJ</label>
                                <input name="cpf_cnpj" type="text" class="form-control" id="cpf_cnpj" value="{{ $result->cpf_cnpj }}">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="company_name" class="bmd-label-floating">Razão Social</label>
                                <input name="company_name" type="text" class="form-control" id="company_name" value="{{ $result->company_name }}">
                            </div>
                        </div>
                        <hr>
                        <h6 class="title">Endereço</h6>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="address" class="bmd-label-floating">Endereço</label>
                                <input name="address" type="text" class="form-control" id="address" value="{{ $result->address }}">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="number" class="bmd-label-floating">Nº</label>
                                <input name="number" type="number" class="form-control" id="number" value="{{ $result->number }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="district" class="bmd-label-floating">Bairro</label>
                                <input name="district" type="text" class="form-control" id="district" value="{{ $result->district }}">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="complement" class="bmd-label-floating">Complemento</label>
                                <input name="complement" type="text" class="form-control" id="complement" value="{{ $result->complement }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7">
                                <label for="city" class="bmd-label-floating">Cidade</label>
                                <input name="city" type="text" class="form-control" id="city" value="{{ $result->city }}">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="state" class="bmd-label-floating">UF</label>
                                <input name="state" type="text" class="form-control" id="state" value="{{ $result->state }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="postal_code" class="bmd-label-floating">CEP</label>
                                <input name="postal_code" type="text" class="form-control" id="postal_code" value="{{ $result->postal_code }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="type_register">Tipo Cadastro</label>
                                <select name="type_register" id="type_register" class="form-control" value="{{ old('type_register') }}">
                                    <option value="1" {{ $result->type_register == 1 ? 'selected' : '' }}>Ativo</option>
                                    <option value="2" {{ $result->type_register == 2 ? 'selected' : '' }}>Prospecto</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="information">Observação</label>
                                <textarea name="information" class="form-control" id="information" rows="4">{{ $result->information }}</textarea>
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