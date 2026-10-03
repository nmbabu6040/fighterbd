<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/x-icon"
        href="{{ asset('uploads/settings/' . $settings->favicon) ?? asset('frontend/images/favicon.jpg') }}">
    <!-- Boostrap css link part  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- fontawesome css link part  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}" />

    <!-- themfy icon css start  -->
    <link rel="stylesheet" href="{{ asset('frontend/fonts/themify-icons.css') }}" />

    <!-- animate css link start  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}" />

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .dasboard-content {
            padding: 20px;
        }

        /* Admin Sidebar */
        .admin-sidebar {
            height: 100vh;
            width: 20%;
            background-color: #000;
            color: #fff;
            padding: 20px;

            position: fixed;
            top: 0;
            left: 0;

            overflow-y: auto;
            overflow-x: hidden;

            box-sizing: border-box;

            z-index: 1000;
        }

        /* Sidebar scrollbar */
        .admin-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .admin-sidebar::-webkit-scrollbar-track {
            background: #111;
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: #555;
            border-radius: 10px;
        }

        .admin-sidebar::-webkit-scrollbar-thumb:hover {
            background: #777;
        }


        /* Sidebar menu */
        .admin-sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .admin-sidebar ul li {
            margin-bottom: 10px;
        }

        .admin-sidebar ul li a {
            padding: 10px;
            display: block;

            color: #fff;
            border-radius: 5px;
            background-color: #333;

            text-decoration: none;

            transition: 0.3s;
        }

        .admin-sidebar ul li a:hover {
            background-color: #444;
        }


        /* Active menu */
        .admin-sidebar ul li a.active {
            color: #ec640e !important;
            background-color: #fff !important;
        }


        /* Sidebar horizontal line */
        .admin-sidebar hr {
            border-color: #555;
            margin: 10px 0;
        }


        /* Main content */
        .dasboard-content {
            margin-left: 4%;
            min-height: 100vh;
        }

        @media (max-width: 767px) {

            .admin-sidebar {
                width: 250px;
                left: 0;
            }

            .dasboard-content {
                margin-left: 250px;
            }

        }
    </style>
    @stack('styles')
</head>

<body>
    <main>
        <section class="container-fluid p-0">
            <div class="row">
                <div class="col-md-2">
                    <div class="admin-sidebar">
                        <div class="admin-dashboard">
                            <h4>Admin Dashboard</h4>
                        </div>
                        <hr>
                        <ul>
                            @if (auth()->user()->hasPermission('dashboard.view'))
                                <li>
                                    <a href="{{ route('admin.dashboard') }}"
                                        {{ request()->routeIs('admin.dashboard') ? 'class=active' : '' }}>
                                        <i class="fa fa-dashboard"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            @endif
                            <hr>

                            @if (auth()->user()->hasPermission('user.view'))
                                <li>
                                    <a href="{{ route('admin.user') }}"
                                        class="{{ request()->routeIs('admin.user*') ? 'active' : '' }}">

                                        <i class="fa fa-users"></i>
                                        <span>Users</span>

                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('role.view'))
                                <li>
                                    <a href="{{ route('admin.role') }}"
                                        class="{{ request()->routeIs('admin.role*') ? 'active' : '' }}">

                                        <i class="fa fa-user-secret"></i>
                                        <span>Roles</span>

                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('blog.view'))
                                <li>
                                    <a href="{{ route('admin.blog') }}"
                                        {{ request()->routeIs('admin.blog*') ? 'class=active' : '' }}>
                                        <i class="fa fa-pencil-square"></i>
                                        <span>Blog</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('slider.view'))
                                <li>
                                    <a href="{{ route('admin.slider') }}"
                                        {{ request()->routeIs('admin.slider*') ? 'class=active' : '' }}>
                                        <i class="fa fa-sliders"></i>
                                        <span>Hero Slider</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('settings.view'))
                                <li>
                                    <a href="{{ route('admin.settings') }}"
                                        {{ request()->routeIs('admin.settings*') ? 'class=active' : '' }}>
                                        <i class="fa fa-cog"></i>
                                        <span>Site Setting</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('service.view'))
                                <li>
                                    <a href="{{ route('admin.service') }}"
                                        {{ request()->routeIs('admin.service*') ? 'class=active' : '' }}>
                                        <i class="fa fa-cogs"></i>
                                        <span>Service</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('gallery.view'))
                                <li>
                                    <a href="{{ route('admin.gallery') }}"
                                        {{ request()->routeIs('admin.gallery*') ? 'class=active' : '' }}>
                                        <i class="fa fa-image"></i>
                                        <span>Gallery</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('counter.view'))
                                <li>
                                    <a href="{{ route('admin.counter') }}"
                                        {{ request()->routeIs('admin.counter*') ? 'class=active' : '' }}>
                                        <i class="fa fa-line-chart"></i>
                                        <span>Counter</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('team.view'))
                                <li>
                                    <a href="{{ route('admin.team') }}"
                                        {{ request()->routeIs('admin.team*') ? 'class=active' : '' }}>
                                        <i class="fa fa-user-circle"></i>
                                        <span>Team</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('testimonial.view'))
                                <li>
                                    <a href="{{ route('admin.testimonial') }}"
                                        {{ request()->routeIs('admin.testimonial*') ? 'class=active' : '' }}>
                                        <i class="fa fa-comments"></i>
                                        <span>Testimonial</span>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->hasPermission('contact.view'))
                                <li>
                                    <a href="{{ route('admin.contact') }}"
                                        {{ request()->routeIs('admin.contact*') ? 'class=active' : '' }}>
                                        <i class="fa fa-envelope"></i>
                                        <span>Contact Messages</span>
                                    </a>
                                </li>
                            @endif

                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    {{ request()->routeIs('profile.edit*') ? 'class=active' : '' }}>
                                    <i class="fa fa-user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="dasboard-content">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Welcome to Dashboard</h4>
                                <div class="profile d-flex align-items-center">
                                    <span>{{ Auth::user()->name }}</span>
                                    <form action="{{ route('logout') }}" method="POST"
                                        style="display: inline-block}}">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger btn-sm ms-2">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @yield('content')

                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- jquirey link js start  -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>

    <!-- bootstrap js link start  -->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

    @stack('scripts')
</body>

</html>
