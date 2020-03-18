<!-- BEGIN: Vendor JS-->

<script src="{{url('design/admin/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->
<script src="{{url('design/admin/vendors/js/extensions/toastr.min.js')}}"></script>

<!-- BEGIN: Theme JS-->
<script src="{{url('design/admin/js/core/app-menu.js')}}"></script>
<script src="{{url('design/admin/js/core/app.js')}}"></script>
<script src="{{url('design/admin/js/scripts/components.js')}}"></script>
<script src="{{url('design/admin/js/scripts/footer.js')}}"></script>
<!-- END: Theme JS-->

<script src="{{url('design/admin/js/scripts/textEditor/summernote.js')}}"></script>
<script src="{{url('design/admin/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{url('design/admin/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{url('design/admin/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{url('design/admin/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{url('design/admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/dropify/dropify.min.js')}}"></script>
<script src="{{url('design/admin/js/scripts/pickers/time_picker/tail.datetime-full.min.js')}}"></script>
<script src="{{url('design/admin/js/scripts/pickers/time_picker/tail.datetime-all.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

@yield('page_js')
<script src="{{url('design/admin/js/edit.js')}}"></script>

@include('admin.layout.scripts.index')
<!-- END: inputs JS-->
@if (session('lang') == 'en')
    <script src="{{url('design/admin/js/main.js')}}"></script>
@else
    <script src="{{url('design/admin/js/main-rtl.js')}}"></script>
@endif

@yield('main_js')
