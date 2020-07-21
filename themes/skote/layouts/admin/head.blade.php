<!-- App css -->
<link href="{{ theme_url('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-dark" rel="stylesheet" type="text/css"/>
<link href="{{ theme_url('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css"/>
<link href="{{ theme_url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ theme_url('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css"/>
<link href="{{ theme_url('assets/css/app-dark.min.css')}}" id="app-dark" rel="stylesheet" type="text/css"/>
<link href="{{ theme_url('assets/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css"/>
@yield('css')
@stack('css-extra')
