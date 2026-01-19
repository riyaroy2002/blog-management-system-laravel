<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $latestBlogs  = Post::latest()->where('status', 'approved')->take(3)->get();
        $featuredBlog = Post::latest()->where('status', 'approved')->first();
        return view('frontend.index', compact('latestBlogs', 'featuredBlog'));
    }


    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function blogs()
    {
        $posts       = Post::with(['user', 'comments'])->where('status', 'published')->latest()->paginate(5);
        $recentPosts = Post::where('status', 'published')->latest()->take(5)->get();
        return view('frontend.blogs', compact('posts', 'recentPosts'));
    }

    public function blogDetails($slug)
    {
        $post = Post::with([
            'user',
            'comments' => function ($query) {
                $query->where('status', 'approved')->latest();
            }
        ])->where('slug', $slug)->where('status', 'published')->firstOrFail();
        $recentPosts = Post::where('status', 'published')->where('id', '!=', $post->id)->latest()->take(5)->get();

        return view('frontend.blog-details', compact('post', 'recentPosts'));
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    public function authors()
    {
        $authors = User::where('role', 'author')->latest()->get();
        return view('frontend.author', compact('authors'));
    }

    public function comments(Request $request, $postId)
    {

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must login to post a comment!');
        }

        $validated = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required',
            'comment'       => 'required'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();
        try {

            $validated = $validated->validated();
            $validated['user_id'] = Auth::user()->id;
            $validated['post_id'] = $postId;
            Comment::create($validated);
            DB::commit();
            return redirect()->back()->with('success', 'Comment Posted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }
}
