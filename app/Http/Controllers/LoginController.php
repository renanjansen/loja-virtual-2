<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;



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
    public function index()
    {
        $empresaNome = "Sistema Favela Vende";
        if (isset($_SESSION['password'])) {
            session_destroy();
        }
        return view(
            'login',
            [
                'empresaNome' => $empresaNome
            ]
        );
    }
    // Criada função que recebe dados do formulário de login e autentica
    public function login(Request $request)
    {

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";
        $user = new User;

        $nomeCliente = $user->name;
        // compara os dados do furmulário com o criado no banco
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            session_start();
            session(['password' => $request->password]);
            return view(
                'boasVindas',
                [
                    'empresaNome' => $empresaNome,
                    'vendedorNome' => $vendedorNome,
                    'nomeCliente' => $nomeCliente
                ]
            );
        } else {

            return redirect('/')->with('msg', 'Usuário ou senha inválidos!');
        }
    }

    public function register(Request $request)
    {


        $empresaNome = "Sistema Favela Vende";

        if (!empty($request->all())) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            // bcrypt envia a senha para a base de dados já criptografada com a funcão bcrypt
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect('/')->with('msg', 'Vendedor ' . $request->name . ' cadastrado com sucesso!');
        }


        return view(
            'register',
            [
                'empresaNome' => $empresaNome
            ]
        );
    }



}
