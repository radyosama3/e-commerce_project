<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function redirectin (){
    if (!Auth::check() || !Auth::user()->role) {
        return redirect()->route('login');
    }
        if(Auth::user()->role=='admin'){
            return view('admin.home');
        }else {
            $products=Product::all();
            return view('user.home',compact('products'));
        }

    }
    public function changelang($lang){

        if ($lang=="ar"){

            session()->put("lang","ar");
        }else{
            session()->put("lang","en");
        }

      return redirect()->back();
    }



}
