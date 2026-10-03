@extends('layouts.frontend')

@section('content')
    <main>
        <!-- servicepart start  -->
        <section class="servicePart pt-200" id="servicePart">
            <div class="container">
                <div class="row">
                    <!-- common heading part start  -->
                    <div class="col-md-12">
                        <div class="commonHeader text-center p-2 wow animate__animated animate_zoomIn"
                            style="visibility: visible; animation-name: zoomIn">
                            <h3>{{ $serviceHeader->service_title }}<span>{{ $serviceHeader->service_title_highlight }}</span>
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
                                <i class="fa {{ $service->service_icon }}"></i>
                                <h4>{{ $service->service_name }}</h4>
                                <p>
                                    {{ $service->service_description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- servicepart end  -->

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
    </main>
@endsection
