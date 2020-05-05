@extends('frontend.layouts.master')

@section('content')
    <div class="container-fluid px-5 pt-3">
        @foreach($categories as $category)
            <div class="row py-5">
                <div class="col-12">
                    <h3><b>{{$category->name}}</b></h3>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach($category->product as $product)
                            <div class=" col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 my-3 d-flex justify-content-center">

                                <div class="card" style="width: 18rem; ">
{{--                                    <img class="card-img-top" src="{{$product->photo}}" alt="Card image cap">--}}
                                    <img class="card-img-top" width="50" src="https://cnet1.cbsistatic.com/img/QEOIYo5JTgXV3xW5kYLW1_PMXVI=/822x959/2020/04/15/53146b79-7cce-414a-a134-2c14ecd089bb/iphone-se-all-colors.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title" style="min-height: 3rem"> {{$product->name}}</h5>
                                        <p class="card-text"> {{$product->price}} MMK</p>

                                        <button href="#" class="btn btn-primary btn-block">Order</button>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@stack('scripts')
