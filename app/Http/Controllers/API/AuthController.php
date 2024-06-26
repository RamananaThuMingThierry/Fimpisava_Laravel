<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function profile(){
        $user = auth()->user();
        
        if($user){
            return response()->json([
                'user' => $user
            ], 200);
        }else{
            return response()->json([
                'message' => $this->constantes['NonAuthentifier']
            ], 401);
        }
    }

    public function login(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Le champ d\'email est obligatoire.',
            'email.email' => 'Le champ d\'email doit être une adresse email valide.',
            'password.required' => 'Le champ de mot de passe est obligatoire.',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->messages(),
            ]);
        }else{
       
            $user = User::where('email', $request->email)->first();

            if(!$user || !Hash::check($request->password, $user->password)){
                
                return response()->json([
                    'message' => 'Informations d\'identification invalides',
                ], 403);

            }else{
                
                $token = $user->createToken($user->email.'_Token')->plainTextToken;
            
                return response()->json([
                    'user' => $user,
                    'token' => $token,
                ], 200);
            }

            
        }
    }

    public function register(Request $request)
    {

        $pseudo = $request->pseudo;
        $email = $request->email;
        $contact = $request->contact;
        $adresse = $request->adresse;
        $password = $request->password;
        
        $validator = Validator::make($request->all(), [
            'pseudo' => 'required|max:255|unique:users',
            'email' => 'required|email|regex:/^[a-zA-Z0-9\.\-\_]+@[a-zA-Z0-9\.\-\_]+\.[a-zA-Z]+$/',
            'adresse' => 'required|string',
            'contact' => 'required|unique:users',
            'password' => 'required|min:8',
        ], [
            'pseudo.required' => 'Le champ pseudo est obligatoire',
            'email.required' => 'Le champ email est obligatoire',
            'contact.required' => 'Le champ contact est obligatoire',
            'adresse.required' => 'Le champ adresse est obligatoire',
            'email.unique' => 'L\'adresse email existe déjà!',
            'contact.unique' => 'Le contact existe déjà!',
            'pseudo.unique' => 'Le pseudo existe déjà!',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères!',
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->messages(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            
            if($this->verifierNumeroTelephone($contact) == false){
                return response()->json([
                    'messge' => "Votre contact ". $this->constantes['Numero']
                ], 304);
            }

            $user = User::create([
                'pseudo' => $pseudo,
                'email' => $email,
                'adresse' => $adresse,
                'contact' => $contact,
                'password' => Hash::make($password)
            ]);

           $token = $user->createToken($user->email.'_Token')->plainTextToken;

            return response()->json([
               'user' => $user,
               'token' => $token,
            ], 200);

        }
    }

    public function getUserId(Request $request){
        
        $user = DB::table('users')->where('id', $request->user()->id)->first();

        if($user){
            return response()->json([
                'status' => 200,
                'user' => $user
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'user' => 'Vous n\'êtes pas authentifier'
            ]);
        }
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => $this->constantes['Deconnection'],
        ]);
    }


}
