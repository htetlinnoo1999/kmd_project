@extends('adminlte::page')

@section('title', 'Create New Brand')

@section('content')
    <div class="card-body">
        <h3><b>Create Category</b></h3>
        <form action="{{route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.brand.form')
        </form>
    </div>
@endsection
