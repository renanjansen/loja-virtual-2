
    @extends('layouts.main')
    @section('title', 'Bem vindo!')
    @section('content')
    
        
   
    <main class="text-center">
          <h1 class="mt-3">Olá {{$vendedorNome}} nós da {{$empresaNome}} estamos muito felizes com voçê por perto!</h1>
          <a href="/cadastroProdutos">
          <button  type="button" class="btn btn-outline-warning mt-5">Cadastrar Produtos</button>
          </a>
    </main>
   
    @endsection