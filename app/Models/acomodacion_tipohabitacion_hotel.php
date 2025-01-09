<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acomodacion_tipohabitacion_hotel extends Model
{
    use HasFactory;

    protected $table = 'acomodacion_tipohabitacion_hotel'; // Nombre de la tabla
    protected $primaryKey = 'idacom_tipohabhotel';

    protected $fillable =[
        'idhotel','idacomodacion',
        'idtipoacomodacion'
    ];

    public $incrementing = true; // Indica que es autoincremental
    protected $keyType = 'int';  // Tipo de la clave primaria
}
