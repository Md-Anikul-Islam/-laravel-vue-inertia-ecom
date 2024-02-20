<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::With('category','brand')->get();
        return inertia('Admin/Product/Show',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return inertia('Admin/Product/Create',compact('categories','brands'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png'
        ]);
        $product = new Product();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/product'), $imageName);
            $product->image = 'images/product/'.$imageName;
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->save();
        return redirect()->route('product.show');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::where('id',$id)->with('category','brand')->first();
        return inertia('Admin/Product/Edit',compact('product','categories','brands'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $previousImagePath = public_path($product->image);
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/product'), $imageName);
            $product->image = 'images/product/'.$imageName;
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->status = $request->status;
        $product->save();
        return redirect()->route('product.show');
    }


    public function delete($id)
    {
        $product = Product::find($id);
        $imagePath = public_path($product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $product->delete();
        return redirect()->route('product.show');
    }



}
