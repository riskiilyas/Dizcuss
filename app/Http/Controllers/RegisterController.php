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
            return redirect()->action([SessionController::class, 'login'])->with('success');
        } else {
            return redirect()->action([SessionController::class, 'register'])->with('failed');
        }
    }
}
