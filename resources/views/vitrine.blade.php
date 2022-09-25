
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body  style="background-color: #9c44dc;">
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/img/logo.jpg" class="img-thumbnail" alt="" width="80" height="40"
                        class="d-inline-block align-text-top">
                    {{ $empresaNome }}
                </a>
            </div>
        </nav>
    </header>
    <main class="container text-center mb-3 justify-content-center pb-5">

        <div class="row">

            @foreach ($produtos as $produto)
                <div class="col-auto mb-5">

                    <div class="card mt-3" style="width: 18rem;height: 40rem">
                        <img src="/img/fotoproduto/{{ $produto->fotoproduto }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $produto->nomeproduto }}</h5>
                            <div class="container-fluid">
                                <p class="card-text">

                                @if (strlen( $produto->descProduto) > 100)
                                    {{substr($produto->descProduto, 0, 40). "..."}}
                                @else
                                    {{$produto->descProduto}}
                                @endif
                                
                                </p>
                            </div>

                            <a  class="btn bg-danger mt-2">R$ {{ $produto->precoProduto }}</a>
                        </div>
                        <div class="input-group justify-content-center mb-3 container-fluid">

                            <div class="row justify-content-center mb-1">
                                <label for="exampleInputEmail1" class="form-label">Quantidade: </label>
                               
                                <input type="number" min="1" max="20" class="col-6"
                                    placeholder=""aria-label="Example text with two button addons" />

                                
                            </div>




                            <button type="button" class="btn btn-warning">
                                Adicionar ao carrinho
                            </button>
                            <button type="button" class="btn btn-danger mt-5 mb-2" onClick={exibeCarrinho}>
                                Exibir carrinho
                            </button>



                            <div class="container">

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
