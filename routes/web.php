<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\VitrineController;

Route::get('/',[LoginController::class, 'index'])->name('login');
Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::get('/boasVindas', [LoginController::class,'logar']);
Route::get('/vitrine', [VitrineController::class,'exibirProduto']);

Route::get('/cadastroProdutos', [CadastroController::class, 'cadastrarProduto']);
// Rota para deletar produto
Route::delete('/listaProdutos/{id}', [CadastroController::class, 'destroy'])->name('destroy');

// Rota para editar produto
Route::patch('/listaProdutos/{id}', [CadastroController::class, 'update'])->name('update');

Route::get('/listaProdutos',[CadastroController::class, 'listarProduto']);

// define a rota que recebe dados via post da view de cadastro
Route::post('/cadastroProdutos',[CadastroController::class, 'store']);
Route::post('/',[LoginController::class, 'login'])->name('login');
Route::post('/register',[LoginController::class, 'register'])->name('register');
Route::post('/vitrine', [VitrineController::class,'addCarrinho']);


