<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

// chama o model de produtos criado paratrabalhar com a base de dados
use App\Models\Product;
use App\Models\User;

class VitrineController extends Controller
{
    public function exibirProduto()
    {

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";

        $user = new User;
        
        $produtos = Product::all()->where('user_id', 2);

        return view(
            'vitrine',
            [
                'empresaNome' => $empresaNome,
                'vendedorNome' => $vendedorNome,
                'produtos' => $produtos

                
            ]
        );
    }

    
}
