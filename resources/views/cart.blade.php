@extends('layouts.app')
@section('content')

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
    <div class="body-wrapper bg-color--gradient space-pt--40 space-pb--120">
        <!--====================  header area ====================-->
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
            <!-- search keywords -->
        
        <!--====================  End of header area  ====================-->
        <!--====================  mobile menu overlay ====================-->
        <!--====================  End of mobile menu overlay  ====================-->
        <!--====================  breadcrumb area ====================-->
        
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

        <!--====================  End of breadcrumb area  ====================-->
        <!--====================  cart product area ====================-->
        <div class="cart-product-area">
            @if($cart)
            
            @foreach($cart->items as $product)
            <div class="cart-product border-bottom--medium col-12">
            
                                           
                                     
                <div class="cart-product__image">
                    <a href="shop-product.html">
                    
                        <img src="{{Storage::url($product['image'])}}" class="img-fluid"  alt="">
                    </a>
                    
                </div>
               
                <div class="cart-product__content ">
                    <h3 class="title "><a href="shop-product.html">{{$product['name']}}</a></h3>
                    <div class="price">
                        
                        <span class="discounted-price">{{$product['price']}}</span>
                    </div>
                </div>
                <div class="cart-product__counter">
                <form action="{{route('cart.update',$product['id'])}}" method="post"> @csrf
                <div class="cart-plus-minus">
                        <input class="cart-plus-minus-box" type="text" name="qty"  value="{{$product['qty']}}">  
                        <button class="btn btn-2" type="submit">update </button>
                </div>        
                       
                </form>      
                </div>
                <form action="{{route('cart.remove',$product['id'])}}" class="icon col-2" method="post"style="height:45px" >@csrf 
                <button><i class="fas fa-trash"></i></button>
                </form>

            </div>
            @endforeach

        </div>
     
        <!--====================  End of cart product area  ====================-->
     
        <div class="grand-total space-mt--20">
            <div class="container">
                <div class="row">
                    <div class=" col">
                        <h4 class="grand-total-title"> Total <span>{{$cart->totalPrice}} บาท</span></h4>
                        
                        <a href="{{route('cart.checkout',$cart->totalPrice)}}">Checkout</a>
                        
                    </div>
                </div>
            </div><br><br><br><br>
            @else
            <td>No items in cart</td>
            @endif
        </div><br><br><br><br><br><br><br> <br><br><br><br><br> <br><br><br><br>
        <!--====================  footer area ====================-->
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
        <!--====================  End of footer area  ====================-->
    </div>
    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
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
<style type="text/css">
div.img-resize img {
	width: 100px;
	height: 100px;
}

div.img-resize {
	width: 100px;
	height: 100px;
	overflow: hidden;
	text-align: center;
}



</style>
          
            
 @endsection
