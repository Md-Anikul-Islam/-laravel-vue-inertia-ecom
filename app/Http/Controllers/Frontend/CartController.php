<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $user = auth()->user();
        return inertia('Frontend/Shopping/Cart',compact('user'));
    }
}
