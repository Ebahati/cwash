@extends('admin.layouts.app')

@section('title', 'CarLux | All Bookings')

@section('styles')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{ asset('assets/css/morris.css') }}" type="text/css"/>
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/table-style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/basictable.css') }}" />
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
@endsection

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Manage All Bookings</li>
    </ol>
    <div class="agile-grids">    
        <div class="agile-tables">
            <div class="w3l-table-info">
                <h2>All Bookings</h2>
                <table id="table">
                    <thead>
                        <tr>
                            <th>Booking No.</th>
                            <th>Name</th>
                            <th width="200">Package Type</th>
                            <th>Washing Point</th>
                            <th>Washing Date/Time</th>
                           
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
                               
                                <td><a href="{{ route('admin.booking.details', ['bid' => $booking->id, 'bookingid' => $booking->bookingId]) }}">View</a></td>
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
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.basictable.min.js') }}"></script>
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
