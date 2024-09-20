<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\CarWashBooking;
use App\Models\WashingPoint;
use App\Services\TwilioService;

class BookingController extends Controller
{
    // Show the booking form for users
   
    public function showForm()
{
    $washingPoints = WashingPoint::all();
    // dd($washingPoints); // Check if data is being retrieved
    return view('booking', compact('washingPoints'));
}

    // Handle the booking form submission
    public function book(Request $request)
    {
        $request->validate([
            'packagetype' => 'required',
            'washingpoint' => 'required',
            'fname' => 'required|string',
            'contactno' => 'required|digits:10',
            'washdate' => 'required|date',
            'washtime' => 'required',
            'message' => 'nullable|string',
        ]);

        $bno = mt_rand(100000000, 999999999);
        $status = 'New';

        DB::table('tblcarwashbooking')->insert([
            'bookingId' => $bno,
            'packageType' => $request->packagetype,
            'carWashPoint' => $request->washingpoint,
            'fullName' => $request->fname,
            'mobileNumber' => $request->contactno,
            'washDate' => $request->washdate,
            'washTime' => $request->washtime,
            'message' => $request->message,
            'status' => $status,
        ]);

        Session::flash('message', 'Your booking was done successfully. Booking number is ' . $bno);
        return redirect()->route('booking.form');
    }

    // Show washing plans
    public function showPlans()
    {
        $washingPoints = WashingPoint::all();
        return view('washing-plans', compact('washingPoints'));
    }

    // Constructor
    public function __construct()
    {
        // Apply the admin middleware only to admin-specific methods
        $this->middleware('auth:admin')->only(['adminIndex']);
    }

    // Method for admin bookings
    public function adminIndex()
    {
        $bookings = CarWashBooking::with('washingPoint')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    

    public function confirmPayment(Request $request, $id)
    {
        // Validate and process payment here
        $booking = Booking::findOrFail($id);
        $paymentMethod = $request->input('paymentMethod');
        $phoneNumber = $request->input('customerPhoneNumber');
    
        // Prepare SMS message
        $message = "Booking Confirmation:\n".
                   "Booking No: {$booking->bookingId}\n".
                   "Name: {$booking->fullName}\n".
                   "Package Type: " . $this->getPackageType($booking->packageType) . "\n".
                   "Washing Point: " . ($booking->washingPoint ? $booking->washingPoint->washingPointName : 'Not Specified') . "\n".
                   "Date/Time: {$booking->washDate} / {$booking->washTime}";
    
        // Send SMS
        $smsService = new SmsService();
        $smsService->sendSms($phoneNumber, $message);
    
        return response()->json(['success' => 'Payment confirmed and SMS sent.']);
    }
    
    private function getPackageType($packageType)
    {
        switch ($packageType) {
            case 1: return 'BASIC CLEANING (KSH.10.00)';
            case 2: return 'STANDARD CLEANING (KSH.20.99)';
            case 3: return 'PREMIUM CLEANING (KSH.110.99)';
            default: return 'Unknown';
        }
    }
    

}
