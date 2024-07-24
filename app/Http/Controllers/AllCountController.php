<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Course;
use App\Models\ClassIssue;
use App\Models\Enquiry;
use App\Models\ContactForm;
class AllCountController extends Controller
{
    public function index()
    {
        // Fetch counts of all models
        $teacherCount = Teacher::count();
        $classCount = ClassModel::count();
        $studentCount = Student::count();
        $issueClassCount = ClassIssue::count();
        $enquiryCount = Enquiry::count();
        $contactFormCount = ContactForm::count();
        $comments = Comment::count();

        // Pass data to the view
        return view('dashboard.dashboard', compact(
            'teacherCount',
            'classCount',
            'studentCount',
           'comments',
            'issueClassCount',
            'enquiryCount',
            'contactFormCount'
        ));
    }
}
