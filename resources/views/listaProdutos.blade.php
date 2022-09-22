@extends('layouts.main')
@section('title', 'Lista de Produtos')
<!-- Seção que recebe a busca parametrizada no controller -->
@section('busca')
    <form class="d-flex" action="/listaProdutos" method="GET">
        <input class="form-control me-2" type="search" placeholder="Buscar Produtos" name="buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>

@endsection
@section('clienteLogado')
    <p class="text-white">
        {{ $nomeCliente }}
    </p>

@endsection
@section('content')




    @foreach ($produtos as $produto)
        <div class="row text-center mt-3 mb-5 justify-content-center">

            <div class="shadow card col-sm-12 mb-3 " style="width: 20rem;">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <form action="{{ route('destroy', $produto->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                          
                        <button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="Excluir Produto da lista.">
                            X
                        </button>

                    </form>

                </div>

                <img src="/img/fotoproduto/{{ $produto->fotoproduto }}" class="card-img-top mt-2"
                    alt="{{ $produto->fotoproduto }}">


                <button class="btn btn-danger mt-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Editar produto</button>

                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header bg-dark text-white">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Edição de produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body"
                        style="background-color: #9c44dc;background-image: linear-gradient(to bottom,  #9c44dc, rgb(224, 159, 240));">

                        <form class="mb-5" action="/cadastroProdutos" method="POST" enctype="multipart/form-data">

                            {{-- MUITO IMPORTANTE!! A diretiva csrf avisa o blade do salvamento  de dados --}}
                            @csrf
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nome do Produro</label>
                                    <input type="text" class="form-control" id="nomeproduto" name="nomeproduto"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Fotos do Produto</label>
                                    <input class="form-control" type="file" id="fotoproduto" name="fotoproduto" required>
                                </div>
                                <div class="mb-3">
                                    <label for="precoProduto">Preço do Produto R$</label>
                                    <input type="number" min="0.00" max="10000.00" step="0.01" id="precoProduto"
                                        name="precoProduto" class="form-control" style="display:inline-block" required />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Descrição do produto</label>
                                    <textarea class="form-control" id="descProduto"name="descProduto" rows="3" required></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning">Editar Produto</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


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
