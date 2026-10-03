@extends('layouts.frontend')

@section('content')
    <main>

        <section class="blogDetailsPart pt-200 pb-5">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="blogDetailsContent">

                            <!-- Blog Image -->
                            <div class="blogDetailsImage mb-4">

                                <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="{{ $blog->title }}"
                                    class="img-fluid w-100">

                            </div>

                            <!-- Blog Title -->
                            <h1>
                                {{ $blog->title }}
                            </h1>

                            <!-- Post Info -->
                            <div class="d-flex flex-wrap gap-4 postBar my-3">

                                <span>
                                    <i class="fa fa-calendar"></i>

                                    {{ $blog->published_at?->format('F d, Y') }}
                                </span>

                                <span>
                                    <i class="fa fa-user"></i>

                                    {{ $blog->author }}
                                </span>

                            </div>

                            <!-- Short Description -->
                            @if ($blog->description)
                                <div class="blogShortDescription mb-4">

                                    {!! $blog->description !!}

                                </div>
                            @endif

                            <!-- Full Content -->
                            <div class="blogFullContent">

                                {!! $blog->content !!}

                            </div>

                            <!-- Back -->
                            <div class="mt-4">

                                <a href="{{ route('home') }}#blogPart" class="btn btn-primary">
                                    <i class="fa fa-arrow-left"></i>

                                    Back to Blog

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
