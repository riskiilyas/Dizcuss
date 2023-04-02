<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('change_password');
        }
        return redirect()->action([SessionController::class, 'login']);
    }
    public function change_password(Request $request) {
    }
}
