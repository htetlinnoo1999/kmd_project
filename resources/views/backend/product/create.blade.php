@extends('adminlte::page')

@section('title', 'Create New Product')

@section('content')
    <div class="card-body">
        <h3><b>Create Product</b></h3>
        <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.product.form')
        </form>
    </div>
@endsection
