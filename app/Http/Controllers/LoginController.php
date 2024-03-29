<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Form Validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Authenticate User
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }

        // Redirect
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
