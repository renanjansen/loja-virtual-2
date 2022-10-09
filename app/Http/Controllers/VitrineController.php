<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

// chama o model de produtos criado paratrabalhar com a base de dados
use App\Models\Product;
use App\Models\User;
use App\Models\Carrinho;

class VitrineController extends Controller
{
    public function exibirProduto($id)
    {

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";

        

        $produtoAdd = Carrinho::all()->where('user_id', 3);

        $produtos = Product::all()->where('user_id', 3);


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
    public function addCarrinho(Request $request)
    {

        $user = auth()->user();

        // instância do objeto Product da base de dados
        $produtoAdd = new Carrinho;

        $produtoAdd->nomeproduto = $request->nomeproduto;
        $produtoAdd->precoProduto = $request->precoProduto;
        $produtoAdd->descProduto = $request->descProduto;
        $produtoAdd->fotoproduto = $request->fotoproduto;
        $produtoAdd->qntProduto = $request->qntProduto;
        $produtoAdd->subTotalProduto = $request->qntProduto * $request->precoProduto;
        $produtoAdd->product_id = $request->id;
        $produtoAdd->user_id = $user->id;






        // por final os dados do objeto intanciado é salvo
        $produtoAdd->save();

        // redireciona após o cadastro do produto
        return redirect('/vitrine')->with('msg', 'Produto adicionado ao carrinho de compras ' . $produtoAdd->nomeproduto . ' com sucesso!');
    }
}
