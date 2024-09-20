@extends('admin.layouts.app')

@section('content')
<div class="container-wrapper">
    <!--header start here-->
    <div class="clearfix"></div>
    <!--header end here-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Add Car Washing Booking</li>
    </ol>
    <div class="grid-form">
        <div class="grid-form1">
            <h3>Add Car Washing Booking</h3>
            @if (session('success'))
                <div class="succWrap">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.store_booking') }}" method="POST">
                         @csrf
                <div class="form-group">
                    <label for="packageType">Package Type</label>
                    <select name="packageType" class="form-control" required>
                        <option value="">Select Package Type</option>
                        <option value="1">BASIC PLAN (KSH.10.00)</option>
                        <option value="2">STANDARD PLAN (KSH. 20.99)</option>
                        <option value="3">PREMIUM PLAN (KSH 110.99)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="carWashPoint">Washing Point</label>
                    <select name="carWashPoint" class="form-control" required>
                        <option value="">Select Washing Point</option>
                        @foreach($washingPoints as $washingPoint)
                            <option value="{{ $washingPoint->id }}">{{ $washingPoint->washingPointName }} ({{ $washingPoint->washingPointAddress }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" name="fullName" class="form-control" required placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label for="mobileNumber">Mobile No</label>
                    <input type="text" name="mobileNumber" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No.">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required placeholder="Email" pattern=".+@.+">
                </div>
                <div class="form-group">
                    <label for="washDate">Wash Date</label>
                    <input type="date" name="washDate" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="washTime">Wash Time</label>
                    <input type="time" name="washTime" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Message (if any)</label>
                    <textarea name="message" class="form-control" placeholder="Message if any"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
    <!--inner block start here-->
    <div class="inner-block"></div>
    <!--inner block end here-->
    <!--copy rights start here-->
    @include('includes.footer')
    @include('includes.sidebarmenu')
    <div class="clearfix"></div>
</div>
@endsection
