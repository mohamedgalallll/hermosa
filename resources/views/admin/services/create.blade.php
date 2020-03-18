<form method="POST" action="{{$action}}" id="" class="" enctype="multipart/form-data">
    @csrf
    <div class="add-new-data-sidebar">
    <div class="overlay-bg"></div>
    <div class="add-new-data">
        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
                <h4 class="text-uppercase">{{$name}}</h4>
            </div>
            <div class="hide-data-sidebar">
                <i class="feather icon-x"></i>
            </div>
        </div>
        <div class="data-items pb-3">
            <div class="data-fields px-2 mt-3">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'name_ar',
                        'id' => 'name_ar',
                        'type' => 'text',
                        'class' => 'name_ar',
                        'value' => '',
                        'label' => trans('web.servicesArabicName'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.servicesArabicName'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'name_en',
                        'id' => 'name_en',
                        'type' => 'text',
                        'class' => 'name_en',
                        'value' => '',
                        'label' => trans('web.serviceEnglishName'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.serviceEnglishName'),
                        'disabled' => false,
                        ])
                    </div>

                    <hr class="divider">

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.textarea', [
                        'name' => 'description_ar',
                        'id' => 'description_ar',
                        'type' => 'text',
                        'class' => 'description_ar',
                        'value' => '',
                        'label' => trans('web.serviceArabicDesc'),
                        'icon' =>'icon-phone',
                        'placeholder' => trans('web.serviceArabicDesc'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="divider"></div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.textarea', [
                        'name' => 'description_en',
                        'id' => 'description_en',
                        'type' => 'text',
                        'class' => 'description_en',
                        'value' => '',
                        'label' => trans('web.serviceEnglishDesc'),
                        'icon' =>'icon-phone',
                        'placeholder' => trans('web.serviceEnglishDesc'),
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('site.components.inputs.time', [
                        'name' => 'time',
                        'id' => 'time',
                        'type' => 'time',
                        'class' => 'time',
                        'value' => '',
                        'label' => 'الوقت ',
                        'icon' =>'fa fa-clock-o',
                        'placeholder' => 'الوقت ',
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'price',
                        'id' => 'name_ar',
                        'type' => 'text',
                        'class' => 'name_ar',
                        'value' => '',
                        'label' => trans('web.price'),
                        'icon' =>'fa fa-money',
                        'placeholder' => trans('web.price'),
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.select', [
                        'name' => 'salon_id',
                        'id' => 'salon_id',
                        'class' => '',
                        'value' => '',
                        'label' => trans('web.selectSalon'),
                        'oldcheaked' => '',
                        'items' => \App\Model\User::where('user_type_id',1)->get(),
                        'placeholder' => trans('web.selectSalon'),
                        'checked' => false,
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.select', [
                        'name' => 'service_list_id',
                        'id' => 'service_list_id',
                        'class' => 'service_list_id',
                        'value' => '',
                        'label' => trans('web.servicesList'),
                        'oldcheaked' => '',
                        'items' => \App\Model\ServiceList::get(),
                        'placeholder' => trans('web.servicesList'),
                        'checked' => false,
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.uploud.file', ['name' =>'image','label'=>trans('web.image'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>''])
                    </div>

                </div>
            </div>
        </div>
        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
                <button type="submit" class="btn btn-primary">{{trans('web.addData')}}</button>
            </div>
            <div class="cancel-data-btn">
                <button type="button"  class="btn btn-outline-danger">{{trans('web.cancel')}}</button>
            </div>
        </div>
    </div>
</div>
</form>
