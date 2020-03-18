@extends('site.layout.index')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{url('design/admin/css/plugins/location-picker/jquery.location-region-picker.css')}}">
@stop
@section('page_js')
    @include('site.profile.user.tabs.map')
@stop
@section('content')
    <main class="py-4 ltr-styl">
        <div class="container">
            <div class="pl-4 pb-4 salon-links">
                <div class="container">
                    <span class="detil"><a href="">{{ trans('web.home') }} </a> <span>  </span></span>
                    <span class="detil"><a href="">{{ trans('web.profile') }} </a></span>
                </div>
            </div>
            <div class="profile-list">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="true">{{ trans('web.generalAccount') }}</a>
                            <a class="nav-link " id="location-tab" data-toggle="pill" href="#location" role="tab"
                               aria-controls="location" aria-selected="true">{{ trans('web.myLocation') }} </a>
                            <a class="nav-link " id="change-password-tab" data-toggle="pill" href="#change-password" role="tab"
                               aria-controls="change-password" aria-selected="true">{{ trans('web.changePassword') }}</a>
                            <a class="nav-link" id="my-reservations-tap" data-toggle="pill" href="#my-reservations"
                               role="tab" aria-controls="my-reservations-tap" aria-selected="false">{{ trans('web.myReservations') }}</a>
                            <a class="nav-link" id="chats-tap" href="{{url('/chat')}}">{{ trans('web.myConversations') }}</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}"> {{ trans('web.logout') }} </a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            @include('site.profile.user.tabs.settingProfile.index',[
                               'id' => 'profile',
                               'aria_labelledby' => 'profile-tab',
                           ])
                            @include('site.profile.user.tabs.locationUser.index',[
                                'id' => 'location',
                                'aria_labelledby' => 'location-tab',
                            ])
                            @include('site.profile.user.tabs.changePassword.index',[
                           'id' => 'change-password',
                           'aria_labelledby' => 'change-password-tab',
                       ])
                            @include('site.profile.user.tabs.reservations.index',[
                           'id' => 'my-reservations',
                           'aria_labelledby' => 'change-my-reservations',
                       ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
