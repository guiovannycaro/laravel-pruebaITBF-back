<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hoteles;

class HotelesController extends Controller
{
    public function index(){
        return Hoteles::all();
    }

    public function show(Hoteles $hoteles){
        return response()->json($hoteles, 200);
    }

    public function store(Request $request){
        $hotel =  Hoteles::create($request->all());

        return reponse()->json($hotel,201);
    }

    public function update(Request $request,Hoteles $hoteles){

        $hotel->updated($request->all());
        return reponse()->json($hotel,201);
    }

    public function delete(Hoteles $hoteles){
        $hoteles->delete();
        return reponse()->json($hoteles,204);
    }



    public function obtenercuentahabitaciones($nombre)
    {


        $resultados = DB::table('acomodacion_tipohabitacion_hotel')
        ->join('hoteles', 'acomodacion_tipohabitacion_hotel.idhotel', '=', 'hoteles.idhotel')
        ->join('tipohabitaciones', 'acomodacion_tipohabitacion_hotel.idtipoacomodacion', '=', 'tipohabitaciones.idtipohabitacion')
        ->join('acomodacion', 'acomodacion_tipohabitacion_hotel.idacomodacion', '=', 'acomodacion.idacomodacion')
        ->select('hoteles.nombre', DB::raw('COUNT(*) AS CANTIDAD'))
        ->where('hoteles.nombre', $nombre)
        ->groupBy('hoteles.nombre')
        ->orderBy('hoteles.nombre')
        ->get();

    return response()->json($resultados);

    }

}
