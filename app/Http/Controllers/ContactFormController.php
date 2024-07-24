<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Models\ContactInfo;

class ContactFormController extends Controller
{

    public function create()
    {
        $contactInfo = ContactInfo::find(1);
        return view('contact',compact('contactInfo'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string|max:500',
            'current_date' => 'required|date',
        ]);
    
        ContactForm::create($request->all());
    
        return redirect()->back()->with('success', 'Thank you for submitting the form. Our team will contact you soon.');
    }
    public function index()
    {
        $contactForms = ContactForm::orderBy('created_at', 'desc')->get();
        return view('pages.contact', compact('contactForms'));
    }
}
