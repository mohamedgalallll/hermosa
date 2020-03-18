@php
    request('serviceList') ? $serviceList = \App\Model\ServiceList::where('id',request('serviceList'))->first() : $serviceList = null;
@endphp
@extends('site.layout.index')
@section('page_js')
    @include('site.salons.scripts')
@stop
@section('content')
    <main class="py-4 ltr-styl">
        <div class="filter-search">
            <div class="container">
                <div class="pl-4 pb-4 salon-links">
                    <span class="detil"><a href="{{url('')}}">{{ trans('web.home') }}</a> <span> >> </span></span>
                @if($serviceList)<span class="detil "><a href="{{url()->current()}}" class="icon-color"> {{$serviceList->name}} </a></span> @endif
                </div>
                    <div class="row">
                    <div class=" col-5 col-md-4 col-lg-3">
                        @include('site.components.salons.salonFiltersSideMenu')
                    </div>
                    <div class="col-7 col-md-8 col-lg-9 row">
                            <div class="col-md-12" id="main-salons-div">
                                <div id="salons-items">
                                    @include('site.components.salons.salonFilterItem',['iteme'=>$items])
                                </div>
                                <div class="col-md-12 spinner-main-div" id="spinner-main-div" style="display: none">
                                    <div class="row">
                                        <div class=" m-auto">
                                            <div class="loadingio-spinner-spinner-mwin5ubumca">
                                                <div class="ldio-734uxg38tn5">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </main>
@stop
