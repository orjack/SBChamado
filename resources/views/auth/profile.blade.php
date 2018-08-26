@extends('layouts.card')

@section('card_header')
    Perfil
@endsection

@section('card_body')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <img src="/upload/avatar/{{ $user->avatar }}" 
    style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
    <h2>{{ $user->name }}</h2>
    <form action="/profile" method="POST" enctype="multipart/form-data">
        <label for="">Atualizar imagem</label>
        <input type="file" name="avatar">
        @csrf
        <br/>
        <input type="submit" class="btn btn-sm btn-primary float-right">
    </form>
@endsection