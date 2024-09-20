<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarWashBooking;
use App\Models\Enquiry;
use App\Models\WashingPoint;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetch statistics
        $totalBookings = CarWashBooking::count();
        $newBookings = CarWashBooking::where('status', 'New')->count();
        $completedBookings = CarWashBooking::where('status', 'Completed')->count();
        $enquiries = Enquiry::count();
        $washingPoints = WashingPoint::count();

        // Fetch bookings grouped by month
        $bookings = \DB::table('tblcarwashbooking')
            ->select(\DB::raw('DATE_FORMAT(washdate, "%Y-%m") as month'), \DB::raw('COUNT(*) as count'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Create a list of all months in the current year
        $startDate = Carbon::now()->startOfYear();
        $endDate = Carbon::now()->endOfYear();
        $allMonths = [];
        $currentDate = $startDate->copy();
        
        while ($currentDate <= $endDate) {
            $allMonths[] = $currentDate->format('Y-m');
            $currentDate->addMonth();
        }

        // Fill missing months with zero counts
        $data = [];
        foreach ($allMonths as $month) {
            $data[$month] = 0;
        }

        foreach ($bookings as $booking) {
            $data[$booking->month] = $booking->count;
        }

        $months = array_keys($data);
        $counts = array_values($data);

        // Fetch count of unread enquiries
        $unreadEnquiries = Enquiry::where('Status', 0)->count();

        // Pass all necessary data to the dashboard view
        return view('admin.dashboard', [
            'totalBookings' => $totalBookings,
            'newBookings' => $newBookings,
            'completedBookings' => $completedBookings,
            'enquiries' => $enquiries,
            'washingPoints' => $washingPoints,
            'months' => $months,
            'counts' => $counts,
            'unreadEnquiries' => $unreadEnquiries,
        ]);
    }




   

public function adminDashboard()
{
    // Fetch count of unread enquiries
    $unreadEnquiries = Enquiry::where('Status', 0)->count();

    return view('admin.dashboard', compact('unreadEnquiries'));
}



}
