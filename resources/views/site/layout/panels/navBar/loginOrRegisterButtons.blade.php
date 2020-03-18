@auth
    <div class="col-md-3 pt-0">
        <ul class="list-unstyled userProfile">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="userName">{{auth()->User()->name}}</span>
                    <img src="{{auth()->User()->user_main_image}}" class="userIcon">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('profile')}}"><i class="fas fa-user mr-1"></i> {{ trans('web.profile')}}</a>
                    {{--                            <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> الضبط </a>--}}
                    <a class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  href="{{ route('logout') }}"><i class="fas fa-sign-out-alt mr-1"></i>{{ trans('web.logout') }}</a>
                </div>
            </li>
        </ul>
    </div>
@endauth
@guest
    <div class="col-md-4 text-center mt-0">
        <div class="row">
            <div class="col-6">
                <a href="{{route('register')}}" class="text-dark">
                    <ul class="salon-nav">
                        <li class="salon-item text-dark">
                            <i class="fas fa-hands-helping text-dark"></i>{{ trans('web.listYourSalon') }}
                        </li>
                    </ul>
                </a>
            </div>
            <div class="col-6">
                <a href="{{route('register')}}">
                    <ul class="salon-nav">
                        <li class="salon-item">
                            <i class="fas fa-reply-all"></i> {{trans('web.login') }} / <span
                                class="text-dark"> {{ trans('web.register')}} </span>
                        </li>
                    </ul>
                </a>
            </div>
        </div>
    </div>
@endguest
