@extends('admin.layouts.app')

@section('title', 'CarLux | New Bookings')

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
@endsection

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a><i class="fa fa-angle-right"></i>Manage New Bookings</li>
    </ol>

    <div class="agile-grids">    
        <div class="agile-tables">
            <div class="w3l-table-info">
                <h2>New Bookings</h2>
                <table id="table">
                    <thead>
                        <tr>
                            <th>Booking No.</th>
                            <th>Name</th>
                            <th width="200">Package Type</th>
                            <th>Washing Point</th>
                            <th>Washing Date/Time</th>
                            <!-- <th>Contact Number</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($newBookings as $booking)
                            <tr>
                                <td>{{ $booking->bookingId }}</td>
                                <td>{{ $booking->fullName }}</td>
                                <td>
                                    @if($booking->packageType == 1) BASIC CLEANING ($10.99) @endif
                                    @if($booking->packageType == 2) PREMIUM CLEANING ($20.99) @endif
                                    @if($booking->packageType == 3) COMPLEX CLEANING ($30.99) @endif
                                </td>
                                <td>
                                    {{ $booking->washingPoint ? $booking->washingPoint->washingPointName : 'N/A' }}<br />
                                    {{ $booking->washingPoint ? $booking->washingPoint->washingPointAddress : 'N/A' }}
                                </td>
                                <td>{{ $booking->washDate }}/{{ $booking->washTime }}</td>
                                <!-- <td>{{ $booking->postingDate }}</td> -->
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
    <script src="{{ asset('assets/js/jquery.basictable.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').basictable();
        });
    </script>
@endsection
