@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Faturas</strong></h4>
                            <p class="card-category"><strong>Listagem das faturas</strong></p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('invoices.create') }}" class="btn btn-facebook">Nova fatura</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif
                    @if(session('invoice'))
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ session('invoice') }}</strong>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="muted-text">
                            <th width="28%">Domínio</th>
                            <th width="14%">Valor</th>
                            <th width="15%">Vencimento</th>
                            <th width="28%">Cliente</th>
                            <th class="text-center" width="15%">Ações</th>
                            </thead>
                            <tbody>
                            @foreach($result as $res)
                                <tr>
                                    <td>
                                        {{ $res->domain_name }}
                                    </td>
                                    <td>
                                        R$ {{ \App\Helpers\Helper::formatNumber($res->amount, 'BR') }}
                                    </td>
                                    <td>
                                        {{ date("d/m/Y", strtotime($res->date_payment)) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('clients.show', $res->client_id) }}">{{ $res->name }}</a>
                                    </td>
                                    <td class="td-actions text-center">
                                        <form action="{{route('invoices.update', [ $res->id ])}}" method="POST" style="display: inline-block">
                                            {{ method_field('PUT') }}
                                            {{csrf_field()}}
                                            <input type="hidden" name="pay_input" value="1">
                                            <button type="submit" rel="tooltip" class="btn btn-success" title="Pagar fatura" onClick="if(confirm('Confirmar pagamento?'))
    return true; else return false;"><i class="material-icons">attach_money</i></button>
                                        </form>
                                        <a href="{{ route('invoices.edit', [ $res->id ]) }}" rel="tooltip" class="btn btn-facebook" title="Editar fatura"><i class="material-icons">edit</i></a>
                                        <form action="{{route('invoices.destroy', [ $res->id ])}}" method="POST" style="display: inline-block">
                                            {{ method_field('DELETE') }}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger" rel="tooltip" class="btn btn-danger" onClick="if(confirm('Deseja realmente excluir?'))
    return true; else return false;" title="Excluir fatura"><i class="material-icons">close</i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{ $result }}
                </div>
            </div>
        </div>
    </div>

@stop