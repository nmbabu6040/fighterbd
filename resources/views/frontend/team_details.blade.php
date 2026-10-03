@extends('layouts.frontend')

@section('content')
    <main>
        <section class="teamDetailsPart pt-200">
            <div class="container">
                <div class="row">
                    <!-- Team Image -->
                    <div class="col-md-5">
                        <div class="teamDetailsImg">

                            @if ($team->image)
                                <img src="{{ asset('uploads/team/' . $team->image) }}" alt="{{ $team->name }}"
                                    class="img-fluid w-100">
                            @else
                                <img src="{{ asset('frontend/images/team/default.jpg') }}" alt="{{ $team->name }}"
                                    class="img-fluid w-100">
                            @endif

                            <div class="teamName text-center mt-3">
                                <h4 class="mb-0 text-primary fw-bold">
                                    {{ $team->name }}
                                </h4>

                                @if ($team->designation)
                                    <h5 class="mb-0 text-secondary text-uppercase">
                                        {{ $team->designation }}
                                    </h5>
                                @endif
                            </div>

                        </div>
                    </div>


                    <!-- Team Information -->
                    <div class="col-md-7">
                        <div class="teamDetailsContent mb-5">

                            @if ($team->description)
                                <div class="teamDescription">
                                    {!! $team->description !!}
                                </div>
                            @endif


                            <!-- Contact Information -->

                            @if ($team->email)
                                <p>
                                    <strong>Email:</strong>
                                    <a href="mailto:{{ $team->email }}">
                                        {{ $team->email }}
                                    </a>
                                </p>
                            @endif


                            @if ($team->phone)
                                <p>
                                    <strong>Phone:</strong>
                                    <a href="tel:{{ $team->phone }}">
                                        {{ $team->phone }}
                                    </a>
                                </p>
                            @endif


                            <!-- Social Links -->

                            <div class="teamDetailsSocial mt-3">

                                @if ($team->facebook)
                                    <a href="{{ $team->facebook }}" target="_blank" class="me-2"
                                        style="width: 40px; height:40px; border-radius: 50%; text-align: center; line-height: 40px; background-color: #f1f1f1; color: #000; display: inline-block">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                @endif


                                @if ($team->twitter)
                                    <a href="{{ $team->twitter }}" target="_blank" class="me-2"
                                        style="width: 40px; height:40px; border-radius: 50%; text-align: center; line-height: 40px; background-color: #f1f1f1; color: #000; display: inline-block">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                @endif


                                @if ($team->linkedin)
                                    <a href="{{ $team->linkedin }}" target="_blank" class="me-2"
                                        style="width: 40px; height:40px; border-radius: 50%; text-align: center; line-height: 40px; background-color: #f1f1f1; color: #000; display: inline-block">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                @endif


                                @if ($team->instagram)
                                    <a href="{{ $team->instagram }}" target="_blank" class="me-2"
                                        style="width: 40px; height:40px; border-radius: 50%; text-align: center; line-height: 40px; background-color: #f1f1f1; color: #000; display: inline-block">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('styles')
    <style>
        .teamDescription {
            width: 100%;
            max-width: 100%;
            min-width: 0;
            overflow-wrap: break-word;
            word-wrap: break-word;
        }

        .teamDescription * {
            max-width: 100% !important;
            box-sizing: border-box;
        }

        .teamDescription p,
        .teamDescription div,
        .teamDescription h1,
        .teamDescription h2,
        .teamDescription h3,
        .teamDescription h4,
        .teamDescription h5,
        .teamDescription h6 {
            max-width: 100%;
            overflow-wrap: break-word;
        }

        .teamDescription img {
            max-width: 100% !important;
            height: auto !important;
        }

        .teamDescription table {
            width: 100% !important;
            max-width: 100% !important;
        }

        .teamDescription iframe {
            max-width: 100% !important;
        }
    </style>
@endpush
