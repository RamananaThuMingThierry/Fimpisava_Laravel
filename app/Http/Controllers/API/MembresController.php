<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\membres;
use Nette\Utils\Strings;

class MembresController extends Controller
{

    public function recherche_un__membre_fimpisava(string $propriete, string $value){
        $membre = membres::where($propriete,'like',"%$value%")->get();

        if($membre->count() == 0){
            return response()->json([
                'status' => 404,
                'message' => 'Aucun résultat !'
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'recherche_un__membre_fimpisava' => $membre
            ]);
        }

    }

    public function statistiques()
    {
        $membresFIMPISAVA = membres::all();
        $district_sambava = membres::where('district', 'Sambava')->get();
        $district_antalaha = membres::where('district', 'Antalaha')->get();
        $district_vohemar = membres::where('district', 'Vohemar')->get();
        $district_andapa = membres::where('district', 'Andapa')->get();
        
        return response()->json([
            'status' => 200,
            'membresFIMPISAVA' => $membresFIMPISAVA->count(),
            'sambava' => $district_sambava->count(),
            'antalaha' => $district_antalaha->count(),
            'vohemar' => $district_vohemar->count(),
            'andapa' => $district_andapa->count()
        ]);
    }
    
    public function liste_des_membres_district_sambava(){
        $liste_des_membres_district_sambava = membres::orderBy('nom', 'asc')
            ->where('district', 'Sambava')        
            ->get();

        return response()->json([
            'status' => 200,
            'liste_des_membres_district_sambava' => $liste_des_membres_district_sambava
        ]);
    }

    public function liste_des_membres_district_antalaha(){
        $liste_des_membres_district_antalaha = membres::orderBy('nom', 'asc')
            ->where('district', 'Antalaha')        
            ->get();

        return response()->json([
            'status' => 200,
            'liste_des_membres_district_antalaha' => $liste_des_membres_district_antalaha
        ]);
    }
    
    public function liste_des_membres_district_vohemar(){
        $liste_des_membres_district_vohemar = membres::orderBy('nom', 'asc')
            ->where('district', 'Vohemar')        
            ->get();

        return response()->json([
            'status' => 200,
            'liste_des_membres_district_vohemar' => $liste_des_membres_district_vohemar
        ]);
    }
    
    public function liste_des_membres_district_andapa(){
        $liste_des_membres_district_andapa = membres::orderBy('nom', 'asc')
            ->where('district', 'Andapa')        
            ->get();

        return response()->json([
            'status' => 200,
            'liste_des_membres_district_andapa' => $liste_des_membres_district_andapa
        ]);
    }

    /** ======================================= Liste des membre FIMPISAVA =================================== */
    public function index()
    {
        $membres = membres::orderBy('numero_carte', 'desc')->get();

        return response()->json([
            'membres' => $membres
        ], 200);

    }

    public function store(Request $request)
    {
        $photo = $request->hasFile("photo");
        $numero_carte = $request->numero_carte;
        $nom = $request->nom;
        $prenom = $request->prenom ?? '';
        $date_de_naissance = $request->date_de_naissance;
        $lieu_de_naissance = $request->lieu_de_naissance;
        $filieres = $request->filieres;
        $niveau = $request->niveau;
        $district = $request->district;
        $adresse = $request->adresse;
        $profession = $request->profession;
        $fonction = $request->fonction;
        $contact = $request->contact;
        $facebook = $request->facebook;
        $telephone = $request->telephone;
        $date_inscription = $request->date_inscription;

        $concatenation_nom_prenom = $nom .' '. $prenom;

        $verifier_conctatenation_nom_prenom = DB::table('membres')
            ->select('*')
            ->whereRaw('CONCAT(nom, " ", prenom) = ?', [$concatenation_nom_prenom])
            ->exists();
            
        if($verifier_conctatenation_nom_prenom){
            return response()->json([
                'status' => 404,
                'message' => 'Vous existez déjà dans la base de données!'
            ]);
        }else{

            if($photo){
                $file = $request->file("photo");
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move("uploads/fimpisava/", $filename);
                $image = 'uploads/fimpisava/'.$filename;
            }else{
                $image = null;
            }

            DB::table('membres')->insert([
                'photo' => $image,
                'numero_carte' => $numero_carte,
                'nom' => $nom,
                'prenom' => $prenom,
                'date_de_naissance' => $date_de_naissance,
                'lieu_de_naissance' => $lieu_de_naissance,
                'filieres_id' => $filieres,
                'niveau' => $niveau,
                'district' => $district,
                'adresse' => $adresse,
                'profession' => $profession,
                'fonction' => $fonction,
                'contact' => $contact,
                'facebook' => $facebook,
                'telephone' => $telephone,
                'date_inscription' => $date_inscription
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Enregistrement effectué !',
            ]);
        } 
    }

