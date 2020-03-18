@php
    $settings = \App\Model\Settings::first();
    $homeBackground = \App\Model\HomeBackground::first();
@endphp
<!DOCTYPE html>
<html class="loading" lang="{{session('lang') == 'en' ? 'en' : 'ar'}}" dir="{{session('lang') == 'en' ? 'ltr' : 'rtl'}}" data-textdirection="{{session('lang') == 'en' ? 'ltr' : 'rtl'}}" >
@include('site.layout.header', ['settings' => $settings])
<body>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@include('site.layout.nav', ['settings' => $settings,'homeBackground'=>$homeBackground])
@yield('content')
@include('site.layout.footer', ['settings' => $settings])
</body>
</html>
