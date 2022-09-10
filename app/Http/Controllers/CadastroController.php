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
        $produto->precoProduto = $request->precoProduto;
        $produto->descProduto = $request->descProduto;

        // Image Upload

        // Primeiro cria-se uma condicional para caso o arquivo exista
        if($request->hasfile('fotoproduto') && $request->file('fotoproduto')->isValid()){

            // pega a extensão da imagem
            $requestImage = $request->fotoproduto;

            $extension = $requestImage->extension();

            // gera uma string única baseada no tempo de upload através da hash conctenada com extensão do arquivo
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . $extension);


            // salvando imagem no servidor
            $requestImage->move(public_path('img/fotoproduto'), $imageName);

            $produto->fotoproduto = $imageName;
        

        }


        // por final os dados do objeto intanciado é salvo
        $produto->save();

        // redireciona após o cadastro do produto
        return redirect('/listaProdutos')->with('msg', 'Produto Cadastrado com sucesso!');


    }
}
