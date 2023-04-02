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
<body>
    <section class ="profile">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/images/icon.jpg" alt="" width="30" height="30" class="d-inline-block align-text-top" style="margin-right: 1rem">
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
                <span>
                    @if(isset($id))
                        {{App\Models\User::find($id)->username}}
                    @else
                        {{auth()->user()->username}}
                    @endif
                </span>
                @if (isset($id))
                    <button type="submit" class="follow-button">Follow</button>
                @endif
                <br>
                0 Following · 0 Followers
            </div>
        </div>

        <div class="favorite-list">
            Favorites
        </div>

        <main class="discussion-title-content">
            <div class="author-information">
                <img class="profile-logo" src="../images/profile.png" alt="profile-logo">/**author-username**/
            </div>
            <a href="#">
                <h1>
                    /**Discussion Title Here***/
                </h1>
            </a>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis suscipit orci. Nunc mollis, ante ac pretium viverra, ex nunc fringilla lectus, ac ullamcorper odio dui in felis. Phasellus felis metus, vestibulum nec lorem eu, placerat lobortis justo. Ut dapibus massa velit, molestie tincidunt justo luctus vitae. In a sapien enim. Nam ex est, gravida a ante nec, hendrerit tempor massa. In bibendum sapien sed justo pellentesque viverra. Cras posuere lobortis maximus. Proin fringilla id sapien vitae placerat. Etiam a urna sem.

                Mauris pulvinar odio eget auctor interdum. Morbi in eros porttitor, semper arcu eu, sollicitudin turpis. Vivamus sed dolor orci. Etiam mattis lectus augue, vel porttitor urna varius quis. Nam vel augue suscipit, scelerisque est sed, vestibulum leo. Donec nec gravida sem, at dapibus nisl. Morbi aliquam purus nisi, id laoreet augue viverra ac. Sed semper ornare purus. Nulla augue tortor, bibendum vel commodo ac, faucibus id erat. Nullam tristique, orci a pellentesque ornare, neque justo ultricies ipsum, eget mollis nibh enim in eros. Vivamus volutpat neque nunc, a aliquam est lacinia eu. Suspendisse in auctor lectus, nec maximus urna. Pellentesque vitae pharetra turpis. Nulla posuere mi ligula, in dictum dolor tristique eget. Pellentesque eget consequat ex.

                Pellentesque sagittis ultricies massa, id viverra erat mattis sed. Ut in odio libero. Donec aliquam mattis libero, non vestibulum diam porta vel. In vitae ex id magna ullamcorper ornare ac eget dolor. Nunc consequat lacus mauris, id varius nunc porttitor at. Morbi erat nisi, accumsan nec sollicitudin in, imperdiet vel eros. Cras nec iaculis metus. Integer nisi ante, fringilla vitae leo sit amet, porttitor suscipit diam. Pellentesque suscipit ornare ex eget congue. Curabitur nibh tellus, pretium dapibus gravida a, tincidunt eget turpis. Nullam auctor lorem eget ullamcorper consequat.

                Vivamus sit amet fringilla augue, nec aliquet nibh. Nunc hendrerit eu tellus in consequat. Curabitur quis rutrum tortor, ac rutrum leo. Ut vel arcu rutrum, finibus nunc ut, mollis eros. Quisque nisi ligula, posuere quis turpis sit amet, venenatis auctor lorem. Maecenas euismod eu purus a condimentum. Proin felis odio, malesuada sed justo ut, fermentum semper dolor. Aliquam eget leo sit amet lectus posuere congue ut in metus. Nullam condimentum, leo vel blandit rutrum, sapien nisl suscipit felis, eu feugiat odio mauris quis ligula. Donec blandit, dolor nec vulputate euismod, ex libero porttitor ante, quis ornare risus leo et arcu. Praesent arcu orci, condimentum vel nunc vitae, vestibulum aliquam turpis.

                Nulla facilisis placerat varius. Etiam sed maximus ipsum. Sed id diam lacus. Nullam molestie imperdiet quam, quis aliquet est ornare eget. Cras blandit, ante sit amet vestibulum scelerisque, metus nisi rutrum justo, ac iaculis purus dolor convallis risus. Suspendisse potenti. Morbi maximus lacus et placerat viverra.
            </p>
            <hr>
            <div class="comment">
                <a><img class="comment-logo" src="../images/comment.png" alt="comment-logo"> 0 Comments </a>
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

    </div>
    </section>
</body>
</html>
