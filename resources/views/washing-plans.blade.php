<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CarLux | Washing Plans</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
   
    @include('header')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Washing Plan</h2>
                </div>
                <div class="col-12">
                    <a href="{{ route('booking') }}">Home</a>
                    <a href="{{ route('washing-plans') }}">Price</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Price Start -->
    <div class="price">
        <div class="container">
            <div class="section-header text-center">
                <p>Washing Plan</p>
                <h2>Choose Your Plan</h2>
            </div>
            <div class="row">
                <!-- Basic Cleaning -->
                <div class="col-md-4">
                    <div class="price-item">
                        <div class="price-header">
                            <h3>BASIC PLAN</h3>
                            <h2><span>KSH</span><strong>10</strong><span>.99</span></h2>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                <li><i class="far fa-times-circle"></i>Interior Wet Cleaning</li>
                                <li><i class="far fa-times-circle"></i>Window Wiping</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a class="btn btn-custom" data-toggle="modal" data-target="#myModal">Book Now</a>
                        </div>
                    </div>
                </div>

                <!-- Premium Cleaning -->
                <div class="col-md-4">
                    <div class="price-item featured-item">
                        <div class="price-header">
                            <h3>STANDARD PLAN</h3>
                            <h2><span>KSH</span><strong>20</strong><span>.99</span></h2>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                <li><i class="far fa-times-circle"></i>Window Wiping</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a class="btn btn-custom" data-toggle="modal" data-target="#myModal">Book Now</a>
                        </div>
                    </div>
                </div>

                <!-- Complex Cleaning -->
                <div class="col-md-4">
                    <div class="price-item">
                        <div class="price-header">
                            <h3>PREMIUM PLAN</h3>
                            <h2><span>KSH.</span><strong>30</strong><span>.99</span></h2>
                        </div>
                        <div class="price-body">
                            <ul>
                                <li><i class="far fa-check-circle"></i>Seats Washing</li>
                                <li><i class="far fa-check-circle"></i>Vacuum Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Exterior Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Interior Wet Cleaning</li>
                                <li><i class="far fa-check-circle"></i>Window Wiping</li>
                            </ul>
                        </div>
                        <div class="price-footer">
                            <a class="btn btn-custom" data-toggle="modal" data-target="#myModal">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price End -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Car Wash Booking</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('book') }}">
                        @csrf
                        <div class="form-group">
                            <select name="packagetype" required class="form-control">
                                <option value="">Package Type</option>
                                <option value="1">BASIC PLAN (KSH.10.99)</option>
                                <option value="2">STANDARD PLAN (KSH.20.99)</option>
                                <option value="3">PREMIUM PLAN (KSH.30.99)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="washingpoint" required class="form-control">
                                <option value="">Select Washing Point</option>
                                @foreach($washingPoints as $point)
                                    <option value="{{ $point->id }}">{{ $point->washingPointName }} ({{ $point->washingPointAddress }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="fullName" class="form-control" required placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobileNumber" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No.">
                        </div>
                        <div class="form-group">
                            <input type="date" name="washDate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="time" name="washTime" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Message if any"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   @include('footer')

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
<!-- Contact Javascript File -->
<script src="{{ asset('assets/js/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>
<!-- Template Javascript -->
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>