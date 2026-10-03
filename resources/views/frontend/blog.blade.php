@extends('layouts.frontend')

@section('content')
    <main>
        <!-- blog part start -->
        <section class="blogPart pt-200" id="blogPart">

            <div class="container">

                <div class="row">

                    <!-- common heading -->
                    <div class="col-md-12">

                        <div class="commonHeader text-center p-2 wow animate__animated animate_zoomIn"
                            style="visibility: visible; animation-name: zoomIn">

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
                                            <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="{{ $blog->title }}"
                                                class="img-fluid w-100">
                                        @else
                                            <img src="{{ asset('frontend/images/blog/default.jpg') }}"
                                                alt="{{ $blog->title }}" class="img-fluid w-100">
                                        @endif

                                        @if ($blog->icon_image)
                                            <span class="iconImage">
                                                <img src="{{ asset('uploads/blog/' . $blog->icon_image) }}" alt=""
                                                    width="40" height="40">
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

    </main>
@endsection
