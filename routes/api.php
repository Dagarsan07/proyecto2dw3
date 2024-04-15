<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PartidaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/clasificacion/global', [PartidaController::class, 'getClasificacionGlobal'])->name('clasificacionGlobal');

Route::get('/clasificacion/global/{categoria}', [PartidaController::class, 'getClasificacionByCategoria'])->name('clasificacionGlobalCtg');

Route::get('/clasificacion/{username}', [PartidaController::class, 'getClasificacionUser'])->name('clasificacionUser');

Route::get('/categorias', [CategoriaController::class, 'getAllCategorias'])->name('allCategorias');

