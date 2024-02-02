@extends('layouts.auth')

@section('page-title', trans('Login'))

@section('content')
<head>
		<!-- Meta data -->
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="description" content="">
		
        <!-- CSRF Token -->
        <meta name="csrf-token" content="LLNctwYyxEFVzHbx1dQ97sSmw3aht37JOGcIFzFW">

        <!-- Title -->
        <title>Me AI</title>

		<!-- Style css -->
		<link href="https://ai.armestudio.co.id/plugins/tippy/scale-extreme.css" rel="stylesheet" />
		<link href="https://ai.armestudio.co.id/plugins/tippy/material.css" rel="stylesheet" />

		<!--Favicon -->
<link rel="icon" href="https://ai.armestudio.co.id/img/brand/favicon.ico" type="image/x-icon"/>

<!-- Animate -->
<link href="https://ai.armestudio.co.id/css/animated.css" rel="stylesheet" />

<!-- Bootstrap 5 -->
<link href="https://ai.armestudio.co.id/plugins/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
<link href="https://ai.armestudio.co.id/css/icons.css" rel="stylesheet" />

<!-- P-scrollbar -->
<link href="https://ai.armestudio.co.id/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

<!-- Simplebar -->
<link href="https://ai.armestudio.co.id/plugins/simplebar/css/simplebar.css" rel="stylesheet">

<!-- Tippy -->
<link href="https://ai.armestudio.co.id/plugins/tippy/scale-extreme.css" rel="stylesheet" />
<link href="https://ai.armestudio.co.id/plugins/tippy/material.css" rel="stylesheet" />

<!-- Toastr -->
<link href="https://ai.armestudio.co.id/plugins/toastr/toastr.min.css" rel="stylesheet" />

<link href="https://ai.armestudio.co.id/plugins/awselect/awselect.min.css" rel="stylesheet" />


<!-- All Styles -->
<link href="https://ai.armestudio.co.id/css/app.css" rel="stylesheet" />


	
	
<script type="text/javascript" class="flasher-js">(function() {    var rootScript = 'https://cdn.jsdelivr.net/npm/@flasher/flasher@1.3.1/dist/flasher.min.js';    var FLASHER_FLASH_BAG_PLACE_HOLDER = {};    var options = mergeOptions([], FLASHER_FLASH_BAG_PLACE_HOLDER);    function mergeOptions(first, second) {        return {            context: merge(first.context || {}, second.context || {}),            envelopes: merge(first.envelopes || [], second.envelopes || []),            options: merge(first.options || {}, second.options || {}),            scripts: merge(first.scripts || [], second.scripts || []),            styles: merge(first.styles || [], second.styles || []),        };    }    function merge(first, second) {        if (Array.isArray(first) && Array.isArray(second)) {            return first.concat(second).filter(function(item, index, array) {                return array.indexOf(item) === index;            });        }        return Object.assign({}, first, second);    }    function renderOptions(options) {        if(!window.hasOwnProperty('flasher')) {            console.error('Flasher is not loaded');            return;        }        requestAnimationFrame(function () {            window.flasher.render(options);        });    }    function render(options) {        if ('loading' !== document.readyState) {            renderOptions(options);            return;        }        document.addEventListener('DOMContentLoaded', function() {            renderOptions(options);        });    }    if (1 === document.querySelectorAll('script.flasher-js').length) {        document.addEventListener('flasher:render', function (event) {            render(event.detail);        });    }    if (window.hasOwnProperty('flasher') || !rootScript || document.querySelector('script[src="' + rootScript + '"]')) {        render(options);    } else {        var tag = document.createElement('script');        tag.setAttribute('src', rootScript);        tag.setAttribute('type', 'text/javascript');        tag.onload = function () {            render(options);        };        document.head.appendChild(tag);    }})();</script>
</head>
<div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p" id="login">
    <div class="text-center">
        <img src="{{ url('assets/img/vanguard-logo.png') }}" alt="{{ setting('app_name') }}" height="50">
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title text-center mt-4 text-uppercase">
                @lang('Login')
            </h5>
            <div class="divider">

            <div class="p-4">
                <!--@include('auth.social.buttons')-->
                
                
                <div class="p-4">
    <div class="social-logins-box text-center">
        <a href="https://mindstratirs.armestudio.co.id/auth/google/login" class="social-login-button" id="login-google" style="width: 120px;height: 40px;margin-bottom: 10px;">
            <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" alt="Google Logo" class="mr-3" width="22" height="22">
            Sign In with Google
        </a>
    </div>
    <div class="social-logins-box text-center">
        <a href="https://mindstratirs.armestudio.co.id/auth/facebook/login" class="social-login-button" id="login-facebook" style="width: 120px; height: 40px;">
            <img src="https://www.logo.wine/a/logo/Facebook/Facebook-f_Logo-Blue-Logo.wine.svg" alt="Facebook Logo" class="mr-3" width="22" height="22">
            Sign In with Facebook
        </a>
    </div>
