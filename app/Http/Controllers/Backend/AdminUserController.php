<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->paginate(10);
        $userCount = User::count();
        return view('admin.user.index', compact('users', 'userCount'));
    }
    public function create()
    {
        return "User create page is comming soon";
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()
            ->with('delete_message', 'User deleted successfully');

    }
}
