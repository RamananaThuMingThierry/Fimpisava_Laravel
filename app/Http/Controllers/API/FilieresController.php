<?php

namespace App\Http\Controllers\API;

use App\Models\filieres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FilieresController extends Controller
{
    public function liste_des_filieres(){
        $liste_des_filieres =  filieres::orderBy('nom_filieres', 'asc')->get();
     
        return response()->json([
          'status' => 200,
          'liste_des_filieres' => $liste_des_filieres,
        ]);
      }

    /**
     * Store a newly created resource in storage.
     */
    public function ajouter_un_filiere(Request $request)
    {
        $nom = $request->nom;

        $verifier_nom = DB::table('filieres')->where('nom_filieres', $nom)->exists();

        if($verifier_nom){
            return response()->json([
                'status' => 404,
                'message' => 'Ce filière existe déjà !'
            ]);
        }else{
            DB::table('filieres')->insert([
                'nom_filieres' => $nom
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Enregistrement réussi !'
            ]);
        }
    }
 
    public function recherche_un_filiere(string $value)
    {
        $filieres = DB::table('filieres')->where('nom_filieres', 'like', "%$value%")->get();

        if($filieres->count() != 0){
            return response()->json([
                'status' => 200,
                'recherche_un_filiere' => $filieres
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Aucun résultat'
            ]);
        }
    }

    public function obtenir_un_filiere(string $id)
    {
        try {
            $filiere = DB::table('filieres')->where('id', $id)->first();
                if ($filiere) {
                    return response()->json(['filiere' => $filiere, 'status' => 200], 200);
                } else {
                    return response()->json(['message' => 'Filière non trouvé !', 'status' => 404], 404);
                }
            } catch (\Exception $e) {   
                // Gérez l'erreur et renvoyez une réponse d'erreur appropriée
                return response()->json(['message' => 'Une erreur interne s\'est produite.', 'status' => 500], 500);
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function modifier_un_filiere(Request $request, string $id)
    {
       
        $autorisation = false;

        $nom_filieres = $request->nom_filieres;

        $verifier_si_filiere_existe_dans_bd = DB::table('filieres')->where('id', $id)->exists();

        if($verifier_si_filiere_existe_dans_bd){
 
            $verifier_si_il_existe = DB::table('filieres')->where('nom_filieres', $nom_filieres)->exists();

            if($verifier_si_il_existe){
                
                $filiere = DB::table('filieres')->where('nom_filieres', $nom_filieres)->first();
                
                if($filiere->nom_filieres === $nom_filieres && $filiere->id == $id){
                    $autorisation = true;
                }
                
            }else{
                $autorisation = true;
            }

            if($autorisation){
                
                DB::table('filieres')->where('id', $id)->update(
                    [
                        'nom_filieres' => $nom_filieres
                    ]
                );

                return response()->json([
                    'status' => 200,
                    'message' => 'Modification efféctuer !'
                ]);

            }else{
                
                return response()->json([
                    'status' => 404,
                    'message' => 'Ce filière existe déjà !'
                ]);

            }
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Aucun résultat'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function supprimer_un_filiere(String $id)
    {
        try {
            $filiere = DB::table('filieres')->where('id', $id)->first();

            if($filiere) {
                DB::table('filieres')->where('id', $id)->delete();
                return response()->json([ 
                    'message' => 'Suppression effectuée avec succès',
                    'status' => 200]);
            } else {
                return response()->json(['message' => 'Filière non trouvé', 'status' => 404], 404);
            }
                
        } catch (\Exception $e) {   
            // Gérez l'erreur et renvoyez une réponse d'erreur appropriée
            return response()->json(['message' => 'Une erreur interne s\'est produite.', 'status' => 500]);
        }
    }
}
