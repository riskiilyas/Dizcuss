<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dizcuzz · *Profile-name</title>

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

<link href="/styles/profile.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.js"></script>

</head>
@php
    $user = null;
    if(isset($id)) {
        $user = App\Models\User::find($id);
    } else {
        $user = auth()->user();
    }
@endphp
<body>
    <section class ="profile">
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

        <div class ="wrapper">
        <div class="profile-information">
            <img class="profile-logo1" src="../images/profile.png" alt="profile-logo">
            <div class="profile-name">
                <h1>
                    {{$user->fullname}}
                </h1>
                <span>
                    @ {{$user->username}}
                </span>
                @if (isset($id))
                    <form action="/follow/{{$id}}" method="POST">
                        @csrf
                        <button type="submit" class="follow-button">
                            @if(count(App\Models\Following::where('user_following_id', $user->id)->where('user_id', $user->id)->get())>0)
                                Follow
                            @else
                                Followed
                            @endif
                        </button>
                    </form>
                @endif
                {{count(App\Models\Following::where('user_id', $user->id)->get())}} Following · {{count(App\Models\Following::where('user_following_id', $user->id)->get())}} Followers
            </div>
        </div>

        <div class="favorite-list">
            Favorites
        </div>
        @foreach(App\Models\Favorite::where('user_id', $user->id)->get() as $fav)
                <main class="discussion-title-content">
                    <div class="author-information">
                        <img class="profile-logo" src="../images/profile.png" alt="profile-logo">
                        {{App\Models\User::find(App\Models\Discussion::find($fav->discussion_id)->user_id)->username}}
                    </div>
                    <a href="/discussion/{{$fav->discussion_id}}">
                        <h1>
                            {{App\Models\Discussion::find($fav->discussion_id)->title}}
                        </h1>
                    </a>
                    <p>
                        {{App\Models\Discussion::find($fav->discussion_id)->description}}
                    </p>
                    <hr>
                </main>
        @endforeach
    </div>
    </section>
</body>
</html>
