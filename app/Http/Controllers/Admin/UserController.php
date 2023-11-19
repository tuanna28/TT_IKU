<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\EditUserRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = Customer::get();
        return view("admin.users.list", ['users' => $users]);
    }

    public function createUser()
    {
        return view('admin.users.create');
    }
    public function createUserPost(CreateUserRequest $request)
    {

        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;

        if (Auth::user()->role == 1) {
            $data['role'] = $request->role;
        }

        $user = Customer::create($data);
        if ($user) {
            return redirect(route('users.list'));
        };
        return redirect(route('users.create'));
    }
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',  compact('user'));
    }
    public function editUserPost(EditUserRequest $request,  $id)
    {
        $user = User::find($id);
        if ($request->isMethod('POST')) {
            $user->name = $request->name;
            $user->address = $request->address;
            $user->phone = $request->phone;
            if (Auth::user()->role === 1) {
                $user->role = $request->role;
            }
            $user->update();
            return redirect()->route('users.list')
                ->with('success', 'User update successfully');
        }
    }
    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.list')
            ->with('success', 'User update successfully');
    }
}
