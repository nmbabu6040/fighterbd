<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use App\Models\Setting;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Counter;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::all();
        $settings = Setting::first();
        $services = Service::where('status', 1)->take(6)->get();
        $serviceHeader = Service::where('status', 1)->first();
        $galleries = Gallery::where('status', 1)->orderBy('sort_order', 'asc')->latest()->take(6)->get();
        $counters = Counter::all();
        $teams = Team::where('status', 1)->orderBy('sort_order', 'asc')->latest()->take(3)->get();
        $testimonials = Testimonial::all();
        $blogs = Blog::where('status', 1)
            ->orderByDesc('published_at')
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.home', compact('sliders', 'settings', 'services', 'serviceHeader', 'counters', 'galleries', 'teams', 'testimonials', 'blogs'));
    }

    public function about()
    {
        $settings = Setting::first();
        $testimonials = Testimonial::all();
        return view('frontend.about', compact('settings', 'testimonials'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function service()
    {
        $services = Service::where('status', 1)->take(6)->get();
        $serviceHeader = Service::where('status', 1)->first();
        $counters = Counter::all();
        return view('frontend.service', compact('services', 'serviceHeader', 'counters'));
    }

    public function gallery()
    {
        $galleries = Gallery::where('status', 1)->orderBy('sort_order', 'asc')->latest()->take(12)->get();
        return view('frontend.gallery', compact('galleries'));
    }

    public function blog()
    {
        $blogs = Blog::where('status', 1)
            ->orderByDesc('published_at')
            ->latest()
            ->take(12)
            ->get();
        return view('frontend.blog', compact('blogs'));
    }

    public function blog_details($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('frontend.blog_details', compact('blog'));
    }

    public function team()
    {
        $teams = Team::where('status', 1)->orderBy('sort_order', 'asc')->latest()->take(12)->get();
        return view('frontend.team', compact('teams'));
    }

    public function team_details(Team $team)
    {
        abort_unless($team->status, 404);

        return view('frontend.team_details', compact('team'));
    }
}
