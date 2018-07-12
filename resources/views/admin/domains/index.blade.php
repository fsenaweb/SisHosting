@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Domínios</strong></h4>
                            <p class="card-category"><strong>Listagem dos domínios</strong></p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('domains.create') }}" class="btn btn-facebook">Nova fatura</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('sucesso'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('sucesso') }}</strong>
                    </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="muted-text">
                            <th width="40%">Domínio</th>
                            <th width="35%">Cliente</th>
                            <th width="15%">Plano</th>
                            <th class="text-center" width="10%">Ações</th>
                            </thead>
                            <tbody>
                            @foreach($result as $res)
                                <tr>
                                    <td>
                                        {{ $res->domain }}
                                    </td>
                                    <td>
                                        <a href="{{ route('clients.show', $res->client->id) }}" class="text-secondary"><strong>{{ $res->client->name }}</strong></a>
                                    </td>
                                    <td>
                                        {{ $res->plan->name }}
                                    </td>
                                    <td class="td-actions text-center">
                                        <a href="{{ route('domains.edit', [ $res->id ]) }}" rel="tooltip" class="btn btn-facebook"><i class="material-icons">edit</i></a>
                                        <form action="{{route('domains.destroy',$res->id)}}" method="POST" style="display: inline-block">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger" rel="tooltip" class="btn btn-danger" onClick="if(confirm('Deseja realmente excluir?'))
    return true; else return false;"><i class="material-icons">close</i></button>
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