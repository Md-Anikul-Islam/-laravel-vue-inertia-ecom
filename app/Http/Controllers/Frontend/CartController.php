<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $user = auth()->user();
        $categories = Category::where('status',1)->latest()->get();
        $cart = session()->get('cart');
        return inertia('Frontend/Shopping/Cart',compact('user','cart','categories'));
    }

    public function addToCart($product_id)
    {
        $product = Product::findOrFail($product_id);

        $cart = session()->get('cart');

        if(!$cart){
            // If cart is empty, initialize it with the first product
            $cart = [
                $product->id => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->sale_price,
                    'image' => $product->image,
                ]
            ];
        } else {
            // If cart already contains products, check if the product is already in the cart
            if(isset($cart[$product->id])) {
                // If the product is already in the cart, increase its quantity
                $cart[$product->id]['quantity']++;
            } else {
                // If the product is not in the cart, add it to the cart
                $cart[$product->id] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->sale_price,
                    'image' => $product->image,
                ];
            }
        }

        // Save the updated cart back to the session
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }


}
