<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KelolaUserController extends Controller
{
    public function index()
    {

        $userTotal = User::where('role', 'User')->get();

        return view('admin.kelola-user', compact('userTotal'));
    }

    public function activateUser($id)
    {
        $user = User::find($id);
        $user->status = '1';
        if ($user->save()) {
            return redirect()->route('kelola-user')->with('success', 'user updated successfully');
        }
    }

    public function deactivateUser($id)
    {
        $user = User::find($id);
        $user->status = '0';
        if ($user->save()) {
            return redirect()->route('kelola-user')->with('success', 'user updated successfully');
        }
    }
}
