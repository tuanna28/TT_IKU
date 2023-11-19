<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginPost(LoginAdminRequest $request)
    {
        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('admin');
        }
        $error = 'Sai thông tin đăng nhập!';
        return redirect()->back()->withErrors(['error' => $error])->with('error', $error);
    }

    function logout()
    {
        FacadesSession::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
