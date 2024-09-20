<!DOCTYPE HTML>
<html>
<head>
    <title>CarLux | Admin Change Password</title>
    <!-- Include your CSS and JS here -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" type="text/css"/>
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/table-style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/basictable.css') }}" />
    <script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.basictable.min.js') }}"></script>
</head>
<body>
    <div class="page-container">
        <!-- Header and sidebar include here -->
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                @include('includes.header')
                <div class="clearfix"> </div>
            </div>
            <!--header end here-->

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Change Password</li>
            </ol>

            <!--grid-->
            <div class="grid-form">
                <div class="grid-form1">
                    @if ($errors->any())
                        <div class="errorWrap">
                            <strong>ERROR</strong>: {{ $errors->first() }}
                        </div>
                    @elseif (session('success'))
                        <div class="succWrap">
                            <strong>SUCCESS</strong>: {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="panel-body">
                        <form method="POST" action="{{ route('password.update') }}" class="form-horizontal" onsubmit="return validateForm();">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-2 control-label">Current Password</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" name="current_password" class="form-control1" placeholder="Current Password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">New Password</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" class="form-control1" name="new_password" placeholder="New Password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Confirm Password</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <input type="password" class="form-control1" name="new_password_confirmation" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" class="btn-primary btn">Submit</button>
                                <button type="reset" class="btn-inverse btn">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--//grid-->
        </div>
    </div>
    <!-- Include your JS scripts here -->
    <script>
        function validateForm() {
            var newPassword = document.querySelector('input[name="new_password"]').value;
            var confirmPassword = document.querySelector('input[name="new_password_confirmation"]').value;

            if (newPassword !== confirmPassword) {
                alert("New Password and Confirm Password Field do not match!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
