<!-- BEGIN: Scripts JS-->
<script src="{{url('design/site/js/jquery.js')}}" ></script>
<script src="{{url('design/site/js/jquery-ui.min.js')}}" ></script>
<script src="{{url('design/site/js/popper.min.js')}}" ></script>
<script src="{{url('design/site/js/bootstrap.min.js')}}" ></script>
<script src="{{url('design/site/js/owl.carousel.min.js')}}" ></script>
<script src="{{url('design/site/js/moment.min.js')}}" ></script>
<script src="{{url('design/admin/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{url('design/admin/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{url('design/admin/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{url('design/admin/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{url('design/admin/js/scripts/pickers/time_picker/tail.datetime-full.min.js')}}"></script>
<script src="{{url('design/admin/js/scripts/pickers/time_picker/tail.datetime-all.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/dropify/dropify.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{url('design/admin/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{url('design/site/js/plug.js')}}" ></script>
<!-- End Scripts JS-->
@yield('page_js')
<script src="{{url('design/admin/js/edit.js')}}"></script>
@include('site.layout.scripts.index')
<!-- END: inputs JS-->
@if (session('lang') == 'en')
@else
@endif
@yield('main_js')
