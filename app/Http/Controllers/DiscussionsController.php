<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
        
    }
    public function create(Request $request){
        return view('new_post');
    }
}
