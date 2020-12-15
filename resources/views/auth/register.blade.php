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
                </div></div>
            <!-- search keywords --> 
        </header>

<div class="auth-page-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Auth form -->
                        <div class="auth-form">
                            <form method="POST" action="{{ route('register') }}"> @csrf
                                <div class="auth-form__single-field space-mb--30">
                                    <label for="name">Name</label>
                                    <input id="displayName" type="text" class="form-control @error('name') is-invalid @enderror"   name="name"   
                                    required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="auth-form__single-field space-mb--30">
                                <input type="hidden" id="userId" name="userId"  class="form-control">
                                </div>
                                <div class="auth-form__single-field space-mb--30">
                                    <label for="email">E-Mail</label>
                                    <input id="getDecodedIDToken" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="auth-form__single-field space-mb--30">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="auth-form__single-field space-mb--30">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                 
                                </div>
                                <div class="auth-form__single-field space-mb--40">
                                    <p class="auth-form__info-text">Already have an account? <a href="{{ route('login') }}">Sign in Now</a></p>
                                </div>
                                <button class="auth-form__button" type="submit">Register'</button>
                             
                               
  <p id="userId"></p>
  <p id="displayName"></p>
  <p id="statusMessage"></p>
  <p id="getDecodedIDToken"></p>

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://static.line-scdn.net/liff/edge/versions/2.4.1/sdk.js"></script>
        <script>
   
    liff.init({ liffId: "1655117134-YzkaMnxg" }, () => {
      if (liff.isLoggedIn()) {
        runApp()
      } else {
        liff.login();
      }
    }, err => console.error(err.code, error.message));
    function runApp() {
      liff.getProfile().then(profile => {
        
        document.getElementById("userId").value =profile.userId;
        document.getElementById("displayName").value = profile.displayName;
        document.getElementById("statusMessage").value = '<b>StatusMessage:</b> ' + profile.statusMessage;
        document.getElementById("getDecodedIDToken").value = liff.getDecodedIDToken().email;
        console.log.getProfile();
      }).catch(err => console.error(err));
    }


  
  </script>


   
@endsection
