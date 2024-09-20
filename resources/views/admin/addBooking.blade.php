@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2>All Bookings</h2>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Booking No.</th>
                                <th>Name</th>
                                <th width="200">Package Type</th>
                                <th>Washing Point</th>
                                <th>Washing Date/Time</th>
                                <th width="200">Posting Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->bookingId }}</td>
                                    <td>{{ $booking->fullName }}</td>
                                    <td>
                                        @if($booking->packageType == 1) BASIC CLEANING ($10.99)
                                        @elseif($booking->packageType == 2) PREMIUM CLEANING ($20.99)
                                        @elseif($booking->packageType == 3) COMPLEX CLEANING ($30.99)
                                        @endif
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
                                    <td>{{ $booking->postingDate }}</td>
                                    <td>
                                        <a href="{{ route('admin.booking.details', ['bid' => $booking->id, 'bookingid' => $booking->bookingId]) }}" class="btn btn-info">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="color:red;">No Record found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var navoffeset = $(".header-main").offset().top;
            $(window).scroll(function(){
                var scrollpos = $(window).scrollTop(); 
                if(scrollpos >= navoffeset){
                    $(".header-main").addClass("fixed");
                } else {
                    $(".header-main").removeClass("fixed");
                }
            });
        });
    </script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@endsection
