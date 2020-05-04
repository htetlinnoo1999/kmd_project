@extends('adminlte::page')

@section('title', 'All Brands')

@section('content')
    <div class="card-body">
        <h3><b>Update Brand</b></h3>
        <form action="{{route('admin.brand.update',$record->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.brand.form',['isEdit'=>true])
        </form>
    </div>
@endsection
