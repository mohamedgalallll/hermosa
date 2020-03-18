<div class="tab-pane fade" id="{{$id}}" role="tabpanel" aria-labelledby="{{$aria_labelledby}}">
    <section>
        <div class="alert alert-info text-center"><h5> {{ trans('web.recommendedDimensions') }}</h5></div>
        <div id="dropzone">
            <form action="{{url()->current()}}/gallery/add" class="dropzone dz-clickable" id="demo-upload">
                <div class="dz-message">{{ trans('web.dropFiles') }}</div>
            </form>
        </div>
    </section>
</div>
