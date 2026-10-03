<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="description" content="This site is govt. Administrative site" />
    <meta name="keywords" content="army, military, administrive" />
    <title>{{ $settings->title }}</title>
    <!-- site icon part  -->
    <link rel="shortcut icon"
        href="{{ asset('uploads/settings/' . $settings->favicon) ?? asset('frontend/images/favicon.jpg') }}" />

    <!-- Boostrap css link part  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />

    <!-- fontawesome css link part  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}" />

    <!-- themfy icon css start  -->
    <link rel="stylesheet" href="{{ asset('frontend/fonts/themify-icons.css') }}" />

    <!-- animate css link start  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}" />

    <!-- owl carousel css start  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}" />

    <!-- venubox css link start  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}" />

    <!-- main css link start  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />

    <!-- responsive css link start  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />

    @stack('styles')
</head>

<body>
    <!-- preloader start  -->
    <div class="preloader">
        <div class="status">
            <div class="status-mes">
                <h4>Fighter</h4>
            </div>
        </div>
    </div>
    <!-- preloader end  -->
    <div class="wrapper" id="wrapper">
        <!-- header part start  -->
        @include('frontend.partials.header')
        <!-- header part end  -->

        @yield('content')


        <!-- footer part start  -->
        @include('frontend.partials.footer')
        <!-- footer part end  -->
        <div class="scroolBtn" id="scrollTopBtn">
            <a href="#wrapper"><i class="fas fa-angle-up"></i></a>
        </div>
    </div>

    <!-- jquirey link js start  -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>

    <script>
        const topmenu = document.querySelector('.topmenu');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 0) {
                topmenu.classList.add('scrollmenu');
            } else {
                topmenu.classList.remove('scrollmenu');
            }
        });
    </script>

    <!-- counter plugin js link start  -->
    <script src="{{ asset('frontend/js/counterup.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.counter').counterUp();
        });
    </script>



    <!-- imagesLoaded plugin (important for fixing overlap) -->
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>

    <!-- isotop filter plugin start  -->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>

    <script>
        $(window).on('load', function() {
            var $grid = $('.grid');

            // Wait until all images are loaded, then initialize isotope
            $grid.imagesLoaded(function() {
                $grid.isotope({
                    itemSelector: '.grid-item',
                    layoutMode: 'fitRows',
                });
            });

            // Filter buttons
            $('.filters-button-group').on('click', 'li', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
                $('.filters-button-group li').removeClass('is-checked');
                $(this).addClass('is-checked');
            });

            // Relayout when each image loads (extra stability)
            $grid.imagesLoaded().progress(function() {
                $grid.isotope('layout');
            });
        });
    </script>

    <!-- bootstrap js link start  -->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

    <!-- venubox js link start  -->
    <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>

    <!-- wow js link start  -->
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>

    <!-- owl carousel js link start  -->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script>
        $('#testSlider').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            autoPlay: true,
            item: 1,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1000: {
                    items: 1,
                },
            },
        });
    </script>

    <!-- main js link start  -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    @stack('scripts')
</body>

</html>
