<<!doctype html>
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

    <body class="text-center" style="background-color: #9c44dc">

        <main class="form-signin">

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <img class="mb-4 img-thumbnail" src="/img/logo.jpg" alt="" width="100" height="90">
                <h1 class="h3 mb-3 fw-normal" style="color: gold"> Seja bem-vindo!</h1>
                <h1 class="h3 mb-3 fw-normal" style="color: gold">Por favor, faça seu login.</h1>
                <div class="form-floating">
                    <input class="form-control" id="floatingInput" placeholder="name@example.com" type="email"
                        name="email" :value="old('email')" required autofocus>
                    <label for="floatingInput" value="{{ __('Email') }}">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required
                        autocomplete="current-password">
                    <label for="password" value="{{ __('Password') }}">Senha</label>
                </div>
                <div class="checkbox mb-3">
                    <label for="remember_me" class="flex items-center">
                        <input type="checkbox" value="remember-me" id="remember_me" name="remember"> <span
                            class="ml-2 link-warning">{{ __('Remember me') }}</span>
                    </label>

                </div>
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="{{ __('Log in') }} link-warning" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a sua senha?') }}
                        </a>
                    @endif

                    <button class="w-100 btn btn-lg btn-warning" type="submit">{{ __('Log in') }}</button>


                </div>
            </form>
        </main>




        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


    </body>

    </html>
