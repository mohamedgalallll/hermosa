<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu   navbar-shadow
{{request()->cookie('navbar_type') == 'navbar-hidden' ? 'd-none' : ''}}
{{request()->cookie('navbar_type') == 'navbar-static' ? 'navbar-static-top' : ''}}
{{request()->cookie('navbar_type') == 'navbar-floating' ? 'floating-nav' : ''}}
{{request()->cookie('navbar_type') == 'navbar-sticky' ? 'fixed-top' : ''}}
{{request()->cookie('navbar_color')}}
{{request()->cookie('theme_layout') == '' ? 'navbar-light' : 'navbar-dark'}}"
>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="{{trans('web.viewSite')}}"><i
                                    class="ficon feather icon-globe"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="{{trans('web.home')}}"><i
                                    class="ficon feather icon-home"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('admin/settings')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="{{trans('web.settings')}}"><i
                                    class="ficon feather icon-settings"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('admin/clients')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="{{trans('web.clients')}}"><i
                                    class="ficon feather icon-users"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('admin/admins')}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="{{trans('web.admins')}}"><i class="ficon fa fa-user-secret"></i></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i
                                    class="ficon feather icon-star warning"></i></a>
                            <div class="bookmark-input search-input">
                                {{--                                <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>--}}
                                {{--                                <input class="form-control input" type="text" placeholder="Search..." tabindex="0" data-search="template-list">--}}
                                <ul class="search-list search-list-bookmark"></ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    {{-- @if (session()->has('lang'))
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="{{session('lang') == 'en' ?  '?lang=en': '?lang=ar'}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-{{session('lang') == 'en' ?  'us': 'eg'}}"></i>
                            <span class="selected-language"> {{session('lang') == 'en' ?  'English': 'Arabic'}}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="{{session('lang') == 'en' ?  '?lang=ar': '?lang=en'}}" data-language="en">
                                <i class="flag-icon flag-icon-{{session('lang') == 'en' ?  'eg': 'us'}}"></i> {{session('lang') == 'en' ?  'Arabic': 'English'}}</a>
                            </div>
                    </li>
                    @endif --}}
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                class="ficon feather icon-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                                class="ficon feather icon-search"></i></a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                            <input class="input" type="text" placeholder="Search..." tabindex="-1"
                                   data-search="template-list">
                            <div class="search-input-close"><i class="feather icon-x"></i></div>
                            <ul class="search-list search-list-main"></ul>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                           data-toggle="dropdown"><i
                                class="ficon feather icon-bell"></i><span
                                class="badge badge-pill badge-primary badge-up">5</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">5 New</h3><span
                                        class="notification-title">App Notifications</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between"
                                                                           href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                class="feather icon-plus-square font-medium-5 primary"></i></div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">You have new order!</h6>
                                            <small class="notification-text"> Are your going to meet me tonight?</small>
                                        </div>
                                        <small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago
                                            </time>
                                        </small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                class="feather icon-download-cloud font-medium-5 success"></i></div>
                                        <div class="media-body">
                                            <h6 class="success media-heading red darken-1">99% Server load</h6>
                                            <small class="notification-text">You got new order of goods.</small>
                                        </div>
                                        <small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago
                                            </time>
                                        </small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                        <div class="media-body">
                                            <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6>
                                            <small class="notification-text">Server have 99% CPU usage.</small>
                                        </div>
                                        <small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time>
                                        </small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                class="feather icon-check-circle font-medium-5 info"></i></div>
                                        <div class="media-body">
                                            <h6 class="info media-heading">Complete the task</h6>
                                            <small class="notification-text">Cake sesame snaps cupcake</small>
                                        </div>
                                        <small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week
                                            </time>
                                        </small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="warning media-heading">Generate monthly report</h6>
                                            <small class="notification-text">Chocolate cake oat cake tiramisu marzipan
                                            </small>
                                        </div>
                                        <small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month
                                            </time>
                                        </small>
                                    </div>
                                </a></li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                                                href="javascript:void(0)">Read all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{auth()->user()->name}}</span><span
                                    class="user-status">{{auth()->user()->email}}</span></div>
                            <span><img class="round" src="{{url('design/admin/img/avatar.png')}}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{url('admin/user/edit')}}"><i class="feather icon-user"></i>{{trans('web.editProfile')}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="feather icon-power"></i>{{trans('web.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
