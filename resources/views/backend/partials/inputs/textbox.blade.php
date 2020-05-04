<div class="position-relative form-group col-md-8 row">
    <label for="{{$name}}" class="card-title col-form-label col-md-3">{{$title}}</label>
    <input name="{{$name}}" id="{{$name}}" placeholder="{{$placeHolder??''}}"
           type="{{$type??'text'}}"
           class="form-control col-md-8"
           value="{{$value ?? ''}}"
        {{isset($min)?"min='$min'":''}}
        {{isset($max)?"max='$max'":''}}
        {{(isset($required) && $required == false)?'':'required'}}
        {{(isset($read_only) && $read_only == true)?'readonly':''}}>
</div>
@error($name)
<h5 class="text-danger">{{$message}}</h5>
@enderror
