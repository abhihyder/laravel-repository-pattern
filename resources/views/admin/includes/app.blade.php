<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> @yield('title')</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet"> -->
    <link href="{{asset('assets/font-awesome/css/fontawesome-all.min.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('assets/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('assets/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/select2/select2.min.css')}}" rel="stylesheet">

    @yield('styles')
    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>

</head>

<body class="">
    <div id="wrapper">
        @include('admin.includes.left_sidebar')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                @include('admin.includes.header')
            </div>

            @yield('content')

            @include('admin.includes.footer')
        </div>

        @include('admin.includes.right_sidebar')
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.symbol.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.time.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('assets/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('assets/js/inspinia.js')}}"></script>
    <script src="{{asset('assets/js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{ asset('assets/js/plugins/toastr/toastr.min.js') }}"></script>

    <!-- GITTER -->
    <script src="{{ asset('assets/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Jvectormap -->
    <script src="{{asset('assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- EayPIE -->
    <script src="{{asset('assets/js/plugins/easypiechart/jquery.easypiechart.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('assets/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Datatable -->
    <script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('assets/js/demo/sparkline-demo.js')}}"></script>
    @yield('scripts')
    <script>
        $(document).ready(function(e) {

            $('.select2').select2({
                placeholder: "Select"
            });
        });

        function infoMsg(msg) {
            return toastr.info(msg, 'Note', {
                progressBar: true,
                closeButton: true,
                hideDuration: "600",
                timeOut: "3500",
            });
        }

        function successMsg(msg) {
            return toastr.success(msg, 'Success', {
                progressBar: true,
                closeButton: true,
                hideDuration: "600",
                timeOut: "3500",
            });
        }

        function errorMsg() {
            return toastr.error('Something went wrong.', 'Error', {
                progressBar: true,
                closeButton: true,
                hideDuration: "600",
                timeOut: "3500",
            });
        }

        function warningMsg(msg) {
            return toastr.warning(msg, 'Oops...', {
                progressBar: true,
                closeButton: true,
                hideDuration: "600",
                timeOut: "3500",
            });
        }
    </script>
</body>

</html>