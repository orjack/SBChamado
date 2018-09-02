<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{    
    public $table = 'tickets';
    protected $fillable = ['id', 'id_user', 'id_client', 'date', 'situation'];
    public $timestamps = false;
    
    public $rules =
        [
            'id' => 'required|integer|unique:tickets',
            'date' => 'required',
            'situation' => 'required',
        ];
    
    public $messages =
        [
            'id.required' => 'Este campo Chamado é requerido',
            'id.unique' => 'Este campo id é único',
            'date.required'  => 'Este campo data é requerido',
            'situation.required'  => 'Este campo situação é requirido',
        ];
}
