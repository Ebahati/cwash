@extends('admin.layouts.app')

@section('title', 'Completed Bookings')

@section('content')
    <div class="agile-grids">    
        <div class="agile-tables">
            <div class="w3l-table-info">
                <h2>Completed Bookings</h2>
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
                        @if($completedBookings->count() > 0)
                            @foreach($completedBookings as $booking)
                                <tr>
                                    <td>{{ $booking->bookingId }}</td>
                                    <td>{{ $booking->fullName }}</td>
                                    <td width="50">
                                        @if($booking->packageType == 1) BASIC CLEANING ($10.99) @endif
                                        @if($booking->packageType == 2) PREMIUM CLEANING ($20.99) @endif
                                        @if($booking->packageType == 3) COMPLEX CLEANING ($30.99) @endif
                                    </td>
                                    <td>
                                        @if($booking->washingPoint)
                                            {{ $booking->washingPoint->name }}<br />
                                            {{ $booking->washingPoint->address }}
                                        @else
                                            No Washing Point
                                        @endif
                                    </td>
                                    <td>{{ $booking->washDate }}/{{ $booking->washTime }}</td>
                                    
                                    <td>
                                        <!-- <a href="{{ route('admin.booking.details', ['bid' => $booking->id, 'bookingid' => $booking->bookingId]) }}">View</a> -->
                                        <a href="{{ route('admin.delete.booking', $booking->id) }}" style="color:red;" onclick="return confirm('Do you really want to delete');">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" style="color:red;">No Record found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').basictable();
        });
    </script>
@endsection
