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
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        $services = Service::all();

        return view('admin.service.create', compact('services'));
    }

    public function store(Request $request)
    {
        $service = new Service();
        $service->name = $request->input('name');
        $service->save();
        return redirect()->route('dich-vu.index')->with('success', 'Dịch vụ đã được thêm thành công!');
    }


    public function edit($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('dich-vu.index')->with('error', 'Không tìm thấy dịch vụ.');
        }
        return view('admin.service.edit', compact('service'));
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('dich-vu.index')->with('error', 'Không tìm thấy dịch vụ.');
        }

        $service->delete();
        return redirect()->route('dich-vu.index')->with('success', 'Dịch vụ đã được xóa thành công!');
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('dich-vu.index')->with('error', 'Không tìm thấy dịch vụ.');
        }

        $service->name = $request->input('name');
        $service->save();

        return redirect()->route('dich-vu.index')->with('success', 'Dịch vụ đã được cập nhật thành công!');

    }
}
