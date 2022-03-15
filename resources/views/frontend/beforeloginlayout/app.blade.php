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
            @include('common.sickNoteVerify')
            @include('cookieConsent::index')
        <!-- Footer end -->

         <!-- common js start -->
            @include('frontend.beforeloginlayout.common_js')
        <!-- common js end -->
           @stack('scripts')
           <script>
               $( document ).ready(function() {
                    // console.log( "ready!" );
                    $('#verify_sick_note').click(function(){

                        $('#sickNotVerifyModal').modal('show');
                    });
                    $('#stick_note_verify_btn').click(function(){
                        if($('#stick_note_id').val() == ''){
                            alert('Please enter sick note id');
                        } else {
                            $.ajax({
                                type:'GET',
                                url:"{{ route('verify_sick_note') }}",
                                data:{
                                    sick_note_id: $('#stick_note_id').val()
                                },
                                success:function(data) {
                                    console.log(data);
                                    $("#sick_note_msg").html(data);
                                }
                            });
                        }

                    });
                });

           </script>
    </body>
</html>
