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
                        'label' => trans('web.teamArabicName'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.teamArabicName'),
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
                        'label' => trans('web.teamEnglishName'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.teamEnglishName'),
                        'disabled' => false,
                        ])
                    </div>


                    <hr class="divider">

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'job_title_ar',
                        'id' => 'description_ar',
                        'type' => 'text',
                        'class' => '',
                        'value' => '',
                        'label' => trans('web.teamArabicJobTitle'),
                         'icon' =>'fa fa-archive',
                        'placeholder' => trans('web.teamArabicJobTitle'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="divider"></div>
                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'job_title_en',
                        'id' => 'description_en',
                        'type' => 'text',
                        'class' => '',
                        'value' => '',
                        'label' => trans('web.teamEnglishJobTitle'),
                        'icon' =>' fa fa-archive',
                        'placeholder' => trans('web.teamEnglishJobTitle'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-6 col-md-6 col-6">
                        @include('admin.components.uploud.file', ['name' =>'image','label'=>trans('web.teamImage'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>''])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.textarea', [
                        'name' => 'excerpt_ar',
                        'id' => 'keyword_ar',
                        'type' => 'text',
                        'class' => 'keyword_ar',
                        'value' => '',
                        'label' => trans('web.teamArabicExcerpt'),
                        'icon' =>'fa fa-paragraph',
                        'placeholder' => trans('web.teamArabicExcerpt'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.textarea', [
                        'name' => 'excerpt_en',
                        'id' => 'keyword_en',
                        'type' => 'text',
                        'class' => 'keyword_en',
                        'value' => '',
                        'label' => trans('web.teamEnglishExcerpt'),
                        'icon' =>'fa fa-paragraph',
                        'placeholder' => trans('web.teamEnglishExcerpt'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.select', [
                        'name' => 'salon_id',
                        'id' => 'main_category_id',
                        'class' => 'danger',
                        'value' => '',
                        'label' => trans('web.selectSalon'),
                        'oldcheaked' => '',
                        'items' => \App\Model\User::where('user_type_id',1)->get(),
                        'placeholder' => trans('web.selectSalon'),
                        'checked' => false,
                        'disabled' => false,
                        ])
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
