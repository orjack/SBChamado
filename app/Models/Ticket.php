<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';  
    protected $fillable = ['id', 'id_user', 'id_client', 'date', 'situation'];
    public $timestamps = false;
}
