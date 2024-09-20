<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CarLux | Home Page</title>
    <!-- Favicon -->
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">

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

    <!-- Custom Styles for Carousel -->
    <style>
        .carousel-item {
            position: relative;
            overflow: hidden;
            margin-bottom: 40px;
        }
        .carousel-item img {
            width: 100%;
            height: 100vh; /* Make image cover the height of the viewport */
            object-fit: cover;
            animation: zoom 10s infinite; /* Continuous zoom effect */
        }
        @keyframes zoom {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1); /* Zoom in effect */
            }
            100% {
                transform: scale(1);
            }
        }
        .carousel-caption {
            padding: 1rem;
            border-radius: 0.5rem;
            /* Remove background */
            background: none;
            color: white;
            font-size: 3.5rem; /* Adjust font size for larger text */
        }

        
        .services-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem; /* Adjust the gap between items as needed */
}

.service-item {
    flex: 1 1 calc(25% - 1rem); /* Adjust the width of each item to be 25% minus the gap */
    box-sizing: border-box; /* Ensure padding and border are included in the width */
}

.service-item video {
    width: 100%;
    height: auto;
}

.service-item p {
    margin-top: 0.5rem; /* Adjust the spacing between video and text as needed */
}
.section-header-title {
            font-family: 'Barlow', sans-serif;
            font-size: 36px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            color: dark blue; /* Same color as the section header title */
            text-align: center; /* Center align the heading text */
            margin: 40px 0; 
        }
        
    </style>
</head>

<body>
@include('header')

<!-- Carousel Start -->
<div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        
        <div class="carousel-item">
            <img src="{{ asset('assets/images/car1.jpg') }}" class="d-block w-100" alt="Image 4">
            <div class="carousel-caption d-none d-md-block">
               
                <p>Revive Your Ride</p>
            </div>
        </div>
    </div>
    

<!-- Carousel End -->
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
                            <h3>Basic Plan</h3>
                            <h2><span>ksh</span><strong>10</strong><span>.oo</span></h2>
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
                        
                    </div>
                </div>

                <!-- Premium Cleaning -->
                <div class="col-md-4">
                    <div class="price-item featured-item">
                        <div class="price-header">
                            <h3>Standard Plan</h3>
                            <h2><span>ksh</span><strong>20</strong><span>.99</span></h2>
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
                        
                    </div>
                </div>

                <!-- Complex Cleaning -->
                <div class="col-md-4">
                    <div class="price-item">
                        <div class="price-header">
                            <h3>Premium Plan</h3>
                            <h2><span>ksh</span><strong>30</strong><span>.00</span></h2>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <h2 class="section-header-title">Carlux In Action</h2>                

        <div class="services-grid">
    <div class="service-item">
        <video src="{{ asset('assets/videos/vw1.mp4') }}" controls></video>
        <p>Air Freshening
 </p>
    </div>
    <div class="service-item">
        <video src="{{ asset('assets/videos/vw2.mp4') }}" controls></video>
        <p></p>
    </div>
    <div class="service-item">
        <video src="{{ asset('assets/videos/vw3.mp4') }}" controls></video>
        <p>Exterior Wash
</p>
    </div>
    <div class="service-item">
        <video src="{{ asset('assets/videos/vw4.mp4') }}" controls></video>
        <p>Undercarriage Cleaning

 </p>
    </div>
    <div class="service-item">
        <video src="{{ asset('assets/videos/vw5.mp4') }}" controls></video>
        <p>Tire and Wheel Cleaning

</p>
    </div>
    <div class="service-item">
        <video src="{{ asset('assets/videos/vw6.mp4') }}" controls></video>
        <p>Hand Waxing and Polishing

 </p>
    </div>
    <div class="service-item">
        <video src="{{ asset('assets/videos/vw7.mp4') }}" controls></video>
        <p>Interior Vacuuming

</p>
    </div>
    <div class="service-item">
        <video src="{{ asset('assets/videos/vw8.mp4') }}" controls></video>
        <p>Dashboard and Console Cleaning
</p>
    </div>
</div>

    </div>
<!-- Booking Form -->
<div class="container">
<h2 class="section-header-title">Book Today!</h2>
   
    <form method="POST" action="{{ url('/booking') }}">
        @csrf
        <div class="form-group">
            <label for="packagetype">Package Type</label>
            <select name="packagetype" id="packagetype" class="form-control" required>
                <option value="">Select Package</option>
                <option value="1">BASIC PLAN (KSH.10.OO)</option>
                <option value="2">STANDARD PLAN (KSH.20.99)</option>
                <option value="3">PREMIUM PLAN (KSH.110.99)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="washingpoint">Washing Point</label>
            <select name="washingpoint" id="washingpoint" class="form-control" required>
                <option value="">Select Washing Point</option>
                @foreach($washingPoints as $point)
                    <option value="{{ $point->id }}">{{ $point->washingPointName }} ({{ $point->washingPointAddress }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fname">Full Name</label>
            <input type="text" name="fname" id="fname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contactno">Mobile No.</label>
            <input type="text" name="contactno" id="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required>
        </div>
        <div class="form-group">
            <label for="washdate">Wash Date</label>
            <input type="date" name="washdate" id="washdate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="washtime">Wash Time</label>
            <input type="time" name="washtime" id="washtime" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message (optional)</label>
            <textarea name="message" id="message" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
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
