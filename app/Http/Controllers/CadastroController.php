<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    //Função que gerará o cadastro
    public function cadastrar()
    {

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";

        return view(
            'cadastroProdutos',
            [
                'empresaNome' => $empresaNome,
                'vendedorNome' => $vendedorNome
            ]
        );
    }
}
