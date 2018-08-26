

<div class="form-group col-10">
    <label>Chamado</label>
    <input class="form-control" type="text" name="id" value="{{ isset($ticket->id) ? $ticket->id : '' }}">
</div>

<div class="form-group col-10">
  <label>Cliente</label>
  <select id="item_empresa" name="id_client" class="custom-select custom-select-lg mb-3">
    @foreach($empresa as $client)
    <option id="#tableitem" name="item_empresa" value="{{ $client->id }}"->{{ $client->name }}</option>
    @endforeach
  </select>
</div>

<div class="form-group col-10">
  <label>Analista</label>
  <select id="user" name="id_user" class="custom-select custom-select-lg mb-3">
    @foreach($user as $u)
    <option id="userItem" name="id_user" value="{{ $u->id }}"->{{ $u->name }}</option>
    @endforeach
  </select>
</div>

<!-- Biblioteca padrão do Jquery na pasta js/ -->
<link rel="stylesheet" href="{{ asset('js/jquery/jquery-ui.theme.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/jquery/jquery-ui.min.css') }}">
<script src="{{ asset('js/jquery/jquery.js') }}" defer></script>
<script src="{{ asset('js/jquery/jquery-ui.js') }}" defer></script>


<div class="form-group col-10">
    <div class="panel-body">
        <div class="md-form">
          <label>Data</label>
          <input id="date" class="form-control" type="text" name="date" value="{{isset($ticket->date) ? $ticket->date : ''}}">
        </div>
    </div>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="situation" id="inlineRadio1" value="0">
  <label class="form-check-label" for="inlineRadio1">Aberto</label>
</div>

<div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="situation" id="inlineRadio1" value="1">
    <label class="form-check-label" for="inlineRadio1">Delta</label>
  </div>

  <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="situation" id="inlineRadio1" value="2">
      <label class="form-check-label" for="inlineRadio1">Concluido</label>
    </div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $("#date").datepicker({
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            dateFormat: 'dd/mm/yy',
        });
    });
    </script>
