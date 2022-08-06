<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Http\Controllers\Controller;
use App\ContactEnquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Portfolio;
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
        $services = Service::take(5)->get();
        $portfolio = Portfolio::latest()->get();
        $blogs = Blog::latest()->take(4)->get();
        return view('frontend.pages.home', compact('services', 'portfolio', 'blogs',));
    }
    public function aboutUs()
    {
        return view('frontend.pages.about-us');
    }

    public function portfolio()
    {
        $portfolio = Portfolio::all();
        return view('frontend.pages.portfolio', compact('portfolio'));
    }

    public function service()
    {
        $services = Service::latest()->get();
        return view('frontend.pages.services', compact('services'));
    }

    public function serviceDetails(Service $service)
    {
        $portfolio = Portfolio::latest()->get();
        return view('frontend.pages.service-detail', compact('service', 'portfolio'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->get();
        return view('frontend.pages.blogs', compact('blogs'));
    }

    public function blogDetails(Blog $blog)
    {
        $relatedBlogs = Blog::where('id', '!=', $blog->id)->take(4)->get();
        return view('frontend.pages.blog-detail', compact('blog', 'relatedBlogs'));
    }

    public function latestNews()
    {
        $latestNews = LatestNew::latest()->get();
        return view('frontend.pages.latest-news', compact('latestNews'));
    }

    public function latestNewsDetails(LatestNew $latestNew)
    {
        $relatedLatestNews = LatestNew::where('id', '!=', $latestNew->id)->take(4)->get();
        return view('frontend.pages.latest-news-detail', compact('latestNew', 'relatedLatestNews'));
    }

    public function jobs()
    {
        $careers = Career::latest()->get();
        return view('frontend.pages.jobs', compact('careers'));
    }

    public function jobDetails(Career $career)
    {
        return view('frontend.pages.job-details', compact('career'));
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
            'cv' => ['required', 'file', 'mimes:pdf,docx'],
        ]);

        $data['city'] = 'uk';
        $data['career_id'] = $career->id;

        $cv = $request->file('cv');
        $filename = Str::random(15) . '.' . $cv->extension();
        Storage::putFileAs("public", $cv, $filename);
        $data['cv'] = $filename;


        Job::create($data);
        $request->session()->flash('success', 'Your Request Submit successfully. Thankyou for choosing Cloudily');
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

        Mail::to('contact@cloudily.uk')->send(new ContactMail($data['name'], $data['email'], $data['phone'], $data['comment']));

        return response()->json([
            'message' => "Thank you your request has been submitted",
            'error' => false
        ]);
    }
}
