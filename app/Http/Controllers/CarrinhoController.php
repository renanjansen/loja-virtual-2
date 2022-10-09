<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// chama o model de produtos criado paratrabalhar com a base de dados
use App\Models\Product;
use App\Models\User;
use App\Models\Carrinho;
use Illuminate\Support\Facades\DB;

class CarrinhoController extends Controller
{
    public function exibirSacola (){

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";

        $produtosAdd = Carrinho::all()->where('user_id', 1);
        $total = DB::table('carrinhos')->sum('subTotalProduto');

        return view(
            'sacola',
            [
                'empresaNome' => $empresaNome,
                'vendedorNome' => $vendedorNome,
                'produtosAdd' => $produtosAdd,
                'total' => $total



                
                
                

                
            ]
        );
    }

    //Função que deleta produto
    public function destroy($id)
    {
        

        $user = auth()->user();

        
        $produtosAdd = Carrinho::findOrFail($id);

        $produtosAdd->delete();
       

         // redireciona após o cadastro do produto
         return redirect('/sacola')->with('msg', 'Produto deletado com sucesso!');

           
        
    }
}
