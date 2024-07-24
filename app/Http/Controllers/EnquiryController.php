<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use App\Models\Enquiry;
use App\Models\ContactInfo;

use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function create()
    {
        $contactInfo = ContactInfo::find(1);
        $courses = ClassModel::all(); // Assuming ClassModel holds the courses
        return view('enquiry', compact('courses','contactInfo'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'interest_course' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'current_date' => 'required|date',
        ]);

        Enquiry::create($request->all());

        return redirect()->back()->with('success', 'Thank you. Our team will connect with you soon.');
    }
    public function index()
    {
        $enquiries=Enquiry::orderBy('created_at', 'desc')->get();
        return view('pages.enquiry',compact('enquiries'));
    }
}
