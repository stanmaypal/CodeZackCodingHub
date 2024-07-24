<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
class SlideController extends Controller
{
    public function create()
    {
        return view('sliders.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heading' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'textData' => 'required|string',
        ]);

        $slide = new Slide();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $fileName);
            $slide->image = 'uploads/' . $fileName;
        }
        $slide->heading = $request->heading;
        $slide->title=$request->title;
        $slide->textData = $request->textData;
       
        $slide->save();

        return redirect()->route('sliders.index')->with('success', 'Slide created successfully.');
    }
    public function index()
    {
        $slides = Slide::all();
        return view('sliders.index', compact('slides'));
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('sliders.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heading' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'textData' => 'required|string',
        ]);

        $slide = Slide::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $fileName);
            $slide->image = 'uploads/' . $fileName;
        }
        $slide->heading = $request->heading;
        $slide->title=$request->title;
        $slide->textData = $request->textData;
        $slide->save();

        return redirect()->route('sliders.index')->with('success', 'Slide updated successfully.');
    }
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        if ($slide->image) {
            unlink(public_path($slide->image));
        }
        $slide->delete();

        return redirect()->route('sliders.index')->with('success', 'Slide deleted successfully.');
    }
}
