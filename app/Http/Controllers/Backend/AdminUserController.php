<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserCreateRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends BackendController
{
    public function index()
    {
        $users = User::with('posts')->paginate(10);
        $userCount = User::count();
        return view('admin.user.index', compact('users', 'userCount'));
    }
    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserCreateRequest $request)
    {
        if(trim($request->password == '')) {
            $input = $request->except('password');
        }
        else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        $user = User::create($input);
        $user->attachRole($request->role);

        return redirect('admin/users')->with('create_message', 'User create successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'confirmed',
            'role'=>'required'
        ];
        $this->validate($request, $rules);

        $user = User::findOrFail($id);

        if(trim($request->password == ''))
        {
            $input = $request->except('password');
        }
        else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user->update($input);
        $user->detachRoles();
        $user->attachRole($request->role);
        return redirect('admin/users')->with('update_message', 'User update successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()
            ->with('delete_message', 'User deleted successfully');

    }
}
