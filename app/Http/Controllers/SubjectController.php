<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\Teacher;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function create()
    {
        $classes = ClassModel::all();
        $teachers = Teacher::all();
        return view('subjects.create', compact('classes', 'teachers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:subjects',
            'class_id' => 'required',
            'teacher_id' => 'required',
            'description' => 'nullable'
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }
    public function edit($id)
    {
        $subject = Subject::findOrFail($id); // Fetch the subject by ID
        $classes = ClassModel::all();
        $teachers = Teacher::all();
        return view('subjects.edit', compact('subject', 'classes', 'teachers'));
    }
    
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required',
         
            'class_id' => 'required',
            'teacher_id' => 'required',
            'description' => 'nullable'
        ]);

        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject Updated successfully.');
    }
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success','Subject Deleted Successfully');
    }
}
