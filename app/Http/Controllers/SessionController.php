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

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->action([SessionController::class, 'login']);
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

    public function change_password(Request $request) {
        $request->validate([
//            'token' => 'required',
//            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);

    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|max:20',
            'fullname' => 'required|max:50',
            'email' => 'required|unique:users|max:50',
            'password' => 'required|max:20',
        ]);
        $validatedData['password'] = bcrypt($request['password']);

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
