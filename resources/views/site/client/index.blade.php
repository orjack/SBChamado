@extends('layouts.list')

@section('list_header')
<h3>Lista de Chamados</h3>
@endsection

@section('list_body')

<table class="table table-hover">
  <thead align="center">
    <th>Código Cliente</th>
    <th>Cliente</th>
    <th>Situação</th>
    <th><a class="btn btn-info float-right"
      href=" {{ route('client.add') }}">Adicionar</a></th>
  </thead>

  <tbody align="center">
    @foreach($empresa as $e)
    <tr>
      <td>{{$e->id}}</td>
      <td>{{$e->name}}</td>
      <td>
      @if($e->situation == 0)
      Ativo
      @else
      Inativo
      @endif
      </td>
      <td align="right" >
        <a class="btn btn-sm btn-warning"
        href=" {{ route('client.edit', $e->id) }}">Editar</a>
        <a class="btn btn-sm btn-danger"
        href=" {{ route('client.delete', $e->id) }}">Deletar</a>
      </td>
    </tr>
  @endforeach
  </tbody>

  <tfoot class="bg-dark text-white" align="center">
    <tr>
      <td>Total Clientes: <strong>{{$empresa->count()}}</strong></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tfoot>
</table>
@endsection