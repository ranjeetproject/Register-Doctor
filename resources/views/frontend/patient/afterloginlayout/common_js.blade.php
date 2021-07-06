<script src="{{ asset('public/js/frontend/js/jquery-1.11.0.js') }}"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('public/js/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('public/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/js/frontend/js/bootstrap.min.js') }}"></script>
<!-- Script for custom script-->
<script src="{{ asset('public/js/frontend/js/custom-script.js') }}"></script>
<script type="text/javascript">
    $('.carousel').carousel({
        interval: false,
    });
</script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
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
<script src="{{ asset('public/js/frontend/js/responsive-calendar.js') }}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>


@include('common.toastr')
@include('common.sweetalert')

<script type="text/javascript">
	$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

	function changeAccount(user_id) {
		 $.ajax({
                url: "{{route('patient.change-account')}}",
                type:'get',
                dataType: "json",
                // data:{state:state,type:type,_token:token}
                data:{ user_id:user_id}
                }).done(function(response) {
                    if(typeof response != "undefined" && response.success){
                    window.location.replace('{{route('patient.dashboard')}}');
                    }
                });
	}
</script>

@stack('scripts')