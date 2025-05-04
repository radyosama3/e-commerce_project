@extends('admin.layout')

@section('body')
@include('success')
@include('errors')

prouduct Name: {{$product->name}} <br> <hr>
prouduct desc: {{$product->desc}} <br> <hr>
prouduct price: {{$product->price}} <br> <hr>
prouduct quantity: {{$product->quantity}} <br><hr>
prouduct Image
<br>
@if ($product->image == null)
<img src="{{ asset('/storage/images/default.png') }}" width="250px" alt="">
@else
<img src="{{ asset("storage/$product->image") }}" width="250px" alt="">
@endif
<br>
<hr>
<form action="{{ route('delete_product ', $product->id) }}" method="POST" onsubmit="return confirmDelete()">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>

<br>
<hr>
<h1>

    <a  href="{{url("products/edit/$product->id")}}" class="btn btn-success">edit  </a>
</h1>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this product?');
        }
    </script>
@endsection