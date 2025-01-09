<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
