<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class DiscussionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);

    }

    public function index($d_id) {
        if (Auth::check()) {
            return View::make('disscussion', array(
                'd_id' => $d_id
            ));
        }
        return redirect()->action([SessionController::class, 'login']);
    }

    public function create(){
        return view('new_post');
    }

    public function add_comment(Request $request, $post) {
        if (Auth::check()) {
            $comment = new Comment();
            $comment->comment = $request['comment'];
            $comment->discussion_id = $post;
            $comment->user_id = Auth::user()->id;
            if($comment->comment === null){
                return back()->with('failure');
            }
            $comment->save();
            return back();
        }
        return redirect()->action([SessionController::class, 'login']);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $discussion = new Discussion();
        $discussion->user_id = auth()->user()->id;
        $discussion->title = $validatedData['title'];
        $discussion->description = $validatedData['description'];

        if($discussion->save()){
            return redirect()->route('home')->with('success');
        }
        else{
            return redirect()->route('create_post')->with('failure');
        }

    }
}
