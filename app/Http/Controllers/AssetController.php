<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index()
    {
        $assets = auth()->user()->assignments()
            ->with('asset.category')
            ->where('status', 'Active')
            ->paginate(15);

        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        return view('dashboard.assets-create'); // make sure this view exists
    }

    public function store(Request $request)
    {
        $request->validate([
            'asset_name'    => 'required|string|max:255',
            'serial_number' => 'required|string|max:255|unique:assets,serial_number',
            'category_id'   => 'required|exists:categories,id',
            'purchase_date' => 'nullable|date',
            'status'        => 'required|string|in:Available,Assigned,Under Maintenance',
            'condition'     => 'nullable|string|max:255',
            'location'      => 'nullable|string|max:255',
            'notes'         => 'nullable|string',
        ]);

        Asset::create($request->only([
            'asset_name', 'serial_number', 'category_id', 'status', 
            'purchase_date', 'condition', 'location', 'notes'
        ]));

        return redirect()->route('assets.my')->with('success', 'Asset added successfully!');
    }

    public function edit(Asset $asset)
    {
        return view('dashboard.assets-edit', compact('asset'));
    }

    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'asset_name' => 'required|string|max:255',
            'status'     => 'required|string|in:Available,Assigned,Under Maintenance',
        ]);

        $asset->update($request->only(['asset_name','status']));

        return redirect()->route('assets.my')->with('success', 'Asset updated successfully!');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.my')->with('success', 'Asset deleted successfully!');
    }

    public function show(Asset $asset)
    {
        return view('dashboard.assets-show', compact('asset'));
    }
}
