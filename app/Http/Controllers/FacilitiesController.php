<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\PoolUtility;
use App\Models\Utility;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poolUtilities = PoolUtility::with(['utility', 'pool'])->get();;
        return view('admin.facilities.index', compact('poolUtilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pools = Pool::all();
        $utilities = Utility::all();
        return view('admin.facilities.create', compact('pools', 'utilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'pool_id' => 'required|exists:pools,id_pool',
            'id_utility' => 'required|exists:utilities,id_utility',
        ]);


        PoolUtility::create([
            'id_pool' => $request->pool_id,
            'id_utility' => $request->id_utility,

        ]);

        // Chuyển hướng về trang danh sách hoặc thông báo thành công
        return redirect()->route('facilities.index')->with('success', 'Tiện ích đã được thêm thành công!');
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
        $poolUtility = PoolUtility::findOrFail($id);
        $pools = Pool::all();
        $utilities = Utility::all();
        return view('admin.facilities.edit', compact('poolUtility', 'pools', 'utilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_utility' => 'required|exists:utilities,id_utility',
        ]);

        $poolUtility = PoolUtility::findOrFail($id);
        $poolUtility->id_utility = $request->id_utility;
        $poolUtility->save();
        return redirect()->route('facilities.index')->with('success', 'Tiện ích đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poolUtility = PoolUtility::findOrFail($id);
        $poolUtility->delete();
        return redirect()->route('facilities.index')->with('success', 'Tiện ích đã bị xóa!');
    }
}
