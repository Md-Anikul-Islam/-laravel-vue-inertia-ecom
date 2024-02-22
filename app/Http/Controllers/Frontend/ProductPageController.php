<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function product()
    {
        $user = auth()->user();
        return inertia('Frontend/Product/Product',compact('user'));
    }

    public function productDetails(Request $request)
    {
        $user = auth()->user();
        $product = Product::where('id',$request->productId)->first();
        return inertia('Frontend/Product/ProductDetails',compact('product','user'));
    }
}
