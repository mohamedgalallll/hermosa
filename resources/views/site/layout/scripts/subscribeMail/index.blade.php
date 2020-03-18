<script>
    function showErrorAlert(msg) {toastr.error('', msg , { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 10000 });}
    function showSuccessAlert(msg) {toastr.success('', msg , { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 10000 });}
    
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function checkEmail() {
        var email_input = $('#subscribe_input_mail').val();
        if (validateEmail(email_input)) {
            $.ajax({
                url: "{{url('/subscribeEmail')}}",
                type: 'post',
                dataType: "JSON",
                data: {
                    "email": email_input,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data, status) {
                    if (data == true) {
                    showSuccessAlert("{{trans('web.haveReceived')}}");

                        $('#subscribe_input_mail').val('');
                    }else{
                        showErrorAlert("{{trans('web.emailAddress')}}")
                    }
                }
            });
        } else {
            showErrorAlert("{{trans('web.emailAddress')}}")
        }

    }

</script>

