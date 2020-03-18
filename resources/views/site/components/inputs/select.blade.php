<fieldset class="form-group pt-3">
    <label for="{{$id}}">{{$label}}</label>
     <select class="select2 form-control p-2 {{$class}}" name="{{$name}}"  id="{{$id}}"
             @if (isset($disabled) && $disabled == true)
             disabled readonly="readonly"
         @endif
     style="height: auto ">
         @if (isset($items) ))
         @foreach ($items as $item)
             <option  {{$oldcheaked == $item->id ? 'selected' : ''}}  value="{{$item->id}}">{{$item->name}}</option>
         @endforeach
         @endif
     </select>
</fieldset>
