<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Apllicaton CSS -->
    <link rel="stylesheet" type="text/css" href="/css/login.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Favela Vende</title>
</head>

<body class="text-center" style="background-color: #9c44dc;background-image: linear-gradient(to bottom,  #9c44dc, rgb(224, 159, 240));">

    <main class="form-signin">
        @if (session('msg'))
            <p class="msg" style="background-color: gold; border-color:black;">{{ session('msg') }}</p>
        @endif
        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <img class="mb-4 img-thumbnail" src="/img/logo.jpg" alt="" width="100" height="90">
            <h1 class="h3 mb-3 fw-normal" style="color: gold"> Seja bem-vindo ao {{ $empresaNome }}</h1>
            <h1 class="h3 mb-3 fw-normal" style="color: gold">Por favor faça seu login</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                <label for="email">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <label for="password">Senha</label>
            </div>
            <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
            </label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

            <p class="mt-5 mb-3 text">&copy; Renan Jansen</p>
        </form>

    </main>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
