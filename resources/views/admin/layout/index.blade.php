@php
    $settings = \App\Model\Settings::first();
@endphp
    <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="{{session('lang') == 'en' ? 'ltr' : 'rtl'}}" >

@include('admin.layout.header', ['settings' => $settings])
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static
{{request()->cookie('navbar_type')}}
{{request()->cookie('footer_type')}}
{{request()->cookie('sidebar_switch')}}
{{request()->cookie('theme_layout')}}
    " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
@include('admin.layout.nav', ['settings' => $settings])
@include('admin.layout.aside', ['settings' => $settings])
@yield('content')
@include('admin.layout.footer', ['settings' => $settings])
</body>
</html>
