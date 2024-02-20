<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    public function register()
    {
        return inertia('Frontend/Auth/UserRegister');
    }

    public function userRegisterStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 1;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/user-login');
    }
    public function login()
    {
        return inertia('Frontend/Auth/UserLogin');
    }
}
