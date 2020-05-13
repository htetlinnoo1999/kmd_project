<div class="position-relative form-group col-md-8 row">
    <label class="card-title col-form-label col-md-3">{{$title}}</label>
    <select class="form-control col-md-8" name="{{$name}}">
        <option disabled selected>{{$placeHolder??$title}}</option>
        @foreach($options as $key=>$option)
            <option value="{{$key}}" {{$key===($value??'')?'selected':''}}>{{$option}}</option>
        @endforeach
    </select>
</div>
@error($name)
<h5 class="text-danger">{{$message}}</h5>
@enderror


