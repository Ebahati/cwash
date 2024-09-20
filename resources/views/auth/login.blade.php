<!DOCTYPE HTML>
<html>
<head>
    <title>CarLux | Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" type="text/css"/>
    <!-- Graph CSS -->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}"> 
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <!-- //jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/icon-font.min.css') }}" type='text/css' />
    <!-- //lined-icons -->

    <!-- JavaScript to Check If User is Already Logged In -->
   
</head> 
<body>
    <div class="main-wthree">
        <div class="container">
            <div class="sin-w3-agile">
                <h2>Sign In</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ url('login') }}" onsubmit="handleLogin(event)">
                    @csrf
                    <div class="username">
                        <span class="username">Username:</span>
                        <input type="text" name="username" class="username" placeholder="" required>
                        <div class="clearfix"></div>
                    </div>
                    <div class="password-agileits">
                        <span class="password">Password:</span>
                        <input type="password" name="password" class="password" placeholder="" required>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="login-w3">
                        <input type="submit" class="login" name="login" value="Sign In">
                    </div>
                    <div class="clearfix"></div>
                </form>
                <div class="back">
                    <a href="{{ url('/') }}">Back to home</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Handling Login -->
    <script>
        function handleLogin(event) {
            event.preventDefault(); // Prevent form submission until check is done

            // Perform the login process via AJAX, or if using standard form submission,
            // include the following code after the form submission is successful

            // After successful login
            sessionStorage.setItem('activeTab', 'true');
            localStorage.setItem('userLoggedIn', 'true');

            // Continue with form submission
            event.target.submit();
        }

        // Ensure sessionStorage is cleared when tab is closed
        window.addEventListener('beforeunload', function() {
            sessionStorage.removeItem('activeTab');
        });
    </script>
</body>
</html>
