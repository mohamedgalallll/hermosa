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
                        'class' => '',
                        'value' => '',
                        'label' => trans('web.adminName'),
                        'icon' =>'feather icon-user',
                        'placeholder' => trans('web.adminName'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'email',
                        'id' => 'email',
                        'type' => 'email',
                        'class' => '',
                        'value' => '',
                        'label' => trans('web.adminEmail'),
                        'icon' =>'feather icon-mail',
                        'placeholder' =>trans('web.adminEmail'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.select', [
                        'name' => 'admin_group',
                        'id' => 'admin_group',
                        'class' => 'danger',
                        'value' => '',
                        'label' => trans('web.adminGroup'),
                        'oldcheaked' => '',
                        'items' => \App\Model\AdminGroup::get(),
                        'placeholder' =>trans('web.adminGroup.'),
                        'checked' => false,
                        'disabled' => false,
                        ])
                    </div>


                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password',
                        'id' => 'password',
                        'type' => 'password',
                        'class' => '',
                        'value' => '',
                        'label' =>trans('web.adminPassword'),
                        'icon' =>'feather icon-lock',
                        'placeholder' => trans('web.adminPassword'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.text', [
                        'name' => 'password_confirmation',
                        'id' => 'password_confirmation',
                        'type' => 'password',
                        'class' => '',
                        'value' => '',
                        'label' =>trans('web.adminPasswordConfirmation') ,
                        'icon' =>'feather icon-lock',
                        'placeholder' => trans('web.adminPasswordConfirmation'),
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
                <button type="button"  class="btn btn-outline-danger">{{trans('web.Cancel')}}</button>
            </div>
        </div>
    </div>
</div>
</form>
