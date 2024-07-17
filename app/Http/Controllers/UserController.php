<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all()
    {
       $products= Product::all();
       return view('user.home',compact('products'));
    }

    public function show($id){
        $product = Product::findOrFail($id);
        $category = $product->category->name;

        return view ('user.show',compact('product','category'));
    }
    public function search (Request $request){
        $key =$request->key;
        Product::where('name','like','%key%')->get();
        return to_route('allUser',compact('Product'));
    }
}

