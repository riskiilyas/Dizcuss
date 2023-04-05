<?php

namespace App\Http\Controllers;

use App\Models\Following;
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

    public function follow($id) {
        if (Auth::check()) {
            $foll = new Following();
            $foll->user_id=Auth::user()->id;
            $foll->user_following_id=$id;
            $foll->save();
            return back();
        }
        return redirect()->action([SessionController::class, 'login']);
    }
}
