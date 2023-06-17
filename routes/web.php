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
use App\Http\Controllers\CarrinhoController;


Route::get('/',[LoginController::class, 'index'])->name('login');
Route::middleware('loginAcesso')->get('/logout',[LoginController::class, 'logout'])->name('logout');
Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::middleware('loginAcesso')->get('/boasVindas', [LoginController::class,'login']);
Route::get('/vitrine/{id}', [VitrineController::class,'exibirProduto', 'addCarrinho']);
Route::get('/sacola', [CarrinhoController::class,'exibirSacola']);

Route::middleware('loginAcesso')->get('/cadastroProdutos', [CadastroController::class, 'cadastrarProduto']);


// Rota para deletar produto
Route::delete('/listaProdutos/{id}', [CadastroController::class, 'destroy'])->name('destroy');
Route::delete('/sacola/{id}', [CarrinhoController::class, 'destroy'])->name('destroy');

// Rota para editar produto
Route::patch('/listaProdutos/{id}', [CadastroController::class, 'update'])->name('update');

Route::get('/listaProdutos',[CadastroController::class, 'listarProduto']);

// define a rota que recebe dados via post da view de cadastro
Route::post('/cadastroProdutos',[CadastroController::class, 'store']);
Route::post('/',[LoginController::class, 'login'])->name('login');
Route::post('/register',[LoginController::class, 'register'])->name('register');
Route::post('/vitrine/{id}', [VitrineController::class,'addCarrinho']);


