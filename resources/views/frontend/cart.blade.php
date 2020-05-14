@extends('frontend.layouts.master')

@section('content')
    <div class="container lg-px-5 pt-3">


        <h3><b>Your cart</b></h3>
        <div class="row pt-4">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                @forelse($cart as $item)
                    <div class="card mb-2">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-3 col-4">
                                    @if($item->options['photo'] != 'default_photo.jpg')
                                        <img class="border img-fluid"
                                             src="{{asset('storage/'.$item->options['photo'])}}"
                                             alt="">
                                    @else
                                        <img class="border img-fluid"
                                             src="https://cnet1.cbsistatic.com/img/QEOIYo5JTgXV3xW5kYLW1_PMXVI=/822x959/2020/04/15/53146b79-7cce-414a-a134-2c14ecd089bb/iphone-se-all-colors.jpg"
                                             alt="">
                                    @endif

                                </div>
                                <div class="col-lg-6 col-4 mt-2">
                                    <h5 class="mb-3"><b>{{$item->name}}</b></h5>
                                    <span>Quantity</span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form id="quantity" method="post" action="{{route('user.cart.update')}}">
                                                @csrf
                                                <input name="quantity" class="form-control mb-3" style="width: 4.5rem;" min="0" type="number"
                                                       value="{{$item->qty}}">
                                                <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                                <a href="" id="submit" onclick="update()" class="btn btn-success">Update</a>
                                            </form>
                                        </div>
                                        <div class="col-md-6 mt-5 pt-1">
                                            <a href="/cart/remove/{{$item->rowId}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-4 mt-2 d-flex justify-content-end">
                                    <div>
                                        <b><u class="text-right">Price</u></b>
                                        <br>
                                        <span class="text-right">{{$item->price}} MMK</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center">Your cart is empty</h4>

                @endforelse


            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5><b>Summary</b></h5>
                        <hr>
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td class="px-0"><b>Sub Total</b></td>
                                <td colspan="5" class="text-right">{{$subtotal}} MMK</td>
                            </tr>
                            <tr>
                                <td class="px-0"><b>Tax</b></td>
                                <td colspan="5" class="text-right">{{$tax}} MMK</td>
                            </tr>

                            <tr class="border-top">
                                <td class="px-0"><h5><b>Total</b></h5></td>
                                <td colspan="5" class="text-right"><h5><b>{{$total}} MMK</b></h5></td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="/order" class="btn btn-block btn-primary">Place order</a>
                        <a href="/cart/cancel" class="btn btn-block btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            document.querySelector("#submit").addEventListener("click", function(event) {
                event.preventDefault();
                $('#quantity').submit()
            }, false);
        });


    </script>
@endpush
