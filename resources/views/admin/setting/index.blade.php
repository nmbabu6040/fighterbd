@extends('layouts.dashboard')

@section('content')
    <div class="main-content py-3">


        {{-- Header --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Website Settings</h5>

            <a href="{{ route('admin.settings') }}" class="btn btn-primary">
                Back
            </a>
        </div>

        <div class="card-body mt-3">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- =====================================================
                 GENERAL SETTINGS
            ====================================================== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">General Settings</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="title" class="form-label">Website Title</label>

                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter website title" value="{{ old('title', $settings->title) }}">

                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>


                {{-- =====================================================
                 HEADER / FOOTER LOGO
            ====================================================== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Logo & Favicon</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            {{-- Header Logo --}}
                            <div class="col-md-4 mb-3">
                                <label for="header_logo" class="form-label">
                                    Header Logo
                                </label>

                                @if ($settings->header_logo)
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/settings/' . $settings->header_logo) }}"
                                            alt="Header Logo" style="max-width: 180px; max-height: 80px;">
                                    </div>
                                @endif

                                <input type="file" class="form-control" id="header_logo" name="header_logo">

                                @error('header_logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- Footer Logo --}}
                            <div class="col-md-4 mb-3">
                                <label for="footer_logo" class="form-label">
                                    Footer Logo
                                </label>

                                @if ($settings->footer_logo)
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/settings/' . $settings->footer_logo) }}"
                                            alt="Footer Logo" style="max-width: 180px; max-height: 80px;">
                                    </div>
                                @endif

                                <input type="file" class="form-control" id="footer_logo" name="footer_logo">

                                @error('footer_logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- Favicon --}}
                            <div class="col-md-4 mb-3">
                                <label for="favicon" class="form-label">
                                    Favicon
                                </label>

                                @if ($settings->favicon)
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/settings/' . $settings->favicon) }}" alt="Favicon"
                                            style="width: 50px; height: 50px;">
                                    </div>
                                @endif

                                <input type="file" class="form-control" id="favicon" name="favicon">

                                @error('favicon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>


                {{-- =====================================================
                 CONTACT SETTINGS
            ====================================================== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Contact Information</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">
                                    Address
                                </label>

                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter address" value="{{ old('address', $settings->address) }}">

                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="phone_1" class="form-label">
                                    Phone 1
                                </label>

                                <input type="text" class="form-control" id="phone_1" name="phone_1"
                                    placeholder="Enter phone number" value="{{ old('phone_1', $settings->phone_1) }}">

                                @error('phone_1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="phone_2" class="form-label">
                                    Phone 2
                                </label>

                                <input type="text" class="form-control" id="phone_2" name="phone_2"
                                    placeholder="Enter phone number" value="{{ old('phone_2', $settings->phone_2) }}">

                                @error('phone_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="email_1" class="form-label">
                                    Email 1
                                </label>

                                <input type="email" class="form-control" id="email_1" name="email_1"
                                    placeholder="Enter email" value="{{ old('email_1', $settings->email_1) }}">

                                @error('email_1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="email_2" class="form-label">
                                    Email 2
                                </label>

                                <input type="email" class="form-control" id="email_2" name="email_2"
                                    placeholder="Enter email" value="{{ old('email_2', $settings->email_2) }}">

                                @error('email_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>


                {{-- =====================================================
                 SOCIAL MEDIA
            ====================================================== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Social Media</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            @foreach ([
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'youtube' => 'YouTube',
            'linkedin' => 'LinkedIn',
            'pinterest' => 'Pinterest',
        ] as $field => $label)
                                <div class="col-md-6 mb-3">
                                    <label for="{{ $field }}" class="form-label">
                                        {{ $label }}
                                    </label>

                                    <input type="text" class="form-control" id="{{ $field }}"
                                        name="{{ $field }}" placeholder="Enter {{ $label }} URL"
                                        value="{{ old($field, $settings->$field) }}">

                                    @error($field)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>


                {{-- =====================================================
                 ABOUT SECTION
            ====================================================== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">About Section</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="about_subtitle" class="form-label">
                                    About Subtitle
                                </label>

                                <input type="text" class="form-control" id="about_subtitle" name="about_subtitle"
                                    placeholder="Enter about subtitle"
                                    value="{{ old('about_subtitle', $settings->about_subtitle) }}">

                                @error('about_subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="about_title" class="form-label">
                                    About Title
                                </label>

                                <input type="text" class="form-control" id="about_title" name="about_title"
                                    placeholder="Enter about title"
                                    value="{{ old('about_title', $settings->about_title) }}">

                                @error('about_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-3">
                                <label for="about_description" class="form-label">
                                    About Description
                                </label>

                                <textarea class="form-control" id="about_description" name="about_description" rows="5"
                                    placeholder="Enter about description">{{ old('about_description', $settings->about_description) }}</textarea>

                                @error('about_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="about_button_text" class="form-label">
                                    Button Text
                                </label>

                                <input type="text" class="form-control" id="about_button_text"
                                    name="about_button_text" placeholder="Enter button text"
                                    value="{{ old('about_button_text', $settings->about_button_text) }}">

                                @error('about_button_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="about_button_link" class="form-label">
                                    Button Link
                                </label>

                                <input type="text" class="form-control" id="about_button_link"
                                    name="about_button_link" placeholder="Enter button link"
                                    value="{{ old('about_button_link', $settings->about_button_link) }}">

                                @error('about_button_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="about_image" class="form-label">
                                    About Image
                                </label>

                                @if ($settings->about_image)
                                    <div class="mb-2">
                                        <img src="{{ asset('uploads/settings/' . $settings->about_image) }}"
                                            alt="About Image" style="max-width: 250px; max-height: 180px;">
                                    </div>
                                @endif

                                <input type="file" class="form-control" id="about_image" name="about_image">

                                @error('about_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>


                {{-- =====================================================
                 FOOTER
            ====================================================== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Footer</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="copyright" class="form-label">
                                Copyright Text
                            </label>

                            <input type="text" class="form-control" id="copyright" name="copyright"
                                placeholder="Enter copyright text" value="{{ old('copyright', $settings->copyright) }}">

                            @error('copyright')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>


                {{-- =====================================================
                 SEO SETTINGS
            ====================================================== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">SEO Settings</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="meta_title" class="form-label">
                                Meta Title
                            </label>

                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                placeholder="Enter meta title" value="{{ old('meta_title', $settings->meta_title) }}">

                            @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="meta_description" class="form-label">
                                Meta Description
                            </label>

                            <textarea class="form-control" id="meta_description" name="meta_description" rows="3"
                                placeholder="Enter meta description">{{ old('meta_description', $settings->meta_description) }}</textarea>

                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="meta_keywords" class="form-label">
                                Meta Keywords
                            </label>

                            <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="2"
                                placeholder="Enter meta keywords">{{ old('meta_keywords', $settings->meta_keywords) }}</textarea>

                            @error('meta_keywords')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>


                {{-- =====================================================
                 GOOGLE SETTINGS
            ====================================================== --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Google & Tracking</h5>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label for="google_analytics" class="form-label">
                                Google Analytics
                            </label>

                            <textarea class="form-control" id="google_analytics" name="google_analytics" rows="3"
                                placeholder="Enter Google Analytics code">{{ old('google_analytics', $settings->google_analytics) }}</textarea>

                            @error('google_analytics')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="google_tag_manager" class="form-label">
                                Google Tag Manager
                            </label>

                            <textarea class="form-control" id="google_tag_manager" name="google_tag_manager" rows="3"
                                placeholder="Enter Google Tag Manager code">{{ old('google_tag_manager', $settings->google_tag_manager) }}</textarea>

                            @error('google_tag_manager')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="google_map_url" class="form-label">
                                Google Map URL
                            </label>

                            <textarea class="form-control" id="google_map_url" name="google_map_url" rows="3"
                                placeholder="Enter Google Map URL">{{ old('google_map_url', $settings->google_map_url) }}</textarea>

                            @error('google_map_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>


                {{-- Submit --}}
                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        Update Settings
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
