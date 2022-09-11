@extends('layouts.main')
@section('title', 'Lista de Produtos')
<!-- Seção que recebe a busca parametrizada no controller -->
@section('busca')
    <form class="d-flex" action="/listaProdutos" method="GET">
        <input class="form-control me-2" type="search" placeholder="Buscar Produtos" name="buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

@endsection
@section('content')




    @foreach ($produtos as $produto)
        <div class="row text-center mt-3 mb-5 justify-content-center">

            <div class="card col-sm-12 mb-3" style="width: 20rem;">

                <img src="/img/fotoproduto/{{ $produto->fotoproduto }}" class="card-img-top mt-2"
                    alt="{{ $produto->fotoproduto }}">


                <div class="card-body text-center">
                    <h5 class="card-title">{{ $produto->nomeproduto }}</h5>
                    <p class="card-text">{{ $produto->descProduto }}</p>
                    <a href="#" class="btn btn-danger">{{ $produto->precoProduto }}</a>
                </div>

            </div>
    @endforeach
<!-- codicional para exibição de busca por produtos e direcionamento de rotas caso não existam produtos ou não existam produtos na busca -->
    @if (count($produtos) == 0 && $busca)
        <h4>Não foi possivel encontrar Produtos com a busca por: {{ $busca }}</h4>
        <a href="/listaProdutos">
            <button type="button" class="btn btn-warning mb-5">Retornar a lista de produtos cadastrados</button>
        </a>
        <a href="/cadastroProdutos">
            <button type="button" class="btn btn-warning mb-5">Cadastrar mais Produtos</button>
        </a>
    @elseif(count($produtos) == 0)
        <h4>Não existem Produtos cadastrados</h4>

        <a href="/cadastroProdutos">
            <button type="button" class="btn btn-warning mb-5">Cadastrar Produtos</button>
        </a>
    @else
        <a href="/cadastroProdutos">
            <button type="button" class="btn btn-warning mb-5">Cadastrar mais Produtos</button>
        </a>
    @endif

    </div>


@endsection
