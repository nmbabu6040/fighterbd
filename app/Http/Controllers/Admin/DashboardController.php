<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\HeroSlider;
use App\Models\Counter;

class DashboardController extends Controller
{
    public function index()
    {
        // =========================
        // Total Counts
        // =========================

        $userCount = User::count();

        $blogCount = Blog::count();

        $serviceCount = Service::count();

        $galleryCount = Gallery::count();

        $teamCount = Team::count();

        $testimonialCount = Testimonial::count();

        $contactCount = Contact::count();

        $sliderCount = HeroSlider::count();

        $counterCount = Counter::count();


        // =========================
        // Unread Messages
        // =========================

        $unreadContactCount = Contact::where('status', 0)->count();


        // =========================
        // Active Counts
        // =========================

        $activeBlogCount = Blog::where('status', 1)->count();

        $activeServiceCount = Service::where('status', 1)->count();

        $activeGalleryCount = Gallery::where('status', 1)->count();

        $activeTeamCount = Team::where('status', 1)->count();

        $activeTestimonialCount = Testimonial::where('status', 1)->count();

        $activeSliderCount = HeroSlider::where('status', 1)->count();


        // =========================
        // Recent Activity
        // =========================

        $recentBlogs = Blog::latest()
            ->take(3)
            ->get();

        $recentContacts = Contact::latest()
            ->take(3)
            ->get();

        $recentTeams = Team::latest()
            ->take(3)
            ->get();


        // =========================
        // Chart Data
        // =========================

        $chartLabels = [
            'Blog',
            'Services',
            'Gallery',
            'Team',
            'Testimonials',
            'Sliders',
        ];

        $chartData = [
            $blogCount,
            $serviceCount,
            $galleryCount,
            $teamCount,
            $testimonialCount,
            $sliderCount,
        ];


        return view('admin.dashboard.index', compact(
            'userCount',
            'blogCount',
            'serviceCount',
            'galleryCount',
            'teamCount',
            'testimonialCount',
            'contactCount',
            'sliderCount',
            'counterCount',
            'unreadContactCount',

            'activeBlogCount',
            'activeServiceCount',
            'activeGalleryCount',
            'activeTeamCount',
            'activeTestimonialCount',
            'activeSliderCount',

            'recentBlogs',
            'recentContacts',
            'recentTeams',

            'chartLabels',
            'chartData'
        ));
    }
}
