<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Page;

class EnquiryController extends Controller
{

    // app/Http/Controllers/EnquiryController.php
   
   
    
        public function showContactForm()
        {
            $contactInfo = Page::where('type', 'contact')->first();
            return view('contact', compact('contactInfo'));
        }
    
        public function handleForm(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);
    
            Enquiry::create([
                'FullName' => $request->name,
                'EmailId' => $request->email,
                'Subject' => $request->subject,
                'Description' => $request->message,
                'PostingDate' => now(),
                'Status' => 0, // 0 for unread
            ]);
    
            return redirect()->route('contact.show')->with('success', 'Your enquiry has been submitted successfully.');
        }
    
        public function index()
        {
            $enquiries = Enquiry::all();
            return view('enquiries.index', compact('enquiries'));
        }
    
        public function markAsRead($id)
        {
            $enquiry = Enquiry::findOrFail($id);
            $enquiry->status = 1;
            $enquiry->save();
    
            return redirect()->route('enquiries.index')->with('success', 'Enquiry successfully marked as read');
        }
    
    
}





