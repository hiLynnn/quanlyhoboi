<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\Street;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pools = Pool::all();
        return view('admin.pools.index',compact('pools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $streets = Street::all();
        return view('admin.pools.create',compact('streets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'house_number' => 'required|string|max:255',
            'id_street' => 'required|integer',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'depth' => 'required|numeric',
            'type' => 'required|string',
            'opening_hours' => 'required|date_format:H:i',
            'close_hours' => 'required|date_format:H:i',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'children_price' => 'required|numeric',
            'adult_price' => 'required|numeric',
            'student_price' => 'required|numeric',
        ]);

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Tạo hồ bơi mới
        $pool = new Pool();
        $pool->name = $validatedData['name'];
        $pool->house_number = $validatedData['house_number'];
        $pool->id_street = $validatedData['id_street'];
        $pool->lat = $validatedData['lat'];
        $pool->lng = $validatedData['lng'];
        $pool->length = $validatedData['length'];
        $pool->width = $validatedData['width'];
        $pool->depth = $validatedData['depth'];
        $pool->type = $validatedData['type'];
        $pool->opening_hours = $validatedData['opening_hours'];
        $pool->close_hours = $validatedData['close_hours'];
        $pool->img = $imagePath;
        $pool->children_price = $validatedData['children_price'];
        $pool->adult_price = $validatedData['adult_price'];
        $pool->student_price = $validatedData['student_price'];

        // Lưu hồ bơi vào cơ sở dữ liệu
        $pool->save();

        // Trả về thông báo thành công và chuyển hướng
        return redirect()->route('pools.index')->with('message', 'Hồ bơi đã được thêm thành công!');
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
    public function edit(string $id)
    {
        $pool = Pool::findOrFail($id);
        $streets = Street::all();
        return view('admin.pools.edit', compact('pool', 'streets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Lấy hồ bơi cần chỉnh sửa
    $pool = Pool::find($id);

    // Kiểm tra nếu hồ bơi không tồn tại
    if (!$pool) {
        return redirect()->route('pools.index')->with('error', 'Hồ bơi không tồn tại');
    }

    // Validate dữ liệu form
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string',
        // Thêm các trường khác cần validation...
    ]);

    // Cập nhật hồ bơi
    $pool->name = $request->name;
    $pool->type = $request->type;
    // Thực hiện các cập nhật khác, ví dụ: image, địa chỉ, v.v.
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $pool->image = $imagePath;
    }
    // Lưu hồ bơi đã cập nhật
    $pool->save();

    // Redirect về danh sách hồ bơi sau khi cập nhật thành công
    return redirect()->route('pools.index')->with('success', 'Cập nhật hồ bơi thành công');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pool = Pool::findOrFail($id);
        $pool->delete();

        return redirect()->route('pools.index')->with('message', 'Hồ bơi đã được xóa thành công!');
    }
}
