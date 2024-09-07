<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController; // Importa o CarroController

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    return response()->json(['Sucesso' => true]);
});

// Rotas para o recurso carros
Route::get('/carros', [CarroController::class, 'index']); // Exibe todos os carros
Route::get('/carros/{id}', [CarroController::class, 'show']); // Exibe um carro específico
Route::post('/carros', [CarroController::class, 'store']); // Cadastra um novo carro
Route::put('/carros/{id}', [CarroController::class, 'update']); // Atualiza um carro específico
Route::delete('/carros/{id}', [CarroController::class, 'destroy']); // Deleta um carro específico
