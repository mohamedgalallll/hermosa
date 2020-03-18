<div class="tab-pane fade  " id="{{$id}}" role="tabpanel"
     aria-labelledby="{{$aria_labelledby}}">
    <form method="post" action="{{url('profile/update-password')}}"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="mb-2 align-header">
                    <i class="fas fa-edit pl-2 pr-2"></i> {{ trans('web.updatePassword') }}
                </div>
                <div class="col-md-12 m-0 p-0 ">
                    @include('site.components.inputs.text', [
                    'name' => 'old_password',
                    'id' => 'old_password',
                    'type' => 'password',
                    'class' => '',
                    'value' => '',
                    'label' => '',
                    'icon' =>'fas fa-lock',
                    'placeholder' => trans('web.oldPassword'),
                    'disabled' => false,
                    'required' => true,
                    ])
                </div>
                <div class="col-md-12 m-0 p-0 ">
                    @include('site.components.inputs.text', [
                    'name' => 'password',
                    'id' => 'password',
                    'type' => 'password',
                    'class' => 'password',
                    'value' => '',
                    'label' => '',
                    'icon' =>'fas fa-lock',
                    'placeholder' => trans('web.newPassword'),
                    'disabled' => false,
                    'required' => true,
                    ])
                </div>

                <div class="col-md-12 m-0 p-0 mb-3 ">
                    @include('site.components.inputs.text', [
                    'name' => 'password_confirmation',
                    'id' => 'password_confirmation',
                    'type' => 'password',
                    'class' => '',
                    'value' => '',
                    'label' => '',
                    'icon' =>'fas fa-lock',
                    'placeholder' => trans('web.confirmPassword'),
                    'disabled' => false,
                    'required' => true,
                    ])
                </div>
                <button type="submit" class="btn bg-color text-white col-12">{{ trans('web.save') }}</button>

            </div>

        </div>
    </form>

</div>
