    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    {{-- <script src="{{ asset('backend/js/pace.min.js') }}"></script> --}}
    <script src="{{ asset('backend/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('backend/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/js/table-datatable.js') }}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!--app-->
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('backend/js/index.js') }}"></script>

    @stack('scripts')
