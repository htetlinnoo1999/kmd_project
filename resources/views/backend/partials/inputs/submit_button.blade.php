<button type="submit" class="mt-2 btn btn-primary">
    {{(isset($isEdit) && $isEdit === true)?'Update':'Create'}} {{$title}}
</button>
