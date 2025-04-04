<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrationList = EventRegistration::with(['event', 'user'])->get();
        return view('admin.registrations.index', compact('registrationList'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $registration = EventRegistration::findOrFail($id);
        return view('admin.registrations.edit', compact('registration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registration = EventRegistration::findOrFail($id);
        $registration->status = $request->status;
        $registration->save();

        return redirect()->route('registrations.index')->with('success', 'Registration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registration = EventRegistration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registrations.index')->with('success', 'Registration deleted successfully.');
    }
}
