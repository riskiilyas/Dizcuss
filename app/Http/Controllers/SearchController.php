<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function searchDiscussions(Request $request){
        $search = $request->input('title');
        $discussions = Discussion::where('title','like', "%{$search}%")->get();
        
        return view('search.discussion')->with('discussions', $discussions);
    }
}
