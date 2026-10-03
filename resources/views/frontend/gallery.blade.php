@extends('layouts.frontend')

@section('content')
    <main>
        <!-- gallerypart start  -->
        <section class="galleryPart pt-200" id="galleryPart">
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
                            <div class="box grid-item {{ $gallery->category }}" data-category="{{ $gallery->category }}">
                                <div class="">
                                    <img src="{{ asset('uploads/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                                        class="img-fluid w-100" />
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
    </main>
@endsection
