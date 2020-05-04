@extends('adminlte::page')

@section('title', 'All Categories')

@section('content')
    @include('backend.partials.flash-message')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Categories table</h5>
            <table class="mb-0 table table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Name</th>
                    <th>Created At</th>

                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <a class='waves-effect btn btn-success' data-value={{$category->id}} href={{route('admin.category.edit', $category->id)}}><span class='fa fa-eye'></span></a>
                        </td>
                        <td>
                            <form id="delete_form{{$category->id}}" action="{{route('admin.category.destroy',$category->id)}}"
                                  method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <button onclick="event.preventDefault();confirm({{$category->id}})"
                                        class="btn btn-danger btn-block" style="width: 50px;">
                                    <span class='fa fa-trash'></span>
                                </button>
                            </form>
                        </td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection

@push('js')
    @include('backend.partials.deletealert')
@endpush
