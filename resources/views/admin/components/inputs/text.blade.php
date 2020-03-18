<label for="{{$id}}">{{$label}}</label>
<fieldset class="form-group {{isset($icon) ? 'position-relative has-icon-left input-divider-left ' : ''}} ">
    <input type="{{$type}}" class="form-control {{$class}}" id="{{$id}}"
           @if (isset($disabled) && $disabled == true)
           disabled readonly="readonly"
           @endif
           @if (isset($required) && $required == true)
           required
           @endif
           name="{{$name}}"
           value="{{isset($value) ? $value  : old($name)}}" placeholder="{{$placeholder}}">
    @if (isset($icon))
        <div class="form-control-position">
            <i class="{{$icon}}"></i>
        </div>
    @endif
</fieldset>
