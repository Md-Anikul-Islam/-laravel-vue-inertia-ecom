<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/user'), $imageName);
            $user->image = 'images/user/'.$imageName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 2;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/user-login');

    }
    public function login()
    {
        return inertia('Frontend/Auth/UserLogin');
    }


    public function loginCheckUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('user.account');
        }
        return back()->with('message', 'Invalid credentials');
    }

    public function authUserAccount()
    {
        $user = Auth::user();
        return inertia('Frontend/Auth/UserAccount',compact('user'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
