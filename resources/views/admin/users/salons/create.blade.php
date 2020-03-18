@extends('admin.layout.index')
@section('page_css')
    @if (session('lang') == 'en')
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/forms/wizard.css')}}">
    @else
        <link rel="stylesheet" type="text/css" href="{{url('design/admin/css-rtl/plugins/forms/wizard.css')}}">
    @endif
    <link rel="stylesheet" type="text/css"
          href="{{url('design/admin/css/plugins/location-picker/jquery.location-region-picker.css')}}">
@stop
@section('page_js')
    <script src="{{url('design/admin/vendors/js/extensions/jquery.steps.min.js')}}"></script>
    <script src="{{url('design/admin/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{url('design/admin/js/scripts/forms/wizard-steps.js')}}"></script>

    <script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyCaeO0bT3TRmqiX33RALepRfA0ZD73XTLc&sensor=false&libraries=places'></script>
    <script src="{{url('design/admin/js/scripts/location-picker/locationpicker.jquery.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            navigator.geolocation.getCurrentPosition(showPosition);
            function showPosition(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                $('#salon_location').locationpicker({
                    location: {
                        latitude: lat,
                        longitude: lng
                    },
                    locationName: '',
                    radius: 20,
                    setCurrentPosition: true,
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: true,
                    inputBinding: {
                        latitudeInput: $('#salon_location_lat'),
                        longitudeInput: $('#salon_location_long'),
                        // radiusInput: $('#us3-radius'),
                        locationNameInput: $('#salon_location_address')
                    },
                    enableAutocomplete: true,
                    enableAutocompleteBlur: true,
                    autocompleteOptions: null,
                    // addressFormat: 'postal_code',
                    enableReverseGeocode: true,
                    draggable: true,
                    onchanged: function (currentLocation, radius, isMarkerDropped) {
                    },
                    onlocationnotfound: function (locationName) {
                    },
                    oninitialized: function (component) {
                    },
                    // must be undefined to use the default gMaps marker
                    markerIcon: '{{\App\Model\Settings::first()->main_icon}}',
                    markerDraggable: true,
                    markerVisible: true
                });
            }
        })
    </script>
