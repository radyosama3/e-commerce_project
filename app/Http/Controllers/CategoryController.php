<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class CategoryController extends Controller
{
    public function storecategory(Request $request)
    {
        $data= $request->validate([
            'name'=>'required|string|max:255',
            'desc'=>'required|string',
        ]);
        $data=Category::create($data);
        return to_route('allcategory')->with('success','Category Added success ');
    }
    public function addcategory(){
        return view('admin.addcategory');
    }
    public function allcategory(){
        $category = Category::all();
        return view('admin.allcategoy',compact('category'));
    }
    public function showcategory($id){
        $category= category::findOrFail($id);
        return view('admin.showcategory',compact('category'));
    }
    public function deletecategory($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
        $Category=Category::all();
        return to_route('allcategory',compact('Category'))->with('success','product deleted success');
    }
}
