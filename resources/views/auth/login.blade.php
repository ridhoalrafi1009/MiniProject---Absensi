<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor') }}/dist/css/adminx.css" media="screen" />
</head>

<body>
    <div class="adminx-container d-flex justify-content-center align-items-center">
        <div class="page-login">
            <div class="text-center">
                {{-- <a class="navbar-brand mb-4 h1" href="{{ url('/') }}">
                    <img src="{{ asset('new-logo-labsi.png') }}" width="250px" alt=""><br>
                    LABSI
                </a> --}}
            </div>

            <div class="card mb-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" name="email" id="email"
                                placeholder="email@example.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-block btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('vendor') }}/dist/js/vendor.js"></script>
    <script src="{{ asset('vendor') }}/dist/js/adminx.js"></script>

    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
</body>

</html>
