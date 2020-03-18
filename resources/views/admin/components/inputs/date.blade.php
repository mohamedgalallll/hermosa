<fieldset class="form-group">
    <label for="{{$id}}">{{$label}}</label>
    <input type='text' name="{{$name}}"  value="{{isset($value) ? $value  : old($name)}}" placeholder="{{$placeholder}}"   id="{{$id}}" class="form-control pickadateInput"
           @if (isset($disabled) && $disabled == true)
           disabled readonly="readonly"
        @endif
    />
</fieldset>

