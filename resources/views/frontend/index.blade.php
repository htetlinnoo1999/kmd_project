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
                                    @if($product->photo != 'default_photo.jpg')
                                    <img class="card-img-top" width="50" height="180" src="{{asset('storage/'.$product->photo)}}" alt="Card image cap">
                                    @else
                                    <img class="card-img-top" width="50" height="180" src="https://cnet1.cbsistatic.com/img/QEOIYo5JTgXV3xW5kYLW1_PMXVI=/822x959/2020/04/15/53146b79-7cce-414a-a134-2c14ecd089bb/iphone-se-all-colors.jpg" alt="Card image cap">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="ca18-title" style="min-height: 3rem"> {{$product->name}}</h5>
                                        <p class="card-text"> {{$product->price}} MMK</p>

                                        <a href="/cart/add/{{$product->id}}" class="btn btn-primary btn-block">Add to cart</a>
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
