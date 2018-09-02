<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['id', 'id_user', 'id_client', 'date', 'situation'];
    public $timestamps = false;
    
    public $rules =
        [
            'id' => 'required|integer|unique:clientes|max:10',
            'id_user' => 'required|unique:clientes',
            'id_client' => 'required|unique:clientes',
            'date' => 'required',
            'situation' => 'required',
        ];
    
    public $messages =
        [
            'id.required' => 'Este campo Chamado é requerido',
            'id.unique' => 'Este campo id é único',
            'id_user.required'  => 'Este campo nome é requerido',
            'id_user.unique'  => 'Este campo name é único',
            'date.required'  => 'Este campo data é requerido',
            'situation.required'  => 'Este campo situação é requirido',
        ];
}
