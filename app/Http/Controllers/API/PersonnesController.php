<?php

namespace App\Http\Controllers\API;

use App\Models\personnes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PersonnesController extends Controller
{
    public function statistiques()
    {
        $membresFIMPISAVA = personnes::all();
        $district_sambava = personnes::where('district', 'Sambava')->get();
        $district_antalaha = personnes::where('district', 'Antalaha')->get();
        $district_vohemar = personnes::where('district', 'Vohemar')->get();
        $district_andapa = personnes::where('district', 'Andapa')->get();
        
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
        $liste_des_membres_district_sambava = personnes::orderBy('nom', 'asc')
            ->where('district', 'Sambava')        
            ->get();

        return response()->json([
            'status' => 200,
            'liste_des_membres_district_sambava' => $liste_des_membres_district_sambava
        ]);
    }

    public function liste_des_membres_district_antalaha(){
        $liste_des_membres_district_antalaha = personnes::orderBy('nom', 'asc')
            ->where('district', 'Antalaha')        
            ->get();

        return response()->json([
            'status' => 200,
            'liste_des_membres_district_antalaha' => $liste_des_membres_district_antalaha
        ]);
    }
    
    public function liste_des_membres_district_vohemar(){
        $liste_des_membres_district_vohemar = personnes::orderBy('nom', 'asc')
            ->where('district', 'Vohemar')        
            ->get();

        return response()->json([
            'status' => 200,
            'liste_des_membres_district_vohemar' => $liste_des_membres_district_vohemar
        ]);
    }
    
    public function liste_des_membres_district_andapa(){
        $liste_des_membres_district_andapa = personnes::orderBy('nom', 'asc')
            ->where('district', 'Andapa')        
            ->get();

        return response()->json([
            'status' => 200,
            'liste_des_membres_district_andapa' => $liste_des_membres_district_andapa
        ]);
    }

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

        $verifier_conctatenation_nom_prenom = DB::table('personnes')
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
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move("uploads/fimpisava/", $filename);
                $image = 'uploads/fimpisava/'.$filename;
            }else{
                $image = null;
            }

            DB::table('personnes')->insert([
                'photo' => $image,
                'numero_carte' => $numero_carte,
                'nom' => $nom,
                'prenom' => $prenom,
                'date_de_naissance' => $date_de_naissance,
                'lieu_de_naissance' => $lieu_de_naissance,
                'filieres' => $filieres,
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

    /**
     * Display the specified resource.
     */
    public function afficher_un_membre(string $id)
    {
        try {
            $membre_fimpisava = DB::table('personnes')->where('id', $id)->first();
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
