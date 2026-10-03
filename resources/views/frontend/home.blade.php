@extends('layouts.frontend')

@section('content')
    <main>
        <!-- slide banner start  -->
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade sliderBanner" data-bs-ride="carousel">
            <div class="carousel-indicators d-none">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item active">
                        @if ($slider->image)
                            <img src="{{ asset('uploads/slider/' . $slider->image) }}" alt="{{ $slider->title }}') }}"
                                class="d-block w-100" alt="{{ $slider->title }}" />
                        @else
                            <img src="images/1.jpg" class="d-block w-100" alt="banner1" />
                        @endif
                        <div class="carousel-caption d-md-block">
                            <h5 class="wow animate__animated animate__fadeInDown" data-wow-duration="1s"
                                data-wow-delay="0.3s" data-wow-offset="0"
                                style="
                    visibility: visible;
                    animation-duration: 1s;
                    animation-delay: 0.3s;
                    animation-name: fadeInDown;
                  ">
                                {{ $slider->subtitle }}
                            </h5>
                            <h1 class="wow animate__animated animate_fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="0.3s" data-wow-offset="0"
                                style="
                    visibility: visible;
                    animation-duration: 1s;
                    animation-delay: 0.3s;
                    animation-name: fadeInLeft;
                  ">
                                {{ $slider->title }}</span>
                            </h1>
                            <p class="wow animate__animated animate_fadeInRight" data-wow-duration="1s"
                                data-wow-delay="0.5s" data-wow-offset="0"
                                style="
                    visibility: visible;
                    animation-duration: 1s;
                    animation-delay: 0.5s;
                    animation-name: fadeInRight;
                  ">
                                {{ $slider->description }}
                            </p>
                            <div class="wow animate__animated animate_fadeInUp slideBtn" data-wow-duration="1s"
                                data-wow-delay="1s" data-wow-offset="0"
                                style="
                    visibility: visible;
                    animation-duration: 1s;
                    animation-delay: 1s;
                    animation-name: fadeInUp;
                  ">
                                <a class="btn1" href="{{ $slider->button_link_1 }}">{{ $slider->button_text_1 }}</a>
                                <a class="btn2" href="{{ $slider->button_link_2 }}">{{ $slider->button_text_2 }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- slide banner end  -->

        <!-- about part start  -->
        <section class="aboutPart" id="aboutPart">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="aboutContent text-start px-2 my-2 wow animate__animated animate_fadeInLeft"
                            style="visibility: visible; animation-name: fadeInLeft">
                            <h5>{{ $settings->about_subtitle }}</h5>
                            <h3>{{ $settings->about_title }}</h3>
                            <p>
                                {{ $settings->about_description }}
                            </p>
                            <a class="cmnBtn"
                                href="{{ $settings->about_button_link }}">{{ $settings->about_button_text }}</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="aboutImg my-2 wow animate__animated animate_fadeInRight"
                            style="visibility: visible; animation-name: fadeInRight">
                            @if ($settings->about_image)
                                <img src="{{ asset('uploads/settings/' . $settings->about_image) }}" alt="aboutImg"
                                    class="img-fluid w-100" />
                            @else
                                <img src="images/about.jpg" alt="aboutImg" class="img-fluid w-100" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about part end  -->

        <!-- servicepart start  -->
        <section class="servicePart" id="servicePart">
            <div class="container">
                <div class="row">
                    <!-- common heading part start  -->
                    <div class="col-md-12">
                        <div class="commonHeader text-center p-2 wow animate__animated animate_zoomIn"
                            style="visibility: visible; animation-name: zoomIn">
                            <h3>{{ $serviceHeader->service_title }}
                                <span>{{ $serviceHeader->service_title_highlight }}</span>
                            </h3>
                            <p>
                                {{ $serviceHeader->service_des }}
                            </p>
                            <div class="commonBorder">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <!-- common heading part end  -->
                </div>
                <div class="row mt-5">

                    @foreach ($services as $service)
                        <div class="col-md-4">
                            <div class="serviceItem text-center shadow mb-3 wow animate__animated animate_fadeInLeft"
                                style="visibility: visible; animation-name: fadeInLeft">
                                <i class="fas {{ $service->service_icon }}"></i>
                                <h4>{{ $service->service_name }}</h4>
                                <p>
                                    {{ $service->service_description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-md-4">
                        <div class="serviceItem text-center shadow mb-3 wow animate__animated animate__fadeInDown"
                            style="visibility: visible; animation-name: fadeInDown">
                            <i class="fas fa-gavel"></i>
                            <h4>Home Security</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="serviceItem text-center shadow mb-3 wow animate__animated animate_fadeInRight"
                            style="visibility: visible; animation-name: fadeInRight">
                            <i class="fas fa-american-sign-language-interpreting"></i>
                            <h4>Discount Program</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="serviceItem text-center shadow mb-3 wow animate__animated animate_fadeInLeft"
                            style="visibility: visible; animation-name: fadeInLeft">
                            <i class="fas fa-heart"></i>
                            <h4>Charity</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="serviceItem text-center shadow mb-3 wow animate__animated animate_fadeInUp"
                            style="visibility: visible; animation-name: fadeInUp">
                            <i class="fas fa-money-bill-1"></i>
                            <h4>Trades</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="serviceItem text-center shadow mb-3 wow animate__animated animate_fadeInRight"
                            style="visibility: visible; animation-name: fadeInRight">
                            <i class="fas fa-houzz"></i>
                            <h4>Retirement Planning</h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.
                            </p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- servicepart end  -->

        <!-- gallerypart start  -->
        <section class="galleryPart" id="galleryPart">
            <div class="container">
                <div class="row">
                    <!-- common heading part start  -->
                    <div class="col-md-12">
                        <div class="commonHeader text-center p-2 wow animate__animated animate_zoomIn"
                            style="visibility: visible; animation-name: zoomIn">
                            <h3>Our <span>Gallery</span></h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aliquam ultrices sapien vel quam luctus pulvinar.
                            </p>
                            <div class="commonBorder">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <!-- common heading part end  -->
                </div>
                <div class="galleryBtn mt-4">
                    <ul class="d-flex justify-content-center button-group filters-button-group">
                        <li class="is-checked" data-filter="*">All</li>
                        @php $categories = $galleries ->unique('category') ->values(); @endphp
                        @foreach ($categories as $category)
                            <li data-filter=".{{ $category->category }}"> {{ $category->category_name }} </li>
                        @endforeach
                    </ul>
                </div>

                <div class="grid mt-5">
                    @foreach ($galleries as $gallery)
                        <div class="col-md-4">
                            <div class="box grid-item {{ $gallery->category }}"
                                data-category="{{ $gallery->category }}">
                                <div class="">
                                    <img src="{{ asset('uploads/gallery/' . $gallery->image) }}"
                                        alt="{{ $gallery->title }}" class="img-fluid w-100" />
                                    <div class="box-content">
                                        <h5>{{ $gallery->title }}</h5>
                                        <ul class="icon d-flex justify-content-center item-center">
                                            <li>
                                                <a class="my-image-links" data-gall="gallery01"
                                                    href="{{ asset('uploads/gallery/' . $gallery->image) }}"><i
                                                        class="fas fa-search-plus"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $gallery->link ?: '#' }}"><i class="fas fa-link"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- gallerypart end  -->

        <!-- counter part start  -->
        <section class="counterPart" id="counterPart">
            <div class="counterOverlay">
                <div class="container">
                    <div class="row">
                        @foreach ($counters as $counter)
                            <div class="col-md-3 col-sm-6">
                                <div class="counterItem text-center p-2">
                                    <h4>
                                        <span class="counter" data-target="{{ $counter->count }}"
                                            data-duration="2300">{{ $counter->count }}</span>{{ $counter->span_title }}
                                    </h4>
                                    <h5>{{ $counter->title }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- counter part end  -->

        <!-- team part start  -->
        <section class="teamPart" id="teamPart">
            <div class="container">
                <div class="row">
                    <!-- common heading part start  -->
                    <div class="col-md-12">
                        <div class="commonHeader text-center p-2 wow animate__animated animate_zoomIn"
                            style="visibility: visible; animation-name: zoomIn">
                            <h3>Our <span>Team</span></h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aliquam ultrices sapien vel quam luctus pulvinar.
                            </p>
                            <div class="commonBorder">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <!-- common heading part end  -->
                </div>
                <div class="row mt-5">
                    @foreach ($teams as $team)
                        <div class="col-md-4 mb-2">
                            <div class="teamList">
                                <a href="{{ route('team_details', $team->id) }}">
                                    @if ($team->image)
                                        <img src="{{ asset('uploads/team/' . $team->image) }}" alt="{{ $team->name }}"
                                            class="img-fluid w-100" />
                                    @else
                                        <img src="{{ asset('frontend/images/team/default.jpg') }}"
                                            alt="{{ $team->name }}" class="img-fluid w-100" />
                                    @endif

                                    <div class="teamOverlay text-center">
                                        <div class="teamHead">
                                            <h4>{{ $team->name }}</h4>
                                            <p>{{ $team->designation }}</p>
                                        </div>
                                        <div class="teamSocail">
                                            <a href="{{ $team->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="{{ $team->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- team part end  -->

        <!-- testimonial part start  -->
        <section class="testimonial" id="testimonial">
            <div class="testOverlay">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div id="testSlider" class="testSlider owl-carousel">
                                @foreach ($testimonials as $testimonial)
                                    <div class="testSliderList text-center p-4">
                                        @if ($testimonial->image)
                                            <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
                                                alt="testimonial1" class="img-fluid" style="width: 85px" />
                                        @else
                                            <img src="{{ asset('frontend/images/testimonial/default.jpg') }}"
                                                alt="testimonial1" class="img-fluid" style="width: 85px" />
                                        @endif

                                        <p>
                                            {!! $testimonial->description !!}
                                        </p>
                                        <h4>{{ $testimonial->name }}</h4>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial part end  -->

        <!-- blog part start -->
        <section class="blogPart" id="blogPart">

            <div class="container">

                <div class="row">

                    <!-- common heading -->
                    <div class="col-md-12">

                        <div class="commonHeader text-center p-2 wow animate__animated animate_zoomIn">

                            <h3>
                                Our <span>Blog</span>
                            </h3>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aliquam ultrices sapien vel quam luctus pulvinar.
                            </p>

                            <div class="commonBorder">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="blogZoom wow animate__animated animate_fadeInUp">

                    <div class="row mt-4">

                        @forelse ($blogs as $blog)
                            <div class="col-md-4">

                                <div class="blogItem shadow mb-2">

                                    <div class="blogImage">

                                        @if ($blog->image)
                                            <img src="{{ asset('uploads/blog/' . $blog->image) }}"
                                                alt="{{ $blog->title }}" class="img-fluid w-100">
                                        @else
                                            <img src="{{ asset('frontend/images/blog/default.jpg') }}"
                                                alt="{{ $blog->title }}" class="img-fluid w-100">
                                        @endif

                                        @if ($blog->icon_image)
                                            <span class="iconImage">
                                                <img src="{{ asset('uploads/blog/' . $blog->icon_image) }}"
                                                    alt="" width="40" height="40">
                                            </span>
                                        @endif

                                    </div>

                                    <div class="blogContent">

                                        <h4>
                                            <a href="{{ route('blog_details', $blog->slug) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h4>

                                        <div class="d-flex justify-content-between postBar">

                                            <span>
                                                <i class="fa fa-calendar"></i>

                                                {{ $blog->published_at?->format('F d, Y') }}
                                            </span>

                                            <span>
                                                <i class="fa fa-user"></i>

                                                {{ $blog->author }}
                                            </span>

                                        </div>

                                        <p>
                                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 120) }}
                                        </p>

                                        <a href="{{ route('blog_details', $blog->slug) }}">

                                            Read more

                                            <i class="fa fa-angle-right"></i>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="col-md-12 text-center">

                                <p>
                                    No blog available.
                                </p>

                            </div>
                        @endforelse

                    </div>

                </div>

            </div>

        </section>
        <!-- blog part end -->

        <!-- contact part start -->
        <section class="contactPart" id="contactPart">

            <div class="container">

                <div class="row">

                    <!-- common heading part start -->
                    <div class="col-md-12">

                        <div class="commonHeader text-center p-2 wow animate__animated animate_zoomIn"
                            style="visibility: visible; animation-name: zoomIn">

                            <h3>
                                Contact <span>Us</span>
                            </h3>

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aliquam ultrices sapien vel quam luctus pulvinar.
                            </p>

                            <div class="commonBorder">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                        </div>

                    </div>
                    <!-- common heading part end -->

                </div>

                <div class="row mt-4">

                    <div class="col-md-12">

                        <div class="contactReg">

                            {{-- Success message --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            {{-- Validation errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">

                                    <ul class="mb-0">

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>

                                </div>
                            @endif


                            <form action="{{ route('contact.store') }}" method="POST" class="text-center">

                                @csrf

                                <div class="row">

                                    <div class="col-sm-4">

                                        <input type="text" name="name" id="name" placeholder="Name"
                                            value="{{ old('name') }}" required />

                                    </div>

                                    <div class="col-sm-4">

                                        <input type="email" name="email" id="email" placeholder="Email"
                                            value="{{ old('email') }}" required />

                                    </div>

                                    <div class="col-sm-4">

                                        <input type="text" name="subject" id="subject" placeholder="Subject"
                                            value="{{ old('subject') }}" required />

                                    </div>

                                </div>

                                <div>

                                    <textarea name="message" id="message" placeholder="Your message" required>{{ old('message') }}</textarea>

                                </div>

                                <button type="submit">
                                    Send Message
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </section>
        <!-- contact part end -->
    </main>
@endsection
