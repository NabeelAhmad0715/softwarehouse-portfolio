<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\LatestNew;

class LatestNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $latestNews = LatestNew::latest()->get();
        return view('admin.latest-news.index', compact('latestNews'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.latest-news.create');
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
            'published_date' => ['required', 'date'],
            'excerpt' => ['required', 'string'],
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
        LatestNew::Create($data);

        return redirect()->route('latest-news.index')->with('success', 'Latest News created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(LatestNew $latestNews)
    {
        return view('admin.latest-news.edit', compact('latestNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $latestNew)
    {
        $latestNew = LatestNew::find($latestNew);
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'published_date' => ['required', 'date'],
            'excerpt' => ['required', 'string'],
            'description' => ['required', 'string'],
            'featured_image' => ['nullable', 'image'],
            'body_image' => ['nullable', 'image'],
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

        $latestNew->Update($data);
        return redirect()->route('latest-news.index')->with('success', 'Latest News updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($latestNew)
    {
        $latestNew = LatestNew::find($latestNew);
        $latestNew->delete();
        return redirect()->back()->with('success', 'Latest News deleted successfully.');
    }
}
