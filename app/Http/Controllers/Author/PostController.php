<?php

namespace App\Http\Controllers\Author;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())
            ->latest()
            ->get();
        return view('author.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('author.posts.create');
    }

    public function store(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'title'        => 'required',
            'slug'         => 'required',
            'text_content' => 'required',
            'image'        => 'nullable|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();
        try {

            $validated = $validated->validated();
            $validated['user_id'] = Auth::user()->id;
            if ($request->hasFile('image')) {
                $validated['image'] = $this->customSaveImage($request->file('image'), 'post/post_image');
            }
            Post::create($validated);
            DB::commit();
            return redirect()->route('author.posts.index')->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('author.posts.index')->with('error', 'Something went wrong. Please try again later.' . $e)->withInput();
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('author.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'title'        => 'required',
            'slug'         => 'required',
            'text_content' => 'required',
            'image'        => 'nullable|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();
        try {

            $post = Post::findOrFail($id);
            $validated = $validated->validated();

            if ($request->hasFile('image')) {
                $oldImage = $post->image;
                if (file_exists($oldImage)) @unlink($oldImage);
                $validated['image'] = $this->customSaveImage($request->file('image'), 'post/post_image');
            }

            $post->update($validated);
            DB::commit();
            return redirect()->route('author.posts.index')->with('success', 'Post updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('author.posts.index')->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
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

    private function customSaveImage($file, $path)
    {
        $filename = uniqid() . time() . rand(10, 1000000) . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($path, $file, $filename);
        $fileUrl = 'storage/' . $path . '/' . $filename;
        return $fileUrl;
    }
}
