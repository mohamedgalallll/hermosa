<script>

    $(document).ready(function () {

    function showSuccessAlert(msg) {toastr.success('', msg , { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 10000 });}
    function showErrorAlert(msg) {toastr.error('', msg , { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 10000 });}
        @if(session()->has('info'))toastr.info('', "{{ session()->get('info') }}" , { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 10000 });@endif
        @if(session()->has('success'))toastr.success('', "{{ session()->get('success') }}" , { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 10000 });@endif
        @if(session()->has('warning'))toastr.warning('', "{{ session()->get('warning') }}" , { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 10000 });@endif
        @if(session()->has('error'))toastr.error('', "{{ session()->get('error') }}" , { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 10000 });@endif
        @if ($errors->any())var error = " @foreach ($errors->all() as $error) "  + "  <li>{{ $error }}</li> "  + "    @endforeach";toastr.error('', error , { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 10000 });@endif
    });

</script>
