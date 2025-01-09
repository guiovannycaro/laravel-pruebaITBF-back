<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acomodacion extends Model
{
    use HasFactory;

    protected $table = 'acomodacion'; // Nombre de la tabla
    protected $primaryKey = 'idacomodacion';

    protected $fillable =[
        'descripcion','is_activo'

    ];

    public $incrementing = true; // Indica que es autoincremental
    protected $keyType = 'int';  //
}

