@extends('layouts.list')

@section('list_header')
<h3 class="center">Atualizar Cliente</h3>
@endsection

@section('list_body')
<form class="form-group" action="{{ route('ticket.update', $ticket->id) }}"
method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="put">
    @include('site._form')
    <a class="float-right btn btn-danger" href="{{ route('ticket') }}" style="margin-left:5px;">Voltar</a>
    <button class="float-right btn btn-primary">Atualizar</button>
</form
@endsection
