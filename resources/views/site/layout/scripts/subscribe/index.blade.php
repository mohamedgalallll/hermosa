<script>
    function checkEmail(){
            var data = $('#email').serialize();
            $.ajax({
                    url: "/subscribeEmail",
                        type: 'post',
                        dataType: "JSON",
                        data: data,
                        success: function(data, status) {
                    if (data == 0) {
                }   
            }
        });
    }
</script>

