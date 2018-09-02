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
            'id_user' => 'required|unique:tickets',
            'id_client' => 'required|unique:tickets',
           
            'situation' => 'required',
        ];
    
    public $messages =
        [
            'id.required' => 'Este campo Chamado é requerido',
            'id.unique' => 'Este campo id é único',
            'id_user.required'  => 'Este campo nome é requerido',
            'id_user.unique'  => 'Este campo name é único',
            
            'situation.required'  => 'Este campo situação é requirido',
        ];
}
