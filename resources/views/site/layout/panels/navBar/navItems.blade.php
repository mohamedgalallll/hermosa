<nav class="navbar navbar-expand-lg">
    <button
        class="navbar-toggler text-white"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars icon-color"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link {{url()->current() == url('') ? 'active':''}}" href="{{url('')}}">{{ trans('web.home') }} <span class="sr-only"></span></a>
            @foreach(\App\Model\ServiceList::all() as $serviceList)
        <a class="nav-item nav-link" href="{{url('/salons?serviceList='.$serviceList->id)}}">{{$serviceList->name}}</a>
            @endforeach
            <a class="nav-item nav-link" href="{{session('lang') == 'en' ? '?lang=ar': '?lang=en'}}">
                <span> {{session('lang') == 'en' ?  'العربيه': 'English'}}</span>
            </a>
            
        </div>
    </div>
</nav>
