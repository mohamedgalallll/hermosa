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
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/extensions/shepherd-theme-default.css')}}">
    <!-- END: Vendor CSS-->

{{-- @if (session('lang') == 'en') --}}
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/core/colors/palette-gradient.css')}}">

    {{-- @else
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/themes/dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/themes/semi-dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/core/colors/palette-gradient.css')}}">


    @endif --}}

    <!-- BEGIN: inputs CSS-->

    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/tour/tour.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/dropify/dropify.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/time_picker/tail.datetime-harx-light.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/textEditor/summernote-bs4.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/edit.css')}}">
@yield('page_css')
<!-- BEGIN: Custom CSS-->
    {{-- @if (session('lang') == 'en') --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/main.css')}}"> --}}
    {{-- @else
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/main-rtl.css')}}">
    @endif --}}
<!-- END: Custom CSS-->
    @yield('main_css')
</head>
