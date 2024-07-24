<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function create()
    {
        $classes = ClassModel::all();
        $subjects = Subject::all();
        return view('attendances.create', compact('classes', 'subjects'));
    }
    public function index(Request $request)
    {
        $classes = ClassModel::all();
        $subjects = Subject::all();
        $students = Student::where('class_id', $request->class_id)->get();

        return view('attendance.index', compact('classes', 'subjects', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'month' => 'required|date_format:Y-m',
            'attendance' => 'array',
        ]);

        foreach ($request->attendance as $studentId => $days) {
            foreach ($days as $day => $present) {
                $attendanceDate = date('Y-m-d', strtotime($request->month . '-' . $day));
                Attendance::updateOrCreate(
                    [
                        'student_id' => $studentId,
                        'class_id' => $request->class_id,
                        'subject_id' => $request->subject_id,
                        'date' => $attendanceDate,
                    ],
                    [
                        'present' => $present ? 1 : 0,
                    ]
                );
            }
        }

        return redirect()->route('attendance.create')->with('success', 'Attendance saved successfully');
    }
    
}
