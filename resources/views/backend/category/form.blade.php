@include('backend.partials.inputs.textbox',['title'=>'Category Name','name'=>'name','value'=>$category->name??''])
@include('backend.partials.inputs.image',['title'=>'Logo','name'=>'photo','value'=>$category->photo??''])
@include('backend.partials.inputs.submit_button',['title'=>'Category'])
