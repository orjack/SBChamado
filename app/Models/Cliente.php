<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $primarykey = 'id';
    protected $table = 'clientes';
    public $fillable = ['id', 'name'];
    public $timestamps = false;
}
