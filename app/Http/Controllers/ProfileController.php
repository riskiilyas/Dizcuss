<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('profile');
        }
        return redirect()->action([SessionController::class, 'login']);
    }

    public function detail($id) {
        if (Auth::check()) {
            return View::make('profile', array(
                'id' => $id
            ));
        }
        return redirect()->action([SessionController::class, 'login']);
    }
}
