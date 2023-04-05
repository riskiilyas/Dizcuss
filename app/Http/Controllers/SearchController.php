<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function searchUsers(Request $request){
        $search = $request->input('username');
        $self = Auth::user()->username;
        $users = User::where('username','like', "%{$search}%")
            ->orWhereNot('username','=', $self)
            ->get();
        
        return view('search.user')->with('users', $users);
    }
}
