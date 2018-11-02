@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Planos</strong></h4>
                            <p class="card-category"><strong>Listagem dos planos</strong></p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('plans.create') }}" class="btn btn-facebook">Novo plano</a>
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
                            <th width="40%">Plano</th>
                            <th width="35%">Espaço</th>
                            <th width="15%">Valor</th>
                            <th class="text-center" width="10%">Ações</th>
                            </thead>
                            <tbody>
                            @foreach($result as $res)
                                <tr>
                                    <td>
                                        {{ $res->name }}
                                    </td>
                                    <td>
                                       <strong>{{ $res->space }}</strong></a>
                                    </td>
                                    <td>
                                        R$ {!! Helper::formatNumber($res->amount, 'BR') !!}
                                    </td>
                                    <td class="td-actions text-center">
                                        <a href="{{ route('plans.edit', [ $res->id ]) }}" rel="tooltip" class="btn btn-facebook"><i class="material-icons">edit</i></a>
                                        <form action="{{route('plans.destroy',$res->id)}}" method="POST" style="display: inline-block">
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