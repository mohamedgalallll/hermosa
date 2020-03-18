<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyCaeO0bT3TRmqiX33RALepRfA0ZD73XTLc&sensor=false&libraries=places'></script>
<script src="{{url('design/admin/js/scripts/location-picker/locationpicker.jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        navigator.geolocation.getCurrentPosition(showPosition);
        function showPosition(position) {
                @if(empty($user->location_lat) && empty($user->location_long))
            var lat = position.coords.latitude,
                lng = position.coords.longitude;
                @else
            var lat = '{{$user->location_lat}}',
                lng = '{{$user->location_long}}';
            @endif
            $('#user_location').locationpicker({
                location: {
                    latitude: lat,
                    longitude: lng
                },
                locationName: '{{$user->location_address}}',
                radius: 20,
                setCurrentPosition: true,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: true,
                inputBinding: {
                    latitudeInput: $('#location_lat'),
                    longitudeInput: $('#location_long'),
                    locationNameInput: $('#location_address')
                },
                enableAutocomplete: true,
                enableAutocompleteBlur: true,
                autocompleteOptions: null,
                enableReverseGeocode: true,
                draggable: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                },
                onlocationnotfound: function (locationName) {
                },
                oninitialized: function (component) {
                },
                markerIcon: '{{\App\Model\Settings::first()->main_icon}}',
                markerDraggable: true,
                markerVisible: true
            });
        }
    });
</script>
