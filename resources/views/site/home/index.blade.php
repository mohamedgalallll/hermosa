@extends('site.layout.index')
@section('content')
    <main class="py-4">
        <div class="work text-center">
            <div class="container">
                <p class="h3 font-weight-bold text-color">{{ trans('web.howDoesItWork') }}</p>
                <p class="font-weight-bold text-muted">{{ trans('web.findNears') }}</p>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{url('design/site/images/mapp.JPG')}}" alt="" />
                        <p class="h4 font-weight-bold text-color pt-4">{{ trans('web.searchSalon') }}</p>
                        <p class="text-muted font-weight-bold ">
                            {{ trans('web.findNears') }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{url('design/site/images/home_hero_device_en.png')}}" alt="" />
                        <p class="h4 font-weight-bold text-color pt-4"> {{ trans('web.bookYouSolon') }}</p>
                        <p class="text-muted font-weight-bold">
                            {{ trans('web.findNears') }}
                        </p>
                    </div>
                    <div class="col-md-4 ">
                        <img src="{{url('design/site/images/bg.jpg')}}" alt="" />
                        <p class="h4 font-weight-bold text-color pt-4"> {{trans('web.enjoryYourSerivce')}}</p>
                        <p class="text-muted font-weight-bold">
                            {{ trans('web.findNears') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider -->
        @if($items->count() > 0)
            <div class="carousel-card">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <div class="ltr-styl">
                                <h3 class="pl-4 mb-0 font-weight-bold text-color">
                                    {{ trans('web.beautySalonsNearby') }}
                                </h3>
                                <p class="pl-4 mt-0 font-weight-bold text-muted pt-2">
                                    {{ trans('web.longText') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme pt-4" id="carousel_in_home">
                        @include('site.components.salons.homeSlider',['items'=>$items])
                    </div>
                </div>
            </div>
        @endif
        <!-- store -->
        <div class="store pt-3 pb-3 ltr-styl">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img class="img-app" src="{{url('design/site/images/img-getstarted-mobile.png')}}" alt="" />
                    </div>
                    <div class="col-12 col-md-6  pb-lg-5  align-self-center">
                        <div class="row ">
                            <h1 class=" hed-app font-weight-bold col-12 col-md-10 pt-4 ">
                               {{trans('web.perfectApp')}}
                            </h1>
                            <p class="font-weight-bold col-10">
                                 {{ trans('web.longText') }}
                            </p>
                            <a href="#" class="btn btn-store btn-app">
                                <div class="row">
                                    <div class="col-3">
                                        <span class="p-3"><i class="fab fa-apple fa-2x"></i></span>
                                    </div>
                                    <div class="col-9 pl-0">
                                        <span class="btn-label"> {{ trans('web.downloadFrom') }}</span>
                                        <span class="btn-caption">App Store</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="btn btn-store btn-play">
                                <div class="row">
                                    <div class="col-3">
                                        <span class="p-3"><img class="img-play-store" src="{{url('design/site/images/google-store.png')}}" alt=""></span>
                                    </div>
                                    <div class="col-9 pl-0 pb-1">
                                        <span class="btn-label">{{ trans('web.downloadFrom') }}</span>
                                        <span class="btn-caption"> Play store</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
