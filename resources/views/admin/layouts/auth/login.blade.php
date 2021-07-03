<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AIRSHIPT | Login</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <style>
        .brand-logo {
            width: 200px;
            border: 5px solid white;
            border-radius: 50%;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <img class="brand-logo" src="{{asset('images/pp.jpeg')}}" alt="logo">

            </div>
            <h3 class="mb-4">Login to AIRSHIPT</h3>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="padding: 0 5px 0 20px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('admin.register') }}">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>

</body>

</html>