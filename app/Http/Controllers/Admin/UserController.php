<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function authors()
    {
        $authors = User::where('role', 'author')->latest()->get();
        return view('admin.authors.index', compact('authors'));
    }

    public function users()
    {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function toggleBlockUser($id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->is_block = !$user->is_block;
            $user->update();
            if ($user->is_block) {
                DB::table('sessions')->where('user_id', $user->id)->delete();
            }
            DB::commit();
            return redirect()->route('admin.users.index')->with('success', 'User status updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.users.index')->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function toggleBlockAuthor($id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->is_block = !$user->is_block;
            $user->update();
            if ($user->is_block) {
                DB::table('sessions')->where('user_id', $user->id)->delete();
            }
            DB::commit();
            return redirect()->route('admin.authors.index')->with('success', 'User status updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.authors.index')->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
