<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- jQuery Knob Chart -->
<script src="{{ asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<!-- Sparkline -->
<script src="{{ asset('public/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{ asset('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- overlayScrollbars -->
{{-- <script src="{{ asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/js/OverlayScrollbars.min.js" integrity="sha512-5R3ngaUdvyhXkQkIqTf/k+Noq3phjmrqlUQyQYbgfI34Mzcx7vLIIYTy/K1VMHkL33T709kfh5y6R9Xy/Cbt7Q==" crossorigin="anonymous"></script>
<!-- spce js for loader -->
  <script src="{{ asset('public/plugins/spce/js/spce.min.js')}}"></script>
  <!-- toastr js-->
  <script src="{{ asset('public/plugins/toastr/toastr.min.js')}}"></script>

  <!-- toastr js-->
  <script src="{{ asset('public/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.min.js" defer></script>


<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.js')}}"></script>

<script src="{{ asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

{{-- <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> --}}
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js" integrity="sha512-+UiyfI4KyV1uypmEqz9cOIJNwye+u+S58/hSwKEAeUMViTTqM9/L4lqu8UxJzhmzGpms8PzFJDzEqXL9niHyjA==" crossorigin="anonymous"></script> --}}

@include('common.toastr')
@include('common.sweetalert')


<script>
  //*********** for loader ***********///
$(document).ready(function(){
 $(".overlay").hide();
});

  //*********** for dataTable ***********///
    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });



  //*********** for datetimepicker ***********///
   $('.datepicker').datetimepicker({
        // format: 'L',
         format: '{{ getSetting('date_format') ? getSetting('date_format') : 'DD-MM-YYYY' }}',
        // format: 'DD-MM-YYYY',
    });


$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

//Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

$('body').overlayScrollbars({
  className: "os-theme-dark"
});

$(function () {
    $('.textarea').summernote()
  })


// var instance = OverlayScrollbars(document.getElementById('overlayScrollbars'));
</script>

@stack('scripts')
