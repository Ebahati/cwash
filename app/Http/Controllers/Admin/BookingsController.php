<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarWashBooking;
use App\Models\WashingPoint;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use App\Services\TwilioService;
use Illuminate\Support\Facades\Log;

class BookingsController extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->middleware('auth:admin');
        $this->twilio = $twilio;
    }

    public function create()
    {
        $washingPoints = WashingPoint::all();
        return view('admin.create_booking', compact('washingPoints'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'packageType' => 'required',
            'carWashPoint' => 'required',
            'fullName' => 'required',
            'mobileNumber' => 'required|numeric|digits:10',
            'washDate' => 'required|date',
            'washTime' => 'required',
            'email' => 'required|email',
        ]);

        $bookingId = mt_rand(100000000, 999999999);

        $booking = CarWashBooking::create([
            'bookingId' => $bookingId,
            'packageType' => $request->packageType,
            'carWashPoint' => $request->carWashPoint,
            'fullName' => $request->fullName,
            'mobileNumber' => $request->mobileNumber,
            'washDate' => $request->washDate,
            'washTime' => $request->washTime,
            'message' => $request->message,
            'status' => 'New',
        ]);

        $details = [
            'packageType' => $booking->packageType,
            'carWashPoint' => $booking->carWashPoint,
            'fullName' => $booking->fullName,
            'mobileNumber' => $booking->mobileNumber,
            'email' => $request->email,
            'washDate' => $booking->washDate,
            'washTime' => $booking->washTime,
            'message' => $booking->message,
        ];

        // Debugging: Print out details
        Log::info('Booking Details:', $details);

        // Ensure none of the details are null
        foreach ($details as $key => $value) {
            if (is_null($value)) {
                return redirect()->route('admin.create_booking')->with('error', "Missing value for $key");
            }
        }

        try {
            // Send confirmation email
            Mail::to($request->email)->send(new BookingConfirmation($details));
            Log::info('Email sent to: ' . $request->email);

            // Send SMS to the customer
            $smsMessage = "Booking Confirmation: \nPackage: {$booking->packageType}\nPoint: {$booking->carWashPoint}\nDate: {$booking->washDate}\nTime: {$booking->washTime}";
            $this->twilio->sendSms($request->mobileNumber, $smsMessage);
            Log::info('SMS sent to: ' . $request->mobileNumber);

            return redirect()->route('admin.create_booking')->with('success', 'Booking added successfully. Booking number is ' . $bookingId);
        } catch (\Exception $e) {
            // Handle the error
            Log::error('Error sending notification: ' . $e->getMessage());
            return redirect()->route('admin.create_booking')->with('error', 'Booking added but failed to send notification: ' . $e->getMessage());
        }
    }

    // Other methods...

    public function allBookings()
    {
        $bookings = CarWashBooking::with('washingPoint')->get();
        return view('admin.all_bookings', compact('bookings'));
    }

    public function bookingDetails($bid, $bookingid)
    {
        $booking = CarWashBooking::where('id', $bid)
                          ->where('bookingId', $bookingid)
                          ->with('washingPoint')
                          ->firstOrFail();

        return view('admin.booking_details', compact('booking'));
    }

    public function confirmPayment(Request $request, $id)
    {
        $validated = $request->validate([
            'customerPhoneNumber' => 'required|string',
            'paymentMethod' => 'required|string',
        ]);

        $booking = CarWashBooking::find($id);
        if ($booking) {
            $booking->status = 'completed';
            $booking->save();
        }

        return response()->json(['success' => 'Payment confirmed']);
    }

    public function completedBookings()
    {
        $completedBookings = CarWashBooking::where('status', 'completed')->get();
        return view('admin.completed_bookings', compact('completedBookings'));
    }

    public function destroy($id)
    {
        CarWashBooking::findOrFail($id)->delete();
        return redirect()->route('admin.completedBookings')->with('success', 'Record Deleted');
    }
}
