<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::latest()->get();
        return view('sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sectors', 'public');
            $data['image'] = $imagePath;
        }

        Sector::create($data);

        return redirect()->route('sectors.index')->with('success', 'Data sektor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $sector)
    {
        return view('sectors.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sector $sector)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($sector->image) {
                Storage::disk('public')->delete($sector->image);
            }
            $imagePath = $request->file('image')->store('sectors', 'public');
            $data['image'] = $imagePath;
        }

        $sector->update($data);

        return redirect()->route('sectors.index')->with('success', 'Data sektor berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        if ($sector->image) {
            Storage::disk('public')->delete($sector->image);
        }
        $sector->delete();

        return redirect()->route('sectors.index')->with('success', 'Data sektor berhasil dihapus');
    }
}
