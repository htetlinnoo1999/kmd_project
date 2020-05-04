<div class="col-md-8 row form-group">
    <label class="card-title col-md-3 col-form-label" for="{{$name}}">{{$title}}</label>
    <input id="{{$name}}" type="checkbox" data-toggle="toggle"
           {{(isset($checked) && $checked==false)?'':'checked'}}
           data-on="{{$onText??'On'}}"
           data-off="{{$offText??'Off'}}"
           data-onstyle="{{$onStyle??'success'}}"
           data-offstyle="{{$offStyle??'danger'}}"
    >
</div>
