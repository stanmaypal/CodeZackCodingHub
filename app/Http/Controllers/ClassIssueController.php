<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\ClassIssue; 
use Illuminate\Support\Facades\DB;
use PDF;

class ClassIssueController extends Controller
{
    public function create()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $classes = ClassModel::all();
        $subjects = collect(); // Empty collection
    
        return view('issuedClass.create', compact('students', 'teachers', 'classes', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'teacher_id' => 'required',
            'class_id' => 'required',
            'subject_id' => 'required',
            'issue_date' => 'required|date'
        ]);

        ClassIssue::create($request->all());

        return redirect()->route('class_issues.index');
    }
    public function fetchSubjects($classId)
    {
        $subjects = Subject::where('class_id', $classId)->get();
        return response()->json($subjects);
    }
    public function index()
    {   
        $classN=ClassModel::all();
        $classIssues = ClassIssue::with(['student', 'teacher', 'class', 'subject'])->get();
        return view('issuedClass.index', compact('classIssues','classN'));
    }

    public function generatePDF(Request $request)
{
  // Retrieve the issue date and class ID from the request
    $issueDate = $request->input('issue_date');
    $classId = $request->input('class_id');

    // Debugging statement to check received parameters
    \Log::info('Request Parameters: ', $request->all());

    // Validate inputs
    $request->validate([
        'issue_date' => 'required|date',
        'class_id' => 'nullable|exists:classes,id',
    ]);

    // Fetch the class issues based on the issue date and class ID
    $query = ClassIssue::with(['student', 'teacher', 'class', 'subject']);

    if ($issueDate) {
        $query->whereDate('issue_date', $issueDate);
    }

    if ($classId) {
        $query->where('class_id', $classId);
    }

    $classIssues = $query->get();

    // Load the view and pass the data to it
    $pdf = PDF::loadView('issuedClass.pdf', compact('classIssues'));

    // Return the PDF as a download
    return $pdf->download('class_issues.pdf');
}


    // public function generatePDF(Request $request)
    // {
    //     // Retrieve the issue date from the request
    //    $issueDate = $request->issue_date;
    // //print_r($request->all());
    //     // Fetch the class issues based on the issue date
    //     $classIssues = ClassIssue::with(['student', 'teacher', 'class', 'subject'])
    //         ->whereDate('issue_date', $issueDate)
    //         ->get();
    // //return $classIssues;
      
    //      $pdf = PDF::loadView('issuedClass.pdf', compact('classIssues'));
    
    
    //      return $pdf->download('class_issues.pdf');
    // }

    public function edit($id)
    {
        $classIssue = ClassIssue::findOrFail($id);
        $students = Student::all();
        $teachers = Teacher::all();
        $classes = ClassModel::all();
        $subjects = Subject::all();
    
        return view('issuedClass.edit', compact('classIssue', 'students', 'teachers', 'classes', 'subjects'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'teacher_id' => 'required|exists:teachers,id',
        'class_id' => 'required|exists:classes,id',
        'subject_id' => 'required|exists:subjects,id',
        'issue_date' => 'required|date',
    ]);

    $classIssue = ClassIssue::findOrFail($id);
    $classIssue->student_id = $request->student_id;
    $classIssue->teacher_id = $request->teacher_id;
    $classIssue->class_id = $request->class_id;
    $classIssue->subject_id = $request->subject_id;
    $classIssue->issue_date = $request->issue_date;
    $classIssue->save();

    return redirect()->route('class_issues.index')->with('success', 'Class issue updated successfully');
}
}
