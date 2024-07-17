@extends('user.layout')
@section('latest')
<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>{{__('message.Latest Products')}}</h2>
            <a href="products.html">{{__('message.view all products')}} <i class="fa fa-angle-right"></i></a>
            {{-- {{route('search')}} --}}
            <form action="" method="get">
                <input type="text" name="key" id="" value="{{old('key')}}" class="form-control mt-2">
                <button type="submit" class="btn btn-info mt-2">{{__('message.search')}}</button>
            </form>
          </div>
        </div>
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="product-item" style="width: 300px; height: 350px;">
                    <a href="{{ url('products/'.$product->id) }}">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="" style="width: 100%; height: 200px; object-fit: cover;">
                    </a>
                    <div class="down-content" style="padding: 10px;">
                        <a href="{{ url('products/'.$product->id) }}"><h4>{{ $product->name }}</h4></a>
                        <h6>{{ $product->price }}</h6>
                    </div>
                </div>
            </div>
        @endforeach

      </div>
    </div>
</div>
@endsection