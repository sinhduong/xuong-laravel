<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from zoyothemes.com/tapeli/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 08:33:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/admin/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('assets/admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{ asset('assets/admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">


            <!-- Topbar Start -->
          @include('admins.blocks.header')
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
           @include('admins.blocks.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                @yield('content')

                <!-- Footer Start -->
                @include('admins.blocks.footer')
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{ asset('assets/admin/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/admin/assets/libs/feather-icons/feather.min.js') }}"></script>

        <!-- Apexcharts JS -->
        <script src="{{ asset('assets/admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- for basic area chart -->
        <script src="{{ asset('assets/admin/assets/apexcharts.com/samples/assets/stock-prices.js') }}"></script>

        <!-- Widgets Init Js -->
        <script src="{{ asset('assets/admin/assets/js/pages/analytics-dashboard.init.js') }}"></script>

        @yield('js')
        
        <!-- App js-->
        <script src="{{ asset('assets/admin/assets/js/app.js') }}"></script>
    </body>

<!-- Mirrored from zoyothemes.com/tapeli/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 08:34:03 GMT -->
</html>
