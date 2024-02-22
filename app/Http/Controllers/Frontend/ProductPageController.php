<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function product($id)
    {
        $user = auth()->user();
        $categories = Category::where('status',1)->latest()->get();
        $category = Category::where('id',$id)->with('products')->first();
        return inertia('Frontend/Product/Product',compact('user','category','categories'));
    }

    public function productDetails(Request $request)
    {
        $user = auth()->user();
        $product = Product::where('id',$request->productId)->first();
        return inertia('Frontend/Product/ProductDetails',compact('product','user'));
    }
}
