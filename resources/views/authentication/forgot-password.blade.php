<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Lupa Password | SIKEU-GSC</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    {{-- Favicon --}}
    <link rel="icon" href="assets/images/gsc/logo_gsc.png" type="">

    

    

<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/login/signin.css') }}" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form>
    <img class="mb-4" src="assets/images/gsc/logo_gsc.png" alt="" width="100px" height="100px">
    <br>
    <h1 class="h3 mb-3 fw-normal" style="color: #1c5866; font-family:nunito;"><b>Lupa Password</b></h1>
    <p style="color: #607080; font-family:nunito;">
      <b>Masukan alamat email anda dan kami akan mengirimkan link untuk mereset password</b>
    </p>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="Alamat Email" style="border-bottom-right-radius:1px; border-bottom-left-radius:1px;">
      <label for="floatingInput" style="color:#607080; font-family: nunito;"><b>Alamat Email</b></label>
    </div>
    <div class="checkbox mb-3 mt-3">
      <label style="color: #607080; font-family:nunito;">
       Ingat password anda ? <a href="/"><b style="color: #34b4d1; font-family:nunito;"><u>Login</u></b></a>
      </label>
    </div>
    <button class="w-100 btn btn-lg" style="background-color: #2b8fa6; color:#ffffff;" type="submit">Kirim</button>
    <p class="mt-5 mb-3 text-muted">&copy; Team IT GSC 2022</p>
  </form>
</main>


    
  </body>
</html>
