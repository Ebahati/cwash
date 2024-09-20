<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Page; // Assuming you have a Page model for storing page details
use App\Models\CarWashBooking;
use App\Models\WashingPoint;

class AdminPageController extends Controller
{
   
    
    public function showUpdatePageForm($type)
    {
        $page = Page::where('type', $type)->first();
        return view('admin.update-page', compact('page'))->with('type', $type);
    }

    
    public function updatePage(Request $request, $type)
    {
        $page = Page::where('type', $type)->first();
        $page->detail = $request->pgedetails;
        if ($type == 'contact') {
            $page->openignHrs = $request->openignHrs;
            $page->phoneNumber = $request->phoneNumber;
            $page->emailId = $request->emailId;
        }
        $page->save();

        return redirect()->route('admin.update-page', ['type' => $type])->with('success', ucfirst($type).' page updated successfully!');
    }
   
    
    public function editAbout()
        {
            $page = Page::where('type', 'about')->first();
            return view('admin.update-page', compact('page'))->with('type', 'about');
        }
    
    

    public function updateAbout(Request $request)
    {
        $page = Page::where('type', 'about')->first();
        $page->detail = $request->pgedetails;
        $page->save();

        return redirect()->route('admin.about')->with('success', 'About Us page updated successfully!');
    }

    public function createBooking()
    {
        $washingPoints = WashingPoint::all();
        return view('admin.addBooking', compact('washingPoints'));
    }

    public function storeBooking(Request $request)
    {
        $request->validate([
            'packagetype' => 'required',
            'washingpoint' => 'required',
            'fname' => 'required|string|max:255',
            'contactno' => 'required|digits:10',
            'washdate' => 'required|date',
            'washtime' => 'required',
            'message' => 'nullable|string',
        ]);

        $booking = new CarWashBooking();
        $booking->bookingId = mt_rand(100000000, 999999999);
        $booking->packageType = $request->packagetype;
        $booking->carWashPoint = $request->washingpoint;
        $booking->fullName = $request->fname;
        $booking->mobileNumber = $request->contactno;
        $booking->washDate = $request->washdate;
        $booking->washTime = $request->washtime;
        $booking->message = $request->message;
        $booking->status = 'New';
        $booking->save();

        return redirect()->route('admin.addBooking')->with('success', 'Your booking was done successfully. Booking number is ' . $booking->bookingId);
    }  
   
    
    
}




