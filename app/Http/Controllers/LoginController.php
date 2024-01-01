<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function home()
    {
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user(); // Get the authenticated user
            $role = $user->role; // Assuming you have a 'role' column in your users table

            if ($role == 'User') {
                return redirect()->route('home')->with('status', 'success')->with('userName', $user->name);
            } elseif ($role == 'Admin') {
                return redirect()->route('dashboard')->with('status', 'success')->with('userName', $user->name);
            } else {}
        } else {
            return redirect()->route('login')->with('status', 'error');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect()->route('welcome')->with('statusLogout', 'success');
    }
}
