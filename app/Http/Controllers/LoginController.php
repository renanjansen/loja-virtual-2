<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// chama o model de produtos criado paratrabalhar com a base de dados
use App\Models\User;
 

class LoginController extends Controller
{
     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  

    // função que leva para a página de login
    public function index () {
        $empresaNome = "Sistema Favela Vende";

        return view('login',
        [
            'empresaNome' => $empresaNome
        ]);

    }
    // Criada função que recebe dados do formulário de login e autentica
     public function login(Request $request){

        // compara os dadosdo furmulário com o criado no banco
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           
            return redirect('/boasVindas');
        } else {
            dd('Você não está logado ');
        }

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
