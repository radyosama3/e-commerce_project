@extends('admin.layout')

@section('body')
@include('success')
@include('errors')

prouduct Name: {{$category->name}} <br> <hr>
prouduct desc: {{$category->desc}} <br> <hr>

<form action="{{ route('deletecategory', $category->id) }}" method="POST" onsubmit="return confirmDelete()">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>


<h1>
    {{-- <a  href="{{url("products/edit/$product->id")}}" class="btn btn-success">edit  </a> --}}
</h1>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this product?');
        }
    </script>
@endsection