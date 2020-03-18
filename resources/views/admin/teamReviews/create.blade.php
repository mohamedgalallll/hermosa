@section('main_js')
    <script>
        $(document).ready(function () {
            $('#salon_id').change(function () {
                var salon_id = $(this).val();
                if (salon_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{url('/admin/getTeam')}}?salon_id=" + salon_id,
                        success: function (res) {
                            if (res) {
                                $("#team_id").empty();
                                $("#team_id").parent().parent().fadeIn();
                                $("#team_id").append('<option value="" ></option>');
                                $.each(res, function (key,value) {
                                    $("#team_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                                });

                            } else {
                                $("#team_id").empty();
                            }
                        }
                    });
                } else {
                    $("#team_id").empty();
                }
            });
        });
    </script>
@stop
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
                        <label>{{trans('web.selectReview')}}</label>
                        <select class="form-control myFontAwesome myCustomSelect" name="reviews_rate">
                            <option value="1"> &#xf005; </option>
                            <option value="2"> &#xf005; &#xf005;</option>
                            <option value="3"> &#xf005; &#xf005; &#xf005;</option>
                            <option value="4"> &#xf005; &#xf005; &#xf005; &#xf005;</option>
                            <option value="5"> &#xf005; &#xf005; &#xf005; &#xf005; &#xf005;</option>
                        </select>
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
                         'name'=> trans('web.pending'),
                         'value'=>'0',
                         ],
                         [
                         'name'=>trans('web.accepted'),
                         'value'=>'1',
                         ],
                         [
                         'name'=>trans('web.rejected'),
                         'value'=>'2',
                         ],
                         [
                         'name'=>trans('web.banned'),
                         'value'=>'3',
                         ],
                         ],
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.textarea', [
                        'name' => 'reviews_text',
                        'id' => 'reviews_text',
                        'type' => 'text',
                        'class' => '',
                        'value' => '',
                        'label' => trans('web.reviewsText'),
                        'placeholder' => trans('web.reviewsText'),
                        'disabled' => false,
                        ])
                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.select', [
                        'name' => 'salon_id',
                        'id' => 'salon_id',
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

                    <div class="col-xl-12 col-md-12 col-12">
                        <fieldset class="form-group">
                            <label for="team_id">team name</label>
                            <select class="select2 form-control " name="team_id"  id="team_id">

                            </select>
                        </fieldset>

                    </div>

                    <div class="col-xl-12 col-md-12 col-12">
                        @include('admin.components.inputs.select', [
                        'name' => 'user_id',
                        'id' => 'user_id',
                        'class' => 'danger',
                        'value' => '',
                        'label' => trans('web.selectUser'),
                        'oldcheaked' => '',
                        'items' => \App\Model\User::where('user_type_id',0)->get(),
                        'placeholder' => trans('web.selectUser'),
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