    public function show(string $id)
    {
        try {
            $membre_fimpisava = DB::table('membres')->where('id', $id)->first();
                if ($membre_fimpisava) {
                    return response()->json(['membre_fimpisava' => $membre_fimpisava, 'status' => 200], 200);
                } else {
                    return response()->json(['message' => 'Membre non trouvé !', 'status' => 404], 404);
                }
            } catch (\Exception $e) {   
                // Gérez l'erreur et renvoyez une réponse d'erreur appropriée
                return response()->json(['message' => 'Une erreur interne s\'est produite.', 'status' => 500], 500);
            }
    }
    
    public function afficher_un_membre(string $id)
    {
        try {
            $membre_fimpisava = DB::table('membres')->where('id', $id)->first();
                if ($membre_fimpisava) {
                    return response()->json(['membre_fimpisava' => $membre_fimpisava, 'status' => 200], 200);
                } else {
                    return response()->json(['message' => 'Membre non trouvé !', 'status' => 404], 404);
                }
            } catch (\Exception $e) {   
                // Gérez l'erreur et renvoyez une réponse d'erreur appropriée
                return response()->json(['message' => 'Une erreur interne s\'est produite.', 'status' => 500], 500);
            }
    }

    public function update(Request $request, String $id)
    {
        $autorisation = false;
        $photo = $request->hasFile("photo");
        $numero_carte = $request->numero_carte;
        $nom = $request->nom;
        $prenom = $request->prenom ?? '';
        $date_de_naissance = $request->date_de_naissance;
        $lieu_de_naissance = $request->lieu_de_naissance;
        $filieres = $request->filieres;
        $niveau = $request->niveau;
        $district = $request->district;
        $adresse = $request->adresse;
        $profession = $request->profession;
        $fonction = $request->fonction;
        $contact = $request->contact;
        $facebook = $request->facebook;
        $telephone = $request->telephone;
        $date_inscription = $request->date_inscription;
        $concatenation_nom_prenom = $nom .' '. $prenom;

        $membre = DB::table('membres')->where('id', $id)->first();
        $verifier_si_ce_membre_existe = DB::table('membres')->where('id', $id)->exists();

        if($verifier_si_ce_membre_existe){
                $existe_concatenation_nom_prenom = DB::table('membres')
                ->select('*')
                ->whereRaw('CONCAT(nom, " ", prenom) = ?', [$concatenation_nom_prenom])
                ->exists();
                
            if($existe_concatenation_nom_prenom){
                $verifier_conctatenation_nom_prenom = DB::table('membres')
                ->select('*')
                ->whereRaw('CONCAT(nom, " ", prenom) = ?', [$concatenation_nom_prenom])
                ->first();
                if(($verifier_conctatenation_nom_prenom->nom == $membre->nom) && ($verifier_conctatenation_nom_prenom->prenom == $membre->prenom)){
                    $autorisation = true;
                }
            }else{
                $autorisation = true;   
            }

            if($autorisation){
                if($photo){
                    $file = $request->file("photo");
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' .$extension;
                    $file->move("uploads/fimpisava/", $filename);
                    $image = 'uploads/fimpisava/'.$filename;
                    
                    DB::table('membres')->where('id', $id)->update([
                        'photo' => $image,
                        'numero_carte' => $numero_carte,
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'date_de_naissance' => $date_de_naissance,
                        'lieu_de_naissance' => $lieu_de_naissance,
                        'filieres_id' => $filieres,
                        'niveau' => $niveau,
                        'district' => $district,
                        'adresse' => $adresse,
                        'profession' => $profession,
                        'fonction' => $fonction,
                        'contact' => $contact,
                        'facebook' => $facebook,
                        'telephone' => $telephone,
                        'date_inscription' => $date_inscription
                    ]);
                }else{
                    
                    DB::table('membres')->where('id', $id)->update([
                        'numero_carte' => $numero_carte,
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'date_de_naissance' => $date_de_naissance,
                        'lieu_de_naissance' => $lieu_de_naissance,
                        'filieres_id' => $filieres,
                        'niveau' => $niveau,
                        'district' => $district,
                        'adresse' => $adresse,
                        'profession' => $profession,
                        'fonction' => $fonction,
                        'contact' => $contact,
                        'facebook' => $facebook,
                        'telephone' => $telephone,
                        'date_inscription' => $date_inscription
                    ]);    
                }
                return response()->json([
                    'status' => 200,
                    'message' => 'Modification effectué !',
                ]);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Vous existez déjà dans la base de données!'
                ]);
            }
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Aucun résultat!'
            ]);
        }
    }

    public function delete(string $id)
    {
        try 
        {
            $electeur = DB::table('electeurs')->where('id', $id)->first();
            if ($electeur) {
                DB::table('electeurs')->where('id', $id)->delete();
                return response()->json([ 
                    'message' => 'Suppression effectuée avec succès',
                    'status' => 200]);
                } else {
                    return response()->json(['message' => 'Électeur non trouvé', 'status' => 404], 404);
                }
            } catch (\Exception $e) {   
                // Gérez l'erreur et renvoyez une réponse d'erreur appropriée
                return response()->json(['message' => 'Une erreur interne s\'est produite.', 'status' => 500]);
            }
    }
    
}
