<?php

namespace App\Http\Controllers\Author;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $totalPosts  = Post::count();
        return view('author.index', compact('totalPosts'));
    }
}
