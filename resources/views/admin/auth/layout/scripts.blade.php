<!-- BEGIN: Vendor JS-->
<script src="{{url('design/admin/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{url('design/admin/js/core/app-menu.js')}}"></script>
<script src="{{url('design/admin/js/core/app.js')}}"></script>
<script src="{{url('design/admin/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->
@if (session('lang') == 'en')
    <script src="{{url('design/admin/js/main.js')}}"></script>
@else
    <script src="{{url('design/admin/js/main-rtl.js')}}"></script>
@endif
@yield('page_js')
@yield('main_js')
