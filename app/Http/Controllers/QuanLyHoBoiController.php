<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pool;
use Illuminate\Http\Request;

class QuanLyHoBoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pools = Pool::all();
        return view('admin.pool-management', compact('pools'));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'house_number' => 'required|string',
            'id_street' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'depth' => 'required|string',
            'type' => 'required|string',
            'opening_hours' => 'required|string',
            'close_hours' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png',
            'children_price' => 'required|numeric',
            'adult_price' => 'required|numeric',
            'student_price' => 'required|numeric',
        ]);

        // Tạo mới hồ bơi
        $pool = new Pool();
        $pool->name = $request->name;
        $pool->house_number = $request->house_number;
        $pool->id_street = $request->id_street;
        $pool->lat = $request->lat;
        $pool->lng = $request->lng;
        $pool->length = $request->length;
        $pool->width = $request->width;
        $pool->depth = $request->depth;
        $pool->type = $request->type;
        $pool->opening_hours = $request->opening_hours;
        $pool->close_hours = $request->close_hours;
        $pool->children_price = $request->children_price;
        $pool->adult_price = $request->adult_price;
        $pool->student_price = $request->student_price;

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('public/pool_images');
            $pool->img = basename($imagePath);
        }

        // Lưu vào cơ sở dữ liệu
        $pool->save();

        // Quay lại trang danh sách hồ bơi với thông báo thành công
        return redirect()->route('dashboard')->with('success', 'Thêm hồ bơi thành công!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DanhMuc $danhMuc)
    {
        return view('admin.danh-muc.edit', compact('danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DanhMuc $danhMuc)
    {
        $request->validate([
            'ten_danh_muc' => 'required|max:255|unique:danh_muc,ten_danh_muc,' . $danhMuc->id,
            'mo_ta' => 'nullable',
            'hien_thi' => 'boolean',
        ]);

        $danhMuc->update([
            'ten_danh_muc' => $request->ten_danh_muc,
            'slug' => Str::slug($request->ten_danh_muc),
            'mo_ta' => $request->mo_ta,
            'hien_thi' => $request->has('hien_thi'),
        ]);

        return redirect()->route('admin.danh-muc.index')
            ->with('success', 'Cập nhật danh mục thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DanhMuc $danhMuc)
    {
        try {
            $danhMuc->delete();
            return redirect()->route('admin.danh-muc.index')
                ->with('success', 'Xóa danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->route('admin.danh-muc.index')
                ->with('error', 'Không thể xóa danh mục này vì có sản phẩm liên quan.');
        }
    }
}
