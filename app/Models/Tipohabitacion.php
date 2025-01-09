<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipohabitacion extends Model
{
    use HasFactory;

    protected $table = 'tipohabitaciones'; // Nombre de la tabla
    protected $primaryKey = 'idtipohabitacion';

    protected $fillable =[
        'descripcion','is_activo'

    ];

    public $incrementing = true; // Indica que es autoincremental
    protected $keyType = 'int';  //
}
