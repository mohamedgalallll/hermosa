<li class=" nav-item">
    <a href="{{$url}}">
        <i class=" {{$icon}}"></i>
        <span class="menu-title" data-i18n="{{$name}}">{{$name}}</span>
        <span class="badge badge badge-warning badge-pill float-right mr-2">{{count($items)}}</span>
    </a>
    <ul class="menu-content">
        @foreach($items as $item)
            <li class="{{url()->current() == $item['url'] ? 'active' : ''}}">
                <a href="{{$item['url']}}">
                    <i class="feather {{$item['icon']}}"></i>
                    <span class="menu-item" data-i18n="{{$item['name']}}">{{$item['name']}}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li>
