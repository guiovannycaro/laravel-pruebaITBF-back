<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentoestado extends Model
{
    use HasFactory;
    protected $table = 'departamentoestado'; // Nombre de la tabla
    protected $primaryKey = 'iddepartamento';

    protected $fillable =[
        'idpais','codoficial',
        'nombre','latitud',
        'longitud'
    ];

    public $incrementing = true; // Indica que es autoincremental
    protected $keyType = 'int';  //
}
