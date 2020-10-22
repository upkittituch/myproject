@extends('layouts.app')

@section('content')
<script src="https://static.line-scdn.net/liff/edge/versions/2.4.1/sdk.js"></script>

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
<body>
<form method="POST" action="{{ route('login') }}">
                        @csrf
<div class="auth-page-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Auth form -->
                        <div class="auth-form">
                            <form action="index.html">
                                <div class="auth-form__single-field space-mb--30">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                                <div class="auth-form__single-field space-mb--30">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="auth-form__single-field space-mb--40">
                                    <a class="auth-form__info-text" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                </div>
                                <div class="auth-form__single-field space-mb--40">
                                    <a class="auth-form__info-text" href="{{ route('register') }}">{{ __('Not a member ? sings up now') }}</a>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        
                                    </a>
                                @endif
                                <button class="auth-form__button "type="submit">{{ __('Login') }}</button>
 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>


</body>



@endsection
