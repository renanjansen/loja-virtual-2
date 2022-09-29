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
                <a href="/carrinho">
                    <button type="button" class="btn btn-outline-danger position-relative">
                        <i class="bi bi-cart4 position-relative" style="font-size: 2rem; color: gold;"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                            {{ count($produtoAdd) }}

                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                </a>

            </div>
        </nav>
    </header>
    <main class="container text-center mb-3 justify-content-center pb-5">
        @if (session('msg'))
            <div class="row text-center">
                <p class="msg" style="background-color: gold; border-color:black;">{{ session('msg') }}</p>

            </div>
        @endif



        <div class="row">
            @foreach ($produtos as $produto)
                <div class="col mb-5">


                    <div class="card mt-3 shadow-lg rounded" style="width: 18rem;height: auto;" onMouseOver="this.style.width='21rem'" onMouseOut="this.style.width='18rem'">
                        <img src="/img/fotoproduto/{{ $produto->fotoproduto }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $produto->nomeproduto }}</h5>
                            <div class="container-fluid">
                                <p class="card-text">

                                    @if (strlen($produto->descProduto) > 100)
                                        {{ substr($produto->descProduto, 0, 40) . '...' }}
                                    @else
                                        {{ $produto->descProduto }}
                                    @endif

                                </p>
                            </div>

                            <a class="btn bg-danger mt-2">R$ {{ $produto->precoProduto }}</a>
                        </div>
                        <div class="input-group justify-content-center mb-2 container-fluid">

                            <div class="row justify-content-center mb-5">
                                <form class="mb-5" action="/vitrine" method="POST" enctype="multipart/form-data">
                                    {{-- MUITO IMPORTANTE!! A diretiva csrf avisa o blade do salvamento  de dados --}}
                                    @csrf
                                    <label for="exampleInputEmail1" class="form-label">Quantidade: </label>

                                    <input type="number" min="1" max="20" class="col-12 mb-2"
                                        name="qntProduto"
                                        placeholder=""aria-label="Example text with two button addons" />

                                    <input type="hidden" name="nomeproduto" value="{{ $produto->nomeproduto }}">
                                    <input type="hidden" name="fotoproduto" value="{{ $produto->fotoproduto }}">
                                    <input type="hidden" name="precoProduto" value="{{ $produto->precoProduto }}">
                                    <input type="hidden" name="descProduto" value="{{ $produto->descProduto }}">
                                    <input type="hidden" name="id" value="{{ $produto->id }}">

                                    <button type="submit" class="btn btn-warning">
                                        Adicionar ao carrinho
                                    </button>
                                </form>

                                <button type="button" class="btn btn-danger" onClick={exibeCarrinho}>
                                    Exibir carrinho
                                </button>


                            </div>
                        </div>

                    </div>
           

        </div>
        @endforeach

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
