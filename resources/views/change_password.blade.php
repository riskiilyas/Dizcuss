<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

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
    <link href="/styles/login.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin">
    <form method="POST" action="/change_password">
        @csrf
        <img class="mb-4" src="/images/logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal">Change Password</h1>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="oldpassword">
            <label for="floatingInput">Old Password</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control"  id="floatingPassword" placeholder="Password" name="newpassword">
            <label for="floatingPassword">New Password</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cnewpassword">
            <label for="floatingPassword">Confirm New Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Change Password</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2023 Dizcuss</p>
    </form>
</main>
</body>
</html>
