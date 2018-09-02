<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';    
    protected $primaryKey = 'id';
    public $fillable = ['id', 'name'];
    public $timestamps = false;

    public $rules =
        [
            'id' => 'required|integer|unique:clientes',
            'name' => 'required|unique:clientes|max:255',
        ];
    

    public $messages =
        [
            'id.required' => 'Este campo id é requerido',
            'id.unique' => 'Este campo id é único',
            'name.required'  => 'Este campo nome é requerido',
            'name.unique'  => 'Este campo name é único',
        ];
}
