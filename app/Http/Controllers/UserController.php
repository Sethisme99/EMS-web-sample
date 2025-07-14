<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the login form
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Login the admin
     */
    public function login(AuthUserRequest $request)
    {
        $credentials = $request->validated();
        if(auth()->attempt($credentials)) {
            return to_route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match any of our records.'
        ]);
    }

    /**
     * Logout the admin
     */
    public function logout()
    {
        auth()->logout();
        return to_route('login');
    }
}
