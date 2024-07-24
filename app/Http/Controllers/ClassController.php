<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\Storage;
class ClassController extends Controller
{
    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logo = null;
        if ($request->file('logo')) {
            $logo = $request->file('logo')->store('logos', 'public');
        }

        ClassModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logo,
        ]);

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function index()
    {
        $classes = ClassModel::all();
        return view('classes.index', compact('classes'));
    }
    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        return view('classes.edit', compact('class'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $class = ClassModel::findOrFail($id);
        $logo = $class->logo;

        if ($request->file('logo')) {
            if ($class->logo) {
                Storage::delete('public/' . $class->logo);
            }
            $logo = $request->file('logo')->store('logos', 'public');
        }

        $class->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logo,
        ]);

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $class = ClassModel::findOrFail($id);
        if ($class->logo) {
            Storage::delete('public/' . $class->logo);
        }
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }

    public function getSubjects($classId)
    {
        $class = ClassModel::find($classId);
        return response()->json($class->subjects); // Assuming a Class has many Subjects
    }

    public function getStudents($classId)
    {
        
        $students = Student::where('course', $classId)->get();
       //return $students;
        return response()->json($students);
    }

    public function course()
    {
        $classes = ClassModel::all();
        $contactInfo = ContactInfo::find(1);
        return view('course',compact('classes','contactInfo'));
    }
}
