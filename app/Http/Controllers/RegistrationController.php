<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('authentication.register.index');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $uuid = Uuid::uuid4()->toString();
        $validated['id'] = $uuid;

        $user = User::create([
            'id' => $validated['id'],
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::logout();
        return redirect()->route('login.index');
    }
}
