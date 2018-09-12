@extends('layouts.list')

@section('list_header')
    Dashboard
@endsection

@section('list_body')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <ul class="list-group col-4">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Total de chamados Ano Atual
                <span class="badge badge-primary badge-pill">{{ $ano }}</span>
             </li>
         </ul>
         <ul class="list-group col-4">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Total de chamados Ano Anterior
                <span class="badge badge-primary badge-pill">{{ $ano_anterior }}</span>
            </li>
        </ul>
    </div>
    <br/>
    <div class="row">
        <div class="col col-4">
            <h5>Semanal</h5>
            <table class="table table-sm table-hover table-dark table-responsive-sm">

                <thead align="center">
                <th>Analista</th>
                <th>Situação</th>
                <th>Total</th>
                </thead>

                <tbody align="center">
                @foreach($user as $u)
                    @foreach($analyst as $a)
                        <tr>
                            <td><img data-toggle="tooltip" data-placement="top" title="{{ $u->name }}"
                                     src="upload/avatar/{{ $u->avatar }}" style="width: 40px; height: 40px;
        border-radius: 50%;"></td>
                            <td>
                                @if($a->situation == 0)
                                    <span data-toggle="tooltip" data-placement="top" title="Aberto"
                                          class="badge badge-danger" style="width: 30px; height: 30px;border-radius: 50%; padding-top:10px">
                                <strong>A</strong>
                            </span>
                                @elseif ($a->situation == 1)


                                    <span data-toggle="tooltip" data-placement="top" title="Delta"
                                          class="badge badge-primary" style="width: 30px; height: 30px;border-radius: 50%; padding-top:10px">
                                <strong>D</strong>
                            </span>
                                @else


                                    <span data-toggle="tooltip" data-placement="top" title="Concluído"
                                          class="badge badge-pill badge-success" style="width: 30px; height: 30px;border-radius: 50%; padding-top:10px">
                                <strong>C</strong>
                            </span>
                                @endif
                            </td>
                            @if($a->situation == 0)
                                <td class="font-weight-bold">{{$data_aberto->where('id_user', $u->id)->count()}}</td>
                            @elseif($a->situation == 1)
                                <td class="font-weight-bold">{{$data_delta->where('id_user', $u->id)->count()}}</td>
                            @else
                                <td class="font-weight-bold">
                                    {{$data_concluido->where('id_user', $u->id)->count()}}</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
                </tbody>

                <tfoot class="bg-dark text-white" align="center">

                <tr>
                    <td> Abertos:{{$data_aberto->where('situation', 0)->count()}}</td>
                    <td> Delta:{{$data_delta->where('situation', 1)->count()}}</td>
                    <td> Concluído:{{$data_concluido->where('situation', 2)->count()}}</td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="col col-4">
            <h5>Semana Anterior</h5>
            <table class="table table-sm table-hover table-dark table-responsive-sm">
                <thead align="center">
                <th>Analista</th>
                <th>Situação</th>
                <th>Total</th>
                </thead>

                <tbody align="center">
                @foreach($user as $u)
                    @foreach($analyst as $a)
                        <tr>
                            <td><img data-toggle="tooltip" data-placement="top" title="{{$u->name}}"
                                     src="upload/avatar/{{ $u->avatar }}" style="width: 40px; height: 40px;
    border-radius: 50%;"></td>
                            <td>
                                @if($a->situation == 0)
                                    <span data-toggle="tooltip" data-placement="top" title="Aberto"
                                          class="badge badge-danger" style="width: 30px; height: 30px;
border-radius: 50%; padding-top:10px">
                            <strong>A</strong>
                        </span>
                                @elseif ($a->situation == 1)
                                    <span data-toggle="tooltip" data-placement="top" title="Delta"
                                          class="badge badge-primary" style="width: 30px; height: 30px;
border-radius: 50%; padding-top:10px">
                            <strong>D</strong>
                        </span>
                                @else
                                    <span data-toggle="tooltip" data-placement="top" title="Concluído"
                                          class="badge badge-pill badge-success" style="width: 30px; height: 30px;
border-radius: 50%; padding-top:10px">
                            <strong>C</strong>
                        </span>
                                @endif
                            </td>
                            @if($a->situation == 0)
                                <td class="font-weight-bold">{{$semana_anterior_aberto->where('id_user', $u->id)->count()}}</td>
                            @elseif($a->situation == 1)
                                <td class="font-weight-bold">{{$semana_anterior_delta->where('id_user', $u->id)->count()}}</td>
                            @else
                                <td class="font-weight-bold">{{$semana_anterior_concluido->where('id_user', $u->id)->count()}}</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
                </tbody>

                <tfoot class="bg-dark text-white" align="center">
                <tr>
                    <td> Abertos:{{$semana_anterior_aberto->where('situation', 0)->count()}}</td>
                    <td> Delta:{{$semana_anterior_delta->where('situation', 1)->count()}}</td>
                    <td> Concluído:{{$semana_anterior_concluido->where('situation', 2)->count()}}</td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="col col-4">
            <h5>Mensal</h5>
            <table class="table table-sm table-hover table-dark table-responsive-sm">
                <thead align="center">
                <th>Analista</th>
                <th>Situação</th>
                <th>Total</th>
                </thead>

                <tbody align="center">
                @foreach($user as $u)
                    @foreach($analyst as $a)
                        <tr>
                            <td><img data-toggle="tooltip" data-placement="top" title="{{ $u->name }}"
                                     src="upload/avatar/{{ $u->avatar }}" style="width: 40px; height: 40px;
    border-radius: 50%;"></td>
                            <td>
                                @if($a->situation == 0)
                                    <span data-toggle="tooltip" data-placement="top" title="Aberto"
                                          class="badge badge-danger" style="width: 30px; height: 30px;
border-radius: 50%; padding-top:10px">
                            <strong>A</strong>
                        </span>
                                @elseif ($a->situation == 1)
                                    <span data-toggle="tooltip" data-placement="top" title="Delta"
                                          class="badge badge-primary" style="width: 30px; height: 30px;
border-radius: 50%; padding-top:10px">
                            <strong>D</strong>
                        </span>
                                @else
                                    <span data-toggle="tooltip" data-placement="top" title="Concluído"
                                          class="badge badge-pill badge-success" style="width: 30px; height: 30px;
border-radius: 50%; padding-top:10px">
                            <strong>C</strong>
                        </span>
                                @endif
                            </td>
                            @if($a->situation == 0)
                                <td class="font-weight-bold">{{$mensal_aberto->where('id_user', $u->id)->count()}}</td>
                            @elseif($a->situation == 1)
                                <td class="font-weight-bold">{{$mensal_delta->where('id_user', $u->id)->count()}}</td>
                            @else
                                <td class="font-weight-bold">{{$mensal_concluido->where('id_user', $u->id)->count()}}</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
                </tbody>

                <tfoot class="bg-dark text-white" align="center">
                <tr>
                    <td> Abertos:{{$mensal_aberto->where('situation', 0)->count()}}</td>
                    <td> Delta:{{$mensal_delta->where('situation', 1)->count()}}</td>
                    <td> Concluído:{{$mensal_concluido->where('situation', 2)->count()}}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
