<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Acomodacion;

class AcomodacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           return Acomodacion::all();
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $acomodacion =  Acomodacion::create($request->all());

        return reponse()->json($acomodacion,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Acomodacion $acomodacion)
    {
       return response()->json($acomodacion, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Acomodacion $acomodacion)
    {
        $acomo->updated($request->all());
        return reponse()->json($acomo,201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acomodacion $acomodacion)
    {
        $acomo->delete();
        return reponse()->json($acomo,204);
    }
}
