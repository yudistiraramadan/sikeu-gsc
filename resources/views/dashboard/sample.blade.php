@extends('layouts.main')
@section('content')
    @if (auth()->user()->role_id == '1')
        <h2>Selamat Datang Bendahara</h2>        
    @elseif(auth()->user()->role_id == '2')
        <h2>Selamat Datang Pengamat</h2>
    @else
        <h3>Selamat Datang Relawan</h3>        
    @endif 
    @include('sweetalert::alert')      
@endsection
@push('scripts')
    <script>
        @if (Session::has('success')) {
            toastr.success("{{ Session::get('success') }}")
        }
        @endif
    </script>
@endpush