<div class="form-group col-6">
    <label>Código</label>
    <input class="form-control " type="text" name="id"
    value="{{ isset($empresa->id) ? $empresa->id : '' }}">
    <p style="color:red">{{ $errors->first('id') }}</p>
</div>


<div class="form-group col-6">
    <label>Nome</label>
    <input class="form-control" type="text" name="name"
    value="{{ isset($empresa->name) ? $empresa->name : '' }}">
    <p style="color:red">{{ $errors->first('name') }}</p>
</div>

