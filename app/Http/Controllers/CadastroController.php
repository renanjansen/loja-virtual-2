<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// chama o model de produtos criado paratrabalhar com a base de dados
use App\Models\Product;

class CadastroController extends Controller
{
    //Função que gerará o cadastro
    public function cadastrar()
    {

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";
        // chama todos os produtos da base de dados product
        $produtos = Product::all();
        return view(
            'cadastroProdutos',
            [
                'empresaNome' => $empresaNome,
                'vendedorNome' => $vendedorNome,
                'produtos' => $produtos
            ]
        );
    }

    public function listar()
    {

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";
        $produtos = Product::all();
        return view(
            'listaProdutos',
            [
                'empresaNome' => $empresaNome,
                'vendedorNome' => $vendedorNome,
                'produtos' => $produtos
            ]
        );
    }
    
    // traz os dados do formulário
    public function store(Request $request){


        // instância do objeto Product da base de dados
        $produto = new Product;

        $produto->nomeproduto = $request->nomeproduto;
        $produto->fotoproduto = $request->fotoproduto;
        $produto->precoProduto = $request->precoProduto;
        $produto->descProduto = $request->descProduto;


        // por final os dados do objeto intanciado é salvo
        $produto->save();

        // redireciona após o cadastro do produto
        return redirect('/listaProdutos');


    }
}
