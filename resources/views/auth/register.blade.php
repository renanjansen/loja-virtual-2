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

           
            <form method="POST" action="{{ route('register') }}"">
                @csrf

                <img class="mb-4 img-thumbnail" src="/img/logo.jpg" alt="" width="100" height="90">
                <h1 class="h3 mb-3 fw-normal" style="color: gold"> Seja bem-vindo!</h1>
                <h1 class="h3 mb-3 fw-normal" style="color: gold">Por favor, faça seu cadastro.</h1>
                <div class="form-floating">
                    <input class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                    <label for="name" value="{{ __('Name') }}">Nome</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="email" placeholder="name@example.com" type="email"
                        name="email" :value="old('email')" required autofocus>
                    <label for="email" value="{{ __('Email') }}">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" required
                    name="password" autocomplete="new-password" >
                    <label for="password" value="{{ __('Password') }}">Senha</label>
                </div>
                <div class="form-floating">
                    <input type="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password" required
                    name="password_confirmation" autocomplete="new-password" >
                    <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirmar senha</label>
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                <div class="mt-4">
                    <div class="ml-2">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </div>
                </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="link-warning hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Já tem cadastro?') }}
                        </a>
                        <button class="w-100 btn btn-lg btn-warning" type="submit">{{ __('Register') }}</button>
                       
                    </div>


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
