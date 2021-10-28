<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @include('frontend.beforeloginlayout.common_css')

    </head>
    <body>
        <!-- Header Start -->
        <header class=" for-w-100">
            <div class="container">
                @include('frontend.beforeloginlayout.common_header')

                @include('frontend.beforeloginlayout.common_navigation')
            </div>
        </header>
        <!-- Header end -->
        <!-- Banner start -->
            {{-- @include('frontend.beforeloginlayout.common_banner') --}}
            @if (isset($banner))
                @yield('banner')
            @else
                @include('frontend.beforeloginlayout.common_banner')
            @endif
        <!-- Banner End-->

        <!-- Content start -->
            @yield('content')
        <!-- Content end -->

        <!-- Footer start -->
            @include('frontend.beforeloginlayout.common_footer')
        <!-- Footer end -->

         <!-- common js start -->
            @include('frontend.beforeloginlayout.common_js')
        <!-- common js end -->
           @stack('scripts')
    </body>
</html>
