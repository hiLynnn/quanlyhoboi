<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\PoolService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $poolServices = PoolService::with(['service', 'pool'])->get();
        return view('admin.services.index', compact('poolServices'));
    }

    public function create()
    {
        $services = Service::all();
        $pools = Pool::all();

        return view('admin.services.create', compact('services', 'pools'));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'service_id' => 'required|exists:services,id_service',
            'pool_id' => 'required|exists:pools,id_pool',
            'price' => 'required|numeric',
        ]);

        // Tạo bản ghi mới trong bảng pool_services
        PoolService::create([
            'id_service' => $request->service_id,
            'id_pool' => $request->pool_id,
            'price' => $request->price,
        ]);

        // Chuyển hướng về trang danh sách hoặc thông báo thành công
        return redirect()->route('services.index')->with('success', 'Dịch vụ đã được thêm thành công!');
    }


    public function edit($id)
    {
        // Lấy dịch vụ theo id
        $service = Service::findOrFail($id);

        // Trả về view với dữ liệu dịch vụ để chỉnh sửa
        return view('admin.services.edit', compact('service'));
    }

    public function destroy($id)
    {
        $poolService = PoolService::findOrFail($id);
        $poolService->delete();
        return redirect()->route('services.index')->with('success', 'Dịch vụ đã bị xóa!');
    }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu nếu cần
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Tìm dịch vụ cần cập nhật
        $service = Service::findOrFail($id);

        // Cập nhật thông tin dịch vụ
        $service->name = $request->input('name');
        $service->save();

        // Chuyển hướng về trang danh sách và thông báo thành công
        return redirect()->route('services.index')->with('success', 'Dịch vụ đã được cập nhật!');
    }
}
