<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="footer-contact">
                    <h2>Get In Touch</h2>
                    @if(isset($contactInfo))
                        <p><i class="fa fa-map-marker-alt"></i>{{ $contactInfo->detail }}</p>
                        <p><i class="fa fa-phone-alt"></i>+{{ $contactInfo->phoneNumber }}</p>
                        <p><i class="fa fa-envelope"></i>{{ $contactInfo->emailId }}</p>
                    @endif
                    <div class="footer-social">
                        <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="footer-link">
                    <h2>Popular Links</h2>
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/about') }}">About Us</a>
                    <a href="{{ url('/washing-plans') }}">Washing Plans</a>
                    <a href="{{ url('/location') }}">Washing Points</a>
                    <a href="{{ url('/contact') }}">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container copyright">
        <p>CarLux</p>
    </div>
</div>
<!-- Footer End -->

<!-- Back to top button -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Pre Loader -->
<div id="loader" class="show">
    <div class="loader"></div>
</div>
