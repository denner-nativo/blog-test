<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BLOG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center h-100vh">
            <div class="col-md-6 col-10 form-section">
                <div class="row justify-content-center">
                    {{-- Logo section --}}
                    <div class="col-4">
                        <img src="{{ asset('images/B-Logo.png') }}" alt="Logo Blog" class="auth-logo" />
                    </div>
                    <div class="col-12" style="margin-top: 25px"></div>
                    {{-- Form action('api\v1\UserController@store') --}}
                    <div class="col-md-6 col-12">
                        <form id="registerForm" class="w-100">
                            <input class="form-control w-100" id="name" type="text" placeholder="Name">
                            <input class="form-control w-100" id="lastname" type="text" placeholder="Lastname">
                            <input class="form-control w-100" id="email" type="email" placeholder="Email">
                            <input class="form-control w-100" id="password" type="password" placeholder="Password">
                            <input class="form-control w-100" id="confirmPassword" type="password"
                                placeholder="Confirm password">
                            <button type="submit" class="btn btn-primary w-100">Create account</button>
                            <a href="{{ url('auth/login') }}"
                                class="fw-lighter text-muted text-decoration-none w-100">Do you have an account? Log in
                                here</a>
                            @csrf
                        </form>
                    </div>
                    <div class="col-12" style="margin-top: 25px"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- Sweetalert 2 --}}
    <script src="{{ url('js/auth/register.js') }}"></script>
</body>

</html>
