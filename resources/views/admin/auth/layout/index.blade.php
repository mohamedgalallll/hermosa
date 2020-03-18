@php
$settings = \App\Model\Settings::first();
@endphp
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('admin.auth.layout.header', ['settings' => $settings])
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

@yield('content')

@include('admin.auth.layout.footer', ['settings' => $settings])

</body>
</html>
