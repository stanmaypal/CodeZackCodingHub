<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
class NoticeController extends Controller
{
    public function create()
    {
        return view('notices.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
        ]);

        Notice::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
        ]);

        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }
    public function index()
    {
        $notices = Notice::all();
        return view('notices.index', compact('notices'));
    }

    public function changeStatus(Notice $notice, $status)
    {
        $notice->status = $status;
        $notice->save();

        return redirect()->route('notices.index')->with('success', 'Notice status updated successfully.');
    }
    public function edit($id)
    {
        $notice = Notice::find($id);
        if (!$notice) {
            return redirect()->route('notices.index')->with('error', 'Notice not found.');
        }
        return view('notices.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $notice = Notice::find($id);
        if (!$notice) {
            return redirect()->route('notices.index')->with('error', 'Notice not found.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
        ]);

        $notice->update($request->all());
        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }
    public function destroy($id)
    {
        $notice = Notice::find($id);
        if (!$notice) {
            return redirect()->route('notices.index')->with('error', 'Notice not found.');
        }

        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }
}
