@php
    $class ??=null;
@endphp

<div @class(["form-check form-switch",$class])>
    <input type="hidden" value="0" name="{{$name}}">
    <input @checked(old($name,$vale??false)) type="checkbox" value="1" name="{{$name}}" class="form-check-input @error($name)
      is-invalid
    @enderror" role="switch" id="{{$name}}">
    <label class="from-check-label" for="{{$name}}">{{$label}}</label>
    @error($name)
    <div class="invalid-feedback">
     {{$message}}
  </div>
 @enderror
</div
