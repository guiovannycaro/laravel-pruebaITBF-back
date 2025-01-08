<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acomodacion_tipohabitacion_hotel extends Model
{
    use HasFactory;

    protected $fillable =[
        'idhotel','idacomodacion',
        'idtipoacomodacion'
    ];
}
