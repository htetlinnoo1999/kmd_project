<h5>{{$title}}</h5>
<div class="position-relative form-group col-md-8 row">
    @foreach($options as $key=>$value)
        <div class="custom-control custom-checkbox col-3">
            <input id="{{$key.$value}}" type="radio" class="custom-control-input" name="{{$name}}" value="{{$key}}" {{$key === $user_role ? 'checked' : ''}}>
            <label for="{{$key.$value}}" class="custom-control-label" >{{$value}}</label>
        </div>
    @endforeach
</div>
