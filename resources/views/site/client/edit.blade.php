@extends('layouts.card')

@section('card_header')
<h3 class="center">Atualizar Cliente</h3>
@endsection

@section('card_body')
    <form class="form-group" action="{{ route('client.update', $empresa->id) }}"
    method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('site.client._form')

        <button class="float-right btn btn-primary">Atualizar</button>
    </form>
@endsection
