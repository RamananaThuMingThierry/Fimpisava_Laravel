<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PersonnesController;
use App\Http\Controllers\API\UsersController;

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

    /** -------------------------------------------   Membres FI.MPI.SAVA -------------------------------- **/

    Route::get('liste_des_membres_fimpisava', [PersonnesController::class, 'liste_des_membres_fimpisava']);
    Route::get('recherche_un_membre/{propriete}/{value}', [PersonnesController::class, 'recherche_un_membre']);   
    Route::post('ajouter_un_membre_fimpisava', [PersonnesController::class, 'ajouter_un_membre_fimpisava']);   
    Route::get('afficher_un_membre/{id}', [PersonnesController::class, 'afficher_un_membre']);
    Route::get('obtenir_un_membre/{id}', [PersonnesController::class, 'obtenir_un_membre']);
    Route::post('modifier_un_membre/{id}', [PersonnesController::class, 'modifier_un_membre']);

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

    Route::get('liste_des_utilisateurs', [UsersController::class, 'liste_des_utilisateurs']);
    Route::get('afficher_un_utilisateur/{id}', [UsersController::class, 'afficher_un_utilisateur']);
    Route::get('recherche_un_utilisateur/{propriete}/{value}', [UsersController::class, 'recherche_un_utilisateur']);   
    Route::get('obtenir_un_utilisateur/{id}', [UsersController::class, 'obtenir_un_utilisateur']); 
    Route::post('modifier_un_utilisateur/{id}', [UsersController::class, 'modifier_un_utilisateur']);
    Route::post('supprimer_un_utilisateur/{id}', [UsersController::class, 'supprimer_un_utilisateur']);

    /**------------------------------------------------ Profile --------------------------------------------*/
    Route::post('modifier_profile/{id}', [UsersController::class, 'modifier_un_utilisateur']);
});