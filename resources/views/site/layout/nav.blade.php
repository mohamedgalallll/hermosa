<div class="backgr" style="background:url('{{$homeBackground->image}} ') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    width: 100%;
    height: 100%;
    position: relative;">
    <div class="top-menu  text-center">
        <div class="container">
            <div class="row">
                @if(url('/') == url()->current())
                    @auth
                        <div class="col-md-2">
                            <img src="{{$settings->main_logo}}" alt="logo" class="logo"/>
                        </div>
                        <div class="col-md-7"></div>
                    @endauth
                    @guest
                        <div class="col-md-2 pt-2">
                            <img src="{{$settings->main_logo}}" alt="logo" class="logo"/>
                        </div>
                        <div class="col-md-6"></div>
                    @endguest
                @else
                    @auth
                        <div class="col-md-2">
                            <img src="{{$settings->main_logo}}" alt="logo" class="logo"/>
                        </div>
                        <div class="col-md-7  row text-center">
{{--                            <form class="row col-12 text-center middleForm">--}}
{{--                                <div class="col inf">--}}
{{--                                    <button type="submit" class="btnSearch">--}}
{{--                                        <i class="fas fa-search"></i> {{trans('web.search')}}--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <div class="col inf infMap">--}}
{{--                                    <i class="fas fa-map-marker-alt"></i> القاهره--}}
{{--                                </div>--}}
{{--                                <div class="hiddenMap"></div>--}}
{{--                                <div class="col inf infDate">--}}
{{--                                    <i class="far fa-calendar-alt"></i> <span class="addDate"> {{trans('web.date')}}</span>--}}
{{--                                </div>--}}
{{--                                <div class="hiddenDate">--}}
{{--                                    <div class="my-date row hiddenTimeMyDate">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="enter">--}}
{{--                                                <input type="radio" checked name="test" value="{{trans('web.anyDate')}}"--}}
{{--                                                       class="chooseDate"/>--}}
{{--                                                <p class="my-custom-p"> {{trans('web.anyDate')}}</span></p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="enter">--}}
{{--                                                <input type="radio" name="test" value="{{trans('web.today')}}" class="chooseDate"/>--}}
{{--                                                <p class="my-custom-p">{{trans('web.today')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="enter">--}}
{{--                                                <input type="radio" name="test" value="{{trans('web.tomorrow')}}" class="chooseDate"/>--}}
{{--                                                <p class="my-custom-p">{{trans('web.tomorrow')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="enter">--}}
{{--                                                <input type="radio" name="test" value=""--}}
{{--                                                       class="form-control chooseDate"/>--}}
{{--                                                <p class="custom-p-date">{{trans('web.chooseDate')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="hidden-time col-12 mb-4 mt-0 pt-0 pb-0 ">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-12 myCustomDate">--}}
{{--                                                    @include('site.components.inputs.date', [--}}
{{--                                                    'name' => 'dateSearch',--}}
{{--                                                    'id' => 'dateSearch',--}}
{{--                                                    'class' => 'danger',--}}
{{--                                                    'label' => '',--}}
{{--                                                    'placeholder' =>trans('web.date'),--}}
{{--                                                    'disabled' => false,--}}
{{--                                                    ])--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col inf infTime">--}}
{{--                                    <i class="far fa-clock"></i> <span class="addTime">{{trans('web.time')}}</span>--}}
{{--                                </div>--}}
{{--                                <div class="hiddenTime">--}}
{{--                                    <div class="my-date row hiddenTimeMyDate">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="mb-0 chTime">--}}
{{--                                                <input checked type="radio" name="test2" value="{{trans('web.anyTime')}}"--}}
{{--                                                       class="chooseTime"/>--}}
{{--                                                <p class="my-custom-p">{{trans('web.anyTime')}} </p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="mb-0">--}}
{{--                                                <input type="radio" name="test2" value="" class="chooseTime"/>--}}
{{--                                                <p class="custom-p receiveTime">{{trans('web.chooseTime')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="hidden-time col-12 mb-4">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 text-left">--}}
{{--                                                    @include('site.components.inputs.time', [--}}
{{--                                                     'name' => 'from',--}}
{{--                                                     'id' => 'from',--}}
{{--                                                     'class' => 'time',--}}
{{--                                                     'type' => 'time',--}}
{{--                                                     'value' => '',--}}
{{--                                                     'label' => trans('web.from'),--}}
{{--                                                     'placeholder' => '',--}}
{{--                                                     'disabled' => false,--}}
{{--                                                     ])--}}
{{--                                                </div>--}}
{{--                                                <div class="col-6 text-left">--}}
{{--                                                    @include('site.components.inputs.time', [--}}
{{--                                                   'name' => 'to',--}}
{{--                                                   'id' => 'to',--}}
{{--                                                   'class' => 'time',--}}
{{--                                                   'type' => 'time',--}}
{{--                                                   'value' => '',--}}
{{--                                                   'label' => trans('web.to'),--}}
{{--                                                   'placeholder' => '',--}}
{{--                                                   'disabled' => false,--}}
{{--                                                   ])--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>
                    @endauth
                    @guest
                        <div class="col-md-2">
                            <img src="{{$settings->main_logo}}" alt="" width="100%" alt="logo" class="logo">
                        </div>

                        <div class="col-md-6  row text-center mt-3 ">
{{--                            <form class="row col-12 text-center middleForm">--}}
{{--                                <div class="col inf">--}}
{{--                                    <button type="submit" class="btnSearch">--}}
{{--                                        <i class="fas fa-search"></i> {{trans('web.search')}}--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <div class="col inf infMap">--}}
{{--                                    <i class="fas fa-map-marker-alt"></i> القاهره--}}
{{--                                </div>--}}
{{--                                <div class="hiddenMap"></div>--}}
{{--                                <div class="col inf infDate">--}}
{{--                                    <i class="far fa-calendar-alt"></i> <span class="addDate"> {{trans('web.date')}}</span>--}}
{{--                                </div>--}}
{{--                                <div class="hiddenDate">--}}
{{--                                    <div class="my-date row hiddenTimeMyDate">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="enter">--}}
{{--                                                <input type="radio" checked name="test" value="{{trans('web.anyDate')}}"--}}
{{--                                                       data-value='تجربه' class="chooseDate"/>--}}
{{--                                                <p class="my-custom-p"> {{trans('web.anyDate')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="enter">--}}
{{--                                                <input type="radio" name="test" value="{{trans('web.today')}}" class="chooseDate"/>--}}
{{--                                                <p class="my-custom-p">{{trans('web.today')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="enter">--}}
{{--                                                <input type="radio" name="test" value="{{trans('web.tomorrow')}}" class="chooseDate"/>--}}
{{--                                                <p class="my-custom-p">{{trans('web.tomorrow')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="enter">--}}
{{--                                                <input type="radio" name="test" value=""--}}
{{--                                                       class="form-control chooseDate"/>--}}
{{--                                                <p class="custom-p">{{trans('web.chooseDate')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="hidden-time col-12 mb-4 mt-0 pt-0 pb-0">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-12 myCustomDate">--}}
{{--                                                    @include('site.components.inputs.date', [--}}
{{--                                                    'name' => 'dateSearchHome',--}}
{{--                                                    'id' => 'dateSearchHome',--}}
{{--                                                    'class' => 'danger',--}}
{{--                                                    'label' => '',--}}
{{--                                                    'placeholder' => trans('web.date'),--}}
{{--                                                    'disabled' => false,--}}
{{--                                                    ])--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col inf infTime">--}}
{{--                                    <i class="far fa-clock"></i> <span class="addTime">{{trans('web.time')}}</span>--}}
{{--                                </div>--}}
{{--                                <div class="hiddenTime">--}}
{{--                                    <div class="my-date row hiddenTimeMyDate">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="mb-0 chTime">--}}
{{--                                                <input checked type="radio" name="test2" value="{{trans('web.anyTime')}}"--}}
{{--                                                       class="chooseTime"/>--}}
{{--                                                <p class="my-custom-p">{{trans('web.anyTime')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-6">--}}
{{--                                            <label class="mb-0">--}}
{{--                                                <input type="radio" name="test2" value=""--}}
{{--                                                       class="chooseTime"/>--}}
{{--                                                <p class="custom-p">{{trans('web.chooseTime')}}</p>--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div class="hidden-time col-12 mb-4">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-6 text-left">--}}
{{--                                                        @include('site.components.inputs.time', [--}}
{{--                                                         'name' => 'fromTime1',--}}
{{--                                                         'id' => 'fromTime1',--}}
{{--                                                         'class' => 'time',--}}
{{--                                                         'type' => 'time',--}}
{{--                                                         'value' => '',--}}
{{--                                                         'label' => trans('web.from'),--}}
{{--                                                         'placeholder' => '',--}}
{{--                                                         'disabled' => false,--}}
{{--                                                         ])--}}
{{--                                                    </div>--}}
{{--                                                <div class="col-6 text-left">--}}
{{--                                                        @include('site.components.inputs.time', [--}}
{{--                                                       'name' => 'toTime1',--}}
{{--                                                       'id' => 'toTime1',--}}
{{--                                                       'class' => 'time',--}}
{{--                                                       'type' => 'time',--}}
{{--                                                       'value' => '',--}}
{{--                                                       'label' => trans('web.to'),--}}
{{--                                                       'placeholder' => '',--}}
{{--                                                       'disabled' => false,--}}
{{--                                                       ])--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>

                    @endguest

                @endif
                @include('site.layout.panels.navBar.loginOrRegisterButtons')
            </div>
        </div>
    </div>

    @include('site.layout.panels.navBar.navItems')
    @if(url('/') == url()->current())
        <div class="home-content ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12  content-p text-center" >
                        <p>
                            {{$homeBackground->text}}
                        </p>
                    </div>
{{--                    <div class="dateAndTime col-md-3 pl-0 pr-0">--}}
{{--                        <div id="" class=" col-12">--}}
{{--                            <div class="text-center col-md-6  pl-3 p-3  pb-3  m-auto">--}}
{{--                                <img--}}
{{--                                    class="d-block img-fluid"--}}
{{--                                    src="{{url('design/site/images/icon.png')}}"--}}
{{--                                    alt="Third slide"--}}
{{--                                />--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="select-me mb-4 col-12">--}}
{{--                            <select--}}
{{--                                class="js-example-basic-single form-control"--}}
{{--                                name="state"--}}
{{--                            >--}}
{{--                                <option value="dd">{{trans('web.lookFor')}}</option>--}}
{{--                                <option value="AL">Alabama</option>--}}
{{--                                <option value="WY">Wyoming</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="select-me mb-4 col-12">--}}
{{--                            <select--}}
{{--                                class="js-example-basic-single form-control"--}}
{{--                                name="state"--}}
{{--                            >--}}
{{--                                <option value="dd"> {{trans('web.currentLocation')}}</option>--}}
{{--                                <option value="AL">Alabama</option>--}}
{{--                                <option value="WY">Wyoming</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="accordion-container col-12">--}}
{{--                            <div class="set set2">--}}
{{--                                <a href="javascript:void(0)" class="empty">--}}
{{--                                    <i class="far fa-calendar-alt"></i>--}}

{{--                                    <span class="myadd"> {{trans('web.date')}} </span>--}}
{{--                                    <span> / </span>--}}
{{--                                    <span class="myadd2"> {{trans('web.time')}} </span>--}}

{{--                                </a>--}}
{{--                                <div class="content text-center content-abs col-12">--}}
{{--                                    <p class="h5">--}}
{{--                                        <i class="far fa-calendar-alt"></i> {{trans('web.chooseDate')}}--}}
{{--                                    </p>--}}
{{--                                    <form action="#" class="my-date">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <label class="enter">--}}
{{--                                                    <input type="radio" checked name="test" value="{{trans('web.anyDate')}} "--}}
{{--                                                           data-value='تجربه' class="chooseDate"/>--}}
{{--                                                    <p class="myCustomP">{{trans('web.anyDate')}}</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <label class="enter">--}}
{{--                                                    <input type="radio" name="test" value="{{trans('web.today')}}" class="chooseDate"/>--}}
{{--                                                    <p class="myCustomP">{{trans('web.today')}}</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <label class="enter">--}}
{{--                                                    <input type="radio" name="test" value="{{trans('web.tomorrow')}}" class="chooseDate"/>--}}
{{--                                                    <p class="myCustomP">{{trans('web.tomorrow')}}</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <label class="enter">--}}
{{--                                                    <input type="radio" name="test" value=""--}}
{{--                                                           class="form-control chooseDate"/>--}}
{{--                                                    <p class="choosingDate">{{trans('web.chooseDate')}}</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                            <div class="hidden-date col-12 mb-4 mt-0 pt-0 pb-0">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-12 myCustomDate">--}}
{{--                                                        @include('site.components.inputs.date', [--}}
{{--                                                        'name' => 'myDateSearch',--}}
{{--                                                        'id' => 'myDateSearch',--}}
{{--                                                        'class' => 'danger',--}}
{{--                                                        'label' => '',--}}
{{--                                                        'placeholder' => trans('web.date'),--}}
{{--                                                        'disabled' => false,--}}
{{--                                                        ])--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <p class="h5"><i class="fas fa-clock"></i> {{trans('web.chooseTime')}}</p>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-6">--}}
{{--                                                <label class="mb-0 chTime">--}}
{{--                                                    <input checked type="radio" name="test2" value="{{trans('web.anyDate')}}"--}}
{{--                                                           class="chooseTime"/>--}}
{{--                                                    <p class="my-custom-p">{{trans('web.anyDate')}}</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6">--}}
{{--                                                <label class="mb-0">--}}
{{--                                                    <input type="radio" name="test2" value=""--}}
{{--                                                           class="chooseTime"/>--}}
{{--                                                    <p class="custom-p receive-time">{{trans('web.chooseDate')}}</p>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                            <div class="hidden-time col-12 mb-4">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-6 text-left">--}}
{{--                                                        @include('site.components.inputs.time', [--}}
{{--                                                         'name' => 'formTime',--}}
{{--                                                         'id' => 'fromTime',--}}
{{--                                                         'class' => 'time text-left',--}}
{{--                                                         'type' => 'time',--}}
{{--                                                         'value' => '',--}}
{{--                                                         'label' => trans('web.from'),--}}
{{--                                                         'placeholder' => '',--}}
{{--                                                         'disabled' => false,--}}
{{--                                                         ])--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-6 text-left">--}}
{{--                                                        @include('site.components.inputs.time', [--}}
{{--                                                       'name' => 'toTime',--}}
{{--                                                       'id' => 'toTime',--}}
{{--                                                       'class' => 'time',--}}
{{--                                                       'type' => 'time',--}}
{{--                                                       'value' => '',--}}
{{--                                                       'label' => trans('web.to'),--}}
{{--                                                       'placeholder' => '',--}}
{{--                                                       'disabled' => false,--}}
{{--                                                       ])--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <button class="form-control btn_date">{{trans('web.done')}}</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12">--}}
{{--                            <button class="form-control btn_date mt-4">--}}
{{--                               {{trans('web.searchInHirMosa')}}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    @endif

</div>
