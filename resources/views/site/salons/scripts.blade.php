@php
    $min = \App\Model\Service::where('status', '1')->min('price') > 0 ?  \App\Model\Service::where('status', '1')->min('price') :  0;
    $max = \App\Model\Service::where('status', '1')->max('price') > 0 ?  \App\Model\Service::where('status', '1')->max('price') :  1000;

@endphp
<script>

    page = 1;
    var able = true;
    $(document).ready(function () {


        $("#slider-range").slider({
            range: true,
            min: {{$min}},
            max: {{$max}},
            values: [ {{$min}}, {{$max}} ],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                $("#min").val(ui.values[0]);
                $("#max").val(ui.values[1]);
            }
        });

        $("#min").val($("#slider-range").slider("values", 0));
        $("#max").val($("#slider-range").slider("values", 1));
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));


        $(window).scroll(function () {
            if ($(window).scrollTop() >= $('#main-salons-div').height() - 500) {
                if (typeof page == "undefined" || page == null) {
                    page = 1;
                }
                if (able == false) {
                    return false
                } else if (able == true) {
                    page++;
                    loadMoreData(page);
                }

            }
        });

        function loadMoreData(page) {

            var formData = $('#AsideSalonsFilter').serialize();
            $('#spinner-main-div').show();
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    data: formData,
                    beforeSend: function () {
                        $('#spinner-main-div').show();
                        able = false;
                    }
                })
                .done(function (data) {
                    $('#spinner-main-div').hide();
                    if (data.html == "") {

                        $('#spinner-main-div').hide();
                        able = false;
                    } else {
                        $('#spinner-main-div').hide();
                        $("#salons-items").append(data.html);
                        able = true;
                    }


                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    able = false;
                    $('#spinner-main-div').hide();

                });
        }

        var Salon_Main_Div = $('#AsideSalonsFilter').offset().top;


        $(document).on("click", '.salon-range-filter', function () {
            $('html,body').animate({scrollTop: Salon_Main_Div}, 'fast');
            FilterChanges();
        });
        $(document).on("change", '.salon-input-filter', function () {
            $('html,body').animate({scrollTop: Salon_Main_Div}, 'fast');
            FilterChanges();
        });

        function FilterChanges() {
            able = true;
            page = 1;
            var formData = $('#AsideSalonsFilter').serialize();
            $.ajax(
                {
                    url: '',
                    type: "get",
                    data: formData,
                    beforeSend: function () {
                        $("#salons-items").empty();
                        $('#spinner-main-div').show();
                    }
                })
                .done(function (data) {
                    if (data.html == "") {
                        $('#spinner-main-div').hide();
                        stop();
                    }
                    $('#spinner-main-div').hide();
                    $("#salons-items").empty();
                    $("#salons-items").append(data.html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {

                });
        }

    });

</script>
