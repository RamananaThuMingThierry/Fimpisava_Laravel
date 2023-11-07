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