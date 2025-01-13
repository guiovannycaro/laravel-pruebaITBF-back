<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Acomodaciontipohabitacionhoteleles;

class AcomodaciontipohabitacionhotelelesController extends Controller
{
     public function index()
    {
        $resultados = DB::table('acomodacion_tipohabitacion_hotel')
        ->join('hoteles', 'acomodacion_tipohabitacion_hotel.idhotel', '=', 'hoteles.idhotel')
        ->join('tipohabitaciones', 'acomodacion_tipohabitacion_hotel.idtipoacomodacion', '=', 'tipohabitaciones.idtipohabitacion')
        ->join('acomodacion', 'acomodacion_tipohabitacion_hotel.idacomodacion', '=', 'acomodacion.idacomodacion')
        ->select(
            'hoteles.nombre',
            DB::raw('COUNT(tipohabitaciones.descripcion) AS CANTIDAD'),
            'tipohabitaciones.descripcion AS TIPO_HABITACION',
            'acomodacion.descripcion AS ACOMODACION'
        )
        ->groupBy('hoteles.nombre', 'tipohabitaciones.descripcion', 'acomodacion.descripcion')
        ->orderBy('hoteles.nombre')
        ->orderBy('tipohabitaciones.descripcion')
        ->orderBy('acomodacion.descripcion')
        ->get();

    return response()->json($resultados);
    }

       public function show($idhotel)
    {
        $resultados = 

        DB::table('acomodacion_tipohabitacion_hotel')
    ->join('hoteles', 'acomodacion_tipohabitacion_hotel.idhotel', '=', 'hoteles.idhotel')
    ->join('tipohabitaciones', 'acomodacion_tipohabitacion_hotel.idtipoacomodacion', '=', 'tipohabitaciones.idtipohabitacion')
    ->join('acomodacion', 'acomodacion_tipohabitacion_hotel.idacomodacion', '=', 'acomodacion.idacomodacion')
    ->select(
        'hoteles.nombre as nombre_hotel',
        'tipohabitaciones.descripcion as tipo_habitacion',
        'acomodacion.descripcion as acomodacion',
        DB::raw('COUNT(acomodacion_tipohabitacion_hotel.idtipoacomodacion) as cantidad')
    )
    ->where('hoteles.idhotel', $idhotel)
    ->groupBy('hoteles.nombre', 'tipohabitaciones.descripcion', 'acomodacion.descripcion')
    ->orderBy('hoteles.nombre')
    ->orderBy('tipohabitaciones.descripcion')
    ->orderBy('acomodacion.descripcion')
    ->get();

    return response()->json($resultados);
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'idhotel' => 'required|integer',
        'idacomodacion' => 'required|integer', 
        'idtipoacomodacion' => 'required|integer',
      
    ]);

    // Create a new hotel record in the database using the validated data
    $hotelacomhabita = Acomodaciontipohabitacionhoteleles::create($validatedData);

    // Return the created hotel data as a JSON response with status code 201
    return response()->json(['status' => 'success', 'hotelacomhabita' => $hotelacomhabita], 201);
}


 public function conteoAcomodaciones($idhotel)
{
 $resultados = 

 DB::table('acomodacion_tipohabitacion_hotel')
    ->join('hoteles', 'acomodacion_tipohabitacion_hotel.idhotel', '=', 'hoteles.idhotel')
    ->join('tipohabitaciones', 'acomodacion_tipohabitacion_hotel.idtipoacomodacion', '=', 'tipohabitaciones.idtipohabitacion')
    ->join('acomodacion', 'acomodacion_tipohabitacion_hotel.idacomodacion', '=', 'acomodacion.idacomodacion')
    ->select(
        'hoteles.nombre',
        DB::raw('COUNT(*) as cantidad')
    )
    ->where('hoteles.idhotel', $idhotel)
    ->groupBy('hoteles.nombre')
    ->orderBy('hoteles.nombre')
    ->get();

return response()->json($resultados);
}



}
