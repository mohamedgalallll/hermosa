<label for="{{$id}}">{{$label}}</label>
<fieldset class="form-group p-0 m-0 ">
    <input type='time' name="{{$name}}"  value="{{isset($value) ? $value  : old($name)}}" placeholder="{{$placeholder}}"   id="{{$id}}" class="form-control TimePicker "
           @if (isset($disabled) && $disabled == true)
           disabled readonly="readonly"
        @endif
    />
    @if (isset($icon))
        <span class="icon-position"><i class="{{$icon}}"></i></span>
    @endif
</fieldset>
