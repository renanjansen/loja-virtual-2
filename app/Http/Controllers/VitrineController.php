<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

// chama o model de produtos criado paratrabalhar com a base de dados
use App\Models\Product;
use App\Models\User;
use App\Models\Carrinho;

class VitrineController extends Controller
{
    public function exibirProduto()
    {

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";

        $user = new User;
                
        $produtoAdd = Carrinho::all();
        
        $produtos = Product::all()->where('user_id', 2);
        

        return view(
            'vitrine',
            [
                'empresaNome' => $empresaNome,
                'vendedorNome' => $vendedorNome,
                'produtos' => $produtos,
                'produtoAdd' => $produtoAdd 

                
            ]
        );
    }

     // traz os dados do formulário
     public function addCarrinho(Request $request){


        // instância do objeto Product da base de dados
        $produtoAdd = new Carrinho;

        $produtoAdd->nomeproduto = $request->nomeproduto;
        $produtoAdd->precoProduto = $request->precoProduto;
        $produtoAdd->descProduto = $request->descProduto;
        $produtoAdd->fotoproduto = $request->fotoproduto;
        $produtoAdd->qntProduto = $request->qntProduto;
        $produtoAdd->product_id = $request->id;

        

        


        // por final os dados do objeto intanciado é salvo
        $produtoAdd->save();

        // redireciona após o cadastro do produto
        return redirect('/vitrine')->with('msg', 'Produto adicionado ao carrinho de compras '.$produtoAdd->nomeproduto.' com sucesso!');

    }

    
}
