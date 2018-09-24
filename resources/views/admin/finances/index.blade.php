@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <p class="card-category card-header-success text-white">Faturamento Total</p>
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>
                                    Créditos
                                </td>
                                <td class="text-right">
                                    R$ {{ \App\Helpers\Helper::formatNumber($sumTotal, 'BR') }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Débitos
                                </td>
                                <td class="text-right">
                                    R$ {{ \App\Helpers\Helper::formatNumber($debTotal, 'BR') }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <p class="card-category card-header-info text-white"><strong>Faturamento atual</strong> - {{ App\Helpers\Helper::formatMouth(date('n')) }}</p>
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>
                                    Créditos
                                </td>
                                <td class="text-right">
                                    R$ {{ \App\Helpers\Helper::formatNumber($sumMouth, 'BR') }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Débitos
                                </td>
                                <td class="text-right">
                                    R$ {{ \App\Helpers\Helper::formatNumber($debMouth, 'BR') }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <p class="card-category card-header-warning text-white"><strong>Faturamento anterior</strong> - {{ App\Helpers\Helper::formatMouth(date('n')-1) }}</p>
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>
                                    Créditos
                                </td>
                                <td class="text-right">
                                    R$ {{ \App\Helpers\Helper::formatNumber($sumLast, 'BR') }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Débitos
                                </td>
                                <td class="text-right">
                                    R$ {{ \App\Helpers\Helper::formatNumber($debLast, 'BR') }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop