<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        //phone và pasword
        $credentials = $request->only('phone', 'password');
        // Kiểm tra thông tin đăng nhập
        //không dùng attempt
        $user = User::where('phone', $credentials['phone'])->first();
        // dd($user);
        if ($user) {
            // Đăng nhập thành công
            Auth::login($user);
            return redirect()->route('dashboard');  // Chuyển hướng đến trang admin
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->withErrors(['phone' => 'Thông tin đăng nhập không chính xác.']);
        }

    }

    public function index()
    {
        if (Auth::check()) {
            return view('admin.index');  // Chuyển hướng đến trang admin nếu đã đăng nhập
        } else {
            return redirect()->route('login.form');  // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
        }
    }

    public function logout()
    {
        Auth::logout();  // Đăng xuất người dùng
        return redirect()->route('login');  // Chuyển hướng đến trang đăng nhập
    }
    public function showRegisterForm()
    {
        return view('register');  // Chuyển hướng đến view đăng ký
    }
    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 'user';  // Set default role
        $user->save();

        return redirect()->route('login.form')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
    }
}
