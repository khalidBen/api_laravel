<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use PHPUnit\Framework\Attributes\Group;

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

Route::post('/utilisateur/inscription', [UserController::class, 'inscription']);
Route::post('/utilisateur/connexion', [UserController::class, 'connexion']);

Route::get('/car', [CarController::class, 'index']);
Route::get('/car/{id}', [CarController::class, 'show']);

Route::group(["middleware" => ["auth:sanctum"],"prefix"=>"car"],function(){
    Route::post('/', [CarController::class, 'store']);
});




