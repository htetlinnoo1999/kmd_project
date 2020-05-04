@extends('adminlte::page')

@section('title', 'All Products')

@section('content')
    <div class="card-body">
        <h3><b>Update Brand</b></h3>
        <form action="{{route('admin.product.update',$record->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.product.form',['isEdit'=>true])
        </form>
    </div>
@endsection
