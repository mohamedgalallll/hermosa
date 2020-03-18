<div class="tab-pane fade show active" id="{{$id}}" role="tabpanel"
     aria-labelledby="{{$aria_labelledby}}">
    <form method="post" action="{{url('profile/update-profile')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="  img-profile">
                    @include('site.components.uploud.file', ['name' =>'user_image','label'=>trans('web.personalPicture'),'max'=>'2','accept'=>'image/*' , 'disabled' => false, 'value'=>$user->user_main_image])
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-2">
                    <i class="fas fa-edit pl-2 pr-2"></i>{{ trans('web.editInformation') }}
                </div>
                <div class="col-md-12 m-0 p-0 ">
                    @include('site.components.inputs.text', [
                    'name' => 'name',
                    'id' => 'name',
                    'type' => 'text',
                    'class' => '',
                    'value' => $user->name,
                    'label' => '',
                    'icon' =>'fas fa-user',
                    'placeholder' => trans('web.name'),
                    'disabled' => false,
                    'required' => true,
                    ])
                </div>
                <div class="col-md-12 m-0 p-0 ">
                    @include('site.components.inputs.date', [
                    'name' => 'date_of_birth',
                    'id' => 'date_of_birth',
                    'type' => 'text',
                    'class' => '',
                    'value' => $user->date_of_birth,
                    'label' => '',
                    'icon' =>'fas fa-calendar',
                    'placeholder' => trans('web.dateOfBirth'),
                    'disabled' => false,
                    'required' => true,
                    ])
                </div>
                <div class="col-md-12 m-0 p-0 ">
                    @include('site.components.inputs.text', [
                    'name' => 'city',
                    'id' => 'city',
                    'type' => 'text',
                    'class' => '',
                    'value' => $user->city,
                    'label' => '',
                    'icon' =>'fas fa-map-marker',
                    'placeholder' => trans('web.city'),
                    'disabled' => false,
                    'required' => true,
                    ])
                </div>

                <div class="col-md-12 m-0 p-0 ">
                    @include('site.components.inputs.text', [
                    'name' => 'first_phone',
                    'id' => 'first_phone',
                    'type' => 'number',
                    'class' => '',
                    'value' => $user->first_phone,
                    'label' => '',
                    'icon' =>'fas fa-mobile',
                    'placeholder' => trans('web.mobileNumber'),
                    'disabled' => false,
                    'required' => true,
                    ])
                </div>
                <div class="col-md-12 m-0 p-0 mb-3 ">
                    @include('site.components.inputs.text', [
                    'name' => 'email',
                    'id' => 'email',
                    'type' => 'email',
                    'class' => '',
                    'value' => $user->email,
                    'label' => '',
                    'icon' =>'fas fa-envelope',
                    'placeholder' => trans('web.email'),
                    'disabled' => true,
                    'required' => false,
                    ])
                </div>
                <button type="submit" class="btn bg-color text-white col-12">{{ trans('web.save') }}</button>

            </div>

        </div>
    </form>
</div>
