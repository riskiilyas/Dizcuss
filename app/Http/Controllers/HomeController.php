<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index() {
        if (Auth::check()) {
            $discussion = Discussion::all();
            return view('homepage')->with('discussion', $discussion);
        }
        return view('login');
    }
}
