<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('users');
        }
        return redirect()->action([SessionController::class, 'login']);
    }
}
