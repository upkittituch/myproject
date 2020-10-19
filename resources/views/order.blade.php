@extends('layouts.app')

@section('content')
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
                            <div class="header-search">
                                <form>
                                
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- search keywords -->
            
           
        </header>
        <div class="breadcrumb-area bg-color--grey space-y--15">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-3">
                        <a href="{{route('shop')}}" class="back-link"> <i class="fas fa-angle-left"></i> Back</a>
                    </div>
                    <div class="col-6">
                        <h1 class="page-title text-center">order</h1>
                    </div>
                </div>
            </div>
        </div>
 <div class="container">
 	
 	<div class="row justify-content-center">
   
 		<div class="col-md-8">
     
		 <div class="table-responsive">
     <div class="body-wrapper bg-color--gradient space-pt--30 space-pb--120">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>ชื่อ</th>
                        <th>วันที่สั่ง</th>
                        <th>ดูข้อมูล</th>
                       
                        
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($orders)>0)
                      @foreach($orders as $order)
                      <tr>

                        <td><a href="#">{{$order->id}}</a></td>
                       
                        <td>{{$order->user->name}}</td>
                        <td>{{date('d-M-y',strtotime($order->created_at))}}</td>

                        <td>
                            <a href="{{route('user.tracking',[$order->user_id,$order->id])}}">
                                <button class="btn btn-warning"style="width:92; height:20">ดูข้อมูล</button>
                            </a>
                        </td>
                       
                       
                      </tr>
                      @endforeach
 		</div>
 	</div>
	 		          	    @else
                      <td>No any orders to show</td>
                      @endif
 	
                     

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
    <meta charset="utf-8">
  <!-- Bootstrap CSS -->
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
    <style>
    .btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
}
</style>
 @endsection