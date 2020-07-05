<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title> @yield('title') | Papiu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ theme_url('assets/images/favicon.ico')}}">
    @include('layouts.admin.head')
</head>

@yield('body')
<body data-topbar="dark" data-layout="horizontal">
<div id="preloader">
    <div id="status">
        <div class="spinner-chase">
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
        </div>
    </div>
</div>
<!-- Begin page -->
<div id="layout-wrapper">
@include('layouts.admin.top-hor')
@include('layouts.admin.hor-menu')
<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <!-- Start content -->
            <div class="container-fluid">
                @yield('content')
            </div> <!-- content -->
        </div>
        @include('layouts.admin.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('layouts.admin.right-sidebar')
<!-- END Right Sidebar -->

@include('layouts.admin.footer-script')
</body>
</html>
