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
       $poolService = PoolService::findOrFail($id);
       $services = Service::findOrFail($poolService->id_service);

       return view('admin.services.edit', compact('poolService', 'services'));
    }

    public function destroy($id)
    {
        $poolService = PoolService::findOrFail($id);
        $poolService->delete();
        return redirect()->route('services.index')->with('success', 'Dịch vụ đã bị xóa!');
    }

    public function update(Request $request, $id)
    {
        // Tìm thông tin của dịch vụ trong bảng pool_services
        $poolService = PoolService::findOrFail($id);

        // Cập nhật giá dịch vụ
        $poolService->price = $request->input('price');
        $poolService->save();

        // Chuyển hướng về danh sách dịch vụ với thông báo thành công
        return redirect()->route('services.index')->with('message', 'Cập nhật dịch vụ thành công!');
    }
}
