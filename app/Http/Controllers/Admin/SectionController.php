<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Section;
use App\Blog;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Blog $blog)
    {
        $sections = $blog->sections;
        return view('admin.sections.index', compact('sections', 'blog'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Blog $blog)
    {
        return view('admin.sections.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image'],
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $filename = Str::random(15) . '.' . $image->extension();
            Storage::putFileAs("public", $image, $filename);
            $data['image'] = $filename;
        }

        $data['blog_id'] = $blog->id;
        $data['slug'] = Str::slug($data['title'], '-');
        Section::Create($data);

        return redirect()->route('sections.index', [$blog->id])->with('success', 'Section created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Blog $blog, Section $section)
    {
        return view('admin.sections.edit', compact('blog', 'section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Blog $blog, Section $section)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image'],
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $filename = Str::random(15) . '.' . $image->extension();
            Storage::putFileAs("public", $image, $filename);
            $data['image'] = $filename;
        }

        $data['blog_id'] = $blog->id;
        $section->Update($data);
        return redirect()->route('sections.index', [$blog->id])->with('success', 'Section updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, Section $section)
    {
        $section->delete();
        return redirect()->route('sections.index', [$blog->id])->with('success', 'Section deleted successfully.');
    }
}
