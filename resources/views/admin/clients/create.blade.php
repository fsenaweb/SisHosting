@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Clientes</strong></h4>
                            <p class="card-category"><strong>Novo cadastro</strong></p>
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

                    <form action="{{ route('clients.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row" style="padding-left: 2vw;">
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="1"  @if(old('type') ==  1) checked="checked" @endif> Pessoa Física
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="type" id="type" value="2" @if(old('type') ==  2) checked="checked" @endif> Pessoa Jurídica
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
                                <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone" class="bmd-label-floating">Telefone</label>
                                <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email" class="bmd-label-floating">E-mail principal</label>
                                <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email_second" class="bmd-label-floating">E-mail secundário</label>
                                <input name="email_second" type="email" class="form-control" id="email_second" value="{{ old('email_second') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="cpf_cnpj" class="bmd-label-floating">CPF/CNPJ</label>
                                <input name="cpf_cnpj" type="text" class="form-control" id="cpf_cnpj" value="{{ old('cpf_cnpj') }}">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="company_name" class="bmd-label-floating">Razão Social</label>
                                <input name="company_name" type="text" class="form-control" id="company_name" value="{{ old('company_name') }}">
                            </div>
                        </div>
                        <hr>
                            <h6 class="title">Endereço</h6>
                        <div class="row">
                            <div class="form-group col-md-11">
                                <label for="address" class="bmd-label-floating">Endereço</label>
                                <input name="address" type="text" class="form-control" id="address" value="{{ old('address') }}">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="number" class="bmd-label-floating">Nº</label>
                                <input name="number" type="number" class="form-control" id="number" value="{{ old('number') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label for="district" class="bmd-label-floating">Bairro</label>
                                <input name="district" type="text" class="form-control" id="district" value="{{ old('district') }}">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="complement" class="bmd-label-floating">Complemento</label>
                                <input name="complement" type="text" class="form-control" id="complement" value="{{ old('complement') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7">
                                <label for="city" class="bmd-label-floating">Cidade</label>
                                <input name="city" type="text" class="form-control" id="city" value="{{ old('city') }}">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="state" class="bmd-label-floating">UF</label>
                                <input name="state" type="text" class="form-control" id="state" value="{{ old('state') }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="postal_code" class="bmd-label-floating">CEP</label>
                                <input name="postal_code" type="text" class="form-control" id="postal_code" value="{{ old('postal_code') }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="type_register">Tipo Cadastro</label>
                                <select name="type_register" id="type_register" class="form-control" value="{{ old('type_register') }}">
                                    <option value="1" selected>Ativo</option>
                                    <option value="2">Prospecto</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="information">Observação</label>
                                <textarea name="information" class="form-control" id="information" rows="4">{{ old('information') }}</textarea>
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