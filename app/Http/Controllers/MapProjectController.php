<?php

namespace App\Http\Controllers;

use App\Models\MapProject;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = MapProject::latest()->get();
        $sectors = Sector::orderBy('name')->get();
        return view('map_projects.index', compact('projects', 'sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $sectors = Sector::orderBy('name')->get();
        // return view('map_projects.create', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sector' => 'required',
            'address' => 'required',
            'description' => 'required',
            'condition' => 'nullable',
            'investment_opportunity' => 'nullable',
            'latitude' => 'required',
            'longitude' => 'required',
            'image.*' => 'image|max:2048',
        ]);

        $images = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $images[] = $file->store('map-projects', 'public');
            }
        }

        MapProject::create([
            'name' => $request->name,
            'sector' => $request->sector,
            'address' => $request->address,
            'description' => $request->description,
            'condition' => $request->condition,
            'investment_opportunity' => $request->investment_opportunity,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $images,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(MapProject $mapProject)
    {
        return view('map_projects.show', compact('mapProject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MapProject $mapProject)
    {
        $sectors = Sector::orderBy('name')->get();
        return view('map_projects.edit', compact('mapProject', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, MapProject $mapProject)
    {
        $existing = json_decode($request->existing_images, true) ?? [];

        $newImages = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $newImages[] = $file->store('projects', 'public');
            }
        }

        $mapProject->update([
            'name' => $request->name,
            'sector' => $request->sector,
            'address' => $request->address,
            'description' => $request->description,
            'condition' => $request->condition,
            'investment_opportunity' => $request->investment_opportunity,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => array_merge($existing, $newImages),
        ]);

        return back()->with('success', 'Data berhasil diperbarui');
    }


    // public function update(Request $request, MapProject $mapProject)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'address' => 'required',
    //         'description' => 'required',
    //         'sector' => 'required',
    //         'condition' => 'nullable',
    //         'investment_opportunity' => 'nullable',
    //         'latitude' => 'required',
    //         'longitude' => 'required',
    //         'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $data = $request->all();

    //     if ($request->hasFile('image')) {
    //         if ($mapProject->image) {
    //             Storage::disk('public')->delete($mapProject->image);
    //         }
    //         $imagePath = $request->file('image')->store('map_projects', 'public');
    //         $data['image'] = $imagePath;
    //     }

    //     $mapProject->update($data);

    //     return redirect()->route('map-projects.index')->with('success', 'Data pemetaan berhasil diperbarui');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MapProject $mapProject)
    {
        if ($mapProject->image) {
            Storage::disk('public')->delete($mapProject->image);
        }
        $mapProject->delete();

        return redirect()->route('map-projects.index')->with('success', 'Data pemetaan berhasil dihapus');
    }
}
