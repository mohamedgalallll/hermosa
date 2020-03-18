@include('site.layout.scripts.readMore.index')
<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyCaeO0bT3TRmqiX33RALepRfA0ZD73XTLc&sensor=false&libraries=places'></script>
<script src="{{url('design/admin/js/scripts/location-picker/locationpicker.jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        navigator.geolocation.getCurrentPosition(showPosition);
        function showPosition(position) {
                @if(empty($item->location_lat) && empty($item->location_long))
            var lat = position.coords.latitude,
                lng = position.coords.longitude;
                @else
            var lat = '{{$item->location_lat}}',
                lng = '{{$item->location_long}}';
            @endif
            $('#salon_location').locationpicker({
                location: {
                    latitude: lat,
                    longitude: lng
                },
                locationName: '{{$item->location_address}}',
                radius: 20,
                setCurrentPosition: true,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                enableAutocompleteBlur: true,
                autocompleteOptions: null,
                enableReverseGeocode: true,
                draggable: false,
                markerIcon: '{{\App\Model\Settings::first()->main_icon}}',
                markerDraggable: true,
                markerVisible: true
            });
        }

        $(document).on('click', '.serviceDetailsButton', function (e) {
            e.preventDefault();
            var thisbutton = $(this),
                service_id = $(this).data("service_id"),
                salon_id = $(this).data("salon_id"),
                service_list_id = $(this).data("service_list_id");

            $.ajax({
                url: '{{url("/salon-details/serviceDetails")}}/'+salon_id,
                type: 'POST',
                data: {
                    _token: "{{csrf_token()}}",
                    service_id: service_id,
                    service_list_id: service_list_id,
                },
                beforeSend: function (xhr) {
                    $('.service-details-appends-div').empty();
                    $('.spinner-main-div').show();
                },
                success: function (data, status) {
                    if (status == 'success') {
                        $('.service-details-appends-div').empty();
                        $('.service-details-appends-div').append(data.html);
                        $('#service-details-carousel').owlCarousel({
                            loop: true,
                            rewind: true,
                            margin: 10,
                            nav: true,
                            autoplay:true,
                            autoplayTimeout:3000,
                            autoplayHoverPause: true,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 1
                                },
                                1000: {
                                    items: 3
                                }
                            }
                        });
                    }
                },
                complete: function (jqxhr, txt_status) {
                    $('.spinner-main-div').hide();
                }
            });

        });
    });
</script>
