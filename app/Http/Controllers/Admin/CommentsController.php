<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->latest()->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->status === 'approved') {
            return redirect()->route('admin.comments.index')->with('error', 'Already Approved!');
        }

        DB::beginTransaction();
        try {

            $comment->status = 'approved';
            $comment->update();

            DB::commit();
            return redirect()->route('admin.comments.index')->with('success', 'Comment approved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }

    public function reject($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->status === 'rejected') {
            return redirect()->route('admin.comments.index')->with('error', 'Already rejected!');
        }

        DB::beginTransaction();
        try {

            $comment->status = 'rejected';
            $comment->update();

            DB::commit();
            return redirect()->route('admin.comments.index')->with('success', 'Comment rejected successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }
}
