<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>


<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- Apexcharts --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
<script src="{{ asset('/asset_offline/apex.js') }}"></script>



<!-- Need: Apexcharts -->
{{-- <script src="{{ asset('dist/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('dist/assets/js/pages/dashboard.js') }}"></script> --}}

{{-- Sweetalert 1--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@stack('scripts')
