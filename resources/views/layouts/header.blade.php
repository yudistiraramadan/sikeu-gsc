<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    {{-- Favicon --}}
    <link rel="icon" href="assets/images/gsc/logo_gsc.png" type="">

    {{-- Datatables Style PENTING --}}
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="assets/css/pages/datatables.css" />

    {{-- Bootstrap 5.2 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> --}}


    {{-- jQuery PENTING --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>

    {{-- DataTables --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/c78fb67aba.js" crossorigin="anonymous"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">



</head>
