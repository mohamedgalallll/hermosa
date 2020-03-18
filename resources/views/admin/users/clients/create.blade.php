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
                        'name' => 'name',
                        'id' => 'name',
                        'type' => 'text',
                        'class' => 'name',
                        'label' => trans('web.clientName'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.clientName'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'email',
                        'id' => 'email',
                        'type' => 'email',
                        'class' => 'email',
                        'label' => trans('web.clientEmail'),
                        'icon' =>'feather icon-mail',
                        'placeholder' => trans('web.clientEmail'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.date', [
                        'name' => 'date_of_birth',
                        'id' => 'date_of_birth',
                        'class' => 'danger',
                        'label' => 'Date Of Birth',
                        'placeholder' => 'Date Of Birth',
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password',
                        'id' => 'password',
                        'type' => 'password',
                        'class' => 'password',
                        'label' =>trans('web.clientPassword'),
                        'icon' =>'feather icon-lock',
                        'placeholder' => trans('web.clientPassword'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password_confirmation',
                        'id' => 'password_confirmation',
                        'type' => 'password',
                        'class' => 'password_confirmation',
                        'label' => trans('web.clientPasswordConfirmation'),
                        'icon' =>'feather icon-lock',
                        'placeholder' => trans('web.clientPasswordConfirmation'),
                        'disabled' => false,
                        ])
                    </div>
                    <div class="col-xl-6 col-md-6 col-6">
                        @include('admin.components.uploud.file', ['name' =>'user_image','label'=>'Clint Image','max'=>'5','accept'=>'image/*' , 'disabled' => false, 'required' => true, 'value'=>''])
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
