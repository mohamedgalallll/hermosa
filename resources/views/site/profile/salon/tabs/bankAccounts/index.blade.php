<div class="tab-pane fade " id="{{$id}}" role="tabpanel"
     aria-labelledby="{{$aria_labelledby}}">
    <form method="post" action="{{url('profile/update-bank')}}"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="mb-2 align-header">
                    <i class="fas fa-edit pl-2 pr-2"></i> {{ trans('web.updateBankAccounts') }}
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        @include('site.components.inputs.text', [
                        'name' => 'first_bank_account_name',
                        'id' => 'first_bank_account_name',
                        'type' => 'text',
                        'class' => '',
                        'value' => $user->first_bank_account_name,
                        'label' =>trans('web.nameFirstBank'),
                        'icon' =>'fas fa-user',
                        'placeholder' => trans('web.nameFirstBank'), 
                        'disabled' => false,
                        'required' => true,
                        ])
                    </div>
                    <div class="col-md-6 ">
                        @include('site.components.inputs.text', [
                        'name' => 'first_bank_account_number',
                        'id' => 'first_bank_account_number',
                        'type' => 'number',
                        'class' => '',
                        'value' => $user->first_bank_account_number,
                        'label' =>trans('web.firstBankAccountNumber'),

                        'icon' =>'fas fa-user',
                        'placeholder' => trans('web.firstBankAccountNumber'),
                        'disabled' => false,
                        'required' => true,
                        ])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        @include('site.components.inputs.text', [
                        'name' => 'second_bank_account_name',
                        'id' => 'second_bank_account_name',
                        'type' => 'text',
                        'class' => '',
                        'value' => $user->second_bank_account_name,
                        'label' =>trans('web.nameSecondBank'),
                        'icon' =>'fas fa-user',
                        'placeholder' => trans('web.nameSecondBank'),
                        'disabled' => false,
                        'required' => true,
                        ])
                    </div>
                    <div class="col-md-6 ">
                        @include('site.components.inputs.text', [
                        'name' => 'second_bank_account_number',
                        'id' => 'second_bank_account_number',
                        'type' => 'number',
                        'class' => '',
                        'value' => $user->second_bank_account_number,
                        'label' =>trans('web.secondBankAccountNumber'),
                        'icon' =>'fas fa-user',
                        'placeholder' =>trans('web.secondBankAccountNumber'),

                        'disabled' => false,
                        'required' => true,
                        ])
                    </div>
                </div>

                <div class="col-md-12 p-5">
                    <button type="submit" class="btn bg-color text-white col-12">{{ trans('web.save') }}
                    </button>
                </div>
            </div>

        </div>
    </form>

</div>
