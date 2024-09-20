<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarWashBooking; // Import the Booking model

class NewBookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // Fetch new bookings from the database
        $newBookings = CarWashBooking::where('status', 'New')->get();

        return view('admin.new_bookings', compact('newBookings'));
    }

    
}

