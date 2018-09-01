@extends('layouts.card')

@section('card_header')
<h3 class="center">Adicionar Cliente</h3>
@endsection

@section('card_body')
<form class="form-group" action="{{ route('client.save') }}"
method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  @include('site.client._form')

  <button class="btn btn-primary" type="submit">Salvar</button>
</form>
@endsection
