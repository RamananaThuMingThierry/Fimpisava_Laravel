<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\FilieresController;
use App\Http\Controllers\API\FonctionsController;
use App\Http\Controllers\API\NiveauController;
use App\Http\Controllers\API\PersonnesController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function(){

    Route::get('/checkingAuthenticated', function(){
        return response()->json(
            [
             'message' => 'Vous êtes connecter',
             'status' => 200]);
    });

    /** --------------------------------- Récupérer user authentifier ------------------------------**/
    Route::get('getUser', [AuthController::class, 'getUserId']);

    /** ------------------------------------------- Statistiques ------------------------------------ **/
    Route::get('statistiques', [PersonnesController::class, 'statistiques']);

    /** ------------------------------------- Déconnection -------------------------------------------**/
    Route::post('logout', [AuthController::class, 'logout']);

    /** ------------------------------------------- Filières -------------------------------------------- **/
    Route::get('filieres', [FilieresController::class, 'index']);
    Route::post('filieres_add', [FilieresController::class, 'store']); 
    Route::get('filieres_show/{id}', [FilieresController::class, 'show']); 
    Route::get('filieres_search/{value}', [FilieresController::class, 'search']);  
    Route::delete('filieres_delete/{id}', [FilieresController::class, 'delete']);  
    Route::put('filieres_update/{id}', [FilieresController::class, 'update']);  

     
    /** ------------ Niveau ------------ */
    Route::get('/niveau', [NiveauController::class, "index"]);
    Route::post('/niveau', [NiveauController::class, "store"]);
    Route::get('/niveau/{id}', [NiveauController::class, "show"]);
    Route::put('/niveau/{id}', [NiveauController::class, "update"]);
    Route::get('/niveau_search/{id}', [NiveauController::class, "search"]);
    Route::delete('/niveau/{id}', [NiveauController::class, "delete"]);

     /** ==================================== Fonctions ============================== **/
     Route::get('fonctions', [FonctionsController::class, 'index']);
     Route::post('fonctions_add', [FonctionsController::class, 'store']); 
     Route::get('fonctions_show/{id}', [FonctionsController::class, 'show']); 
     Route::get('fonctions_search/{value}', [FonctionsController::class, 'search']);  
     Route::delete('fonctions_delete/{id}', [FonctionsController::class, 'delete']);  
     Route::put('fonctions_update/{id}', [FonctionsController::class, 'update']);  

    /** -------------------------------------------   Membres FI.MPI.SAVA -------------------------------- **/

    Route::get('liste_des_membres_fimpisava', [PersonnesController::class, 'liste_des_membres_fimpisava']);
    Route::get('recherche_un__membre_fimpisava/{propriete}/{value}', [PersonnesController::class, 'recherche_un__membre_fimpisava']);   
    Route::post('ajouter_un_membre_fimpisava', [PersonnesController::class, 'ajouter_un_membre_fimpisava']);   
    Route::get('afficher_un_membre/{id}', [PersonnesController::class, 'afficher_un_membre']);
    Route::get('obtenir_un_membre_fimpisava/{id}', [PersonnesController::class, 'obtenir_un_membre']);
    Route::post('modifier_un_membre_fimpisava/{id}', [PersonnesController::class, 'modifier_un_membre_fimpisava']);

    /** -------------------------------------------   Membres District SAMBAVA -------------------------------- **/

    Route::get('liste_des_membres_district_sambava', [PersonnesController::class, 'liste_des_membres_district_sambava']);
    Route::get('recherche_un_membre_district_sambava/{propriete}/{value}', [PersonnesController::class, 'recherche_un_membre_district_sambava']);   
    Route::get('afficher_un_membre_district_sambava/{id}', [PersonnesController::class, 'afficher_un_membre_district_sambava']);
   
    /** -------------------------------------------   Membres District ANTALAHA -------------------------------- **/

    Route::get('liste_des_membres_district_antalaha', [PersonnesController::class, 'liste_des_membres_district_antalaha']);
    Route::get('recherche_un_membre_district_antalaha/{propriete}/{value}', [PersonnesController::class, 'recherche_un_membre_district_antalaha']);   
    Route::get('afficher_un_membre_antalaha/{id}', [PersonnesController::class, 'afficher_un_membre_antalaha']);
    
    /** -------------------------------------------   Membres District VOHEMAR -------------------------------- **/

    Route::get('liste_des_membres_district_vohemar', [PersonnesController::class, 'liste_des_membres_district_vohemar']);
    Route::get('recherche_un_membre_district_vohemar/{propriete}/{value}', [PersonnesController::class, 'recherche_un_membre_district_vohemar']);   
    Route::get('afficher_un_membre_vohemar/{id}', [PersonnesController::class, 'afficher_un_membre_vohemar']);
    
    /** -------------------------------------------   Membres District ANDAPA -------------------------------- **/

    Route::get('liste_des_membres_district_andapa', [PersonnesController::class, 'liste_des_membres_district_andapa']);
    Route::get('recherche_un_membre_district_andapa/{propriete}/{value}', [PersonnesController::class, 'recherche_un_membre_district_andapa']);   
    Route::get('afficher_un_membre_andapa/{id}', [PersonnesController::class, 'afficher_un_membre_andapa']);
    
    /*------------------------------------------------------ Utilisateurs -----------------------------------**/

    Route::get('/users', [AuthController::class, 'profile']);
    Route::get('/users_show/{id}', [UsersController::class, 'afficher_un_utilisateur']);
    Route::get('/users_search/{propriete}/{value}', [UsersController::class, 'recherche_un_utilisateur']);   
    Route::get('/users_get/{id}', [UsersController::class, 'obtenir_un_utilisateur']); 
    Route::post('/users_update/{id}', [UsersController::class, 'modifier_un_utilisateur']);
    Route::post('/users_delete/{id}', [UsersController::class, 'supprimer_un_utilisateur']);

    /**------------------------------------------------ Profile --------------------------------------------*/
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('modifier_profile/{id}', [UsersController::class, 'modifier_un_utilisateur']);
});