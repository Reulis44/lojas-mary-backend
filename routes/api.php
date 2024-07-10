<?php

use App\Http\Controllers\Api\PedidosController;
use App\Http\Controllers\Api\PedidosItensController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

// Rotas fora do middleware
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// Rotas com middleware
Route::group([
    'middleware' => ["auth:api"]
], function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/logout',   [AuthController::class, 'logout']);

    Route::prefix('pedidos')->group(function () {
        Route::get('', [PedidosController::class, 'all']);
        Route::get('/{id}', [PedidosController::class, 'find']);
        Route::post('', [PedidosController::class, 'create']);
        Route::put('/{id}', [PedidosController::class, 'update']);
        Route::delete('/{id}', [PedidosController::class, 'delete']);
    });

    Route::prefix('pedidos-itens')->group(function () {
        Route::get('', [PedidosItensController::class, 'all']);
        Route::get('/{id}', [PedidosItensController::class, 'find']);
        Route::post('/create', [PedidosItensController::class, 'create']);
        Route::put('/{id}', [PedidosItensController::class, 'update']);
        Route::delete('/{id}', [PedidosItensController::class, 'delete']);
    });
});
