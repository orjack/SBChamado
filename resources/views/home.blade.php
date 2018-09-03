@extends('layouts.card')

@section('card_header')
    Dashboard
@endsection

@section('card_body')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif


@endsection