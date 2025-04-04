<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');  // Chuyển hướng tới view đăng nhập
    }
    public function login(Request $request)
    {
            // Validate dữ liệu đầu vào
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        // Lấy thông tin người dùng từ cơ sở dữ liệu dựa trên số điện thoại
        $user = User::where('phone', $request->phone)->first();

        if ($user && $user->password === $request->password) {
            // Nếu người dùng tồn tại và mật khẩu khớp
            Auth::login($user);  // Đăng nhập người dùng vào hệ thống

            return redirect()->route('dashboard');  // Chuyển hướng đến trang dashboard
        }

        // Nếu không tìm thấy người dùng hoặc mật khẩu không đúng
        return back()->withErrors([
            'phone' => 'Thông tin đăng nhập không đúng.',
        ]);
    }
    public function index()
    {
        return view('admin.index');
    }
}
