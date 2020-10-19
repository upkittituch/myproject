@extends('layouts.app')

@section('content')
<style>
  .StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>
<head>
    <meta charset="utf-8">
    <!-- CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/slick.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/cssanimation.min.css')}}">
    <!-- IonRange slider CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/ion.rangeSlider.min.css')}}">
    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from above) -->
    <!--
			<link rel="stylesheet" href="assets/css/vendor.min.css">
			<link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
			-->
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <header>
            <div class="header-wrapper border-bottom">
                <div class="container space-y--15">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <!-- header logo -->
                            <div class="header-logo">
                                <a href="index.html">
                                    <img src="{{asset('img/logo.png')}}" class="img-fluid" alt="">
                                    
                                </a>
                               
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <!-- header search -->
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- search keywords -->
          
           
</head>
<body>
    <!--====================  preloader area ====================-->
  
    <!--====================  End of preloader area  ====================-->
    <div class="body-wrapper bg-color--gradient space-pt--40 space-pb--30">
        <!--====================  header area ====================-->
        
 	<div class="col-md-6">
 		<div class="card">
     
     <div class="breadcrumb-area bg-color--grey space-y--15">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-3">
                        <a href="{{route('shop')}}" class="back-link"> <i class="fas fa-angle-left"></i> Back</a>
                    </div>
                    <div class="col-6">
                        <h1 class="page-title text-center">Cart</h1>
                    </div>
                </div>
            </div>
        </div>

 	     <form action="/charge" method="post" id="payment-form">@csrf
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" required="" value="{{auth()->user()->name}}" readonly="">
                      </div>
                    
                      <div class="form-group">

                        <label>Adress</label>
                        <input type="text" name="address" id="address" class="form-control" required="">
                      </div>
                      <div class="form-group">

                        <label>phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" required="">
                      </div>
                      <div class="form-group">

                        <label>Postal code</label>
                        <input type="text" name="postalcode" id="postalcode" class="form-control" required="">
                      </div>
                      <div class="">
              <input type="hidden" name="amount" value="{{$amount}}">


                <div class="">
                <label for="card-element">
                    Credit or debit card
                  </label>
                  <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                  </div>

                  <!-- Used to display form errors. -->
                  <div id="card-errors" role="alert"></div>
                </div>
                    <div class='vertical-center'>
                    <button class="btn btn-primary mt-4" type="submit">Submit Payment</button>
                    </div>
                
   
            </form>
            </div>
        </div>
    </div>
</div>
</div>
<footer>
        
            <div class="footer-nav-wrapper">
                <a href="{{route('shop')}}" class="footer-nav-single">
                    <div class="menu-wrapper">
                        <img src="{{asset('img/icons/home.svg')}}" class="injectable" alt="">
                        <span>Home</span>
                    </div>
                </a>
                
                <a href="{{route('cart.show')}}" class="footer-nav-single">
                    <div class="menu-wrapper">
                        ({{session()->has('cart')?session()->get('cart')->totalQty:'0'}})
                        
                        <img src="{{asset('/img/icons/cart.svg')}}" class="injectable" alt="">
                        
                        <span>Cart</span>
                    </div>
                </a>
                @if(Auth::check())
                
                      
                <a href="{{route('order')}}" class="footer-nav-single">
                    <div class="menu-wrapper">
                        <img src="{{asset('img/icons/profile.svg')}}" class="injectable" alt="">
                        <span>Profile</span>
                    </div>
                </a>
                @endif
            </div>
        </footer>
      

     
     <script src="{{asset('js/modernizr-2.8.3.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- IonRanger JS -->
    <script src="{{asset('js/plugins/ion.rangeSlider.min.js')}}"></script>
    <!-- SVG inject JS -->
    <script src="{{asset('js/plugins/svg-inject.min.js')}}"></script>
    <!-- Slick slider JS -->
    <script src="{{asset('js/plugins/slick.min.js')}}"></script>
    <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from above) -->
    <!--
  <script src="assets/js/plugins/plugins.min.js"></script>
-->
    <!-- Main JS -->
    <script src="{{asset('js/main.js')}}"></script>

    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">

  // Create a Stripe client.
window.onload=function(){
var stripe = Stripe('pk_test_51HX8OSEJdvtfnGl3rcrbGeBmzTlr8CBEoMr9RsCAOJqW70oJifg2In4xEex6rp9ZjYsyfGgqCURGfdVfLKid5Bdl00iFW90nBg');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
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

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
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

  var options={
    name:document.getElementById('name').value,
    address_line1:document.getElementById('address').value,
    address_zip:document.getElementById('postalcode').value
  }

  stripe.createToken(card,options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
}
</script>

@endsection
