@extends('adminlte::page')

@section('title', 'All Categories')

@section('content')
    <div class="card-body">
        <h3><b>Update Category</b></h3>
        <form action="{{route('admin.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.category.form',['isEdit'=>true,'category'=>$category])
        </form>
    </div>
@endsection
