<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dizcuzz · Search Discussions</title>
    <link rel="icon" type="image/x-icon" href="/images/icon.jpg">

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
    <script src="/bootstrap/js/bootstrap.js"></script>
    <!-- Custom styles for this template -->
    <link href="/styles/home.css" rel="stylesheet">
</head>

<body class="discussion">

    <section class="discussion-title">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
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
                    <form class="d-flex" method="get" action="/search/discussion">
                        <input name="title" class="form-control me-2" type="search" placeholder="Search discussions" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        @forelse ($discussions as $d)
        <main class="discussion-title-content">
            <div class="author-information">
                <img class="profile-logo" src="../images/profile.png" alt="profile-logo">
                {{$d->user->username}}
            </div>
            <a href="/discussion/{{$d->id}}">
                <h1>
                    {{$d->title}}
                </h1>
            </a>
            <p>
                {{$d->description}}
            </p>
            <hr>
            <div class="comment">
                <a><img class="comment-logo" src="../images/comment.png" alt="comment-logo">
                    {{count($d->comments)}} Comments
                </a>
            </div>
            <div class="upvote">
                <a> <img class="upvote-logo" src="../images/upvote.png" alt="upvote-logo"> 0 Upvotes </a>
            </div>
            <div class="downvote">
                <a> <img class="downvote-logo" src="../images/downvote.png" alt="downvote-logo"> 0 Downvotes </a>
            </div>
            <div class="favorite">
                <a> <img class="favorite-logo" src="../images/bookmark.png" alt="favorite-logo"> 0 Favorites </a>
            </div>
        </main>
        @empty
        <main class="discussion-title-content">
            <h1 style="text-align: center;">Discussion not found</h1>
        </main>
        @endforelse
    </section>
    <br>

    <br>
</body>