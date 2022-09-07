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

Route::get('/',[LoginController::class, 'index']);
Route::get('/boasVindas', [LoginController::class,'logar']);

Route::get('/cadastroProdutos', [CadastroController::class, 'cadastrar']);





Route::get('/listaProdutos', function () {

    $empresaNome = "Sistema Favela Vende";
    $vendedorNome = "Renan Jansen";

    return view('listaProdutos',
    [
        'empresaNome' => $empresaNome,
        'vendedorNome' => $vendedorNome
    ]);
});

