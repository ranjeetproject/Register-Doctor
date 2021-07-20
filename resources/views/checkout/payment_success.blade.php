@extends('layout.frontend_layout')

@section('title', 'home')

@section('body')

<div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto mt-5">
         <div class="payment">
            <div class="payment_header">
               <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
            </div>
            <div class="content">
               <h1>Payment Success !</h1>
               <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. </p>
               <a href="{{route('patient.requested-consults')}}">Go to Dashboard</a>
            </div>
            
         </div>
      </div>
   </div>
</div>


@endsection

@push('scripts')
    <script type="text/javascript">

    </script>
@endpush