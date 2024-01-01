<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function actionregister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'User', 
            'status' => 0, 
            'no_telp' =>$request->no_telp
        ]); 
        return redirect()->route('login')->with('status', 'success')->with('userName', $user);

    }
}
