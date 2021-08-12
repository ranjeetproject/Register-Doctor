<!DOCTYPE html>
<html lang="en">
<head>
  <title>Stripe Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
      .login-page .form-card {
    max-width: 500px;
    margin: 0 auto;
    padding: 50px 0px;
    -webkit-box-shadow: 0px 0px 8px #dbf3ff;
    box-shadow: 0px 0px 8px #dbf3ff;
    border-radius: 12px;
    background-size: cover;
    background-position: center center;
}
.for-title {
    text-align: center;
    font-weight: 300;
    font-size: 24px;
}
.for-title span{
    font-weight: 700;
    font-size: 24px;
    color:#294876;
}
.card-footer, .card-header {
    background: transparent;
    border: none;
}
.card-header{
    font-weight: 600;
    font-size: 18px;
    color:#294876;
}
form#payment-form {
    border-radius: 10px;
    padding: 00px 30px;
}
button#card-button {
    background: linear-gradient(right, #0351d2 0%, #25b5ff 100%);
    background: -webkit-linear-gradient(right, #0351d2 0%, #25b5ff 100%);
    width: 100%;
    border-radius: 50px;
    padding: 10px;
    border:0px;
}
.crd-logo {
    text-align: center;
}
.crd-logo img{
    width:120px;
}
@media(max-width:767px){
form#payment-form {
    border-radius: 10px;
    padding: 00px 0px;
}
}
  </style>
</head>
<body>

    @php
        $stripe_key = env('STRIPE_KEY');
    @endphp
    <div class="for-w-100 main-content innerpage login-page">
    <div class="container " style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card form-card">
                    <div class="crd-logo">
                        <a href="#" class="brand-link">
                        <img src="{{  asset('public/images/frontend/images/'.getSetting('logo')) }}/logo.jpg"  class="brand-image img-circle elevation-3"
                           >
                        </a>
                    </div>
                    <div class="for-title">
                        <p>You will be charged <span>${{$amount}}</span></p>
                    </div>
                    <form action="{{route('patient.payment.credit-card')}}"  method="post" id="payment-form">
                        @csrf
                        <input type="hidden" name="case_id" value="{{ Request::segment(3) }}">
                        <input type="hidden" name="intent_id" value="{{ $intent_id }}">
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                        <div class="card-footer">
                          <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent }}"
                        > Pay </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>
