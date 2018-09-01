@extends('layouts.list')

@section('list_header')
    <h3>Lista de Chamados</h3>
@endsection

@section('list_body')

    <table class="table table-hover">
        <thead align="center">
        <th>Ticket</th>
        <th>Código Cliente</th>
        <th>Cliente</th>
        <th>Analista</th>
        <th>Data</th>
        <th>Situacao</th>
        <th><a class="btn btn-info float-right" href=" {{ route('analyst.add') }}">Adicionar</a></th>
        </thead>
        <tbody align="center">
        @foreach($analyst as $t)
            @foreach($empresa as $e)
                @if($t->id_client == $e->id and $t->id_user == Auth::user()->id )
                    <tr>
                        <td>{{$t->id}}</td>
                        <td>{{$t->id_client}}</td>
                        <td>{{$e->name}}</td>
                        <td><img src="/upload/avatar/{{ Auth::user()->avatar }}" style="width: 40px; height: 40px;
                border-radius: 50%;"></td>
                        <td>{{$t->date}}</td>
                        <td>
                            @if($t->situation == 0)
                                <span class="badge badge-danger" style="width: 30px; height: 30px;
                  border-radius: 50%; padding-top:10px">
                    <strong>A</strong>
                  </span>
                            @elseif ($t->situation == 1)
                                <span class="badge badge-primary" style="width: 30px; height: 30px;
                  border-radius: 50%; padding-top:10px">
                    <strong>D</strong>
                  </span>
                            @else
                                <span class="badge badge-pill badge-success" style="width: 30px; height: 30px;
                  border-radius: 50%; padding-top:10px">
                    <strong>C</strong>
                  </span>
                            @endif</td>
                        <td align="right">
                            <a class="btn btn-sm btn-warning" href=" {{ route('analyst.edit', $t->id) }}">Editar</a>
                            <a class="btn btn-sm btn-danger" href=" {{ route('analyst.delete', $t->id) }}">Deletar</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endforeach
        </tbody>
        <tfoot class="bg-dark text-white" align="center">
        <tr>
            <td>Total Chamados:
                <strong>
                    {{ $count }}
                </strong>
            </td>
            <td></td>
            <td>Total Clientes: <strong>{{$empresa->count()}}</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tfoot>
    </table>
@endsection
