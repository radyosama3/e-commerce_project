@extends('admin.layout')
    @section('body')
    {{-- catch errors --}}
        @include('errors')
        @include('success')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">description</th>
                <th scope="col">Aciton</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($category as $category )
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$category->name}}</td>
                {{-- <td>{{$product->desc}}</td> --}}
                <td>{{ Str::limit($category->desc, 200) }}</td>
                <td>

                    <h1>
                        <a class="btn btn-success" href="{{route('showcategory',$category->id)}}" >show</a>
                    </h1>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>

    @endsection