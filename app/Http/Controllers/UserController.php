<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $key = $request->key;
        $products = Product::where("name", "like", "%$key%")->get();
        return view('user.home', compact('products'));

    }
    public function addtocart ($id ,Request $request){
        // Session::forget('cart');
        // dd(session()->get('cart'));
     $product =  Product::findOrFail($id);
     $qty = $request->qty;
     if(! $product)
     {
        abort(404);
     }
     $cart = session()->get("cart");

     if(! $cart)
     {
       $cart = [
        $id => [
            "name"=>$product->name,
            "qty"=>$qty,
            "price"=>$product->price,
            "image"=>$product->image,
        ]
       ];
       session()->put("cart",$cart);
    //    dd(session()->get("cart"));
       return redirect()->back()->with("success","product addedd to cart successfuly");
     }else {
        if(isset($cart[$id])) {
            $oldqty = $cart[$id]["qty"];
            // dd($oldqty);
            // dd(($oldqty));
            $newQty = $oldqty + $qty;
                    $cart[$id]['qty'] = $newQty ;
                    session()->put('cart', $cart);
                    // dd(session()->get("cart"));
                    return redirect()->back()->with('success', 'Product added to cart successfully!');
         }else{
             $cart[$id] = [
                 "name"=>$product->name,
                 "qty"=>$qty,
                 "price"=>$product->price,
                 "image"=>$product->image,
                ];
                session()->put('cart', $cart);
                // dd(session()->get("cart"));
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
     }





    //     //check the value of the qty not null or not negitive
    //     $qty = $request->qty;
    //    $product= Product::findOrFail($id);
    //     //qunt id (find or fail )
    //     $cartcheck = session()->get('cart');
    //     if(! $cartcheck){
    //         //create in session cart store always
    //         $cart = [
    //             $id=>[
    //                 "name" => $product->name,
    //                 "price"=>$product->price,
    //                 "iamge"=>$product->image,
    //                 "qty"=>$qty,
    //                 ]
    //             ];
    //             dd(session()->get('cart'));
    //             session()->put("cart",$cart);
    //             return redirect()->back()->with('success','the product added success');
    //         }else{
    //             if(isset($cart[$id])){
    //                 $cart[$id]["qty"]=$qty;
    //                 dd(session()->get('cart'));
    //                 session()->put("cart",$cart);
    //                 return redirect()->back()->with('success','the product added success');
    //                 }

    //                 $cart[$id]=[
    //                 "name" => $product->name,
    //                 "price"=>$product->price,
    //                 "iamge"=>$product->image,
    //                 "qty"=>$qty,
    //                 ];
    //                 dd(session()->get('cart'));
    //                  session()->put("cart",$cart);
    //                 return redirect()->back()->with('success','the product added success');
    //                 }
    //             //pind

    //     //session not have cart
    //     //session have cart with id (store and add )

    }
}

