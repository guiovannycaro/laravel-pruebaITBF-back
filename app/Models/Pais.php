<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'pais'; // Nombre de la tabla
    protected $primaryKey = 'idpais';

    protected $fillable =[
        'nombre','cod_oficial_iso',
        'iso2','iso3','latitud',
        'longitud','codpostal'
    ];

    public $incrementing = true; // Indica que es autoincremental
    protected $keyType = 'int';  //
}
