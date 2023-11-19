<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePassRequest;
use App\Http\Requests\Auth\MyAccountRequest;
use App\Http\Requests\Auth\ResetPassRequest;
use App\Http\Requests\Auth\SigninRequest;
use App\Http\Requests\Auth\SignupRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;
use Laravel\Prompts\Prompt;

class UserController extends Controller
{
    // Login
    public function signin()
    {
        return view('client/customer/signin');
    }
    public function signinPost(SigninRequest $request)
    {
        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('home');
        } else {
            $error = 'Bạn sai thông tin Username hoặc Password!';
            return redirect()->back()->withErrors(['error' => $error])->with('loginError', $error);
        }
    }

    // SignUp
    public function signup()
    {
        return view('client/customer/signup');
    }
    public function signupPost(SignupRequest $request)
    {
        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = Customer::create($data);

        if (!$user) {
            return redirect(route('signup'));
        } else {
            return redirect(route('signin'));
        }
    }

    // Logout
    function logout()
    {
        FacadesSession::flush();
        Auth::logout();
        return redirect()->route('signin');
    }

    //My-account
    public function showDetail()
    {
        $user = Auth::user();
        return view('client.customer.my-Account.editDetail', ['user' => $user]);
    }
    public function editDetail(MyAccountRequest $request)
    {
        $user = Auth::user();
        if ($request->isMethod('POST')) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->save();
            return redirect()->route('my.account.detail')
                ->with('success', 'User update successfully');
        }
    }
    public function showPass()
    {
        return view('client.customer.my-account.editPass');
    }
    public function changePass(ChangePassRequest $request)
    {
        $user = Auth::user();
        if ($request->isMethod('POST')) {
            if (Hash::check($request->password, $user->password)) {
                if ($request->newpassword == $request->cfpassword) {
                    $user->password = Hash::make($request->password);
                    $user->save();
                    return redirect()->route('my.account.pass')
                        ->with('success', 'Đổi mật khẩu thành công');
                } else {
                    $pass2 = 'Bạn phải nhập đúng Mật khẩu mới!';
                    return redirect()->back()->withErrors(['error' => $pass2])->with('Errorpass2', $pass2);
                }
            } else {
                $pass1 = 'Bạn nhập sai Mật khẩu cũ!';
                return redirect()->back()->withErrors(['error' => $pass1])->with('Errorpass1', $pass1);
            }
        }
    }

    public function forgetPassword()
    {
        return view('client.customer.forgetPass');
    }
    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users|unique:password_reset_tokens'
        ], [
            'email.required' => 'Bạn hãy nhập Email!',
            'email.email' => 'Bạn hãy nhập đúng định dạng Email!',
            'email.exists' => 'Email của bạn không tồn tại trên hệ thống!',
            'email.unique' => 'Đường dẫn đặt lại mật khẩu đã được gửi tới Email của bạn!',
        ]);
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
        ]);
        Mail::send('client/customer/resetPass', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return redirect()->route('forget.password')->with('success', 'Bạn hãy truy cập vào đường dẫn trong Email để đặt lại Mật khẩu!');
    }

    public function resetPassword($token)
    {
        return view('client.customer.newPass', compact('token'));
    }
    public function resetPasswordPost(ResetPassRequest $request)
    {
        $updatePass = DB::table('password_reset_tokens')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if ($updatePass) {
            if ($request->password == $request->password_confirm) {
                User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
                DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
                return redirect()->route('signin')->with('success', 'Mật khẩu của bạn đã được đặt lại hãy đăng nhập thôi!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Confirm Password phải trùng với New Password!'])->with('error', 'Confirm Password phải trùng với New Password!');
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Đang bị lỗi!'])->with('error', 'Đang bị lỗi!');
        }
    }
}
