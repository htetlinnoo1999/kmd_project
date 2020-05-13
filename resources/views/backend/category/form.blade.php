@include('backend.partials.inputs.textbox',['title'=>'Category Name','name'=>'name','value'=>$category->name??''])
@include('backend.partials.inputs.image',['title'=>'Photo','name'=>'photo','required' => false,'value'=>$category->photo??''])
@include('backend.partials.inputs.submit_button',['title'=>'Category'])
