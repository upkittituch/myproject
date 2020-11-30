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
                                <img src="{{asset('admin/img/logo/LogoMakr2.png')}}" class="img-fluid" alt="" width="50" height="50">
                                    
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
                        <a href="{{route('address.index')}}" class="back-link"> <i class="fas fa-angle-left"></i> Back</a>
                    </div>
                    <div class="col-6">
                        <h1 class="page-title text-center">Address</h1>
                    </div>
                  
                    
            </div>
        </div>
 <div class="container">
 	
 	<div class="row justify-content-center">
   
 		<div class="col-md-8">
     
		 <div class="table-responsive">
     <div class="body-wrapper bg-color--gradient space-pt--30 space-pb--120">
                  <table class="table align-items-center table-flush">
                  {!! Form::open(['action' => 'AddressController@store','method'=>'post','files'=>true] )!!}
                    {!! csrf_field() !!}
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('title') !!}
                                {!! Form::text('title',null,["class"=>"form-control" ,'placeholder'=>'title', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('address') !!}
                                {!! Form::textarea('address',null,["class"=>"form-control" ,'placeholder'=>'address', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('postcode') !!}
                                {!! Form::text('postcode',null,["class"=>"form-control" ,'placeholder'=>'postcode', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('phone') !!}
                                {!! Form::text('phone',null,["class"=>"form-control" ,'placeholder'=>'phone', 'required'])!!}
                            </div>
                        </div>
                            

                            <input type="submit" value="save" class="btn btn-primary">
                            <a href="{{URL::previous()}}" class="btn btn-success">back</a>
                        </div>
                    {!! Form::close() !!}
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
   
  <script src="assets/js/plugins/plugins.min.js"></script>

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
   
			<link rel="stylesheet" href="{{asset('css/vendor.min.css')}}">
			<link rel="stylesheet" href="{{asset('css/plugins/plugins.min.css')}}">
			
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