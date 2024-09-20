<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarWashBooking; // Import the Booking model

class CompletedBookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // Fetch completed bookings from the database
        $completedBookings = CarWashBooking::where('status', 'Completed')
            ->with('washingPoint')
            ->get();

        return view('admin.completed_bookings', compact('completedBookings'));
    }
}

