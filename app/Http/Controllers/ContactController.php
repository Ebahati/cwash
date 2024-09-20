<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class ContactController extends Controller
{
    public function showForm(PageController $pageController)
    {
        $contactInfo = $pageController->getContactInfo();
        return view('contact', compact('contactInfo'));
    }

    public function handleForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store the contact form data
        \DB::table('tblenquiry')->insert([
            'FullName' => $validated['name'],
            'EmailId' => $validated['email'],
            'Subject' => $validated['subject'],
            'Description' => $validated['message'],
        ]);

        return redirect()->route('contact.show')->with('status', 'Query sent successfully');
    }
}
