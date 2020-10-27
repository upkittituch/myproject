@extends('layouts.app')

@section('content')


<link rel="icon" href="{{asset('img/favicon.ico')}}">
    <!-- CSS
		============================================ -->
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

<body>
    <!--====================  preloader area ====================-->
    
    <!--====================  End of preloader area  ====================-->
   
        <!--====================  header area ====================-->
        <header>
            <div class="header-wrapper border-bottom">
                <div class="container space-y--15">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <!-- header logo -->
                            <div class="header-logo">
                                <a href="{{route('shop')}}">
                                <img src="{{asset('admin/img/logo/LogoMakr2.png')}}" class="img-fluid" alt="" width="50" height="50">
                                    
                                </a>
                                @include('notify::messages')
                                @notifyJs
                            </div>
                        </div>
                        
                        <div class="col d-flex justify-content-center">
                            <!-- header search -->
                            <div class="header-search">
                                <form>
                                    <input type="text" id="header-search-input" placeholder="Search With Keyword">
                                    <img src="{{asset('img/icons/search.svg')}}" class="injectable" alt="">
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- search keywords -->
            
            <div class="search-keyword-area space-xy--15 bg-color--grey2" id="search-keyword-box">
                <div class="search-keyword-header space-mb--20">
                    <h4 class="search-keyword-header__title">Keywords</h4>
                   
                </div>
                
                <ul class="search-keywords">
                @foreach(App\Category::all() as $cat)
                    <li><a href="{{route('product.filter',[$cat->name])}}">{{$cat->name}}</a></li>
                    @endforeach
                </ul>
                
            </div>
            
        </header>

        
        <!--====================  End of mobile menu overlay  ====================-->
        <!--====================  product image slider ====================-->
        <div class="product-image-slider-wrapper space-pb--30 space-mb--30">
            <div class="product-image-single">
                <img  src="{{Storage::url($product->image)}}" class="img-fluid" alt="">
            </div>
        </div>
        <!--====================  End of product image slider  ====================-->
        <!--====================  product content ====================-->
        <!-- product content header -->
        <div class="product-content-header-area border-bottom--thick space-pb--30">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-content-header">
                            <div class="product-content-header__main-info">
                                <h3 class="title">{{$product->name}}</h3>
                                <div class="price">
                                    
                                    <span class="discounted-price">{{$product->price}} บาท</span>
                                    
                                </div>
                        
                            </div>
                
           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product content description -->
        <div class="product-content-description border-bottom--thick space-pt--25 space-pb--25">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="space-mb--25">{{$product->desc}} </p>
                        <div class="shop-product-button">
                        <a href="{{route('add.cart',[$product->id])}}" class="btn btn-outline-primary">  Add to cart </a>
                        <a href="{{route('shop')}}" class="btn btn-outline-danger">back</a>
                    </div>
                    
                </div>
            </div>
        </div><br><br><br><br><br><br>
        <!-- product content safety -->
        
        <!-- product color picker -->
        
                
        
        <!-- product content description -->
        
        <!-- shop product button -->
      

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
    
    <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from above) -->
    <!--
  <script src="assets/js/plugins/plugins.min.js"></script>
-->
    <!-- Main JS -->
    <script src="{{asset('js/main.js')}}"></script>
@endsection




