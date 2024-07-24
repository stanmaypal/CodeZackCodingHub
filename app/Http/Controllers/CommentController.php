<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course' => 'required|string',
            'comment' => 'required|string',
            'image' => 'nullable|string'
        ]);

        $commentData = $request->only('student_id', 'course', 'comment','image');

       

        Comment::create($commentData);

        return back()->with('success', 'Comment submitted successfully.');
    }

    public function index()
    {
        $comments = Comment::with('student.classModel')->get();
        return view('comments.index', compact('comments'));
    }

    public function changeStatus(Comment $comment, $status)
{
    $comment->status = $status;
    $comment->save();

    return redirect()->route('comments.index')->with('success', 'Status updated successfully.');
}



}
