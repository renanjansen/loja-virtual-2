<!-- Arquivo que define o header e footer da aplicação -->

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

<body class="d-flex flex-column h-100"style="background-color: #9c44dc;background-image: linear-gradient(to bottom,  #9c44dc, rgb(224, 159, 240));">
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/img/logo.jpg" class="img-thumbnail" alt="" width="80" height="40"
                        class="d-inline-block align-text-top">
                    {{ $empresaNome }}
                </a>
                @yield('clienteLogado')
                <a href="/">
                <button type="button" class="btn btn-danger">SAIR</button>
                </a>
            </div>
            
        </nav>
        <div class="row mb-5 p-2">
            <div class="col-sm-8 p-3">
                @yield('cadastroProdutos')
            </div>
            

            <!-- Aqui vira uma seção lateral com a lista de produtos cadastrados -->
            <div class="col-sm-4 bg-light mb-5 p-3" style="overflow-y:scroll; height: 800px">
                @yield('listaProdutos')

            </div>

        </div>
    </header>
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
