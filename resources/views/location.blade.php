<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CarLux | Location </title>
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
    <!-- Top Bar Start -->
    @include('header')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Washing Points</h2>
                </div>
                <div class="col-12">
                    <a href="{{ route('booking') }}">Home</a>
                    <a href="{{ route('location') }}">Location</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Location Start -->
    <div class="location">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header text-left">
                        <p>Washing Points</p>
                        <h2>Car Washing & Care Points</h2>
                    </div>
                    <div class="row">
                        @foreach($washingPoints as $point)
                            <div class="col-md-6">
                                <div class="location-item">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <div class="location-text">
                                        <h3>{{ $point->washingPointName }}</h3>
                                        <p>{{ $point->washingPointAddress }}</p>
                                        <p><strong>Call:</strong> {{ $point->contactNumber }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location End -->

    @include('footer')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('assets/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
