<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Acomodaciontipohabitacionhoteleles;

class AcomodacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $acomodacion =  Acomodaciontipohabitacionhoteleles::create($request->all());

        return reponse()->json($acomodacion,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($nombre)
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
        ->where('hoteles.nombre', $nombre)
        ->groupBy('hoteles.nombre', 'tipohabitaciones.descripcion', 'acomodacion.descripcion')
        ->orderBy('hoteles.nombre')
        ->orderBy('tipohabitaciones.descripcion')
        ->orderBy('acomodacion.descripcion')
        ->get();

    return response()->json($resultados);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Acomodaciontipohabitacionhoteleles $acomodacion)
    {
        $acomo->updated($request->all());
        return reponse()->json($acomo,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acomodaciontipohabitacionhoteleles $acomodacion)
    {
        $acomo->delete();
        return reponse()->json($acomo,204);
    }
}
