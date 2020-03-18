<script>
$(document).ready(function(){
     $("#input-hiddin").hide();
        $('#salon_payment_method_promotions').click(function(){
            if($(this).prop("checked") == true){
                $("#input-hiddin").slideDown();
            }
            else if($(this).prop("checked") == false){
                $("#input-hiddin").slideUp();
            }
        });
    });
</script>
