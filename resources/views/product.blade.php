@extends('layouts.app')

@section('content')

 <!-- <div class="contrainer">
  <main role="main">
    <div class="container">
    <h2>Category</h2>
      @foreach(App\Category::all() as $cat)
          <a href="{{route('product.filter',[$cat->name])}}"> <button class="btn btn-secondary">{{$cat->name}}</button></a>
      @endforeach 
   -->

     

   <script src="https://static.line-scdn.net/liff/edge/versions/2.4.1/sdk.js"></script>
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
        <!--====================  End of header area  ====================-->
        <!--====================  End of mobile menu overlay  ====================-->
        <!--====================  hero slider ====================-->
        <div>
       
        </div>
        <div class="hero-slider bg-color--grey space-y--10">
        <div class="body-wrapper bg-color--gradient space-pt--70 space-pb--120">
            <div class="container">
                <div class="row row-10">
                    <div class="col-12">
                    
                        <div class="hero-slider-wrapper">
                            <div class="hero-slider-item d-flex bg-img" data-bg="{{asset('admin/img/sl1.jpg')}} " width="250" height="233">
                                <div class="container">
                               
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- hero slider content -->
                                            <div class="hero-slider-content">
                                                <h1 class="hero-slider-content__title space-mb--10">Most popular <br> Coffee</h1>
                                                <p class="hero-slider-content__text">Order Now</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-slider-item d-flex bg-img" data-bg="{{asset('admin/img/sl2.jpg')}} " width="250" height="233">
                                <div class="container">
                                 
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- hero slider content -->
                                            <div class="hero-slider-content">
                                                <h1 class="hero-slider-content__title space-mb--10">Organic <br> Coffee</h1>
                                                <p class="hero-slider-content__text">In Shop</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-slider-item d-flex bg-img" data-bg="{{asset('admin/img/sl3.jpg')}} " width="250" height="233">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- hero slider content -->
                                            <div class="hero-slider-content">
                                                <h1 class="hero-slider-content__title space-mb--10">Fast delivery <br></h1>
                                                <p class="hero-slider-content__text">Free delivery</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of hero slider  ====================-->
        <!--====================  category slider ====================-->
        <div class="category-slider-area bg-color--grey space-pb--25 space-mb--25">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title -->
                        <h2 class="section-title space-mt--10 space-mb--20">Categories</h2>
                        
                        <!-- category slider -->
                        <div class="category-slider-wrapper">
                        
                        <div class="category-item">
                        
                                <div class="category-item__image">
                                    <a href="{{route('shop')}}">
                                        <img src="{{asset('img/icons/category/cat2.svg')}}" class="injectable" alt="">
                                    </a>
                                </div>
                                <div class="category-item__title">
                                    <a href="{{route('product.filter',[$cat->name])}}">all</a>
                                </div>
                            </div>
                        @foreach(App\Category::all() as $cat)
                            <div class="category-item">
                                <div class="category-item__image">
                                    <a href="{{route('product.filter',[$cat->name])}}">
                                        <img src="{{asset('img/icons/coffee-beans.svg')}}" class="injectable" alt="" width="25" height="25">
                                    </a>
                                </div>
                                <div class="category-item__title">
                                    <a href="{{route('product.filter',[$cat->name])}}">{{$cat->name}}</a>
                                </div>
                            </div>
                            @endforeach  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of category slider  ====================-->
        <!--====================  featured product ====================-->
        <div class="featured-product-area space-mb--25">
            <div class="container">
                <div class="row">
                
                    <div class="col-12">
                    
                        <!-- section title -->
                        <!-- featured products -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of featured product  ====================-->
        <!--====================  products area ====================-->
        <div class="products-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    
                        <!-- section title -->
                        <h2 class="section-title space-mb--20">All Products</h2>
                        <!-- all products -->
                        <div class="all-products-wrapper space-mb-m--20">
                            <div class="row row-10">
                            @foreach($products as $product)
                                <div class="col-6">
                                    <div class="grid-product space-mb--20">
                                        <div class="grid-product__image">
                                            <a href="{{route('product.view',[$product->id])}}">
                                            <div class="img-resize">
                                               <img src="{{Storage::url($product->image)}}"  alt="" >
                                            </div>  
                                            </a> 
                                            <a href="{{route('add.cart',[$product->id])}}"> 
                                            <button class="icon" type="button"><img src="fas fa-shoping-cart" class="fas fa-shopping-cart" alt=""></button>
                                            </a>
                                        </div>
                                        <div class="grid-product__content">
                                            <h3 class="title"><a href="shop-product.html">{{$product->name}} </a>
                                            
                                            </h3>
                                            <div class="price">
                                                <span class="discounted-price ">{{$product->price}} บาท</span>
                                            </div>
                                      </div>
                                </div> 
                              </div>
                              @endforeach
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br> <br><br><br><br>
        <!--====================  End of products area  ====================-->
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
    
</body>
<style type="text/css">
div.img-resize img {
	width: 150px;
	height: auto;
}

div.img-resize {
	width: 150px;
	height: 180px;
	overflow: hidden;
	text-align: center;
}
</style>

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js?time=999"></script>
<script type="text/javascript">
     $("document").ready(function(){
     $(".addToCart").click(function(e){
        e.preventDefault();
        var product = $(this).attr('id');
       // alert(product)
        $.ajax({
            //  headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            type: "GET",
            url: "http://localhost:8000/addToCart/"+product,
           // data: { product: product },
            success: function (data) {

            },
            error: function (data) {
             console.log(data)
            }
          });
     })


    });
    
</script>
@endsection
