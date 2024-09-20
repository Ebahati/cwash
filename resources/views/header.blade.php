<!-- header.blade.php -->
<div class="top-bar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <h1>CAR <span>LuX</span></h1>
                        <!-- <img src="{{ asset('img/logo.jpg') }}" alt="Logo"> -->
                    </a>
                </div>
            </div>

            @if(isset($contactInfo))
                <div class="col-lg-8 col-md-7 d-none d-lg-block">
                    <div class="row">
                        <div class="col-4">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3>Opening Hour</h3>
                                    <p>{{ $contactInfo->openignHrs }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3>Call Us</h3>
                                    <p>+{{ $contactInfo->phoneNumber }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3>Email Us</h3>
                                    <p>{{ $contactInfo->emailId }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Top Bar End -->

<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a href="{{ url('/') }}" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                    <a href="{{ url('/washing-plans') }}" class="nav-item nav-link">Washing Plans</a>
                    <a href="{{ url('/location') }}" class="nav-item nav-link">Washing Points</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                    <a href="{{ url('/login') }}" class="nav-item nav-link">Sign In</a>
                </div>
                <div class="ml-auto">
                    <a class="btn btn-custom" href="{{ url('/contact') }}">Get Appointment</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
