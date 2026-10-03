@extends('layouts.frontend')

@section('content')
    <main>
        <!-- team part start  -->
        <section class="teamPart pt-200" id="teamPart">
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
                        <div class="col-md-4 mb-4">
                            <div class="teamList">
                                <a href="{{ route('team_details', $team->id) }}">
                                    @if ($team->image)
                                        <img src="{{ asset('uploads/team/' . $team->image) }}" alt="{{ $team->name }}"
                                            class="img-fluid w-100" />
                                    @else
                                        <img src="{{ asset('frontend/images/team/default.jpg') }}" alt="{{ $team->name }}"
                                            class="img-fluid w-100" />
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
    </main>
@endsection
