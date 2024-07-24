<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInfo;

class ContactInfoController extends Controller
{
    public function edit()
    {
        $contactInfo = ContactInfo::first(); // Assuming there's only one record to edit
        return view('pages.contact_info_edit', compact('contactInfo'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the logo field as an image
            'name' => 'required|string|max:255',
            'about' => 'nullable|string|max:2048',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'twitter_link' => 'nullable|string|url|max:255',
            'facebook_link' => 'nullable|string|url|max:255',
            'youtube_link' => 'nullable|string|url|max:255',
            'linkedin_link' => 'nullable|string|url|max:255',
            'instagram_link' => 'nullable|string|url|max:255',
            'map_link' => 'nullable|string|url|max:500',
            'address' => 'nullable|string|max:500',
        ]);

        $contactInfo = ContactInfo::findOrFail($id);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName = time() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('uploads'), $fileName);
            $contactInfo->logo = 'uploads/' . $fileName;
        }

        $contactInfo->update($request->except('logo'));

        return redirect()->back()->with('success', 'Contact information updated successfully.');
    }
    // public function __construct()
    // {
    //     // Ensure the contact information is available to all views using the 'contactInfo' key
    //     $contactInfo = ContactInfo::find(1); // Fetch the contact information with ID 1
    //     view()->share('contactInfo', $contactInfo);
    // }

    public function index()
    {
        $contactInfos = ContactInfo::all(); // Fetch all contact information
        return view('contact', compact('contactInfos'));
    }
}
