<fieldset class="form-group">
    <label for="{{$id}}">{{$label}}</label>
     <select class="select2 form-control {{$class}}" name="{{$name}}"  id="{{$id}}"
             @if (isset($disabled) && $disabled == true)
             disabled readonly="readonly"
         @endif >
         @if (isset($items) && is_array($items))
         @foreach ($items as $item)
             <option {{$oldcheaked == $item['value'] ? 'selected' : ''}}  value="{{$item['value']}}">{{$item['name']}}</option>
         @endforeach
         @endif
     </select>
</fieldset>
