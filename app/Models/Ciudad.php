<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudad'; // Nombre de la tabla
    protected $primaryKey = 'idciudad';

    protected $fillable =[
        'nombre','codoficial',
        'latitud','longitud','iddepartamento',
        'codpostal'
    ];

    public $incrementing = true; // Indica que es autoincremental
    protected $keyType = 'int';  //
}
