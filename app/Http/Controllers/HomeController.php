<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('Authenticate');
    }
    public function home() {
        return view('homepage');
    }
}
