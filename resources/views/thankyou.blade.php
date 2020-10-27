@extends('layouts.app')

@section('content')
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
                                  
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- search keywords -->
            
          
                
              
                
            </div>
            
        </header>
<div class="jumbotron text-center">

<a>
<img src="{{asset('img/pngegg.png')}}"  width="200"  height="200" >
</a>

  <h1 class="display-3">ขอบคุณที่ใช้บริการ</h1>
  <p class="lead"><strong>โปรดเช็คข้อมูลการจัดส่งได้ที่ประวัติการซื้อของท่าน</strong> ทางเราจะอัพเดทข้อมูลการจัดส่งและส่งเลขพัสดุให้ทางประวัติการซื้อของท่าน.</p>
  <hr>
  <p>
    หากมีปัญหาโปรดติดต่อ<a href="">+66 623674752</a>
  </p>
  <p class="lead">
   
  </p>
</div>
<script src="https://static.line-scdn.net/liff/edge/versions/2.4.1/sdk.js"></script>

<script>

liff.closeWindow();
function closeWin() {
  myWindow.close();   // Closes the new window
}
</script>
@endsection
