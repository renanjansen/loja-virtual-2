@extends('layouts.mainCadastro')
@section('title', 'Cadastro de Produtos')
@section('cadastroProdutos')





    <h1 class="text-center">Cadastre seus Produtos</h1>
    <form class="mb-5" action="/cadastroProdutos" method="POST" enctype="multipart/form-data">

        {{-- MUITO IMPORTANTE!! A diretiva csrf avisa o blade do salvamento  de dados --}}
        @csrf
        <div class="form-group">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome do Produro</label>
                <input type="text" class="form-control" id="nomeproduto" name="nomeproduto" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Fotos do Produto</label>
                <input class="form-control" type="file" id="fotoproduto" name="fotoproduto" required>
            </div>
            <div class="mb-3">
                <label for="precoProduto">Preço do Produto R$</label>
                <input type="number" min="0.00" max="10000.00" step="0.01" id="precoProduto" name="precoProduto"
                    class="form-control" style="display:inline-block" required/>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descrição do produto</label>
                <textarea class="form-control" id="descProduto"name="descProduto" rows="3" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning">Cadastrar Produto</button>
            </div>
        </div>
    </form>
@section('listaProdutos')
    <ul class="list-group">
        @foreach ($produtos as $produto)
            <li class="list-group-item bg-light pt-3">
                <div class="card col-sm-12 mb-5 shadow">

                    <img src="/img/fotoproduto/{{$produto->fotoproduto}}"
                        class="card-img-top" alt="{{$produto->fotoproduto}}">


                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $produto->nomeproduto }}</h5>
                        <p class="card-text">{{ $produto->descProduto }}</p>
                        <a href="#" class="btn btn-danger">{{ $produto->precoProduto }}</a>
                    </div>

                </div>
            </li>
        @endforeach
    </ul>




@endsection






@endsection
