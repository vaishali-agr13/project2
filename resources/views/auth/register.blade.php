<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <style>
         .register-card-body {
            padding : 37px !important;
         }
        </style>
</head>

<body class="hold-transition register-page" style="background: linear-gradient(135deg, #667eea, #764ba2);">

<div class="register-box">
    <div class="register-logo">
        
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p style="font-size: large;font-weight: 600;" class="login-box-msg">Create a new account</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>

            

                <button type="submit" class="btn btn-primary btn-block">
                    Register
                </button>
            </form>

            <p class="mt-3 text-center">
                <a href="{{ url('admin/login') }}">Already have an account? Login</a>
            </p>

        </div>
    </div>
</div>

</body>
</html>