<script>
    $( document ).ready(function() {
        // $('.pickadateInput').pickadate({
        //     autoclose: true,
        //     todayHighlight: true,
        //     format: 'yyyy-mm-dd',
        // });

    tail.DateTime(".pickadateInput", {
        animate: true,
        closeButton: true,
        rtl: "auto",
        startOpen: false,
        stayOpen: false,
        dateFormat: "yyyy-mm-dd",
        timeFormat: false,
    });

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

    $(".select2").select2({
        dropdownAutoWidth: true,
        width: '100%'
    });

    $('.dropify').dropify();

    });

    $('.mySummernote').summernote();

</script>
