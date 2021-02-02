<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @include('frontend.layout.common_css')

    </head>
    <body>
        <!-- Header Start -->
        <header class=" for-w-100">
            <div class="container">
                @include('frontend.layout.common_header')
                @guest
                    @include('frontend.layout.common_navigation')
                @endguest
            </div>
        </header>
        <!-- Header end -->
        <!-- Banner start -->
            @guest
                @include('frontend.layout.common_banner')
            @endguest
        <!-- Banner End-->

        <!-- Content start -->
            @yield('content')
        <!-- Content end -->

        <!-- Footer start -->
            @include('frontend.layout.common_footer')
        <!-- Footer end -->
    </body>
</html>
