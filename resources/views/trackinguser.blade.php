@extends('layouts.app')

@section('content')






    <!-- CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type='text/css'>
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
                        <div class="col d-flex justify-content-center">
                            <!-- header search -->
                           
                        </div>
                    </div>
                </div>
            </div>
            </header>


           
  
    
       <body>
           
     
        
        @foreach($carts as $cart)
        @foreach($inform as $informs)
        

            <h3>Order Number: {{$informs->id}}</h3>
            <article class="card"><br><br>
            
                <div class="card-body row ">
                    <div class="col"> <strong>บริษัทจัดส่ง:</strong> <br> {{$informs->company}} </div>
                    <div class="col"> <strong>ที่อยู่ที่จัดส่ง:</strong> <br> {{$informs->address}} <span>{{$informs->postalcode}} </span></div>
                    <div class="col"> <strong>Tracking #:</strong> <br> {{$informs->tracking_number}} </div>
                </div>@endforeach
            </article>
            <article class="card">
            <div class="track">
                @if($informs->tracking == 'processed')
                  <div class="step active"> <span class="icon"> <i class="fas fa-check"></i> </span> <span class="text">กำลังนำเนินการ</span> </div>
                  <div class="step"> <span class="icon"> <i class="fas fa-user"></i> </span> <span class="text"> จัดเตรียมสินค้า</span> </div>
                  <div class="step"> <span class="icon"> <i class="fas fa-truck"></i> </span> <span class="text"> จัดส่งแล้ว </span> </div>
                  
                @elseif ($informs->tracking=='packing')
                    <div class="step active"> <span class="icon"> <i class="fas fa-check"></i> </span> <span class="text">กำลังนำเนินการ</span> </div>
                  <div class="step active" > <span class="icon"> <i class="fas fa-user"></i> </span> <span class="text"> จัดเตรียมสินค้า</span> </div>
                  <div class="step"> <span class="icon"> <i class="fas fa-truck"></i> </span> <span class="text"> จัดส่งแล้ว </span> </div>
                @elseif ($informs->tracking=='delivered')
                    <div class="step active"> <span class="icon"> <i class="fas fa-check"></i> </span> <span class="text">กำลังนำเนินการ</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fas fa-user"></i> </span> <span class="text"> จัดเตรียมสินค้า</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fas fa-truck"></i> </span> <span class="text"> จัดส่งแล้ว </span> </div>
                @endif
            </div>
            <hr>@endforeach
            </article>
            <article class="card">
            <div class="cart-product-area">
  
    @foreach($cart->items as $item)
            <div class="cart-product border-bottom--medium">
                <div class="cart-product__image">
                    
                        <img src="{{Storage::url($item['image'])}}" style="height: 100px ;width: 100px" class="img-fluid" alt="">
                    
                </div>
                <div class="cart-product__content">
                    <h3 class="title"><a >ชื่อสินค้า : {{$item['name']}}</a></h3>
                    <div class="qty">
                      
                        <span class="discounted-price">จำนวณ : {{$item['qty']}}</span>
                    </div>
                    
                    <div class="price">
                      
                        <span class="discounted-price">ราคาสินค้า :{{$item['price']}} </span>
                    </div>
                </div>
                </div>
                @endforeach

            </div>  
            </article>
    </div>    <br><br><br>
                
    
    </body>
    <footer>
        
        <div class="footer-nav-wrapper">
            <a href="{{route('shop')}}" class="footer-nav-single">
                <div class="menu-wrapper">
                    <img src="{{asset('img/icons/home.svg')}}" class="injectable"  alt="">
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

<style >
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

body {
    background-color: #eeeeee;
    font-family: 'Open Sans', serif
}


.card {
    
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
    
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #FF5722
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}



.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

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
</style >
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
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endsection