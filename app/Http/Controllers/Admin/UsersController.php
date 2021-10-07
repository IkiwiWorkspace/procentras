<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function deleteUser($id)
    {
        User::destroy($id);

        return redirect()->back()->with('message', 'User was deleted');
    }
    public function getCreateUser() 
    {
        return view('dashboard.addUser');
    }
    public function createUser(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);
        $input['password'] = bcrypt($request->input('password'));

        User::create($input);

        return redirect()->back()->with('message', 'User was created');
    }
    public function getEditUser($id)
    {   
        $user = User::find($id);

        return view('dashboard.editUser', compact('user'));
    }
    public function editUser(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->back()->with('message', 'User was updated');
    }
}
