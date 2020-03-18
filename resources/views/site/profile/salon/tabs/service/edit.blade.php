@extends('site.layout.index')
@section('content')
    <main class="py-4 profile-list">
        <div class="container ltr-styl">
            <div>
                <h2>
                    {{ trans('web.editService') }}
                </h2>
            </div>
            <form  method="post" action="{{url('services/'.$services->id)}}}" id=""  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="add-new-data-sidebar">
                    <div class="overlay-bg"></div>
                    <div class="add-new-data">
                        <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                            <div>
                                <h4 class="text-uppercase"></h4>
                            </div>
                        </div>
                        <div class="data-items pb-3">
                            <div class="data-fields px-2 mt-3">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.text', [
                                        'name' => 'name_ar',
                                        'id' => 'name_ar',
                                        'type' => 'text',
                                        'class' => 'name_ar',
                                        'value' => $services->name_ar,
                                        'label' => trans('web.servicesArabicName'),
                                        'icon' =>'fas fa-user',
                                        'placeholder' => trans('web.servicesArabicName'),
                                        'disabled' => false,
                                        ])
                                    </div>

                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.text', [
                                        'name' => 'name_en',
                                        'id' => 'name_en',
                                        'type' => 'text',
                                        'class' => 'name_en',
                                        'value' => $services->name_en,
                                        'label' => trans('web.serviceEnglishName'),
                                        'icon' =>'fas fa-user',
                                        'placeholder' => trans('web.serviceEnglishName'),
                                        'disabled' => false,
                                        ])
                                    </div>

                                    <hr class="divider">

                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.textarea', [
                                        'name' => 'description_ar',
                                        'id' => 'description_ar',
                                        'type' => 'text',
                                        'class' => 'description_ar',
                                        'value' => $services->description_ar,
                                        'label' => trans('web.categoryArabicDescription'),
                                        'icon' =>'icon-phone',
                                        'placeholder' => trans('web.categoryArabicDescription'),
                                        'disabled' => false,
                                        ])
                                    </div>

                                    <div class="divider"></div>
                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.textarea', [
                                        'name' => 'description_en',
                                        'id' => 'description_en',
                                        'type' => 'text',
                                        'class' => '',
                                        'value' => $services->description_en,
                                        'label' => trans('web.categoryEnglishDescription'),
                                        'icon' =>'icon-phone',
                                        'placeholder' => '',
                                        'disabled' => false,
                                        ])
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.time', [
                                        'name' => 'time',
                                        'id' => 'time',
                                        'type' => 'time',
                                        'class' => 'time',
                                        'value' =>  $services->time,
                                        'label' => trans('web.time'),
                                        'icon' =>'fas fa-clock',
                                        'placeholder' => trans('web.time'),
                                        'disabled' => false,
                                        ])
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.text', [
                                        'name' => 'price',
                                        'id' => 'name_ar',
                                        'type' => 'text',
                                        'class' => 'name_ar',
                                        'value' =>  $services->price,
                                        'label' =>  trans('web.price'),
                                        'icon' =>'fas fa-dollar-sign',
                                        'placeholder' => trans('web.price'),
                                        'disabled' => false,
                                        ])
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.inputs.select', [
                                        'name' => 'service_list_id',
                                        'id' => 'main_category_id',
                                        'class' => 'danger',
                                        'value' => '',
                                        'label' => trans('web.ChooseTypeService'),
                                        'oldcheaked' =>  $services->service_list_id,
                                        'items' => \App\Model\ServiceList::latest()->get(),
                                        'placeholder' => '',
                                        'checked' => false,
                                        'disabled' => false,
                                        ])
                                    </div>

                                    <div class="col-xl-12 col-md-12 col-12">
                                        @include('site.components.uploud.file', ['name' =>'image','label'=>trans('web.image'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=> url('storage').$services->image])
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                            <div class="add-data-btn">
                                <button type="submit" class="btn btn-primary">{{trans('web.addData')}}</button>
                            </div>
                            <div class="cancel-data-btn">
                            <a href="{{url('profile')}}">
                                    <button type="button"  class="btn btn-outline-danger">{{trans('web.cancel')}}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>
@stop
