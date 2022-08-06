<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Career;
use Illuminate\Support\Facades\Storage;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $careers = Career::latest()->get();
        return view('admin.careers.index', compact('careers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.careers.create');
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
            'job_type' => ['required', 'string', 'max:255'],
            'job_category' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'image'],
            'description' => ['required', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
        ]);

        $icon = $request->file('icon');
        $filename = Str::random(15) . '.' . $icon->extension();
        Storage::putFileAs("public", $icon, $filename);
        $data['icon'] = $filename;

        $data['slug'] = Str::slug($data['title'], '-');
        Career::Create($data);

        return redirect()->route('careers.index')->with('success', 'Career created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Career $career)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'job_category' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'icon' => ['nullable', 'image'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
        ]);

        if ($request->file('icon')) {
            $icon = $request->file('icon');
            $filename = Str::random(15) . '.' . $icon->extension();
            Storage::putFileAs("public", $icon, $filename);
            $data['icon'] = $filename;
        }

        $career->Update($data);
        return redirect()->route('careers.index')->with('success', 'Career updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->back()->with('success', 'Career deleted successfully.');
    }

    public function jobs(Career $career)
    {
        $jobs = $career->jobs;
        return view('admin.careers.jobs', compact('career', 'jobs'));
    }
}
