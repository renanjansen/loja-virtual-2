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

<body class="d-flex flex-column" style="background-color: #9c44dc;">
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/img/logo.jpg" class="img-thumbnail" alt="" width="80" height="40"
                        class="d-inline-block align-text-top">
                    {{ $empresaNome }}
                </a>
                <!-- Preparando o layout para receber a busca -->
                @yield('busca')
                @yield('clienteLogado')
                <a href="/">
                    <button type="button" class="btn btn-danger">SAIR</button>
                </a>
            </div>
        </nav>
    </header>
    <main class="container-fluid">
        <div class="container-fluid">
            <div class="row text-center">
                @if (session('msg'))
                    <p class="msg" style="background-color: gold; border-color:black;">{{ session('msg') }}</p>
                @endif

                @yield('content')
            </div>
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
    <script>
        //Constrói a URL depois que o DOM estiver pronto
        document.addEventListener("DOMContentLoaded", function() {

            // pegando o id do usuario para compartilhar a vitrine virtual
            var usuarioId = document.getElementById('usuarioId').innerText;

            //conteúdo que será compartilhado: Título da página + URL
            var conteudo = encodeURIComponent(document.title + " " + "http://127.0.0.1:8000/vitrine/" + usuarioId);
            //altera a URL do botão
            document.getElementById("whatsapp-share-btt").href = "https://api.whatsapp.com/send?text=" + conteudo;
        }, false);
    </script>


</body>

</html>
