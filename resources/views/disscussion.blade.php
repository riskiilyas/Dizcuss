<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dizcuzz · *Discussion Title</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/styles/discussion.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.js"></script>

</head>
@php
    $discuss = null;
     if (isset($d_id)) {
         $discuss = App\Models\Discussion::find($d_id);
     }@endphp
<body class="discussion">
    <section class ="discussion-title">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/images/icon.png" alt="" width="30" height="30" class="d-inline-block align-text-top" style="margin-right: 1rem">
                    Dizcuzz
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/users">Users</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/profile">View Profile</a></li>
                                <li><a class="dropdown-item" href="/change_password">Change Password</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/new_post">New Post</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="discussion-title-content">
                <div class="author-information">
                    <img class="profile-logo" src="../images/profile.png" alt="profile-logo">
                    <a href="/user/{{$discuss->user_id}}">
                        {{App\Models\User::find($discuss->user_id)->username}}</a>
                </div>
            <h1>
                {{$discuss->title}}
            </h1>
            <p>
                {{$discuss->description}}
            </p>
            <div class="comment">
                <a><img class="comment-logo" src="../images/comment.png" alt="comment-logo">
                    {{count(App\Models\Comment::where('discussion_id', $d_id)->get())}} Comments </a>
            </div>
            <div class="upvote">
                <a href="/upvote/{{$discuss->id}}"> <img class="upvote-logo" src="../images/upvote.png" alt="upvote-logo">
                    {{count(App\Models\Vote::where('discussion_id', $d_id)->where('is_upvote', 1)->get())}} Upvotes </a>
            </div>
            <div class="downvote">
                <a href="/downvote/{{$discuss->id}}"> <img class="downvote-logo" src="../images/downvote.png" alt="downvote-logo">
                    {{count(App\Models\Vote::where('discussion_id', $d_id)->where('is_upvote', 0)->get())}} Downvotes </a>
            </div>
             <div class="favorite">
                <a href="/fav/{{$discuss->id}}"> <img class="favorite-logo" src="../images/bookmark.png" alt="favorite-logo">
                    {{count(App\Models\Favorite::where('discussion_id', $d_id)->get())}} Favorites </a>
             </div>
            @if($discuss->user_id===\Illuminate\Support\Facades\Auth::user()->id)
                <form action="/delete/{{$d_id}}" method="POST">
                    @csrf
                    <button type="submit" class="follow-button">
                        Delete Post
                    </button>
                </form>
            @endif
        </main>
        <div class="comment-section">
            <form action="/add_comment/{{$d_id}}" method="POST" class="form">
                @csrf
                <textarea name="comment" cols="30" rows="10" class="comment-input" placeholder="Comment"></textarea>
                <button type="submit" class="post-button">Post Comment</button>
            </form>
            @foreach(App\Models\Comment::where('discussion_id', $d_id)->get() as $comment)
                <div class="comment-display">
                    <div class="author-information">
                        <img class="profile-logo" src="../images/profile.png" alt="profile-logo">
                        {{App\Models\User::find($comment->user_id)->username}}
                    </div>
                    <p>
                        {{$comment->comment}}
                    </p>
                </div>
            @endforeach
        </div>
    </section>
</body>
