@extends('site.layout.index')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/location-picker/jquery.location-region-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/file-uploaders/dropzone.css')}}">
@stop
@section('page_js')
   @include('site.profile.salon.tabs.scripts.images')
    @include('site.profile.salon.tabs.scripts.map')
   @include('site.profile.salon.tabs.scripts.serviceDetails')
    @include('site.profile.salon.tabs.scripts.scripts')
    @include('site.profile.salon.tabs.scripts.status')
@stop
@section('content')
    <main class="py-4 content-statusSalon">
        <div class="teamStatus statusSalon">
           {!!$user->salon_status!!}
        </div>
        <div class="container">
            <div class="pl-4 pb-4 salon-links">
                <div class="container">
                    <div class="ltr-styl">
                        <span class="detil"><a href="{{url('/')}}"> {{ trans('web.home') }} </a> <span>  </span></span>
                        <span class="detil"><a href=""> {{ trans('web.profile') }} </a></span>
                    </div>
                </div>
            </div>
            <div class="profile-list">
                <div class="ltr-styl">
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="true"> {{ trans('web.generalAccount') }}</a>
                                <a class="nav-link " id="bank-tab" data-toggle="pill" href="#bank" role="tab"
                                aria-controls="bank" aria-selected="true"> {{ trans('web.bankAccounts') }}</a>
                                <a class="nav-link " id="location-tab" data-toggle="pill" href="#location" role="tab"
                                aria-controls="location" aria-selected="true">{{ trans('web.salonLocation') }} </a>
                                <a class="nav-link " id="services-tab" data-toggle="pill" href="#services" role="tab"
                                aria-controls="services" aria-selected="true">  {{ trans('web.services') }} </a>
                                <a class="nav-link " id="appointments-tab" data-toggle="pill" href="#appointments" role="tab"
                                aria-controls="appointments" aria-selected="true">   {{ trans('web.appointments') }}</a>
                                <a class="nav-link " id="images-tab" data-toggle="pill" href="#images" role="tab"
                                aria-controls="images" aria-selected="true">  {{ trans('web.images') }}</a>
                                <a class="nav-link " id="change-password-tab" data-toggle="pill" href="#change-password" role="tab"
                                aria-controls="change-password" aria-selected="true"> {{ trans('web.changePassword') }}</a>
                                <a class="nav-link" id="my-reservations-tap" data-toggle="pill" href="#my-reservations" role="tab"
                                aria-controls="my-reservations" aria-selected="true"> {{ trans('web.reservations') }}</a>
                                <a class="nav-link" id="chats-tap" href="{{url('/chat/')}}"> {{ trans('web.myConversations') }}</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                href="{{ route('logout') }}">{{ trans('web.logout') }} </a>
                            </div>
                        </div>

                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                @include('site.profile.salon.tabs.settingProfile.index',[
                                    'id' => 'profile',
                                    'aria_labelledby' => 'profile-tab',
                                ])
                                @include('site.profile.salon.tabs.bankAccounts.index',[
                                    'id' => 'bank',
                                    'aria_labelledby' => 'bank-tab',
                                ])
                                @include('site.profile.salon.tabs.locationSalon.index',[
                                    'id' => 'location',
                                    'aria_labelledby' => 'location-tab',
                                ])
                                @include('site.profile.salon.tabs.service.index',[
                                    'id' => 'services',
                                    'aria_labelledby' => 'services-tab',
                                    'serviceLists' => \App\Model\ServiceList::latest()->get(),
                                ])
                                @include('site.profile.salon.tabs.appointments.index',[
                                    'id' => 'appointments',
                                    'aria_labelledby' => 'appointments-tab',
                                ])
                                @include('site.profile.salon.tabs.images.index',[
                                    'id' => 'images',
                                    'aria_labelledby' => 'images-tab',
                                ])
                                @include('site.profile.salon.tabs.changePassword.index',[
                                    'id' => 'change-password',
                                    'aria_labelledby' => 'change-password-tab',
                                ])
                                @include('site.profile.salon.tabs.reservations.index',[
                                    'id' => 'my-reservations',
                                    'aria_labelledby' => 'my-reservations-tap',
                                ])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
