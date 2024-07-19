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
        <div class="col-md-4 mb-4">
            <div class="product-item" style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
                <a href="{{ url('products/'.$product->id) }}">
                    <img src="{{ asset('storage/'.$product->image) }}" alt="" style="width: 100%; height: 200px; object-fit: cover;">
                </a>
                <div class="down-content p-3">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                            <a href="{{ url('products/'.$product->id) }}" class="text-decoration-none">
                            <h4 class="mb-0">{{ $product->name }}</h4>
                        </a>
                        <h6 class="mb-0 fw-bold">{{ $product->price }}</h6>
                    </div>
                    <form action="{{ route('addtocart', $product->id) }}" method="post" class="d-flex align-items-center">
                        @csrf
                        <input type="number" name="qunt" class="form-control me-3" placeholder="Quantity" min="1" value="{{ old('qunt', 1) }}">
                        @if(old('qunt', 1)  >= 1)
                            <button type="submit" class="btn btn-info">{{ __('message.add to cart') }}</button>
                        @endif
                    </form>
                </div>

            </div>
        </div>
    @endforeach



      </div>
    </div>
</div>
@endsection