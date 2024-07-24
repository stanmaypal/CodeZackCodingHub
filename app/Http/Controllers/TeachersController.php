<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\ContactInfo;
use App\Models\ClassIssue;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Storage;
class TeachersController extends Controller
{
    public function create()
    {
        return view('teachers.create');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'subject_expertise' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:teachers',
            'address' => 'required|string',
            'gender' => 'required|string',
            'instagram_link' => 'nullable|string|url',
            'twitter_link' => 'nullable|string|url',
            'facebook_link' => 'nullable|string|url',
            'photo' => 'nullable|image|max:1024',
        ]);

        $teacher = new Teacher($request->all());

        if ($request->hasFile('photo')) {
            $teacher->photo = $request->file('photo')->store('photos', 'public');
        }

        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully!');
    
    }

    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'subject_expertise' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:teachers,email,' . $id,
            'address' => 'required|string',
            'gender' => 'required|string',
            'instagram_link' => 'nullable|string|url',
            'twitter_link' => 'nullable|string|url',
            'facebook_link' => 'nullable|string|url',
            'photo' => 'nullable|image|max:1024',
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->fill($request->all());

        if ($request->hasFile('photo')) {
            if ($teacher->photo) {
                Storage::disk('public')->delete($teacher->photo);
            }
            $teacher->photo = $request->file('photo')->store('photos', 'public');
        }

        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }
    public function showForm($id)
    {
        $classN=ClassModel::all();
        $classIssues = ClassIssue::with(['student', 'teacher', 'class', 'subject'])->get();
        $contactInfo = ContactInfo::find(1);
        $teacher = Teacher::findOrFail($id);
        return view('teachers.teacherFront', compact('teacher','contactInfo'));
    }

    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        if ($teacher->photo) {
            Storage::disk('public')->delete($teacher->photo);
        }
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }

    public function team()
    {
        $teachers = Teacher::all();
        $contactInfo = ContactInfo::find(1);
        return view('team', compact('teachers','contactInfo'));
    }
}
