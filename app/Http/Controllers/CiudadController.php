<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ciudad;

class CiudadController extends Controller
{
    public function index(){
        return Ciudad::all();
    }

    public function show(Ciudad $ciudad){
        return response()->json($ciudad, 200);
    }


    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:50',
        'iddepartamento' => 'required|exists:departamentoestado,iddepartamento',

    ]);

    // Create a new hotel record in the database using the validated data
    $ciudad = Ciudad::create($validatedData);

    // Return the created hotel data as a JSON response with status code 201
    return response()->json(['status' => 'success', 'ciudad' => $ciudad], 201);
}


    public function update(Request $request,Ciudad $ciudad){

        $ciudad->updated($request->all());
        return reponse()->json($ciudad,201);
    }

    public function delete(int $id)
    {
        // Buscar el hotel por su ID
        $ciudad = Ciudad::find($id);

        // Verificar si el hotel existe
        if (!$ciudad) {
            return response()->json(['error' => 'Ciudad no encontrado'], 404);  // Respuesta 404 si no se encuentra el hotel
        }

        // Eliminar el hotel
        $ciudad->delete();

        // Devolver una respuesta con un código 200 OK y status 'success'
        return response()->json(['status' => 'success'], 200);  // Cambio aquí: En lugar de 204, retorno 200 con 'status' success
    }

}
