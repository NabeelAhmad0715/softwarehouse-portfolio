<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Portfolio;

class PortfolioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.index', compact('portfolio'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.portfolio.create');
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
            'link' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'featured_image' => ['required', 'image'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
        ]);

        $featured_image = $request->file('featured_image');
        $filename = Str::random(15) . '.' . $featured_image->extension();
        Storage::putFileAs("public", $featured_image, $filename);
        $data['featured_image'] = $filename;

        $data['slug'] = Str::slug($data['title'], '-');
        Portfolio::Create($data);

        return redirect()->route('portfolio.index')->with('success', 'Latest News created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
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

        $portfolio->Update($data);
        return redirect()->route('portfolio.index')->with('success', 'Portfolio updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->back()->with('success', 'Portfolio deleted successfully.');
    }
}
