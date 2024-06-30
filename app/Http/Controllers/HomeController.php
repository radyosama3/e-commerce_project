<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function redirectin (){
    if(Auth::user()->role=='admin'){
        return view('admin.home');
    }else {
        $products=Product::all();
        return view('user.home',compact('products'));
    }
  }



}
