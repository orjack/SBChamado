@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-light">
                        @yield('card_header')
                    </div>
    
                    <div class="card-body">
                        @yield('card_body')
                    </div>
                </div>   
            </div>
        </div>
    </div>
        
@endsection
