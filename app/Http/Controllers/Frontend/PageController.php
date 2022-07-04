<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Http\Controllers\Controller;
use App\ContactEnquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Industry;
use App\Service;
use App\Testimonial;
use App\LatestNew;
use App\Career;
use App\Job;
use App\Map;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }

    public function service()
    {
        $services = Service::latest()->get();
        return view('frontend.pages.services', compact('services'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->get();
        return view('frontend.pages.blogs', compact('blogs'));
    }

    public function blogDetails(Blog $blog)
    {
        $relatedBlogs = Blog::where('id', '!=', $blog->id)->take(4)->get();
        return view('frontend.pages.blog-details', compact('blog', 'relatedBlogs'));
    }

    public function latestNews()
    {
        $latestNews = LatestNew::latest()->get();
        return view('frontend.pages.latest-news', compact('latestNews'));
    }

    public function latestNewsDetails(LatestNew $latestNew)
    {
        $relatedLatestNews = LatestNew::where('id', '!=', $latestNew->id)->take(4)->get();
        return view('frontend.pages.latest-news-details', compact('relatedLatestNews', 'latestNew'));
    }

    public function careers()
    {
        $careers = Career::latest()->get();
        return view('frontend.pages.careers', compact('careers'));
    }

    public function careerJob(Career $career)
    {
        return view('frontend.pages.jobs', compact('career'));
    }

    public function careerJobApply(Request $request, Career $career)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'cv' => ['required', 'file', 'mimes:pdf,docx'],
        ]);
        $data['career_id'] = $career->id;

        $cv = $request->file('cv');
        $filename = Str::random(15) . '.' . $cv->extension();
        Storage::putFileAs("public", $cv, $filename);
        $data['cv'] = $filename;


        Job::create($data);
        $request->session()->flash('success', 'Your Request Submit successfully. Thankyou for choosing Titanium');
        $request->session()->flash('alert-class', 'alert alert-success');
        return redirect()->back();
    }
    public function contactUs()
    {
        return view('frontend.pages.contact-us');
    }

    public function contactEnquiry(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'comment' => ['nullable', 'string']
        ]);
        ContactEnquiry::create($data);

        Mail::to($request->email)->send(new ContactMail());

        $request->session()->flash('success', 'Your Request Submit successfully');
        $request->session()->flash('alert-class', 'alert alert-success');
        return redirect()->back();
    }
}
