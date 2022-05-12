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
                    {{-- Form --}}
                    <div class="col-md-6 col-12">
                        <form action="" method="post" class="w-100">
                            <input class="form-control w-100" type="email" placeholder="Email">
                            <input class="form-control w-100" type="password" placeholder="Password">
                            <button type="submit" class="btn btn-primary w-100">Log in</button>
                            <div class="row justify-content-end" style="margin-top: 15px">
                                <div class="col-6">
                                    <a href="{{ url('auth/sign-up') }}" class="btn btn-secondary w-100">Sign up here</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
