<div class="tab-pane fade show active" id="{{$id}}" role="tabpanel"
     aria-labelledby="{{$aria_labelledby}}">
    <form method="post" action="{{url('profile/update-profile')}}"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="mb-2 align-header">
                    <i class="fas fa-edit pl-2 pr-2"></i>  {{ trans('web.editSalonInformation') }}
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        @include('site.components.inputs.text', [
                        'name' => 'salon_name',
                        'id' => 'salon_name',
                        'type' => 'text',
                        'class' => '',
                        'value' => $user->salon_name,
                        'label' =>trans('web.salonName'),
                        'icon' =>'fas fa-user',
                        'placeholder' => trans('web.salonName'),
                        'disabled' => false,
                        'required' => true,
                        ])
                    </div>
                    <div class="col-md-6 ">
                        @include('site.components.inputs.text', [
                        'name' => 'name',
                        'id' => 'name',
                        'type' => 'text',
                        'class' => '',
                        'value' => $user->name,
                        'label' => trans('web.nameSalonOwner'),
                        'icon' =>'fas fa-user',
                        'placeholder' =>  trans('web.nameSalonOwner'),
                        'disabled' => false,
                        'required' => true,
                        ])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        @include('site.components.inputs.text', [
                        'name' => 'email',
                        'id' => 'email',
                        'type' => 'email',
                        'class' => '',
                        'value' => $user->email,
                        'label' => trans('web.email'),
                        'icon' =>'fas fa-envelope',
                        'placeholder' =>  trans('web.email'),
                        'disabled' => true,
                        'required' => true,
                        ])
                    </div>
                    <div class="col-md-6">
                        @include('site.components.inputs.text', [
                        'name' => 'first_phone',
                        'id' => 'first_phone',
                        'type' => 'number',
                        'class' => '',
                        'value' => $user->first_phone,
                        'label' => trans('web.primaryPhoneNumber'),
                        'icon' =>'fas fa-mobile',
                        'placeholder' =>  trans('web.primaryPhoneNumber'),
                        'disabled' => false,
                        'required' => true,
                        ])
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6  ">
                        @include('site.components.inputs.text', [
                        'name' => 'second_phone',
                        'id' => 'second_phone',
                        'type' => 'number',
                        'class' => '',
                        'value' => $user->second_phone,
                        'label' =>trans('web.anotherPhoneNumber'),
                        'icon' =>'fas fa-mobile',
                        'placeholder' => trans('web.anotherPhoneNumber'),
                        'disabled' => false,
                        'required' => false,
                        ])
                    </div>
                    <div class="col-md-6 ">
                        @include('site.components.inputs.text', [
                        'name' => 'third_phone',
                        'id' => 'third_phone',
                        'type' => 'number',
                        'class' => '',
                        'value' => $user->third_phone,
                        'label' => trans('web.anotherPhoneNumber'),
                        'icon' =>'fas fa-mobile',
                        'placeholder' =>  trans('web.anotherPhoneNumber'),
                        'disabled' => false,
                        'required' => false,
                        ])
                    </div>

                    <div class="col-md-4  mt-4">
                        @include('site.components.inputs.check', [
                        'name' => 'salon_payment_method_online_payment',
                        'id' => 'salon_payment_method_online_payment',
                        'class' => '',
                        'value' => 1,
                        'label' =>   trans('web.onlinePayment'),
                        'checked' =>$user->salon_payment_method_online_payment,
                        'required' => false,
                        ])
                    </div>
                    <div class="col-md-4  mt-4">
                        @include('site.components.inputs.check', [
                        'name' => 'salon_payment_method_cash',
                        'id' => 'salon_payment_method_cash',
                        'class' => '',
                        'value' => 1,
                        'label' =>   trans('web.cash'),
                        'checked' =>$user->salon_payment_method_cash,
                        'required' => false,
                        ])
                    </div>
                    <div class="col-md-4  mt-4">
                        @include('site.components.inputs.check', [
                        'name' => 'salon_payment_method_promotions',
                        'id' => 'salon_payment_method_promotions',
                        'class' => '',
                        'value' => 1,
                        'label' =>  trans('web.promotionsPayment'),
                        'checked' =>$user->salon_payment_method_promotions,
                        'required' => false,
                        ])
                    </div>
                    <div class="col-md-6 " id="input-hiddin">
                        @include('site.components.inputs.text', [
                        'name' => 'salon_payment_method_promotion_value',
                        'id' => 'salon_payment_method_promotion_value',
                        'type' => 'text',
                        'class' => 'salon_payment_method_promotion_value',
                        'value' => $user->salon_payment_method_promotion_value,
                        'label' => trans('web.promotionValue'),
                        'icon' =>'',
                        'placeholder' =>  trans('web.promotionValue'),
                        'disabled' => false,
                        'required' => false,
                        ])
                    </div>

                </div>
                <div class="row pt-3">
                    <div class="col-md-6 ">
                        @include('site.components.uploud.file', ['name' =>'salon_image','label'=>trans('web.salonPhotoOutside'),'max'=>'2','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage'.$user->salon_image)])
                    </div>
                    <div class="col-md-6 ">
                        @include('site.components.uploud.file', ['name' =>'salon_license','label'=>trans('web.photSalonLicense'),'max'=>'2','accept'=>'image/*' , 'disabled' => false, 'value'=>url('storage'.$user->salon_license)])
                    </div>
                </div>
                <div class="col-md-12 p-5">
                    <button type="submit" class="btn bg-color text-white col-12">{{ trans('web.save') }}</button>
                </div>
            </div>

        </div>
    </form>

</div>
