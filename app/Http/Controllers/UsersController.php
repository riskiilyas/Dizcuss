<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $users = User::all();
            return view('users')->with('users', $users);
        }
        return redirect()->action([SessionController::class, 'login']);
    }
}
