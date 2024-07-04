@extends('admin.layout')

@section('body')

@include('errors')
@include('success')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        {{-- <th scope="col">desc</th> --}}
        <th scope="col">price</th>
        <th scope="col">Quantity</th>
        <th scope="col">image</th>
        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($products as $product )
      <tr>
          <th scope="row">{{$loop->iteration}}</th>
        <td>{{$product->name}}</td>
        {{-- <td>{{$product->desc}}</td> --}}
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td><img src="{{asset("storage/$product->image")}}" width="100px" alt="" srcset=""></td>
        <td>

            <h1>
                <a class="btn btn-success" href="{{url("products/show/$product->id")}}" >show</a>
            </h1>
        </td>
    </tr>
    @endforeach

    </tbody>
  </table>

@endsection