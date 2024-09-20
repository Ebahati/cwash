<!DOCTYPE HTML>
<html>
<head>
    <title>CarLux | Booking Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" type="text/css"/>
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/table-style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/basictable.css') }}" />
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <!-- Other scripts -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.basictable.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
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
</head> 
<body>
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <!--header start here-->
                @include('includes.header')
                <!--header end here-->
                <div class="clearfix"></div>    
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Booking Details</li>
                </ol>
                <div class="agile-grids">    
                    <div class="agile-tables">
                        <div class="w3l-table-info">
                            <h2>Booking Details</h2>
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th>Booking No.</th>
                                        <th>Name</th>
                                        <th>Package Type</th>
                                        <th>Washing Point</th>
                                        <th>Washing Date/Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $booking->bookingId }}</td>
                                        <td>{{ $booking->fullName }}</td>
                                        <td>
                                            @if($booking->packageType == 1) BASIC CLEANING (KSH.10.00) @endif
                                            @if($booking->packageType == 2) STANDARD CLEANING (KSH.20.99) @endif
                                            @if($booking->packageType == 3) PREMIUM CLEANING (KSH.110.99) @endif
                                        </td>
                                        <td>
                                            @if($booking->washingPoint)
                                                {{ $booking->washingPoint->washingPointName }}<br />
                                                {{ $booking->washingPoint->washingPointAddress }}
                                            @else
                                                No Washing Point
                                            @endif
                                        </td>
                                        <td>{{ $booking->washDate }}/{{ $booking->washTime }}</td>
                                        <td>
                                            <!-- Button to trigger modal -->
                                            <button 
                                                type="button" 
                                                class="btn btn-primary" 
                                                data-toggle="modal" 
                                                data-target="#confirmPaymentModal"
                                                data-phone="{{ $booking->mobileNumber }}">
                                                Confirm Payment
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="inner-block"></div>
                @include('includes.footer')
            </div>
        </div>
        @include('includes.sidebarmenu')
        <div class="clearfix"></div>        
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmPaymentModal" tabindex="-1" role="dialog" aria-labelledby="confirmPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmPaymentModalLabel">Confirm Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="paymentForm" method="POST" action="{{ route('admin.booking.confirmPayment', ['id' => $booking->id]) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="customerPhoneNumber">Customer Phone Number:</label>
                            <input type="text" class="form-control" id="customerPhoneNumber" name="customerPhoneNumber" required>
                        </div>
                        <div class="form-group">
                            <label for="paymentMethod">Payment Method:</label>
                            <select class="form-control" id="paymentMethod" name="paymentMethod" required>
                                <option value="creditCard">Credit Card</option>
                                <option value="paypal">M-pesa</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Initialize scripts -->
    <script>
        $(document).ready(function() {
            // Initialize Nice Scroll
            $("html").niceScroll();

            // Initialize Basic Table
            $("#table").basictable();

            // Initialize Bootstrap Tooltips and Popovers
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="popover"]').popover();

            // Handle form submission
            $("#paymentForm").on("submit", function(event) {
                event.preventDefault(); // Prevent default form submission

                var form = $(this);
                $.ajax({
                    url: form.attr('action'), // Use form's action attribute
                    type: 'POST',
                    data: form.serialize(), // Serialize form data
                    success: function(response) {
                        alert(response.success);
                        $('#confirmPaymentModal').modal('hide'); // Hide modal on success
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.error || 'An error occurred.');
                    }
                });
            });

            // Populate the phone number field in the modal when it is shown
            $('#confirmPaymentModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var phoneNumber = button.data('phone'); // Extract info from data-* attributes

                var modal = $(this);
                modal.find('#customerPhoneNumber').val(phoneNumber); // Set the phone number in the input field
            });
        });
    </script>
</body>
</html>
