<div class="position-relative form-group col-md-8 row">
    <label for="{{$name}}" class="card-title col-form-label col-md-3">{{$title}}</label>
    <textarea name="{{$name}}" id="{{$name}}" rows="{{$row?? '3'}}"
           class="form-control col-md-8"
        {{(isset($required) && $required == false)?'':'required'}}>{{$value?? ''}}</textarea>
</div>
@error($name)
<h5 class="text-danger">{{$message}}</h5>
@enderror
