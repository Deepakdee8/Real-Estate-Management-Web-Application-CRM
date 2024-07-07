<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Admin Login</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    body {
        background: rgb(41, 34, 163);
        background: linear-gradient(90deg, rgba(41, 34, 163, 1) 0%, rgba(38, 89, 199, 1) 39%, rgba(0, 212, 255, 1) 98%);
    }
</style>

<body>
    <section class="h-100">
        <div class="container  h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center mt-5">
                        <img src="{{ asset('assets/theme/images/Samatha-Group-logo.png') }}" alt="logo" width="200px">
                    </div>
                    <div class="card shadow-lg my-4">
                        <div class="card-body  p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4 text-center">Admin Login</h1>

                            @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    <span class="text-danger"> {{$error}} </span>
                                </li>
                                @endforeach
                            </ul>
                            @endif

                            <form method="POST" action="{{ route('admin.login-handle') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-3 text-muted" for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-3 text-muted" for="email">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>