<div class="tab-pane fade" id="{{$id}}" role="tabpanel" aria-labelledby="{{$aria_labelledby}}">
    <form method="post" action="{{url('/profile/update-location-user')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="mb-2">
                    <i class="fas fa-edit pl-2 pr-2"></i> {{ trans('web.editMyLocation') }}
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('site.components.inputs.text', [
                        'name' => 'location_address',
                        'id' => 'location_address',
                        'type' => 'text',
                         'value' => $user->location_address,
                        'class' => 'location_address',
                        'label' =>trans('web.userLocation'),
                        'icon' =>'fa fa-location-arrow',
                        'placeholder' =>trans('web.userLocation'),
                        'disabled' => false,
                        'required' => true,
                        ])
                        <hr>
                        <div id="user_location" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-6">
                        @include('site.components.inputs.text', [
                       'name' => 'location_lat',
                       'id' => 'location_lat',
                       'type' => 'hidden',
                       'class' => 'location_lat',
                       'label' =>'',
                       'icon' =>'fa fa-level-up',
                       'placeholder' => '',
                       'disabled' => false,
                       'required' => true,
                       ])
                    </div>
                    <div class="col-xl-6 col-md-6 col-6">
                        @include('site.components.inputs.text', [
                       'name' => 'location_long',
                       'id' => 'location_long',
                       'type' => 'hidden',
                       'class' => 'location_long',
                       'label' =>'',
                       'icon' =>'fa fa-level-down',
                       'placeholder' => '',
                       'disabled' => false,
                       'required' => true,
                       ])
                    </div>
                </div>
                <div class="col-md-12 p-10">
                    <button type="submit" class="btn bg-color text-white col-12">{{ trans('web.save') }}</button>
                </div>
            </div>

        </div>
    </form>
</div>
