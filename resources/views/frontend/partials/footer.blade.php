<footer class="">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-details py-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer-logo">
                                @if (!empty($settings->footer_logo))
                                    <img src="{{ asset('uploads/settings' . $settings->footer_logo) }}" alt="logo" />
                                @else
                                    <h3 class="mb-2">
                                        <a href="{{ route('home') }}" class="text-white">{{ $settings->title }}</a>
                                    </h3>
                                @endif

                                <p class="mb-3 text-white">
                                    {{ Str::limit($settings->about_description, 200) }}
                                </p>

                                <div class="social-link">
                                    <ul class="d-flex gap-2">
                                        <li>
                                            <a href="{{ $settings->facebook }}"
                                                style="width: 40px; height:40px; line-height: 40px; text-align: center; border-radius: 50%; background-color: #fff; color: #fd7e14; display: inline-block"><i
                                                    class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $settings->twitter }}"
                                                style="width: 40px; height:40px; line-height: 40px; text-align: center; border-radius: 50%; background-color: #fff; color: #fd7e14; display: inline-block"><i
                                                    class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $settings->linkedin }}"
                                                style="width: 40px; height:40px; line-height: 40px; text-align: center; border-radius: 50%; background-color: #fff; color: #fd7e14; display: inline-block"><i
                                                    class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $settings->instagram }}"
                                                style="width: 40px; height:40px; line-height: 40px; text-align: center; border-radius: 50%; background-color: #fff; color: #fd7e14; display: inline-block"><i
                                                    class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-menu">
                                <h4 class="mb-3 text-white">Quick Links</h4>
                                <ul>

                                    <li><a href="{{ route('about') }}" class="text-white mb-2 d-block">About</a></li>
                                    <li><a href="{{ route('service') }}"class="text-white mb-2 d-block">Service</a>
                                    </li>
                                    <li><a href="{{ route('gallery') }}" class="text-white mb-2 d-block">Gallery</a>
                                    </li>
                                    <li><a href="{{ route('team') }}" class="text-white mb-2 d-block">Team</a></li>
                                    <li><a href="{{ route('blog') }}" class="text-white mb-2 d-block">Blog</a></li>
                                    <li><a href="{{ route('contact') }}" class="text-white mb-2 d-block">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="footer-address">
                                <h4 class="mb-3 text-white">Contact</h4>
                                <ul>
                                    <li class="text-white mb-2">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <span>{{ $settings->address }}</span>
                                    </li>
                                    <li class="text-white mb-2">
                                        <i class="fas fa-phone-alt me-2"></i>
                                        <span>{{ $settings->phone_1 }}</span>
                                    </li>
                                    <li class="text-white mb-2">
                                        <i class="fas fa-envelope me-2"></i>
                                        <span>{{ $settings->email_1 }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="footerCopy text-center p-2">
                    <p>{{ $settings->copyright }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
