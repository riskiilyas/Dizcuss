<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function login() {
        return view('login');
    }

    function register() {
        return view('register');
    }

    public function login_action(Request $request) {
        $infologin = [
            'email' => session('email'),
            'password' => session('password'),
        ];

        if(Auth::attempt($infologin)) {
            return redirect()->action([HomeController::class, 'home'])->with('success', 'Register Success! Please continune to Login.');
        } else {
            return redirect()->action([SessionController::class, 'login'])->with('success', 'Register Success! Please continune to Login.');
        }
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|max:20',
            'fullname' => 'required|max:50',
            'email' => 'required|unique:users|max:50',
            'password' => 'required|max:20',
        ]);

        $user = new User();
        $user->username = $validatedData['username'];
        $user->fullname = $validatedData['fullname'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];

        if($user->save()) {
            return redirect()->action([SessionController::class, 'login'])->with($request->only('username', 'password'));;
        } else {
            return redirect()->action([SessionController::class, 'register'])->withError('Email or Username is Already Reigstered!');
        }
    }


}
