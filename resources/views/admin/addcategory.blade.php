@extends('admin.layout')
    @section('body')
    {{-- catch errors --}}
    @include('errors')
    @include('success')
    <form method="POST" action="{{route('storecategory')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Cateogry Name</label>
          <input type="text" name="name" class="form-control text-white" value="{{old('name')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Cateogry Description</label>
            <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc">{{old('desc')}}</textarea>
          </div>


          <div style="text-align: center;">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @endsection