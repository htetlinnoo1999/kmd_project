@extends('adminlte::page')

@section('title', 'All Brands')

@section('content')
    @include('backend.partials.flash-message')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Orders table</h5>
            <table class="mb-0 table table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Customer Name</th>
                    <th>Payment Type</th>
                    <th>Total Amount</th>
                    <th>Delivered</th>

                </tr>
                </thead>
                <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>
                            <a class='waves-effect btn btn-success' data-value={{$record->id}} href={{route('admin.order.delivered', $record->id)}}><span class='fa fa-eye'></span></a>
                        </td>
                        <td>{{$record->user->name}}</td>
                        <td>{{$record->payment_type}}</td>
                        <td>{{$record->amount}}</td>
                        <td>{{$record->status == 0 ? 'un-delivered': 'delivered'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $records->links() }}
        </div>
    </div>
@endsection

