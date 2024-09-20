<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CarLux | Contact Us</title>
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
</head>

<body>
@include('header')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Contact Us</h2>
                </div>
                <div class="col-12">
                    <a href="{{ route('booking') }}">Home</a>
                    <a href="{{ route('contact.show') }}">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <!-- Contact Start -->
<div class="contact">
    <div class="container">
        <div class="section-header text-center">
            <p>Get In Touch</p>
            <h2>Contact for any query</h2>
        </div>
        <div class="row">
            @if($contactInfo)
                <div class="col-md-4">
                    <div class="contact-info">
                        <h2>Quick Contact Info</h2>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <h3>Address</h3>
                                <p>{{ $contactInfo->detail }}</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="contact-info-text">
                                <h3>Opening Hour</h3>
                                <p>{{ $contactInfo->openignHrs }}</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <h3>Call Us</h3>
                                <p>+{{ $contactInfo->phoneNumber }}</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h3>Email Us</h3>
                                <p>{{ $contactInfo->emailId }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-7">
                <div class="contact-form">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" name="name" /><br />
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" required="required" /> <br />
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" name="subject" /> <br />
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" id="message" placeholder="Message" required="required" name="message"></textarea><br />
                        </div>
                        <div>
                            <button class="btn btn-custom" type="submit" id="sendMessageButton">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
    <!-- Contact End -->

    <!-- Footer Start -->
    @include('footer')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

