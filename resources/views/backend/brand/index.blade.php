@extends('adminlte::page')

@section('title', 'All Brands')

@section('content')
    @include('backend.partials.flash-message')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Brands table</h5>
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
                @foreach($records as $record)
                    <tr>
                        <td>
                            <a class='waves-effect btn btn-success' data-value={{$record->id}} href={{route('admin.brand.edit', $record->id)}}><span class='fa fa-eye'></span></a>
                        </td>
                        <td>
                            <form id="delete_form{{$record->id}}" action="{{route('admin.brand.destroy',$record->id)}}"
                                  method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <button onclick="event.preventDefault();confirm({{$record->id}})"
                                        class="btn btn-danger btn-block" style="width: 50px;">
                                    <span class='fa fa-trash'></span>
                                </button>
                            </form>
                        </td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $records->links() }}
        </div>
    </div>
@endsection

@push('js')
    @include('backend.partials.deletealert')
@endpush
