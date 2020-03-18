<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{$pageName}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                        @if (isset($items))
                            @foreach($items as $item)
                                @if (isset($item['url']) && $item['name'])
                                    <li class="breadcrumb-item"><a href="{{$item['url']}}">{{$item['name']}}</a></li>
                                @endif
                            @endforeach
                        @endif
                        <li class="breadcrumb-item active"><a href="#">{{$pageName}}</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
