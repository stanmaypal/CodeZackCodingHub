<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ContactInfo;
class LoginController extends Controller
 {
//     public function showLoginForm()
//     {
//         return view('log');
//     }
//     public function store(Request $request)
//     {
//         dd($request->all());
//         $role = $request->input('role');

//         if ($role == 'admin') {
//             $request->validate([
//                 'email' => 'required|email',
//                 'password' => 'required|string|min:6',
//             ]);

//             $admin = User::where('email', $request->email)->first();
//             if ($admin && Hash::check($request->password, $admin->password)) {
//                 Auth::guard('admin')->login($admin);
//                 return redirect()->route('admin.dashboard');
//             }
//         } elseif ($role == 'teacher') {
//             $request->validate([
//                 'teacher_email' => 'required|email',
//                 'teacher_dob' => 'required|date',
//             ]);

//             $teacher = Teacher::where('email', $request->teacher_email)
//                               ->where('dob', $request->teacher_dob)
//                               ->first();
//             if ($teacher) {
//                 Auth::guard('teacher')->login($teacher);
//                 return redirect()->route('teacher.dashboard');
//             }
//         } elseif ($role == 'student') {
//             $request->validate([
//                 'enrollment' => 'required|string',
//                 'student_dob' => 'required|date',
//             ]);

//             $student = Student::where('enrollment', $request->enrollment)
//                               ->where('dob', $request->student_dob)
//                               ->first();
//             if ($student) {
//                 Auth::guard('student')->login($student);
//                 return redirect()->route('student.dashboard');
//             }
//         }

//         return redirect()->back()->withInput($request->only('email', 'teacher_email', 'enrollment'))->withErrors([
//             'login' => 'These credentials do not match our records.',
//         ]);
//     }

public function showAdminLoginForm()
{
    $contactInfo = ContactInfo::find(1);
    return view('logData.adminLog',compact('contactInfo'));
}

public function adminLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    $admin = User::where('email', $request->email)->first();
    if ($admin && Hash::check($request->password, $admin->password)) {
        Auth::guard('user')->login($admin);
        return redirect()->route('dashboard');
    }

    return redirect()->back()->withInput($request->only('email'))->withErrors([
        'login' => 'These credentials do not match our records.',
    ]);
}
public function showTeacherLoginForm()
    {
        $contactInfo = ContactInfo::find(1);
        return view('logData.teachLog',compact('contactInfo'));
    }

    public function teacherLogin(Request $request)
    {
        $request->validate([
            'teacher_email' => 'required|email',
            'teacher_dob' => 'required|date',
        ]);

        $teacher = Teacher::where('email', $request->teacher_email)
                          ->where('dob', $request->teacher_dob)
                          ->first();
        if ($teacher) {
            Auth::guard('teacher')->login($teacher);
            return redirect()->route('teachers.form',['id' => $teacher->id]);
        }

        return redirect()->back()->withInput($request->only('teacher_email'))->withErrors([
            'login' => 'These credentials do not match our records.',
        ]);
    }

    public function showStudentLoginForm()
    {
        $contactInfo = ContactInfo::find(1);
        return view('logData.stuLog',compact('contactInfo'));
    }

    public function studentLogin(Request $request)
    {
        $request->validate([
            'enrollment' => 'required|string',
            'student_dob' => 'required|date',
        ]);

        $student = Student::where('enrollment_number', $request->enrollment)
                          ->where('dob', $request->student_dob)
                          ->first();
        if ($student) {
            Auth::guard('student')->login($student);
            return redirect()->route('students.front', ['id' => $student->id]);
        }

        return redirect()->back()->withInput($request->only('enrollment'))->withErrors([
            'login' => 'These credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    $request->session()->regenerateToken();
        return redirect('/');
    }
}
