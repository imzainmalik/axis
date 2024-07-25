<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Axis - Login</title>
     <link rel="icon" href="{{ asset('assets/css/layout.css') }}" type="image/x-icon">
     <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
         integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
 
<div class="signup">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 p-0">
                <div class="bg-sign" style="background-image: url('{{ asset('assets/images/signup.png') }}');">
                    <div class="logo-signup">
                        <img src="{{ asset('assets/images/logo-sign.png') }}" alt="">
                    </div>
                    <div class="key-signup">
                        <img src="{{ asset('assets/images/key.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="signup-area">
                    <h3>Login to Axis</h3>
                    <div class="sign-form">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="fld">
                                        <label for="">Email address</label>
                                        <input type="email" class="@error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required name="email"
                                            placeholder="julianrenwoye@gmail.com" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="fld mypass-check">
                                        <div class="form-container">
                                            <div>
                                                <label for="signupInputPassword">Password</label>
                                                <input name="password" type="password" class=""
                                                    id="signupInputPassword" aria-describedby="passwordHelp"
                                                    value="" placeholder="•••••••••"
                                                    class="@error('password') is-invalid @enderror" name="password" />
                                                <div class="showpass">
                                                    <i class="fas fa-eye"></i>
                                                    <input type="checkbox" onclick="myFunction()">
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="sbt">
                                        <input type="submit" value="Login">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>