@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <p class="card-category card-header-success text-white">Planos</p>
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">apps</i>
                        <a href="{{ route('plans.index') }}">Listagem</a>
                    </div>
                    <div class="stats">
                        <i class="material-icons">add_circle</i>
                        <a href="{{ route('plans.create') }}">Cadastro</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <p class="card-category card-header-info text-white"><strong>Tickets</strong> - Categorias</p>
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">apps</i>
                        <a href="{{ route('plans.index') }}">Listagem</a>
                    </div>
                    <div class="stats">
                        <i class="material-icons">add_circle</i>
                        <a href="{{ route('plans.create') }}">Cadastro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop