<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>@yield('title')</title>
</head>

<body style="background-color: #9c44dc;">
    <header>
        <nav class="navbar navbar-dark bg-dark p-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/img/logo.jpg" class="img-thumbnail" alt="" width="80" height="40"
                        class="d-inline-block align-text-top">
                    {{ $empresaNome }}
                </a>

            </div>
        </nav>
    </header>
    <main class="container mb-5 justify-content-center pb-5">
        <div class="row text-center">
            @if (session('msg'))
                <p class="msg" style="background-color: gold; border-color:black;">{{ session('msg') }}</p>
            @endif
        </div>
        <div class="list-group mt-3">
            @foreach ($produtosAdd as $produtoAdd)
                <li type="button" class="list-group-item list-group-item-action mb-1" aria-current="true">
                    <div class="row">
                        <div class="col-3">
                            <img src="/img/fotoproduto/{{ $produtoAdd->fotoproduto }}" class="img-thumbnail rounded"
                                alt="{{ $produtoAdd->nomeproduto }}">
                        </div>
                        <div class="col-8">
                            <div class="row mt-3">
                                <div class="col-11">
                                    <h3>{{ $produtoAdd->nomeproduto }}</h3>
                                </div>
                                <div class="col-1">
                                    <form action="{{ route('destroy', $produtoAdd->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
    
                                        <button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                            title="Excluir Produto da lista."
                                            onclick="return confirm('Tem certeza que deseja deletar este registro?')">
                                            X
                                        </button>
    
                                    </form>

                                </div>
                                
                                
                            </div>

                            <div class="row mt-3">
                                <div class="col-3 pt-2">
                                    <p>Preço unitário: </p>
                                </div>
                                <div class="col-6 mb-5"><button type="button"
                                        class="btn btn-outline-danger">{{ $produtoAdd->precoProduto }}</button></div>


                            </div>

                            <ul class="list-group">
                                <li class="list-group-item">Quantidade: {{ $produtoAdd->qntProduto }}</li>
                                <li class="list-group-item">Subtotal: {{ $produtoAdd->subTotalProduto }}</li>

                            </ul>

                        </div>

                    </div>

                </li>

        </div>
        @endforeach
        <ul class="list-group">

            <li class="list-group-item">Total:





                {{ $total }}



            </li>

        </ul>
        <div class="text-center mt-3 mb-1">
        <a href="/vitrine">
        <button type="button" class="btn btn-warning">Continuar comprando</button>
        </a>
        </div>
    </main>

    <footer class="footer mt-5 bg-dark fixed-bottom">
        <div class="container text-center mt-5">
            <p class="mt-5 mb-3 text-light">&copy; Renan Jansen</p>
        </div>

    </footer>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
