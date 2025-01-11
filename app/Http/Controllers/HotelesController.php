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

    public function show(string $codnifrfc){

        $hotel = DB::select('SELECT * FROM hoteles WHERE codnifrfc = ?', [$codnifrfc]);
         if ($hotel) {
            return response()->json($hotel, 200);  // Return the hotel data if found
        } else {
            return response()->json(['message' => 'Hotel not found'], 404);  // Return an error if not found
        };
    }

public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:50',
        'codnifrfc' => 'required|string|max:50|unique:hoteles', 
        'direccion' => 'required|string|max:100',
        'telefono' => 'required|string|max:20',
        'idciudad' => 'required|exists:ciudad,idciudad',
        'numhabitaciones' => 'required|integer',
        'is_activo' => 'required|boolean',
    ]);

    // Create a new hotel record in the database using the validated data
    $hotel = Hoteles::create($validatedData);

    // Return the created hotel data as a JSON response with status code 201
    return response()->json(['status' => 'success', 'hotel' => $hotel], 201);
}

    public function update(Request $request,Hoteles $hoteles){

        $hotel->updated($request->all());
        return reponse()->json($hotel,201);
    }

 public function delete(int $id)
{
    // Buscar el hotel por su ID
    $hoteles = Hoteles::find($id);
    
    // Verificar si el hotel existe
    if (!$hoteles) {
        return response()->json(['error' => 'Hotel no encontrado'], 404);  // Respuesta 404 si no se encuentra el hotel
    }

    // Eliminar el hotel
    $hoteles->delete();

    // Devolver una respuesta con un código 200 OK y status 'success'
    return response()->json(['status' => 'success'], 200);  // Cambio aquí: En lugar de 204, retorno 200 con 'status' success
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