</div>

                
                
                
<!--                 <div class="social-logins-box text-center">-->
                                                                        	
<!--                                <a href="https://mindstratirs.armestudio.co.id/auth/google/login" class="social-login-button" id="login-google">-->
<!--                                        <svg class="mr-3" width="22" height="22" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                            <path d="M23.001 12.2332C23.001 11.3699 22.9296 10.7399 22.7748 10.0865H12.7153V13.9832H18.62C18.501 14.9515 17.8582 16.4099 16.4296 17.3898L16.4096 17.5203L19.5902 19.935L19.8106 19.9565C21.8343 18.1249 23.001 15.4298 23.001 12.2332Z" fill="#4285F4"></path>-->
<!--                                            <path d="M12.714 22.5C15.6068 22.5 18.0353 21.5666 19.8092 19.9567L16.4282 17.3899C15.5235 18.0083 14.3092 18.4399 12.714 18.4399C9.88069 18.4399 7.47596 16.6083 6.61874 14.0766L6.49309 14.0871L3.18583 16.5954L3.14258 16.7132C4.90446 20.1433 8.5235 22.5 12.714 22.5Z" fill="#34A853"></path>-->
<!--                                            <path d="M6.62046 14.0767C6.39428 13.4234 6.26337 12.7233 6.26337 12C6.26337 11.2767 6.39428 10.5767 6.60856 9.92337L6.60257 9.78423L3.25386 7.2356L3.14429 7.28667C2.41814 8.71002 2.00146 10.3084 2.00146 12C2.00146 13.6917 2.41814 15.29 3.14429 16.7133L6.62046 14.0767Z" fill="#FBBC05"></path>-->
<!--                                            <path d="M12.7141 5.55997C14.7259 5.55997 16.083 6.41163 16.8569 7.12335L19.8807 4.23C18.0236 2.53834 15.6069 1.5 12.7141 1.5C8.52353 1.5 4.90447 3.85665 3.14258 7.28662L6.60686 9.92332C7.47598 7.39166 9.88073 5.55997 12.7141 5.55997Z" fill="#EB4335"></path>-->
<!--                                        </svg>-->
<!--                                        Sign In with Google</a>-->
                                    	
                                    	
<!--                                </div>-->
<!--<div class="p-4">-->
<!--    <div class="social-logins-box text-center">-->
<!--        <a href="https://mindstratirs.armestudio.co.id/auth/facebook/login" class="social-login-button" id="login-facebook">-->
<!--            <img src="https://www.logo.wine/a/logo/Facebook/Facebook-f_Logo-Blue-Logo.wine.svg" alt="Facebook Logo" class="mr-3" width="22" height="22">-->
<!--            Sign In with Facebook-->
<!--        </a>-->
<!--    </div>-->
<!--</div>-->



                         <h5 class="card-title text-center mt-1 text-uppercase">
                             @lang('OR')</h5>
                @include('partials.messages')

                <form role="form" action="<?= url('login') ?>" method="POST" id="login-form" autocomplete="off" class="mt-3">

                    <input type="hidden" value="<?= csrf_token() ?>" name="_token">

                    @if (Request::has('to'))
                        <input type="hidden" value="{{ Request::get('to') }}" name="to">
                    @endif

                    <div class="form-group">
                        <label for="username" class="sr-only">@lang('Email or Username')</label>
                        <input type="text"
                                name="username"
                                id="username"
                                class="form-control input-solid"
                                placeholder="@lang('Email or Username')"
                                value="{{ old('username') }}">
                    </div>

                    <div class="form-group password-field">
                        <label for="password" class="sr-only">@lang('Password')</label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control input-solid"
                               placeholder="@lang('Password')">
                    </div>


                    @if (setting('remember_me'))
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" value="1"/>
                            <label class="custom-control-label font-weight-normal" for="remember">
                                @lang('Remember me?')
                            </label>
                        </div>
                    @endif

    
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-login">
                            @lang('Log In')
                        </button>
                    </div>
                </form>

                @if (setting('forgot_password'))
                    <a href="<?= route('password.request') ?>" class="forgot">@lang('I forgot my password')</a>
                @endif
            </div>
        </div>
    </div>

    <div class="text-center text-muted">
        @if (setting('reg_enabled'))
            @lang("Don't have an account?")
            <a class="font-weight-bold" href="<?= url("register") ?>">@lang('Sign Up')</a>
        @endif
    </div>
</div>

@stop

@section('scripts')
    {!! HTML::script('assets/js/as/login.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\LoginRequest', '#login-form') !!}
@stop
