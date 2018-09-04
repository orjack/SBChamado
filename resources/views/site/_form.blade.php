<div class="form-group col-10">
    <label>Chamado</label>
    <input class="form-control" type="text" name="id" value="{{ isset($ticket->id) ? $ticket->id : '' }}">
    <p style="color:red">{{ $errors->first('id') }}</p>
</div>

<div class="form-group col-10">
    <label>Cliente</label>
    <select id="item_empresa" name="id_client" class="custom-select custom-select-lg mb-3">
        @foreach($empresa as $client)
            <option {{ $ticket->id_client == $client->id ? 'selected' : '' }} id="tableitem" name="item_empresa" value="{{ $client->id }}" ->{{ $client->id }} - {{ $client->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-10 input-append date form_datetime">
    <label>Analista</label>
    <select class="custom-select custom-select-lg mb-3" id="user" name="id_user">
        @foreach($user as $u)
            <option {{ $ticket->id_user == $u->id ? 'selected' : '' }} id="userItem" name="id_user" value="{{ $u->id }}">{{ $u->name }}</option>
        @endforeach
    </select>
</div>


<div class="form-group col-10">
    <div class="panel-body">
        <div class="md-form">
            <label>Data</label>
            <input class="form-control" type="date" name="date"
                   value="{{isset($ticket->date) ? $ticket->date : '' }}">
        </div>
        <p style="color:red">{{ $errors->first('date') }}</p>
    </div>
</div>

<div class="form-group col-10">
    <div class="form-check form-check-inline">
        @if(isset($ticket->situation) && $ticket->situation == 0)
            <input class="form-check-input" checked type="radio" name="situation" id="inlineRadio1" value="0">
        @else
            <input class="form-check-input" checked type="radio" name="situation" id="inlineRadio1" value="0">
        @endif
        <label class="form-check-label" for="inlineRadio1">Aberto</label>
    </div>

    <div class="form-check form-check-inline">
        @if(isset($ticket->situation) && $ticket->situation == 1)
            <input class="form-check-input" checked type="radio" name="situation" id="inlineRadio1" value="1">
        @else
            <input class="form-check-input" type="radio" name="situation" id="inlineRadio1" value="1">
        @endif
        <label class="form-check-label" for="inlineRadio1">Delta</label>
    </div>

    <div class="form-check form-check-inline">
        @if(isset($ticket->situation) && $ticket->situation == 2)
            <input class="form-check-input" checked type="radio" name="situation" id="inlineRadio1" value="2">
        @else
            <input class="form-check-input" type="radio" name="situation" id="inlineRadio1" value="2">
        @endif
        <label class="form-check-label" for="inlineRadio1">Concluido</label>
    </div>
    <p style="color:red">{{ $errors->first('situation') }}</p>
</div>
