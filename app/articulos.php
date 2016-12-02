<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
   protected $table = 'articulos';   //

   protected $fillable = [
        'id', 'codigo', 'precio','descripcion', 'tipo',
    ];
}
