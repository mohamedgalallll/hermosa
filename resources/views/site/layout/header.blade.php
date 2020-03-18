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
    <!-- Start Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- End Fonts -->
    <!-- BEGIN: Styles CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{url('design/site/css/all.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/jquery-ui.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/jquery-ui.theme.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/owl.carousel.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/time_picker/tail.datetime-harx-light.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/multirange.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/dropify/dropify.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/extensions/toastr.css')}}">



    <!-- END: Styles CSS-->
    @if (session('lang') == 'en')
    <link rel="stylesheet" type="text/css" href=" {{url('design/site/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/ltr.css')}}" >

    @else
    <link rel="stylesheet" type="text/css" href=" {{url('design/site/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('design/site/css/style.css')}}" >
    @endif
    @yield('page_css')


    @yield('main_css')
</head>
