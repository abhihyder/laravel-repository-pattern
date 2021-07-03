<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AIRSHIPT | Register</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
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

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <img class="brand-logo" src="{{asset('images/pp.jpeg')}}" alt="logo">

            </div>
            <h3 class="mb-4">Register to AIRSHIPT</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="padding: 0 5px 0 20px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="m-t" method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{old('name')}}" required autofocus>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{old('email')}}" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('admin.login') }}">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>