<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registered Doctor</title>
        @include('frontend.pharmacist.afterloginlayout.common_css')
    </head>
    <body>
        <!-- Header Start -->
        <header class=" for-w-100">
            <div class="container">
                @include('frontend.pharmacist.afterloginlayout.common_header')
                @include('frontend.pharmacist.afterloginlayout.common_navigation')
            </div>
        </header>
        <!-- Header end -->
        <!-- Content -->
        <section class="for-w-100 main-content innerpage  Prescription-dashboard-page">
            <div class="container">
                <div class="row">
                    @include('frontend.pharmacist.afterloginlayout.common_sidebar')

                    <!-- body content start -->
                        @yield('content')
                    <!-- body content end -->

                </div>
            </div>
        </section>
        <!-- Footer start -->
        @include('frontend.pharmacist.afterloginlayout.common_footer')
        @include('frontend.pharmacist.afterloginlayout.common_js')
        <!-- Footer end -->
        @yield('scripts')
    </body>
</html>