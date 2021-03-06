<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HabitacionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::get('/Cliente', [ClienteController::class, 'showAll']); */

/* Route::post('/Cliente/signup', [ClienteController::class, 'signup']);
Route::post('/Cliente/login', [ClienteController::class, 'login']);
Route::get('/habitacion/search', [HabitacionController::class, 'search']);
Route::get('/habitacion/filter', [HabitacionController::class, 'filter']); */

/* Route::get('/habitacion/filter', [HabitacionController::class, 'filter']); */
/* Route::post('/cliente/update', [ClienteController::class, 'update']);  */

/* Route::group(['middleware' => ['jwt.verify']], function(){ */
Route::group(['middleware' => ['cors']], function(){
        Route::post('/Cliente/signup', [ClienteController::class, 'signup']);
        Route::post('/Cliente/login', [ClienteController::class, 'login']);
        Route::get('/habitacion/search', [HabitacionController::class, 'search']);
        Route::post('/habitacion/filter', [HabitacionController::class, 'filter']);
        Route::get('/habitacion/listar', [HabitacionController::class, 'listar']); // Para listar todas las habitaciones al cargar el home.

    Route::group(['middleware' => ['jwt.verify']], function(){
            Route::get('/Cliente', [ClienteController::class, 'showAll']);
            Route::post('/Cliente/update', [ClienteController::class, 'update']);
            Route::post('/reservacion/create', [ReservaController::class, 'create']);
            Route::get('/reservacion/history', [ReservaController::class, 'showByCliente']);
        });
    });
        /* Route::get('/Cliente', [ClienteController::class, 'showAll']);
           Route::post('/Cliente/update', [ClienteController::class, 'update']);
           Route::post('/reservacion/create', [ReservaController::class, 'create']); */
        /* Route::get('/reservacion/history', [ReservaController::class, 'showByCliente']); */
        
    /* }); */

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); 
}); */
