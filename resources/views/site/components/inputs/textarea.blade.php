<fieldset class="form-label-group mb-1 mt-2">
    <label for="{{$id}}">{{$label}}</label>
    <textarea name="{{$name}}" id="{{$id}}" data-length="90" class="form-control char-textarea {{$class}}"  id="textarea-counter" rows="4"
              @if (isset($disabled) && $disabled == true)
              disabled readonly="readonly"
              @endif
              placeholder="{{$placeholder}}">{{$value}}</textarea>
</fieldset>
