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
        // return response()->json($products);
       return view('user.home',compact('products'));
    }

    public function show($id){
        $product= Product::findOrFail($id);
        $categoryID= $product->category_id;
        $category = Category::findOrFail($categoryID);
        return view ('user.show',compact('product','category'));
    }
}

