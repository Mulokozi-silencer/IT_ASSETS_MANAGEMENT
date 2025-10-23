<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceLog;
use App\Models\Asset;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maintenance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        // ✅ Validate form data
        $r->validate([
            'asset_id' => 'required|exists:assets,id',
            'description' => 'required|string|max:255',
        ]);

        // ✅ Create new maintenance log
        MaintenanceLog::create([
            'asset_id' => $r->asset_id,
            'user_id' => auth()->id(),
            'description' => $r->description,
            'status' => 'Pending',
            'scheduled_date' => $r->scheduled_date ?? now(),
        ]);

        // ✅ Update asset status
        Asset::find($r->asset_id)->update([
            'status' => 'Under Maintenance',
        ]);

        // ✅ Redirect back with success message
        return back()->with('success', 'Maintenance request created successfully!');
    }

    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
