@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">

        {{-- =========================
        PAGE HEADER
    ========================== --}}

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-1">
                    <i class="fa fa-dashboard"></i>
                    Dashboard
                </h3>

                <p class="text-muted mb-0">
                    Welcome to your website administration panel.
                </p>
            </div>

            <div>
                <span class="badge bg-success px-3 py-2">
                    <i class="fa fa-circle"></i>
                    System Active
                </span>
            </div>

        </div>


        {{-- =========================
        MAIN STATISTICS
    ========================== --}}

        <div class="row g-3 mb-4">

            {{-- Users --}}
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">
                        <i class="fa fa-users"></i>
                    </div>

                    <div>
                        <h6>Users</h6>

                        <h3>
                            {{ $userCount }}
                        </h3>

                        <span>
                            Registered users
                        </span>
                    </div>

                </div>

            </div>


            {{-- Blog --}}
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">
                        <i class="fa fa-pencil-square"></i>
                    </div>

                    <div>
                        <h6>Blog Posts</h6>

                        <h3>
                            {{ $blogCount }}
                        </h3>

                        <span>
                            {{ $activeBlogCount }} active posts
                        </span>
                    </div>

                </div>

            </div>


            {{-- Services --}}
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">
                        <i class="fa fa-cogs"></i>
                    </div>

                    <div>
                        <h6>Services</h6>

                        <h3>
                            {{ $serviceCount }}
                        </h3>

                        <span>
                            {{ $activeServiceCount }} active services
                        </span>
                    </div>

                </div>

            </div>


            {{-- Contact --}}
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">
                        <i class="fa fa-envelope"></i>
                    </div>

                    <div>
                        <h6>Messages</h6>

                        <h3>
                            {{ $contactCount }}
                        </h3>

                        <span>
                            {{ $unreadContactCount }} unread
                        </span>
                    </div>

                </div>

            </div>

        </div>


        {{-- =========================
        SECONDARY STATISTICS
    ========================== --}}

        <div class="row g-3 mb-4">

            {{-- Gallery --}}
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">
                        <i class="fa fa-image"></i>
                    </div>


                    <div>
                        <h6>Gallery</h6>

                        <h3>
                            {{ $galleryCount }}
                        </h3>
                    </div>

                </div>

            </div>


            {{-- Team --}}
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">
                        <i class="fa fa-user-circle"></i>
                    </div>


                    <div>
                        <h6>Team Members</h6>

                        <h3>
                            {{ $teamCount }}
                        </h3>
                    </div>

                </div>

            </div>


            {{-- Testimonial --}}
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">
                        <i class="fa fa-comments"></i>
                    </div>


                    <div>
                        <h5>Testimonials</h5>

                        <h3>
                            {{ $testimonialCount }}
                        </h3>
                    </div>

                </div>

            </div>


            {{-- Slider --}}
            <div class="col-xl-3 col-md-6">

                <div class="dashboard-card">

                    <div class="dashboard-card-icon">
                        <i class="fa fa-sliders"></i>
                    </div>


                    <div>
                        <h5>Hero Sliders</h5>

                        <h3>
                            {{ $sliderCount }}
                        </h3>
                    </div>

                </div>

            </div>

        </div>


        {{-- =========================
        CHART + QUICK ACTION
    ========================== --}}

        <div class="row g-4">

            {{-- Chart --}}
            <div class="col-lg-8">

                <div class="dashboard-box">

                    <div class="dashboard-box-header">

                        <div>

                            <h5>
                                <i class="fa fa-bar-chart"></i>
                                Website Content Overview
                            </h5>

                            <p>
                                Current content statistics.
                            </p>

                        </div>

                    </div>


                    <div class="chart-container">

                        <canvas id="contentChart"></canvas>

                    </div>

                </div>

            </div>


            {{-- Quick Actions --}}
            <div class="col-lg-4">

                <div class="dashboard-box">

                    <div class="dashboard-box-header">

                        <h5>
                            <i class="fa fa-bolt"></i>
                            Quick Actions
                        </h5>

                    </div>


                    <div class="quick-actions">

                        <a href="{{ route('admin.blog.create') }}">

                            <i class="fa fa-pencil-square"></i>

                            <span>
                                Create Blog
                            </span>

                            <i class="fa fa-angle-right"></i>

                        </a>


                        <a href="{{ route('admin.slider.create') }}">

                            <i class="fa fa-sliders"></i>

                            <span>
                                Add Slider
                            </span>

                            <i class="fa fa-angle-right"></i>

                        </a>


                        <a href="{{ route('admin.service.create') }}">

                            <i class="fa fa-cogs"></i>

                            <span>
                                Add Service
                            </span>

                            <i class="fa fa-angle-right"></i>

                        </a>


                        <a href="{{ route('admin.gallery.create') }}">

                            <i class="fa fa-image"></i>

                            <span>
                                Add Gallery Image
                            </span>

                            <i class="fa fa-angle-right"></i>

                        </a>


                        <a href="{{ route('admin.team.create') }}">

                            <i class="fa fa-user"></i>

                            <span>
                                Add Team Member
                            </span>

                            <i class="fa fa-angle-right"></i>

                        </a>


                        <a href="{{ route('admin.testimonial.create') }}">

                            <i class="fa fa-comments"></i>

                            <span>
                                Add Testimonial
                            </span>

                            <i class="fa fa-angle-right"></i>

                        </a>


                        <a href="{{ route('admin.contact') }}">

                            <i class="fa fa-envelope"></i>

                            <span>
                                View Messages
                            </span>

                            <i class="fa fa-angle-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================
        RECENT ACTIVITY
    ========================== --}}

        <div class="row mt-4">

            <div class="col-lg-8">

                <div class="dashboard-box">

                    <div class="dashboard-box-header">

                        <div>

                            <h5>
                                <i class="fa fa-clock-o"></i>
                                Recent Activity
                            </h5>

                            <p>
                                Latest content and customer activities.
                            </p>

                        </div>

                    </div>


                    <div class="activity-list">

                        {{-- Recent Contacts --}}

                        @foreach ($recentContacts as $contact)
                            <div class="activity-item">

                                <div class="activity-icon contact-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>

                                <div class="activity-content">

                                    <strong>
                                        New contact message
                                    </strong>

                                    <p>
                                        {{ $contact->name }}
                                        sent a message:
                                        "{{ \Illuminate\Support\Str::limit($contact->subject, 50) }}"
                                    </p>

                                    <small>
                                        {{ $contact->created_at->diffForHumans() }}
                                    </small>

                                </div>

                            </div>
                        @endforeach


                        {{-- Recent Blogs --}}

                        @foreach ($recentBlogs as $blog)
                            <div class="activity-item">

                                <div class="activity-icon blog-icon">
                                    <i class="fa fa-pencil"></i>
                                </div>

                                <div class="activity-content">

                                    <strong>
                                        Blog post created
                                    </strong>

                                    <p>
                                        {{ $blog->title }}
                                    </p>

                                    <small>
                                        {{ $blog->created_at->diffForHumans() }}
                                    </small>

                                </div>

                            </div>
                        @endforeach


                        {{-- Recent Team --}}

                        @foreach ($recentTeams as $team)
                            <div class="activity-item">

                                <div class="activity-icon team-icon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <div class="activity-content">

                                    <strong>
                                        Team member added
                                    </strong>

                                    <p>
                                        {{ $team->name }}

                                        @if ($team->designation)
                                            - {{ $team->designation }}
                                        @endif
                                    </p>

                                    <small>
                                        {{ $team->created_at->diffForHumans() }}
                                    </small>

                                </div>

                            </div>
                        @endforeach


                        @if ($recentContacts->isEmpty() && $recentBlogs->isEmpty() && $recentTeams->isEmpty())
                            <div class="activity-empty">

                                <i class="fa fa-history"></i>

                                <h6>
                                    No recent activity
                                </h6>

                                <p>
                                    Website activities will appear here.
                                </p>

                            </div>
                        @endif

                    </div>

                </div>

            </div>


            {{-- Active Content --}}
            <div class="col-lg-4">

                <div class="dashboard-box">

                    <div class="dashboard-box-header">

                        <h5>
                            <i class="fa fa-check-circle"></i>
                            Active Content
                        </h5>

                    </div>


                    <div class="active-content-list">

                        <div>
                            <span>
                                <i class="fa fa-pencil"></i>
                                Blog
                            </span>

                            <strong>
                                {{ $activeBlogCount }}
                            </strong>
                        </div>


                        <div>
                            <span>
                                <i class="fa fa-cogs"></i>
                                Services
                            </span>

                            <strong>
                                {{ $activeServiceCount }}
                            </strong>
                        </div>


                        <div>
                            <span>
                                <i class="fa fa-image"></i>
                                Gallery
                            </span>

                            <strong>
                                {{ $activeGalleryCount }}
                            </strong>
                        </div>


                        <div>
                            <span>
                                <i class="fa fa-users"></i>
                                Team
                            </span>

                            <strong>
                                {{ $activeTeamCount }}
                            </strong>
                        </div>


                        <div>
                            <span>
                                <i class="fa fa-comments"></i>
                                Testimonials
                            </span>

                            <strong>
                                {{ $activeTestimonialCount }}
                            </strong>
                        </div>


                        <div>
                            <span>
                                <i class="fa fa-sliders"></i>
                                Hero Sliders
                            </span>

                            <strong>
                                {{ $activeSliderCount }}
                            </strong>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
     CHART JS
