<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pool;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $pools = Pool::all();
        return view('admin.events.create', compact('pools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'type' => 'required|string|max:255',
            'organization_date' => 'required|date',
            'max_participants' => 'required|integer',
            'price' => 'required|numeric',
            'id_pool' => 'required|exists:pools,id_pool', // Kiểm tra sự tồn tại của hồ bơi
        ]);

        // Tạo sự kiện mới
        $event = Event::create($validatedData);

        // Quay lại trang danh sách sự kiện và thông báo thành công
        return redirect()->route('events.index')->with('success', 'Sự kiện đã được thêm thành công!');
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
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
}
