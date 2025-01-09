<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoteles extends Model
{
    use HasFactory;

    protected $table = 'hoteles'; // Nombre de la tabla
    protected $primaryKey = 'idhotel';

    protected $fillable =[
        'nombre','codnifrfc',
        'direccion','telefono','idciudad',
        'numhabitaciones','is_activo'
    ];

    public $incrementing = true; // Indica que es autoincremental
    protected $keyType = 'int';  // Tipo de la clave primaria
}