========================== --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('contentChart');

        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: @json($chartLabels),

                datasets: [{

                    label: 'Total Items',

                    data: @json($chartData),

                    borderWidth: 1

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {
                            precision: 0
                        }

                    }

                }

            }

        });
    </script>


    <style>
        /* =========================
                                                               Dashboard
                                                            ========================= */

        .main-content {
            width: 100%;
        }


        /* =========================
                                                               Main Cards
                                                            ========================= */

        .dashboard-card {

            background: #fff;

            border-radius: 10px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 15px;

            min-height: 125px;

            border: 1px solid #eee;

            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);

            transition: 0.3s;
        }


        .dashboard-card:hover {

            transform: translateY(-3px);

            box-shadow:
                0 5px 18px rgba(0, 0, 0, 0.10);
        }


        .dashboard-card-icon {

            width: 55px;

            height: 55px;

            min-width: 55px;

            border-radius: 10px;

            background: #333;

            color: #fff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 22px;
        }


        .dashboard-card h6 {

            margin: 0 0 5px;

            color: #777;

            font-size: 14px;
        }


        .dashboard-card h3 {

            margin: 0;

            font-size: 28px;

            font-weight: 700;

            color: #222;
        }


        .dashboard-card span {

            font-size: 12px;

            color: #999;
        }


        /* =========================
                                                               Mini Cards
                                                            ========================= */

        .dashboard-mini-card {

            background: #fff;

            border: 1px solid #eee;

            border-radius: 10px;

            padding: 18px;

            display: flex;

            align-items: center;

            gap: 15px;

            box-shadow:
                0 2px 10px rgba(0, 0, 0, 0.05);
        }


        .dashboard-mini-card>i {

            font-size: 25px;

            color: #ec640e;
        }


        .dashboard-mini-card div {

            display: flex;

            flex-direction: column;
        }


        .dashboard-mini-card span {

            color: #777;

            font-size: 13px;
        }


        .dashboard-mini-card strong {

            color: #222;

            font-size: 22px;
        }


        /* =========================
                                                               Dashboard Box
                                                            ========================= */

        .dashboard-box {

            background: #fff;

            border-radius: 10px;

            border: 1px solid #eee;

            padding: 20px;

            box-shadow:
                0 2px 10px rgba(0, 0, 0, 0.05);
        }


        .dashboard-box-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 15px;
        }


        .dashboard-box-header h5 {

            margin: 0;

            font-weight: 600;
        }


        .dashboard-box-header h5 i {

            margin-right: 7px;

            color: #ec640e;
        }


        .dashboard-box-header p {

            margin: 5px 0 0;

            font-size: 13px;

            color: #888;
        }


        /* =========================
                                                               Chart
                                                            ========================= */

        .chart-container {

            position: relative;

            height: 320px;

            width: 100%;
        }


        /* =========================
                                                               Quick Actions
                                                            ========================= */

        .quick-actions {

            display: flex;

            flex-direction: column;

            gap: 8px;
        }


        .quick-actions a {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 12px;

            background: #f8f8f8;

            color: #333;

            text-decoration: none;

            border-radius: 6px;

            transition: 0.3s;
        }


        .quick-actions a:hover {

            background: #333;

            color: #fff;
        }


        .quick-actions a i:first-child {

            width: 22px;

            text-align: center;
        }


        .quick-actions a span {

            flex: 1;
        }


        /* =========================
                                                               Activity
                                                            ========================= */

        .activity-list {

            display: flex;

            flex-direction: column;
        }


        .activity-item {

            display: flex;

            align-items: flex-start;

            gap: 12px;

            padding: 14px 0;

            border-bottom: 1px solid #eee;
        }


        .activity-item:last-child {

            border-bottom: none;
        }


        .activity-icon {

            width: 40px;

            height: 40px;

            min-width: 40px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #f1f1f1;

            color: #333;
        }


        .activity-content strong {

            display: block;

            font-size: 14px;

            color: #333;
        }


        .activity-content p {

            margin: 3px 0;

            font-size: 13px;

            color: #777;
        }


        .activity-content small {

            font-size: 11px;

            color: #aaa;
        }


        .activity-empty {

            text-align: center;

            padding: 35px 20px;

            color: #999;
        }


        .activity-empty i {

            font-size: 35px;

            margin-bottom: 10px;
        }


        .activity-empty h6 {

            margin-bottom: 5px;

            color: #555;
        }


        .activity-empty p {

            margin: 0;

            font-size: 13px;
        }


        /* =========================
                                                               Active Content
                                                            ========================= */

        .active-content-list {

            display: flex;

            flex-direction: column;
        }


        .active-content-list>div {

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 13px 0;

            border-bottom: 1px solid #eee;
        }


        .active-content-list>div:last-child {

            border-bottom: none;
        }


        .active-content-list span {

            color: #555;

            font-size: 14px;
        }


        .active-content-list span i {

            width: 25px;

            color: #ec640e;
        }


        .active-content-list strong {

            background: #f5f5f5;

            padding: 4px 10px;

            border-radius: 20px;

            font-size: 13px;
        }


        /* =========================
                                                               Responsive
                                                            ========================= */

        @media (max-width: 767px) {

            .dashboard-card {

                min-height: auto;
            }


            .dashboard-box {

                padding: 15px;
            }


            .chart-container {

                height: 250px;
            }

        }
    </style>
@endsection
