<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.services.create');
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['required', 'image'],
            'featured_image' => ['required', 'image'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
        ]);

        $featured_image = $request->file('featured_image');
        $filename = Str::random(15) . '.' . $featured_image->extension();
        Storage::putFileAs("public", $featured_image, $filename);
        $data['featured_image'] = $filename;

        $icon = $request->file('icon');
        $filename = Str::random(15) . '.' . $icon->extension();
        Storage::putFileAs("public", $icon, $filename);
        $data['icon'] = $filename;


        $data['slug'] = Str::slug($data['title'], '-');
        Service::Create($data);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'image'],
            'featured_image' => ['nullable', 'image'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
        ]);

        if ($request->file('featured_image')) {
            $featured_image = $request->file('featured_image');
            $filename = Str::random(15) . '.' . $featured_image->extension();
            Storage::putFileAs("public", $featured_image, $filename);
            $data['featured_image'] = $filename;
        }

        if ($request->file('icon')) {
            $icon = $request->file('icon');
            $filename = Str::random(15) . '.' . $icon->extension();
            Storage::putFileAs("public", $icon, $filename);
            $data['icon'] = $filename;
        }

        $service->Update($data);
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted successfully.');
    }
}
