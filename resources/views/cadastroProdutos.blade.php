@extends('layouts.mainCadastro')
@section('title', 'Cadastro de Produtos')
@section('cadastroProdutos')





    <h1 class="text-center">Cadastre seus Produtos</h1>
    <form class="mb-5">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome do Produro</label>
            <input type="text" class="form-control" id="nomeproduto" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Fotos do Produto</label>
            <input class="form-control" type="file" id="fotoproduto" multiple>
        </div>
        <div class="mb-3">
            <label for="precoProduto">Preço do Produto R$</label>
            <input type="number" min="0.00" max="10000.00" step="0.01" id="precoProduto" name="precoProduto"
                class="form-control" style="display:inline-block" />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição do produto</label>
            <textarea class="form-control" id="descProduto" rows="3"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@section('listaProdutos')

    @foreach ($produtos as $produto)
        <div class="card col-sm-12" style="width: auto; height: auto">

            <img src="{{ $produto->fotoproduto }}" class="card-img-top" alt="imagem do produto">


            <div class="card-body">
                <h5 class="card-title">{{ $produto->nomeproduto }}</h5>
                <p class="card-text">{{ $produto->descProduto }}</p>
                <a href="#" class="btn btn-primary">{{ $produto->precoProduto }}</a>
            </div>

        </div>
    @endforeach




@endsection






@endsection
