<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // função que leva para a página de login
    public function index () {
        $empresaNome = "Sistema Favela Vende";

        return view('login',
        [
            'empresaNome' => $empresaNome
        ]);

    }

    
    public function logar () {
        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";

        $email = '';
        $senha = '';
    
        return view('boasVindas',
        [
            'empresaNome' => $empresaNome,
            'vendedorNome' => $vendedorNome
        ]);
    }
}
