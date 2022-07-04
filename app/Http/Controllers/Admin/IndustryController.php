<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Industry;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $industries = Industry::latest()->get();
        return view('admin.industries.index', compact('industries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.industries.create');
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
            'title' => ['required', 'string', 'max:255', 'unique:industries'],
            'display_order' => ['required', 'integer'],
            'bg_color' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'featured_image' => ['required', 'image'],
            'body_image' => ['required', 'image'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
        ]);

        $featured_image = $request->file('featured_image');
        $filename = Str::random(15) . '.' . $featured_image->extension();
        Storage::putFileAs("public", $featured_image, $filename);
        $data['featured_image'] = $filename;

        $body_image = $request->file('body_image');
        $filename = Str::random(15) . '.' . $body_image->extension();
        Storage::putFileAs("public", $body_image, $filename);
        $data['body_image'] = $filename;

        $data['slug'] = Str::slug($data['title'], '-');
        Industry::Create($data);

        return redirect()->route('industries.index')->with('success', 'industry created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Industry $industry)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:industries,title,' . $industry->id],
            'display_order' => ['required', 'integer'],
            'bg_color' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'featured_image' => ['required', 'image'],
            'body_image' => ['required', 'image'],
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

        if ($request->file('body_image')) {
            $body_image = $request->file('body_image');
            $filename = Str::random(15) . '.' . $body_image->extension();
            Storage::putFileAs("public", $body_image, $filename);
            $data['body_image'] = $filename;
        }

        $industry->Update($data);
        return redirect()->route('industries.index')->with('success', 'ind$industry updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Industry $industry)
    {
        $industry->delete();
        return redirect()->back()->with('success', 'Industry deleted successfully.');
    }

}
