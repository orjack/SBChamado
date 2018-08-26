@extends('layouts.list')

@section('list_header')
<h3 class="center">Atualizar Cliente</h3>
@endsection

@section('list_body')
<form class="form-group" action="{{ route('analyst.update', $ticket->id) }}"
method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="put">
    @include('site.analyst._form')
    <a class="float-right btn btn-danger" href="{{ route('analyst') }}" style="margin-left:5px;">Voltar</a>
    <button class="float-right btn btn-primary">Atualizar</button>
</form
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function ajaxprod(){
      $.ajax({
          type: "GET",
          data: {item_empresa: $("#item_empresa").val()},
          url: "/ticket/ajaxCoord",
          success: function(response) {
            $('#tableitem').html(response);
          }
      });
    }
</script>
