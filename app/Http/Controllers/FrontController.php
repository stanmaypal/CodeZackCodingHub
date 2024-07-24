<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Teacher;
use App\Models\ContactInfo;
use App\Models\Slide;
use App\Models\Comment;
use App\Models\Notice;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function course()
    {
        $classes=ClassModel::all();
        $teachers=Teacher::all();
        $contactInfo = ContactInfo::find(1);
        $slides = Slide::all();
        $notices = Notice::where('status',1)->get();
        $comments = Comment::with('student.classModel')->where('status', 1)->get();
        return view('home',compact('classes','teachers','contactInfo','slides','comments','notices'));
    }
    public function about()
    {  $contactInfo = ContactInfo::find(1);
      
        $teachers = Teacher::all();
        return view('about',compact('contactInfo','teachers'));
    }
}
