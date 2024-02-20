<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function product()
    {
        return inertia('Frontend/Product/Product');
    }

    public function productDetails(Request $request)
    {
        $product = Product::where('id',$request->productId)->first();
        return inertia('Frontend/Product/ProductDetails',compact('product'));
    }
}
