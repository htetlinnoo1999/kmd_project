<div class="form-group">
    <div id="wrapper">
        <label for="brand_image" class="card-title">{{$title}}</label><br>
        @if(isset($value))
            <img id="preview_photo" src="{{$value}}" width="300" class="img-thumbnail" alt="">
        @endif
        <img id="{{$name}}" style="width: 300px"/><br><br>
        <input type="file" name="{{$name}}" accept="image/*" onchange="preview_image(event,'{{$name}}')"
            {{(isset($isEdit) && $isEdit === true) || (isset($required) && $required == false)?'':'required'}}
        >
        @error('photo')
        <h5 class="text-danger">{{$message}}</h5>
        @enderror
    </div>
</div>
