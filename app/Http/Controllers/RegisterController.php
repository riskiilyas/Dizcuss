<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function register() {
        return view('register');
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
            session()->flash('success', 'You have Successfully Registered!');
            return redirect()->action([SessionController::class, 'login'])->withSuccess('You have Successfully Registered! Please login');
        } else {
            return redirect()->action([SessionController::class, 'register'])->withError('Wrong Password or Email!');
        }
    }
}
