@extends('layouts.main')
@section('title', 'Lista de Produtos')
@section('content')

    


        @foreach ($produtos as $produto)
        <div class="row text-center mt-3 mb-5 justify-content-center">
            
                <div class="card col-sm-12 mb-3" style="width: 20rem;">

                    <img src="/img/fotoproduto/{{$produto->fotoproduto}}"
                        class="card-img-top mt-2" alt="{{$produto->fotoproduto}}">


                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $produto->nomeproduto }}</h5>
                        <p class="card-text">{{ $produto->descProduto }}</p>
                        <a href="#" class="btn btn-danger">{{ $produto->precoProduto }}</a>
                    </div>

                </div>
            
        @endforeach
    </div>


@endsection
