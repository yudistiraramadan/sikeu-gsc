<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <script src="https://kit.fontawesome.com/7d0c6917e1.js" crossorigin="anonymous"></script>
    <title>Login | SIKEU-GSC</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    {{-- Favicon --}}
    <link rel="icon" href="assets/images/gsc/logo_gsc.png" type="">





    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/login/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form action="{{ route('postlogin') }}" method="POST">
            {{ csrf_field() }}
            <img class="mb-4" src="assets/images/gsc/logo_gsc.png" alt="" width="100px" height="100px">
            <br>
            <h1 class="h3 mb-3 fw-normal" style="color: #1c5866; font-family:nunito;"><b>Sistem Informasi Keuangan
                    GSC</b></h1>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="." @error('email') is-invalid @enderror autofocus required value="{{ old('email') }}">
                <label class="pull-left" for="floatingInput" style="color:#607080; font-family: nunito;"><b>Alamat Email</b></label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder=".">
                <label for="floatingPassword" style="color:#607080; font-family: nunito;"><b>Password</b></label>
            </div>

            <div class="checkbox mb-3">
                <label style="color: #607080; font-family:nunito;">
                    <a href="/lupa-password"><b style="color: #34b4d1;">Lupa Password</b></a>
                </label>
            </div>
            <button class="w-100 btn btn-lg" style="background-color: #2b8fa6; color:#ffffff;"
                type="submit">Masuk</button>
            <p class="mt-5 mb-3 text-muted">&copy; Team IT GSC 2022</p>
        </form>
    </main>
    @include('sweetalert::alert')
    <script>
        @if (Session::has('error'))
            // wrong();
            toastr.error('{{ Session::get('error') }}');
        @endif

        // @if (Session::has('success'))
        //     {
        //         toastr.success("{{ Session::get('success') }}")
        //     }
        // @endif
    </script>
</body>
</html>
