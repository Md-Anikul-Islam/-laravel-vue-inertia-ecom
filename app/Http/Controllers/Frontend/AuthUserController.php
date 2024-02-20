<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function register()
    {
        return inertia('Frontend/Auth/UserRegister');
    }
    public function login()
    {
        return inertia('Frontend/Auth/UserLogin');
    }
}
