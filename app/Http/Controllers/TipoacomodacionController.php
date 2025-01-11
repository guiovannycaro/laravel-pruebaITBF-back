<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tipohabitacion;


class TipoacomodacionController extends Controller
{
    public function index(){
        return Tipohabitacion::all();
    }

    public function show(Tipohabitacion $tipohabitacion){
        return response()->json($tipohabitacion, 200);
    }


    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'descripcion' => 'required|string|max:50',
        'is_activo' => 'required|boolean'
    ]);

    // Create a new hotel record in the database using the validated data
    $tipohabitacion = Tipohabitacion::create($validatedData);

    // Return the created hotel data as a JSON response with status code 201
    return response()->json(['status' => 'success', 'tipohabitacion' => $tipohabitacion], 201);
}


    public function update(Request $request,Tipohabitacion $tipohabitacion){

        $tipohabitacion->updated($request->all());
        return reponse()->json($tipohabitacion,201);
    }

    public function delete(int $id)
    {
        // Buscar el hotel por su ID
        $tipohabittacion = Tipohabitacion::find($id);

        // Verificar si el hotel existe
        if (!$tipohabittacion) {
            return response()->json(['error' => 'Tipo Habitacion no encontrado'], 404);  // Respuesta 404 si no se encuentra el hotel
        }

        // Eliminar el hotel
        $tipohabittacion->delete();

        // Devolver una respuesta con un código 200 OK y status 'success'
        return response()->json(['status' => 'success'], 200);  // Cambio aquí: En lugar de 204, retorno 200 con 'status' success
    }

}
