<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Map;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $maps = Map::latest()->get();
        return view('admin.maps.index', compact('maps'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.maps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:maps'],
            'map' => ['required', 'image'],
        ]);

        $mapImage = $request->file('map');
        $filename = Str::random(15) . '.' . $mapImage->extension();
        Storage::putFileAs("public", $mapImage, $filename);
        $data['map'] = $filename;
        Map::Create($data);
        return redirect()->route('maps.index')->with('success', 'Map added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Map $map)
    {
        return view('admin.maps.edit', compact('map'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Map $map)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:maps,title,' . $map->id],
            'map' => ['nullable', 'image'],
        ]);

        if ($request->file('map')) {
            $mapImage = $request->file('map');
            $filename = Str::random(15) . '.' . $mapImage->extension();
            Storage::putFileAs("public", $mapImage, $filename);
            $data['map'] = $filename;
        }
        $map->update($data);
        return redirect()->route('maps.index')->with('success', 'Project updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Map $map)
    {
        Storage::delete($map->map);
        $map->delete();
        return redirect()->back()->with('success', 'Map deleted successfully.');
    }
}
