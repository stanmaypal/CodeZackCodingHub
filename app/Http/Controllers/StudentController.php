<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\ContactInfo;
use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function create()
    {
        $classes = ClassModel::all(); // Retrieve all classes
        return view('students.create', compact('classes'));
    }
    public function store(Request $request)
    {
      // dd($request->all());
        $request->validate([
            'student_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'course' => 'required|string',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'caste' => 'required|string',
            'registration_date' => 'required|date',
            'aadhar' => 'nullable|string|max:12',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:15',
            'current_address' => 'required|string',
            'permanent_address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $timestamp = now();
        $registrationNumber = $timestamp->format('ymdHis');
        $enrollmentNumber = $timestamp->format('ymd') . 'CZ' . $timestamp->format('His');

        print_r($enrollmentNumber);
        print_r($registrationNumber);
        $photo = null;
        if ($request->file('photo')) {
            $photo = $request->file('photo')->store('photos', 'public');
        }

        Student::create([
            'registration_number' => $registrationNumber,
            'enrollment_number' => $enrollmentNumber,
            'student_name' => $request->student_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'course' => $request->course,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'caste' => $request->caste,
            'registration_date' => $request->registration_date,
            'aadhar' => $request->aadhar,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'current_address' => $request->current_address,
            'permanent_address' => $request->permanent_address,
            'photo' => $photo,
        ]);

        return redirect()->route('students.index')->with('success', 'Student registered successfully.');
    }

    public function index()
    {
        $students = Student::with('classModel')->get(); 
       // return $students;
       return view('students.index', compact('students'));
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes = ClassModel::all();
        return view('students.edit', compact('student','classes'));
    }

    public function update(Request $request, $id)
    {
       //dd($request->all());
        $request->validate([
            
            'student_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'course' => 'required|string',
          
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'caste' => 'required|string',
            'aadhar' => 'nullable|string|max:12',
            'mobile' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:15',
            'current_address' => 'required|string',
            'permanent_address' => 'required|string',
           
        ]);

        $student = Student::findOrFail($id);
        $photo = $student->photo;

        if ($request->file('photo')) {
            if ($student->photo) {
                Storage::delete('public/' . $student->photo);
            }
            $photo = $request->file('photo')->store('photos', 'public');
        }

        $student->update([
            'student_name' => $request->student_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'course' => $request->course,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'caste' => $request->caste,
          
            'aadhar' => $request->aadhar,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'current_address' => $request->current_address,
            'permanent_address' => $request->permanent_address,
            'photo' => $photo,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        if ($student->photo) {
            Storage::delete('public/' . $student->photo);
        }
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $classes = ClassModel::all();
        return view('students.show', compact('student','classes'));
    }
    public function showForm($id)
    {
        $student = Student::findOrFail($id);
        $classes = ClassModel::all();
        $contactInfo = ContactInfo::find(1);
        return view('students.studentFront', compact('student','classes','contactInfo'));
    }
    public function idcard($id)
    {
        $student = Student::findOrFail($id);
        $classes = ClassModel::all();
        return view('students.idCard', compact('student','classes'));
    }
}
