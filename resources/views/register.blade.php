<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dizcuzz · Register</title>

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
        <form action="/register" method="POST">
            @csrf
            <img class="mb-4" src="/images/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

            <div class="form-floating">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="Example123" name="username">
                <label for="floatingInput">Username</label>
            </div>
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="form-floating">
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="floatingInput" placeholder="Example123" name="fullname">
                <label for="floatingInput">Fullname</label>
            </div>
            @error('fullname')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Email address</label>
            </div>

            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>

            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <p>Already have account? <a href="/login">Sign in</a></p>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2023 Dizcuss</p>
        </form>
    </main>

</body>

</html>