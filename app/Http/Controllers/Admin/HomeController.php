<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $totalPosts       = Post::count();
        $totalAuthors     = User::where('role', 'author')->count();
        $totalUsers       = User::where('role', 'user')->count();
        $approvedComments = Comment::where('status', 'approved')->count();
        $pendingComments  = Comment::where('status', 'pending')->count();

        return view('admin.index', compact(
            'totalPosts',
            'totalAuthors',
            'totalUsers',
            'approvedComments',
            'pendingComments'
        ));
    }
}
