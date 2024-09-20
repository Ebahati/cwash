<!DOCTYPE html>
<html lang="en">
<head>
    <title>CarLux</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" type="text/css"/>
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/table-style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/basictable.css') }}" />
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.basictable.min.js') }}"></script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        form {
            max-width: 1000px; /* Maximum width of the form */
            margin: 0 auto; /* Center the form horizontally */
            width: 80%;
            
        }
        .grid-form {
    margin: 20px 0;
}

.grid-form1 {
    background: #fff;
    padding: 20px;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}



.breadcrumb-item a {
    text-decoration: none;
    color: #007bff;
}

.breadcrumb-item a:hover {
    text-decoration: underline;
}


        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%; /* Input fields will take full width of the form but respect form's max-width */
        }
    </style>
</head>
<body>

    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                @include('includes.header')
                <div class="clearfix"></div>
                @yield('content')
            </div>
            @yield('scripts')
        </div>
        @include('includes.sidebarmenu')
    </div>

    <script>
        var toggle = true;
        $(".sidebar-icon").click(function() {                
            if (toggle) {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({"position":"absolute"});
            } else {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                    $("#menu span").css({"position":"relative"});
                }, 400);
            }
            toggle = !toggle;
        });
    </script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    
</body>
</html>
