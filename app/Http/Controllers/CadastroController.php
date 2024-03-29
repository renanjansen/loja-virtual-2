<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

// chama o model de produtos criado paratrabalhar com a base de dados
use App\Models\Product;
use App\Models\User;

class CadastroController extends Controller
{
    public function __construct()
    {
        $this->middleware('loginAcesso');
    }

    //Função que gerará o cadastro
    public function cadastrarProduto()
    {

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";
        $user = auth()->user();


        $nomeCliente = $user->name;
        // chama todos os produtos da base de dados product
        $produtos = Product::all()->where('user_id', $user->id);
        return view(
            'cadastroProdutos',
            [
                'empresaNome' => $empresaNome,
                'vendedorNome' => $vendedorNome,
                'produtos' => $produtos,
                'nomeCliente' => $nomeCliente
            ]
        );
    }

    public function listarProduto()
    {

        $empresaNome = "Sistema Favela Vende";
        $vendedorNome = "Renan Jansen";
        // determina um valor padarão para user_id na tabela de produtos
        $user = auth()->user();


            $nomeCliente = $user->name;


        //parametrização de busca de produtos

        // variavel que acessa a propiedade do request
        $busca = request('buscar');
        if ($busca) {
            $produtos = Product::where([

                // busca por palavras
                ['nomeproduto', 'like', '%' . $busca . '%'],
                ['user_id', $user->id]

            ]

            )->get();
        } else {

            $produtos = Product::all()->where('user_id', $user->id);
        }


        return view(
            'listaProdutos',
            [
                'empresaNome' => $empresaNome,
                'vendedorNome' => $vendedorNome,
                'produtos' => $produtos,

                // busca enviada para a view
                'busca' => $busca,
                'nomeCliente' => $nomeCliente,
                'usuarioId' => $user->id

            ]
        );
    }

    //Função que deleta produto
    public function destroy($id)
    {


        $user = auth()->user();

        // busca por produto vinculado ao vendedor e o pelo id de parmetro na view
        $produto = Product::findOrFail($id)->where([

            ['id', $id],
            ['user_id', $user->id]

        ]

        );

        $produto->delete();


         // redireciona após o cadastro do produto
         return redirect('/listaProdutos')->with('msg', 'Produto deletado com sucesso!');



    }

    //Função que edita o produto
    public function update(Request $request, $id)
    {


        $user = auth()->user();

        // instância do objeto Product da base de dados
        $produto = new Product;

        // busca por produto vinculado ao vendedor e o pelo id de parmetro na view
        $produto = Product::findOrFail($id)->where([

            ['id', $id],
            ['user_id', $user->id]

        ]

        )->first();

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
         return redirect('/listaProdutos')->with('msg', 'Produto editado com sucesso!');

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

        // determina um valor padarão para user_id na tabela de produtos
        $user = auth()->user();
        $produto->user_id = $user->id;


        // por final os dados do objeto intanciado é salvo
        $produto->save();

        // redireciona após o cadastro do produto
        return redirect('/listaProdutos')->with('msg', 'Produto Cadastrado com sucesso!');


    }
}
