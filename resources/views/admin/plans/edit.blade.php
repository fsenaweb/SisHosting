@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Planos</strong></h4>
                            <p class="card-category"><strong>Editando plano</strong></p>
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

                    <form action="{{ route('plans.update', $result->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name" class="bmd-label-floating">Plano</label>
                                <input name="name" type="text" class="form-control" id="name" value="{{ $result->name }}" placeholder="ex.: Plano Ouro">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="space" class="bmd-label-floating">Espaço (em MB)</label>
                                <input name="space" type="text" class="form-control" id="space" value="{{ $result->space }}" placeholder="ex.: 1000MB">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="transfer" class="bmd-label-floating">Tx. Transferência (em GB)</label>
                                <input name="transfer" type="text" class="form-control" id="transfer" value="{{ $result->transfer }}" placeholder="ex.: 5GB">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="amount" class="bmd-label-floating">Valor</label>
                                <input name="amount" type="text" class="form-control" id="amount" value="{!! Helper::formatNumber($result->amount, 'BR') !!}" placeholder="ex.: 29,90">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-info">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop