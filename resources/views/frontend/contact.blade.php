@extends('layouts.frontend')

@section('content')
    <main>
        <!-- contact part start -->
        <section class="contactPart pt-200" id="contactPart">

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
