<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\personnes;
use Illuminate\Http\Request;

class PersonnesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function liste_des_membres_fimpisava()
    {
        $liste_des_membres_fimpisava = personnes::orderBy('numero_carte', 'asc')->get();

    return response()->json([
        'status' => 200,
        'liste_des_membres_fimpisava' => $liste_des_membres_fimpisava
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function ajouter_un_membre_fimpisava(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(personnes $personnes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, personnes $personnes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(personnes $personnes)
    {
        //
    }
}
