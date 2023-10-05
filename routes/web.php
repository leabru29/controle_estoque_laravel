<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\GrupoProdutoController;
use App\Http\Controllers\LocalArmazenamentoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UnidadeMedidaController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('cadastro')->group(function(){
    Route::resource('grupo-produto', GrupoProdutoController::class)->middleware('auth');
    Route::get('list-grupo', [GrupoProdutoController::class, 'listar'])->name('list.grupo')->middleware('auth');
    
    Route::resource('unidade-medida', UnidadeMedidaController::class)->middleware('auth');
    Route::get('list-unidade-medida', [UnidadeMedidaController::class, 'listar'])->name('list.unidade.medida')->middleware('auth');
    
    Route::get('list-fornecedores', [FornecedorController::class, 'listar'])->name('list.fornecedor')->middleware('auth');
    Route::resource('fornecedores', FornecedorController::class);
    
    Route::get('list-locais', [LocalArmazenamentoController::class, 'listar'])->name('list.locais')->middleware('auth');
    Route::resource('locais', LocalArmazenamentoController::class)->middleware('auth');
    
    Route::get('list-produtos', [ProdutoController::class, 'listar'])->name('list.produtos')->middleware('auth');
    Route::resource('produtos', ProdutoController::class)->middleware('auth'); 
});