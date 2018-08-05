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
                    <h3 class="card-title">{{ $client }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">apps</i>
                        <a href="#">Listagem</a>
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
                    <h3 class="card-title">{{ $domain }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">apps</i>
                        <a href="#">Listagem</a>
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
                        <i class="material-icons">date_range</i> Faturas de Julho/2018
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
                    <h3 class="card-title">+245</h3>
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
                            <th>
                                E-mail
                            </th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <i class="material-icons">search</i>
                                </td>
                                <td>
                                    Francisco Matheus Ricelly Pinto de Sena
                                </td>
                                <td>
                                    fsenaweb@gmail.com
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title ">Faturas</h4>
                    <p class="card-category"> Faturas Vencidas </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="muted-text">
                            <th>

                            </th>
                            <th>
                                Domínio
                            </th>
                            <th>
                                Data Vencimento
                            </th>
                            <th>
                                Valor
                            </th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <i class="material-icons">search</i>
                                </td>
                                <td>
                                    severianomelo.rn.gov.br
                                </td>
                                <td>
                                    10/07/2018
                                </td>
                                <td class="text-danger">
                                    $36,73
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
