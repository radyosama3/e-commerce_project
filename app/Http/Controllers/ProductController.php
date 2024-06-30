<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
        public function create()
        {
            $categories= Category::all();
            return view("admin.create", compact('categories'));
        }
        public function store (Request $request)
        {
            //validation
            $data= $request->validate([
                "name"=>"required|string|max:255",
                "desc"=>"required|string",
                "image"=>"required|image|mimes:png,jpg,jpeg",
                "price"=>"required|numeric",
                "quantity"=>"required|integer",
                "category_id" => "required|exists:categories,id"
            ]);
            //storage
        $data['image'] = Storage::putFile("Products", $data['image']);
            //create
            Product::create($data);

            // //redirect form
            return redirect(url("products/create"))->with('success','data added successfully');
        }
        public function allProducts()
        {
           $products= Product::all();
           return view('admin.all',compact('products'));
        }
        public function show($id)
        {
            $product= Product::findOrFail($id);
            return view('admin.show',compact('product'));
        }
        public function edit ($id)
        {
            $product = Product::findOrFail($id);
            $categories= Category::all();
            // dd("$categories");
           return view('admin.edit',compact('product','categories'));
        }

        public function update(Request $request, $id)
        {
            //validation

            $data = $request->validate([
                'name'=>'required|string|max:255',
                'desc'=>'required|string',
                'price'=>'required|numeric',
                'image'=>'image|mimes:png,jpg,jpeg',
                'quantity'=>'required|integer',
                'category_id'=>'required|exists:categories,id'

            ]);
            $product = Product::findOrFail($id);

            if ($request->has('image')){
                Storage::delete($product->image);
                $data['image']=Storage::putFile("products", $data['image']);
            }
            $product->update($data);

            // redirect
            return redirect(url("products/show/$id"))->with('success','data updated successfully');
        }
        public function delete ($id)
        {
            $product = Product::findOrFail($id);
            Storage::delete($product->image);
            $product->delete();
            $products=Product::all();
            // return view('admin.all',compact("products"))->with("success","product deleted success");
            return redirect(url('products'))->with('success','product deleted success');
        }
}
