<script src="{{ asset('public/js/frontend/js/jquery-1.11.0.js') }}"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('public/js/frontend/js/bootstrap.min.js') }}"></script>
<!-- Script for custom script-->
<script src="{{ asset('public/js/frontend/js/custom-script.js') }}"></script>
<script type="text/javascript">
    $('.carousel').carousel({
        interval: false,
    });
    $(document).ready(function(){
  $("button.btn.sider-bar-toggle, button.btn.sider-bar-toggle ~ ul.left-nav li a").click(function(){
    $("button.btn.sider-bar-toggle ~ ul.left-nav").toggleClass("main");
  });
});
</script>

 <!-- toastr js-->
 <script src="{{ asset('public/plugins/toastr/toastr.min.js')}}"></script>

  <!-- toastr js-->
<script src="{{ asset('public/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>


@include('common.toastr')
@include('common.sweetalert')