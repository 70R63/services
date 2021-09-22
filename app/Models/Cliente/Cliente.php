<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = 'cliente';
    
    //Permite guardar de forma masiva
    protected $guarded = [];

}
