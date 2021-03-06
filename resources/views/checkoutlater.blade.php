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
                                <img src="{{asset('admin/img/logo/LogoMakr2.png')}}" class="img-fluid" alt="" width="50" height="50">
                                    
                                </a>
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- search keywords -->
          
           
</head>
<body>
    <!--====================  preloader area ====================-->
  
    <!--====================  End of preloader area  ====================-->
    <div class="body-wrapper bg-color--gradient space-pt--40 space-pb--60">
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

 	     <form action="/chargelater" method="post" id="payment-form">@csrf
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" required="" value="{{auth()->user()->name}}" readonly="">
                      </div>
                    
                      <div class="form-group">
                            <label for="">Choose Address</label>
                              <select name="address"  class="form-control" id="address"  required=""  >
                                <option value="">select</option>
                                @foreach($address as $item)
                                  <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                              </select>   
                          </div>
                      <div class="">
              <input type="hidden" name="amount" value="{{$amount}}">
              <input id="payment" name="payment" type="hidden" value="เก็บเงินปลายทาง">

             
                    <br>
                    <button class="btn btn-success col-12" type="submit">Submit Payment</button>
                
                
   
            </form>
            </div>
        </div>
    </div>
</div>
</div><br><br><br><br><br><br><br>
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
                <a href="{{route('address.index')}}" class="footer-nav-single">
                    <div class="menu-wrapper">
                        <img src="{{asset('img/icons/list.svg')}}" class="injectable" alt="">
                        <span>Address</span>
                    </div>
                </a>
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

 


@endsection
