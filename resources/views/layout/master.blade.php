<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token"> --}}

    <title>UniBookStore</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('admin-theme/css/vendors_css.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" />

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('admin-theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-theme/css/skin_color.css') }}">
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        @include('components.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('components.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        @include('components.footer')
    </div>
    <!-- ./wrapper -->

    <!-- Vendor JS -->
    <script src="{{ asset('admin-theme/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin-theme/js/pages/data-table.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/sweet_alert.js') }}"></script>

    {{-- TAGS INPUT --}}
    <script src="{{ asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>

    <!-- Sunny Admin App -->
    <script src="{{ asset('admin-theme/js/template.js') }}"></script>
    <script src="{{ asset('admin-theme/js/pages/dashboard.js') }}"></script>

    @if (Session::has('message'))
        <script>
            let type = "{{ Session::get('alert-type') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        </script>
    @endif

</body>

</html>
