<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{$settings->site_description}}">
    <meta name="keywords" content="{{$settings->site_key_words}}">
    <meta name="author" content="Vector|01118065363">
    <title>@yield('title',$settings->site_title)</title>
    <link rel="apple-touch-icon" href="{{$settings->main_icon}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{$settings->main_icon}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/themes/semi-dark-layout.css')}}">
    <!-- BEGIN: Page CSS-->
@yield('page_css')
<!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    @if (session('lang') == 'en')
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/main.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/main-rtl.css')}}">
    @endif
<!-- END: Custom CSS-->
    @yield('main_css')
</head>
