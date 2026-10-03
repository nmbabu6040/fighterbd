@extends('layouts.frontend')

@section('content')
    <main>
        <!-- about part start  -->
        <section class="aboutPart pt-200" id="aboutPart">
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
                            <a class="cmnBtn" href="{{ $settings->about_button_link }}">{{ $settings->about_button_text }}</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="aboutImg my-2 wow animate__animated animate_fadeInRight"
                            style="visibility: visible; animation-name: fadeInRight">
                            @if ($settings->about_image)
                                <img src="{{ asset('uploads/settings/' . $settings->about_image) }}"
                                    alt="{{ $settings->about_title }}" class="img-fluid w-100" />
                            @else
                                <img src="images/about.jpg" alt="aboutImg" class="img-fluid w-100" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about part end  -->

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
    </main>
@endsection
