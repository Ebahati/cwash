<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function getContactInfo()
    {
        $contactInfo = Page::where('type', 'contact')->first();
        return $contactInfo;
    }

    public function aboutUs()
    {
        $page = Page::where('type', 'about')->first();
        return view('about', compact('page'));
    }

    public function showHomePage()
    {
        $contactInfo = $this->getContactInfo();
        return view('home', compact('contactInfo'));
    }

    public function showContactForm()
    {
        $contactInfo = $this->getContactInfo();
        return view('contact', compact('contactInfo'));
    }
}
