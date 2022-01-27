<script src="{{ asset('public/js/frontend/js/jquery-1.11.0.js') }}"></script>
 {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('public/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/js/frontend/js/popper.min.js') }}"></script>

<script src="{{ asset('public/js/frontend/js/bootstrap.min.js') }}"></script>
<!-- Script for custom script-->
<script src="{{ asset('public/js/frontend/js/custom-script.js') }}"></script>
<script src="{{ asset('public/js/frontend/js/responsive-calendar.js') }}"></script>
{{-- <script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js')}}" defer></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js" integrity="sha512-+UiyfI4KyV1uypmEqz9cOIJNwye+u+S58/hSwKEAeUMViTTqM9/L4lqu8UxJzhmzGpms8PzFJDzEqXL9niHyjA==" crossorigin="anonymous"></script>

<script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>


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


@include('common.toastr')
@include('common.sweetalert')

<script type="text/javascript">
	//*********** for datetimepicker ***********///
   $('.datepicker').datetimepicker({
        // format: 'L',
         format: '{{ getSetting('date_format') ?? 'DD-MM-YYYY' }}',
        // format: 'DD-MM-YYYY',
    });


//*********** for timepicker ***********///
    // $('#timepicker').datetimepicker({
    //   format: 'LT'
    // });

    $(function () {
    $('#timepicker').datepicker({
     format: 'LT'
    });
  });
jQuery('.jsdatetimepicker').datetimepicker({
	 timepicker:true,
	 datepicker:false,
     format:'H:i',
     allowTimes:[
  '00:00', '00:15', '00:30','00:45', '01:00', '01:15', '01:30', '01:45','02:00','02:15','02:30','2:45','03:00','03:15','03:30','03:45','04:00', '04:15', '04:30', '04:45','05:00','05:15', '05:30', '05:45','06:00', '06:15', '06:30', '06:45','07:00', '07:15', '07:30', '07:45','08:00','08:15', '08:30', '08:45','09:00', '09:15', '09:30', '09:45','10:00','10:15', '10:30', '10:45','11:00', '11:15', '11:30', '11:45','12:00','12:15', '12:30', '12:45','13:00','13:15', '13:30', '13:45','14:00','14:15', '14:30', '14:45','15:00','15:15', '15:30', '15:45','16:00','16:15', '16:30', '16:45','17:00','17:15', '17:30', '17:45','18:00','18:15', '18:30', '18:45','19:00','19:15', '19:30', '19:45','20:00','20:15', '20:30', '20:45','21:00','21:15', '21:30', '21:45','22:00','22:15', '22:30', '22:45','23:00','23:15', '23:30', '23:45'
 ],
 //     allowTimes:[
 //  '00:00', '00:15', '00:30', 
 //  '00:45', '01:00', '01:15', '01:30', '01:45'
 // ],
 //  onChangeDateTime:function(dp,$input){
 //    alert($input.val())
 //  }
 //  mask:true,
 //  weekends:['12.07.2020','11.07.2020','03.07.2020','04.07.2020','05.07.2020','06.07.2020'],
 //  format:'d-m-Y H:m a',
});

</script>

@stack('scripts')