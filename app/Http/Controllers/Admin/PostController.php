<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function view($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.view', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        DB::beginTransaction();
        try {
            $post->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Post Deleted Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }

    public function changeStatus($id)
    {
        $post = Post::findOrFail($id);
        DB::beginTransaction();
        try {

            $post->status = $post->status === 'draft' ? 'published' : 'draft';
            $post->update();
            DB::commit();
            return redirect()->back()->with('success', 'Post Status Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }

}
