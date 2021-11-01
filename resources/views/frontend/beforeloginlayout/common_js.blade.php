<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js')}}" ></script>
<!-- bootstrap.js -->
<script src="{{ asset('public/js/frontend/js/bootstrap.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

 <script src="{{ asset('public/plugins/spce/js/spce.min.js')}}"></script>
  <!-- toastr js-->
 <script src="{{ asset('public/plugins/toastr/toastr.min.js')}}"></script>

  <!-- toastr js-->
<script src="{{ asset('public/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script>
$("button.navbar-toggler").click(function(){
  $("#navbarSupportedContent").toggleClass("show");
});
$(function () {
    $('.top-doctor-warning-info li [data-toggle="tooltip"]').tooltip({
        tooltipClass: "infotooltip",
        position: {
          my: 'center bottom-10',
          at: 'center top'
        },
        create: function(ev, ui) {
          $(this).data("ui-tooltip").liveRegion.remove();
       }
    });
});
</script>
@include('common.toastr')
@include('common.sweetalert')