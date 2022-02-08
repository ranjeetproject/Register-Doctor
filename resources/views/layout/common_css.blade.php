  <link rel="shortcut icon" href="{{ asset('public/images/frontend/images/favicon.png') }}" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

   <link rel="stylesheet" href="{{ asset('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/css/admin/admin-custom.css')}}">
  <!-- overlayScrollbars -->
  {{-- <link rel="stylesheet" href="{{ asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.min.css" integrity="sha512-pYQcc5kgavar0ah58/O8hw/6Tbo3mWlmQTmvoi1i96cBz7jQYS9as5J+Nfy32rAHY6CgR9ExwnFMcBdGVcKM7g==" crossorigin="anonymous" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('public/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- spce css for loader -->
  <link rel="stylesheet" href="{{ asset('public/plugins/spce/css/blue/pace-theme-flash.css')}}">

   <!-- toastr -->
  <link rel="stylesheet" href="{{ asset('public/plugins/toastr/toastr.min.css')}}">

  <link rel="stylesheet" href="{{ asset('public/plugins/sweetalert2/sweetalert2.min.css')}}">

   <link rel="stylesheet" href="{{ asset('public/plugins/summernote/summernote-bs4.css')}}">
   
   {{-- <link rel="stylesheet" href="{{ asset('public/css/ckeditor.css')}}"> --}}

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
{{-- <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}

  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" /> --}}
  
  @stack('css')
