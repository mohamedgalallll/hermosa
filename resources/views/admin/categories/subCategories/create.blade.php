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
                        'label' => trans('web.categoryArabicName'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.categoryArabicName'),
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
                        'label' => trans('web.categoryEnglishName'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.categoryEnglishName'),
                        'disabled' => false,
                        ])
                    </div>


                    <hr class="divider">

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.textarea', [
                        'name' => 'description_ar',
                        'id' => 'description_ar',
                        'type' => 'text',
                        'class' => '',
                        'value' => '',
                        'label' =>  trans('web.categoryArabicDescription'),
                        'icon' =>'icon-phone',
                        'placeholder' =>  trans('web.categoryArabicDescription'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="divider"></div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.textarea', [
                        'name' => 'description_en',
                        'id' => 'description_en',
                        'type' => 'text',
                        'class' => '',
                        'value' => '',
                        'label' =>  trans('web.categoryEnglishDescription'),
                        'icon' =>'icon-phone',
                        'placeholder' => trans('web.categoryEnglishDescription'),
                        'disabled' => false,
                        ])
                    </div>


                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'keyword_ar',
                        'id' => 'keyword_ar',
                        'type' => 'text',
                        'class' => 'keyword_ar',
                        'value' => '',
                        'label' => trans('web.categoryArabicKeyWords'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.categoryArabicKeyWords'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'keyword_en',
                        'id' => 'keyword_en',
                        'type' => 'text',
                        'class' => 'keyword_en',
                        'value' => '',
                        'label' =>  trans('web.categoryEnglishKeyWords'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.categoryEnglishKeyWords'),
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'icon',
                        'id' => 'icon',
                        'type' => 'text',
                        'class' => 'icon',
                        'value' => '',
                        'label' => trans('web.categoryIcon'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.categoryIcon'),
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.staticSelect', [
                        'name' => 'status',
                        'id' => 'status',
                        'class' => 'danger',
                        'value' => 'name',
                        'label' => trans('web.status'),
                        'oldcheaked' => '',
                        'placeholder' => trans('web.status'),
                        'checked' => false,
                        'disabled' => false,
                         'items' => [
                         [
                         'name'=> trans('web.activated'),
                         'value'=>'1',
                         ],
                         [
                         'name'=> trans('web.unActivated'),
                         'value'=>'0',
                         ],
                         ],
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.select', [
                        'name' => 'main_category_id',
                        'id' => 'main_category_id',
                        'class' => 'danger',
                        'value' => '',
                        'label' => trans('web.selectMainCategory'),
                        'oldcheaked' => '',
                        'items' => \App\Model\MainCategory::get(),
                        'placeholder' => trans('web.selectMainCategory'),
                        'checked' => false,
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-6 col-md-6 col-6">
                        @include('admin.components.uploud.file', ['name' =>'image_ar','label'=>trans('web.categoryArabicCover'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>''])
                    </div>
                    <div class="col-xl-6 col-md-6 col-6">
                        @include('admin.components.uploud.file', ['name' =>'image_en','label'=>trans('web.categoryEnglishCover'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>''])
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
