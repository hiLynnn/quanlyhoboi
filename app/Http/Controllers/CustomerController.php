<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'customer') {
            $pools = Pool::all();
            return view('customer.index',compact('pools'));  // Chuyển hướng đến trang khách hàng nếu đã đăng nhập
        } else {
            return redirect()->route('login.form');  // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = User::find($id);
        if ($customer) {
            return view('customer.profile', compact('customer'));
        } else {
            return redirect()->back()->withErrors(['error' => 'Không tìm thấy khách hàng.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = User::find($id);
        if ($customer) {
            $data = $request->all();

            // Nếu có password thì mã hóa
            if (!empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                // Nếu không có thì bỏ trường password để không cập nhật
                unset($data['password']);
            }

            $customer->update($data);
            return redirect()->route('customers')->with('success', 'Cập nhật thông tin thành công.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Không tìm thấy khách hàng.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout()
    {
        Auth::logout();  // Đăng xuất người dùng
        return redirect()->route('login');  // Chuyển hướng đến trang đăng nhập
    }
}
