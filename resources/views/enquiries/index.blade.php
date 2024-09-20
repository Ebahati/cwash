<!DOCTYPE HTML>
<html>
<head>
    <title>CarLux | Manage Enquiries</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
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
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').basictable();

            $('#table-breakpoint').basictable({
                breakpoint: 768
            });

            $('#table-swap-axis').basictable({
                swapAxis: true
            });

            $('#table-force-off').basictable({
                forceResponsive: false
            });

            $('#table-no-resize').basictable({
                noResize: true
            });

            $('#table-two-axis').basictable();

            $('#table-max-height').basictable({
                tableWrapper: true
            });
        });
    </script>
</head>
<body>
    <div class="page-container">
        <!-- Header and sidebar include here -->
        @include('includes.sidebarmenu')
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                @include('includes.header')
                <div class="clearfix"> </div>
                <!--header end here-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Manage Enquiries</li>
                </ol>

                <div class="agile-grids">
                    <!-- tables -->
                    @if (session('error'))
                        <div class="errorWrap">
                            <strong>ERROR</strong>: {{ session('error') }}
                        </div>
                    @elseif (session('success'))
                        <div class="succWrap">
                            <strong>SUCCESS</strong>: {{ session('success') }}
                        </div>
                    @endif

                    <div class="agile-tables">
                        <div class="w3l-table-info">
                            <h2>Manage Enquiries</h2>
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th>Ticket id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Posting date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enquiries as $enquiry)
                                        <tr>
                                            <td>#TCKT-{{ $enquiry->id }}</td>
                                            <td>{{ $enquiry->FullName }}</td>
                                            <td>{{ $enquiry->EmailId }}</td>
                                            <td>{{ $enquiry->Subject }}</td>
                                            <td>{{ $enquiry->Description }}</td>
                                            <td>{{ $enquiry->PostingDate }}</td>
                                            <td>
                                                @if ($enquiry->Status == 1)
                                                    Read
                                                @else
                                                    <a href="{{ route('enquiries.read', $enquiry->id) }}" onclick="return confirm('Do you really want to mark this as read?')">Pending</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /tables -->
                </div>
                <!-- /content-inner -->
                <!-- include footer here -->
                @include('includes.footer')
            </div>
        </div>
        <div class="clearfix"></div>
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
