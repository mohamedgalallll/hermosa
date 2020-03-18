<fieldset class="form-label-group mb-2">
    <textarea name="{{$name}}" id="{{$id}}" data-length="90" class="form-control char-textarea mySummernote {{$class}}" {{isset($value) ? $value  : old($name)}} id="textarea-counter" rows="4"
              @if (isset($disabled) && $disabled == true)
              disabled readonly="readonly"
              @endif
              placeholder="{{$placeholder}}">{{$value}}</textarea>
    <label for="{{$id}}">{{$label}}</label>
</fieldset>
