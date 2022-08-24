<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function page()
    {
        return Inertia::render('login');
    }

    public function login(Request $r)
    {
        $a = $r->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($r->email == 'admin' && $r->password == '123') {
            Auth::loginUsingId(1, $remember = true);
        } else {
            return dd('Email or Password incorrect');
        }
        return redirect('./dashboard');
    }
}
