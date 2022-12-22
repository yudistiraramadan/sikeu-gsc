<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIKEU-GSC' }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/custom.css') }}">
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('assets/images/gsc/logo_gsc.png') }}" type="">

    {{-- Datatables Style PENTING --}}
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}" />

    {{-- jQuery PENTING --}}
    <script src="{{ asset('asset_offline/jquery.js') }}"></script>

    {{-- DataTables --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
    {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}

    {{-- Fontawesome --}}
    {{-- <script src="https://kit.fontawesome.com/c78fb67aba.js" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('asset_offline/fontawesome.js') }}"></script>

    {{-- Toastr --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">



</head>
