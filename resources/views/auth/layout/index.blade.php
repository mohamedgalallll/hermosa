@php
    $settings = \App\Model\Settings::first();
@endphp
    <!DOCTYPE html>
<html class="loading" lang="{{session('lang') == 'en' ? 'en' : 'ar'}}" data-textdirection="{{session('lang') == 'en' ? 'ltr' : 'rtl'}}" >
@include('site.layout.header', ['settings' => $settings])
<body class="bg">
<div class="logo ml-4 pl-5" >
    <img src="{{url('design/site/images/logo.png')}}" alt="logo">
</div>
@yield('content')
@include('auth.layout.footer', ['settings' => $settings])
</body>
</html>
