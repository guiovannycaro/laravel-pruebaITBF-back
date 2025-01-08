<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoteles extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre','codnifrfc',
        'direccion','telefono','idciudad',
        'numhabitaciones','is_activo'
    ];
}
