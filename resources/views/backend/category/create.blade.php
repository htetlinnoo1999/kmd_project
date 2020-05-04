@extends('adminlte::page')

@section('title', 'Create New Category')

@section('content')
    <div class="card-body">
        <h3><b>Create Category</b></h3>
        <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.category.form')
        </form>
    </div>
@endsection