@stop
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow
        {{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
        {{request()->cookie('navbar_type') == 'navbar-static' ? 'd-none' : ''}}
            "></div>
        <div class="content-wrapper">
            @include('admin.layout.panels.breadcrumb', ['pageName' => 'Create Salon' ,'items'=>[
           [
           'name'=>'',
           'url'=>'',
           ]
           ]
           ])
            <div class="content-body">
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{str_replace('/create','',url()->current())}}" method="post"
                                              class="steps-validation wizard-circle" enctype="multipart/form-data">
                                            @csrf
                                                                                        <h6><i class="step-icon feather icon-info"></i>Salon Basic Information</h6>
                                                                                        <fieldset>
                                                                                            <div class="row">
                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'name',
                                                                                                    'id' => 'name',
                                                                                                    'type' => 'text',
                                                                                                    'class' => '',
                                                                                                    'label' =>'Salon Owner Name',
                                                                                                    'icon' =>'feather icon-user',
                                                                                                    'placeholder' => 'Salon Owner Name',
                                                                                                    'disabled' => false,
                                                                                                    'required' => true,
                                                                                                    ])
                                                                                                </div>
                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'salon_name',
                                                                                                    'id' => 'salon_name',
                                                                                                    'type' => 'text',
                                                                                                    'class' => '',
                                                                                                    'label' =>'Salon Name',
                                                                                                    'icon' =>'feather icon-user',
                                                                                                    'placeholder' => 'Salon Name',
                                                                                                    'disabled' => false,
                                                                                                    'required' => true,
                                                                                                    ])
                                                                                                </div>
                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'email',
                                                                                                    'id' => 'email',
                                                                                                    'type' => 'email',
                                                                                                    'class' => '',
                                                                                                    'label' => 'Salon Owner Email',
                                                                                                    'icon' =>'feather icon-mail',
                                                                                                    'placeholder' =>'Salon Owner Email',
                                                                                                    'disabled' => false,
                                                                                                    'required' => true,
                                                                                                    ])
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'first_phone',
                                                                                                    'id' => 'first_phone',
                                                                                                    'type' => 'number',
                                                                                                    'class' => '',
                                                                                                    'label' => 'Salon First Phone Number',
                                                                                                    'icon' =>'fa fa-sort-numeric-asc',
                                                                                                    'placeholder' =>'Salon First Phone Number',
                                                                                                    'disabled' => false,
                                                                                                    'required' => true,
                                                                                                    ])
                                                                                                </div>
                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'second_phone',
                                                                                                    'id' => 'second_phone',
                                                                                                    'type' => 'number',
                                                                                                    'class' => '',
                                                                                                    'label' => 'Salon Second Phone Number',
                                                                                                    'icon' =>'fa fa-sort-numeric-asc',
                                                                                                    'placeholder' =>'Salon Second Phone Number',
                                                                                                    'disabled' => false,
                                                                                                    'required' => false,
                                                                                                    ])
                                                                                                </div>
                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'third_phone',
                                                                                                    'id' => 'third_phone',
                                                                                                    'type' => 'number',
                                                                                                    'class' => '',
                                                                                                    'label' => 'Salon Third Phone Number',
                                                                                                    'icon' =>'fa fa-sort-numeric-asc',
                                                                                                    'placeholder' =>'Salon Third Phone Number',
                                                                                                    'disabled' => false,
                                                                                                    'required' => false,
                                                                                                    ])
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.staticSelect', [
                                                                                                    'name' => 'status',
                                                                                                    'id' => 'status',
                                                                                                    'class' => 'danger',
                                                                                                    'value' => '',
                                                                                                    'label' => trans('web.status'),
                                                                                                    'oldcheaked' => '',
                                                                                                    'placeholder' => trans('web.status'),
                                                                                                    'checked' => false,
                                                                                                    'disabled' => false,
                                                                                                     'items' => [
                                                                                                     [
                                                                                                     'name'=>'pending',
                                                                                                     'value'=>'0',
                                                                                                     ],
                                                                                                     [
                                                                                                     'name'=>'Approved',
                                                                                                     'value'=>'1',
                                                                                                     ],
                                                                                                       [
                                                                                                     'name'=>'Rejected',
                                                                                                     'value'=>'2',
                                                                                                     ],
                                                                                                      [
                                                                                                     'name'=>'Banned',
                                                                                                     'value'=>'3',
                                                                                                     ],
                                                                                                     ],
                                                                                                    ])
                                                                                                </div>
                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'password',
                                                                                                    'id' => 'password',
                                                                                                    'type' => 'password',
                                                                                                    'class' => '',
                                                                                                    'value' => '',
                                                                                                    'label' =>'Salon Password',
                                                                                                    'icon' =>'feather icon-lock',
                                                                                                    'placeholder' => 'Salon Password',
                                                                                                    'disabled' => false,
                                                                                                    'required' => true,
                                                                                                    ])
                                                                                                </div>
                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'password_confirmation',
                                                                                                    'id' => 'password_confirmation',
                                                                                                    'type' => 'password',
                                                                                                    'class' => '',
                                                                                                    'value' => '',
                                                                                                    'label' => 'Salon Password Confirmation',
                                                                                                    'icon' =>'feather icon-lock',
                                                                                                    'placeholder' =>  'Salon Password Confirmation',
                                                                                                    'disabled' => false,
                                                                                                    'required' => true,
                                                                                                    ])
                                                                                                </div>

                                                                                                <div class="col-xl-4 col-md-4 col-4">
                                                                                                    @include('admin.components.inputs.textarea', [
                                                                                                    'name' => 'salon_description',
                                                                                                    'id' => 'name',
                                                                                                    'type' => 'text',
                                                                                                    'class' => '',
                                                                                                    'value' => '',
                                                                                                    'label' => 'Salon Description',
                                                                                                    'icon' =>'feather icon-lock',
                                                                                                    'placeholder' =>  'Salon Description',
                                                                                                    'disabled' => false,
                                                                                                    'required' => true,
                                                                                                    ])
                                                                                                </div>
                                                                                                <div class="col-md-3">
                                                                                                    @include('admin.components.inputs.check', [
                                                                                                    'name' => 'salon_payment_method_online_payment',
                                                                                                    'id' => 'salon_payment_method_online_payment',
                                                                                                    'class' => '',
                                                                                                    'value' => 1,
                                                                                                    'label' =>trans('web.onlinePayment'),
                                                                                                    'checked' =>'',
                                                                                                    'required' => false,
                                                                                                    ])
                                                                                                </div>
                                                                                                <div class="col-md-3  ">
                                                                                                    @include('admin.components.inputs.check', [
                                                                                                    'name' => 'salon_payment_method_promotions',
                                                                                                    'id' => 'salon_payment_method_promotions',
                                                                                                    'class' => '',
                                                                                                    'value' => 1,
                                                                                                    'label' =>  trans('web.promotionsPayment'),
                                                                                                    'checked' =>'',
                                                                                                    'required' => false,
                                                                                                    ])
                                                                                                </div>
                                                                                                <div class="col-md-2  ">
                                                                                                    @include('admin.components.inputs.check', [
                                                                                                    'name' => 'salon_payment_method_cash',
                                                                                                    'id' => 'salon_payment_method_cash',
                                                                                                    'class' => '',
                                                                                                    'value' => 1,
                                                                                                    'label' =>   trans('web.cash'),
                                                                                                    'checked' =>'',
                                                                                                    'required' => false,
                                                                                                    ])
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="row">
                                                                                                <div class="col-xl-6 col-md-6 col-6">
                                                                                                    @include('admin.components.uploud.file', ['name' =>'salon_image','label'=>'Salon Image','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'required' => true, 'value'=>''])
                                                                                                </div>
                                                                                                <div class="col-xl-6 col-md-6 col-6">
                                                                                                    @include('admin.components.uploud.file', ['name' =>'salon_license','label'=>'Salon License','max'=>'5','accept'=>'image/*' , 'disabled' => false,'required' => true , 'value'=>''])
                                                                                                </div>
                                                                                            </div>


                                                                                        </fieldset>


                                                                                        <h6><i class="step-icon feather icon-info"></i>Salon Bank Information</h6>
                                                                                        <fieldset>
                                                                                            <div class="row">

                                                                                                <div class="col-xl-6 col-md-6 col-6">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'first_bank_account_name',
                                                                                                    'id' => 'first_bank_account_name',
                                                                                                    'type' => 'text',
                                                                                                    'class' => '',
                                                                                                    'label' =>'Salon First Bank Name ',
                                                                                                    'icon' =>'fa fa-sort-alpha-asc',
                                                                                                    'placeholder' => 'Salon First Bank Name',
                                                                                                    'disabled' => false,
                                                                                                     'required' => true,
                                                                                                    ])

                                                                                                </div>
                                                                                                <div class="col-xl-6 col-md-6 col-6">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'first_bank_account_number',
                                                                                                    'id' => 'first_bank_account_number',
                                                                                                    'type' => 'text',
                                                                                                    'class' => '',
                                                                                                    'label' =>'Salon First Bank Number ',
                                                                                                    'icon' =>'fa fa-sort-numeric-asc',
                                                                                                    'placeholder' => 'Salon First Bank Number',
                                                                                                    'disabled' => false,
                                                                                                     'required' => true,
                                                                                                    ])

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-xl-6 col-md-6 col-6">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'second_bank_account_name',
                                                                                                    'id' => 'second_bank_account_name',
                                                                                                    'type' => 'text',
                                                                                                    'class' => 'second_bank_account_name',
                                                                                                    'label' =>'Salon Second Bank Name ',
                                                                                                    'icon' =>'fa fa-sort-alpha-asc',
                                                                                                    'placeholder' => 'Salon Second Bank Name',
                                                                                                    'disabled' => false,
                                                                                                     'required' => false,
                                                                                                    ])

                                                                                                </div>
                                                                                                <div class="col-xl-6 col-md-6 col-6">
                                                                                                    @include('admin.components.inputs.text', [
                                                                                                    'name' => 'second_bank_account_number',
                                                                                                    'id' => 'second_bank_account_number',
                                                                                                    'type' => 'text',
                                                                                                    'class' => 'second_bank_account_number',
                                                                                                    'label' =>'Salon Second Bank Number ',
                                                                                                    'icon' =>'fa fa-sort-numeric-asc',
                                                                                                    'placeholder' => 'Salon Second Bank Number',
                                                                                                    'disabled' => false,
                                                                                                     'required' => false,
                                                                                                    ])

                                                                                                </div>
                                                                                            </div>

                                                                                        </fieldset>


                                            <h6><i class="step-icon feather icon-info"></i>Salon Location Information
                                            </h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        @include('admin.components.inputs.text', [
                                                        'name' => 'location_address',
                                                        'id' => 'location_address',
                                                        'type' => 'text',
                                                        'class' => 'location_address',
                                                        'label' =>'Salon Location',
                                                        'icon' =>'fa fa-location-arrow',
                                                        'placeholder' => 'Salon Location',
                                                        'disabled' => false,
                                                        'required' => true,
                                                        ])
                                                        <div id="salon_location"
                                                             style="width: 100%; height: 400px;"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'location_lat',
                                                       'id' => 'location_lat',
                                                       'type' => 'hidden',
                                                       'class' => 'location_lat',
                                                       'label' =>'Salon Location Lat',
                                                       'icon' =>'fa fa-level-up',
                                                       'placeholder' => 'Salon Location Lat',
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-6">
                                                        @include('admin.components.inputs.text', [
                                                       'name' => 'location_long',
                                                       'id' => 'location_long',
                                                       'type' => 'hidden',
                                                       'class' => 'location_long',
                                                       'label' =>'Salon Location Long',
                                                       'icon' =>'fa fa-level-down',
                                                       'placeholder' => 'Salon Location Long',
                                                       'disabled' => false,
                                                       'required' => true,
                                                       ])
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <div class="divider divider-text"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop
