@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title"><strong>Clientes</strong></h4>
                            <p class="card-category"><strong>Listagem dos clientes</strong></p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('clients.create') }}" class="btn btn-facebook">Novo Cadastro</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('sucesso'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('sucesso') }}</strong>
                    </div>
                    @endif
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
                            <th>
                                Telefone
                            </th>
                            <th class="text-center">
                                Ações
                            </th>
                            </thead>
                            <tbody>
                            @foreach($result as $res)
                                <tr>
                                    <td>
                                        <a href="{{ route('clients.show', $res->id) }}"><i
                                                    class="material-icons">search</i></a>
                                    </td>
                                    <td>
                                        {{ $res->name }}
                                    </td>
                                    <td>
                                        {{ $res->email }}
                                    </td>
                                    <td>
                                        {{ $res->phone }}
                                    </td>
                                    <td class="td-actions text-center">
                                        <a href="{{ route('clients.edit', [ $res->id ]) }}" rel="tooltip" class="btn btn-facebook"><i class="material-icons">edit</i></a>
                                        <form action="{{route('clients.destroy',$res->id)}}" method="POST" style="display: inline-block">
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