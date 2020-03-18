<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <form method="POST" action="{{url('/services')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">{{ trans('web.addService') }}  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                                            'value' => '',
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
                                            'value' => '',
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
                                            'class' => '',
                                            'value' => '',
                                            'label' => trans('web.categoryArabicDescription'),
                                            'icon' =>'',
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
                                            'value' => '',
                                            'label' => trans('web.categoryEnglishDescription'),
                                            'icon' =>'',
                                            'placeholder' => trans('web.categoryEnglishDescription'),
                                            'disabled' => false,
                                            ])
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            @include('site.components.inputs.time', [
                                            'name' => 'time',
                                            'id' => 'time',
                                            'class' => 'time',
                                            'type' => 'time',
                                            'value' => '',
                                            'label' => trans('web.time'),
                                            'icon' =>'fas fa-clock',
                                            'placeholder' => trans('web.time'),
                                            'disabled' => false,
                                            ])
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            @include('site.components.inputs.text', [
                                            'name' => 'price',
                                            'id' => 'price',
                                            'type' => 'text',
                                            'class' => 'price',
                                            'value' => '',
                                            'label' => trans('web.price'),
                                            'icon' =>'fas fa-dollar-sign',
                                            'placeholder' => trans('web.price'),
                                            'disabled' => false,
                                            ])
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            @include('site.components.inputs.select', [
                                            'name' => 'service_list_id',
                                            'id' => 'service_list_id',
                                            'class' => 'danger',
                                            'value' => '',
                                            'label' => trans('web.ChooseTypeService'),
                                            'oldcheaked' => '',
                                            'items' => \App\Model\ServiceList::latest()->get(),
                                            'placeholder' => '',
                                            'checked' => false,
                                            'disabled' => false,
                                            ])
                                        </div>

                                        <div class="col-xl-12 col-md-12 col-12">
                                            @include('site.components.uploud.file', ['name' =>'image','label'=>trans('web.image'),'max'=>'5','accept'=>'image/*' , 'disabled' => false, 'value'=>''])
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger text-white form-control" data-dismiss="modal">{{trans('web.cancel')}}</button>
                    <button type="submit" class="btn bg-color text-white form-control">{{trans('web.addData')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>


