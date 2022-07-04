<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Career;
use App\Industry;
use App\Blog;
use App\LatestNew;
use App\Service;
use App\Testimonial;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $industries = Industry::all()->count();
        $careers = Career::all()->count();
        $latestNews = LatestNew::all()->count();
        $blogs = Blog::all()->count();
        $services = Service::all()->count();
        $testimonials = Testimonial::all()->count();
        return view('admin.pages.home', compact( 'industries', 'careers', 'latestNews', 'blogs', 'services', 'testimonials'));
    }
    public function editProfile()
    {
        return view('admin.pages.profile');
    }
    public function updateProfile(Request $request)
    {
        $admin = Admin::find(Auth::user()->id);
        $data = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:admins,username,' . $admin->id]
        ]);

        $admin->update($data);
        return redirect()->back()->with('success', 'Username updated successfully.');
    }
}
