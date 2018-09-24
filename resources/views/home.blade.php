@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person_pin</i>
                    </div>
                    <p class="card-category">Clientes</p>
                    <h3 class="card-title">{{ $client->count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">apps</i>
                        <a href="{{ route('clients.index') }}">Listagem</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">dvr</i>
                    </div>
                    <p class="card-category">Domínios</p>
                    <h3 class="card-title">{{ $domain->count() }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">apps</i>
                        <a href="{{ route('domains.index') }}">Listagem</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <p class="card-category">Faturas</p>
                    <h3 class="card-title">${{ \App\Helpers\Helper::formatNumber($sum, 'BR') }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Faturas de {{ App\Helpers\Helper::formatMouth(date('n')) }}/{{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">local_offer</i>
                    </div>
                    <p class="card-category">Tickets</p>
                    <h3 class="card-title">-</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Tickets em aberto
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title ">Clientes</h4>
                    <p class="card-category"> Últimos clientes cadastraddos </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="muted-text">
                            <th>

                            </th>
                            <th>
                                Nome
                            </th>
                            </thead>
                            <tbody>
                            @foreach($client as $cli)
                            <tr>
                                <td>
                                    <a href="{{ route('clients.show', $cli->id) }}"><i class="material-icons">search</i></a>
                                </td>
                                <td>
                                    {{ $cli->name }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title ">Tickets</h4>
                    <p class="card-category"> Tickets abertos</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="muted-text">
                            <th>

                            </th>
                            <th>
                                Descrição
                            </th>
                            <th>
                                Prioridade
                            </th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <i class="material-icons">search</i>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    -
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
