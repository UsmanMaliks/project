<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Icons font CSS-->
    <link href="frontend/signupform/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="frontend/signupform/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="frontend/signupform/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="frontend/signupform/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="frontend/signupform/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group">
                            <input placeholder="Enter Your Name" id="name" type="text" class="input--style-1 @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <div class="input-group">
                            <input placeholder="Enter Your Email" id="email" type="email" class="input--style-1 @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input-group">
                            <input placeholder="Enter Password" id="password" type="password" class="input--style-1 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="input-group">
                            <div class="col-md-6">
                                <input placeholder="Enter Confirm Password" id="password-confirm" type="password" class="input--style-1" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="type">
                                    <option disabled="disabled" selected="selected">Account Type</option>
                                    <option value="Customer">Customer</option>
                                    <option value="Agency">Agency</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="frontend/signupform/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="frontend/signupform/vendor/select2/select2.min.js"></script>
    <script src="frontend/signupform/vendor/datepicker/moment.min.js"></script>
    <script src="frontend/signupform/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="frontend/signupform/js/global.js"></script>

</body>

</html>
<!-- end document-->
