<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status',1)->latest()->get();
        $brands = Brand::withCount('products')->where('status',1)->latest()->get();
        $products = Product::where('status',1)->latest()->get();
        return inertia('Frontend/Index',compact('sliders','brands','products'));
    }
}
