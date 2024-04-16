<?php

namespace App\Http\Controllers\API;

use App\Models\filieres;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FilieresController extends Controller
{
    /**  ====================================== Liste des FIlières ================================ **/
    public function index(){

        $user = auth()->user();

        if($user){
            
            $liste_des_filieres =  filieres::orderBy('nom_filieres', 'asc')->get();
        
            return response()->json([
                'filieres' => $liste_des_filieres,
            ], 200);

        }else{
            return response()->json([
                'message' => $this->constantes['NonAuthentifier']
            ], 401);
        }
    }

    /** ====================================== Créer un filière =================================== **/
    public function store(Request $request)
    {   
        $user = auth()->user();

        if($user){

            $nom_filieres = $request->nom_filieres;

            $validator = Validator::make($request->all(), [
                'nom_filieres' => 'required|string|unique:filieres',
            ]);        
    
            if($validator->fails()){
                
                return response()->json([
                    'errors' => $validator->messages(),
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

            }else{        
                
                filieres::create([
                    'nom_filieres' => $nom_filieres
                ]);

                return response()->json([
                    'message' => $this->constantes['Reussi']
                ], 200);

            }
        }else{
            
            return response()->json([
                'message' => $this->constantes['NonAuthentifier']
            ], 401);

        }
    }
 
    /** ==================================== Recherche un filière ===============================  **/
    public function search(string $value)
    {
        $user = auth()->user();

        if($user){

            $filieres = filieres::where('nom_filieres', 'like', "%$value%")->get();

            return response()->json([
                    'filieres' => $filieres
                ], 200);

        }else{

            return response()->json([
                'message' => $this->constantes['NonAuthentifier']
            ], 401);

        }
    }

    /** ===================================== Afficher un filière ===============================  **/
    public function show(string $filiere_id)
    {
        $user = auth()->user();

        if($user){

            $filieres = filieres::where('id', $filiere_id)->first();

            if ($filieres) {

                return response()->json([
                    'filieres' => $filieres
                ], 200);
            
            } else {
            
                return response()->json([
                    'message' => 'Ce filière n\'existe pas dans la base de données!'
                ], 404);
            
            }

        }else{

            return response()->json([
                'message' => $this->constantes['NonAuthentifier']
            ], 401);

        }
            
    }

    /** ====================================== Modifier un filière ==============================  **/
    public function update(Request $request, string $filiere_id)
    {

        $user = auth()->user();

        if($user){

            $nom_filieres = $request->nom_filieres;

            $validator = Validator::make($request->all(), [
                'nom_filieres' => 'required|string',
            ]);        
    
            if($validator->fails()){
                
                return response()->json([
                    'errors' => $validator->messages(),
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);

            }else{      


                $verifier_si_filiere_existe_dans_bd = filieres::where('id', $filiere_id)->exists();

                if($verifier_si_filiere_existe_dans_bd){

                    $obtenir_filiere = filieres::where('id', $filiere_id)->first();

                    if($obtenir_filiere->nom_filieres == $nom_filieres){

                        return response()->json([
                            'message' => $this->constantes['PasDeChangement']
                        ], 304);

                    }else{

                        DB::table('filieres')
                            ->where('id', $filiere_id)
                            ->update([
                            'nom_filieres' => $nom_filieres
                        ]);

                        return response()->json([
                            'message' => $this->constantes['Modification']
                        ], 200);

                    }
                }else{

                    return response()->json([
                        'message' => 'Ce filière n\'existe pas dans la base de données'
                    ], 404);

                }

            }

        }else{

            return response()->json([
                'message' => $this->constantes['NonAuthentifier']
            ], 401);

        }
    }

    /** ===================================== Supprimer un filière ============================== **/
    public function delete(String $filiere_id)
    {
        try {

            $auth = auth()->user();

            if($auth){

                $filiere = DB::table('filieres')->where('id', $filiere_id)->first();

                if($filiere) {
                    DB::table('filieres')->where('id', $filiere_id)->delete();
                    
                    return response()->json([ 
                        'message' => 'Suppression effectuée avec succès'
                    ], 200);

                } else {

                    return response()->json([
                        'message' => 'Ce filière n\'existe pas dans la base de données'
                    ], 404);

                }

            }else{

                return response()->json([
                    'message' => $this->constantes['NonAuthentifier']
                ], 401);

            }
                
        } catch (\Exception $e) {   
            // Gérez l'erreur et renvoyez une réponse d'erreur appropriée
            return response()->json(['message' => 'Une erreur interne s\'est produite.', 'status' => 500]);
        }
    }
}
