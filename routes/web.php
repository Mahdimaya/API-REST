<?php

use App\Http\Controllers\CmdClientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/CmdClient', [CmdClientController::class, 'index']);
Route::post('/CmdClientstore', [CmdClientController::class, 'store']);
Route::get('/CmdClientshow/{CmdClient}', [CmdClientController::class, 'show']);
Route::get('/CmdClientshowetat/{id}', [CmdClientController::class, 'showetat']);
Route::put('/CmdClientupdateetat/{id}', [CmdClientController::class, 'updateetat']);
Route::put('/CmdClientupdate/{id}', [CmdClientController::class, 'update']);
Route::put('/CmdClientupdateproduct/{id}', [CmdClientController::class, 'updateproduct']);
Route::delete('/CmdClientdestroy/{id}', [CmdClientController::class, 'destroy']);

Route::post('/Utilisateurconnexion', [UserController::class, 'connexion']);
Route::post('/Utilisateurinscription', [UserController::class, 'inscription']);





