@include('backend.partials.inputs.textbox',['title'=>'Brand Name','name'=>'name','value'=>$record->name??''])
@include('backend.partials.inputs.image',['title'=>'Logo','name'=>'photo','value'=>$record->logo??''])
@include('backend.partials.inputs.submit_button',['title'=>'Category'])
