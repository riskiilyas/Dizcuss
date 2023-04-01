<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
//    public function __construct() {
//        $this->middleware('guest')->except('logout');
//    }

    function index() {
        if (Auth::check()) {
            return view('homepage');
        }
        return view('login');
    }

    function login() {
        return view('login');
    }

    function register() {
        return view('register');
    }

    public function login_action(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|max:20',
            'fullname' => 'required|max:50',
            'email' => 'required|unique:users|max:50',
            'password' => 'required|max:20',
        ]);
        $validatedData['password'] = bcrypt($request['password']);

        $user = new User();
        $user->name = $validatedData['username'];
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