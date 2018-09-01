@extends('layouts.card')
@section('card_header')
<h3 class="center">Adicionar Cliente</h3>
@endsection

@section('card_body')
<form class="form-group" action="{{ route('analyst.save') }}"
method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  @include('site._form')
  <a class="float-right btn btn-danger" href="{{ route('analyst') }}" style="margin-left:5px;">Voltar</a>
  <button  class="float-right btn btn-primary" type="submit">Salvar</button>
</form>
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
    function ajaxprod(){
      $.ajax({
          type: "GET",
          data: {item_empresa: $("#user").val()},
          url: "/ticket/ajaxCoord",
          success: function(response) {
            $('#userItem').html(response);
          }
      });
    }
</script>
