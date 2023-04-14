<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ligne_de_cartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//*API de la commande*/

Route::get('/Orderindex', [OrderController::class, 'index']);
Route::post('/Orderstore', [OrderController::class, 'store']);
Route::put('/Orderupdate/{id}', [OrderController::class, 'update']);
Route::delete('/Orderdestroy', [OrderController::class, 'destroy']);

//*API du produit*/

Route::get('/produitindex', [ProduitController::class, 'index']);
Route::post('/produitstore', [ProduitController::class, 'store']);
Route::put('/produitupdate/{id}', [ProduitController::class, 'update']);
Route::delete('/produitdestroy', [ProduitController::class, 'destroy']);

//*API du panier*/

Route::get('/cartindex/{id}', [ligne_de_cartController::class, 'index']);
Route::post('/cartstore', [ligne_de_cartController::class, 'store']);
Route::put('/cartupdate/{id}', [ligne_de_cartController::class, 'update']);
Route::delete('/cartdestroy', [ligne_de_cartController::class, 'destroy']);



