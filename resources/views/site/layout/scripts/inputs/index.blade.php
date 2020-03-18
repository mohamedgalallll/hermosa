<script>
    $( document ).ready(function() {
        $('.pickadateInput').pickadate({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });

        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%'
        });

        $('.dropify').dropify();


        tail.DateTime(".TimePicker", {
            animate: true,
            closeButton: true,
            rtl: "auto",
            startOpen: false,
            stayOpen: false,
            dateFormat: false,
            timeFormat: "HH:ii",
            timeSeconds: false,
        });
    });
</script>
