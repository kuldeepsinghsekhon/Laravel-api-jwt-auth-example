<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Income and Expense tracker for business and personal use.">
    <meta name="author" content="Simcy Creative">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/app/'.env('APP_ICON')) }}">
    <title>Login to your account | {{ env('APP_NAME') }}</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.3/css/intlTelInput.css" />
    <!-- Material design icons -->
    <!-- <link href="{{ asset('assets/fonts/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet"> -->
    <!-- Bootstrap CSS -->
    <!-- <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simcify.min.css') }}" rel="stylesheet"> -->
	
    <!-- Signer CSS -->
    <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	    <link href="{{ asset('css/style-login.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.3/css/intlTelInput.css" />
    <link href="{{ asset('assets/libs/slider/css/bootstrap-slider.min.css') }}" rel="stylesheet"/> 
    <link href="{{ asset('assets/libs/daterangepicker/daterangepicker.css') }}" rel="stylesheet"/> 
    <!-- Material design icons -->
    <link href="{{ asset('assets/libs/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    
    <link href="{{ asset('fonts/mdi/css/materialdesignicons.min.css') }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('assets/css/simcify.min.css') }}" rel="stylesheet"> -->
    <!-- Signer CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        .auth-heading.mt-15 {

    text-align: center;

}
   .logo h3 {
    background: -webkit-linear-gradient(45deg, #09009f, #00ff95 80%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin: 7px 0;
    font-weight: 700; 
}
.branding img {
    width: 100%;
}
    </style>
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=370491530547421&autoLogAppEvents=1"></script>

<div class="auth-page">
        <div class="auth-card card">
            <div class="auth-logo logo">
               
                <!--<img src="{{ asset('uploads/app/'.env('APP_LOGO')) }}" class="img-responsive">-->
                

                <h3>icanswap</h3>


                <!-- <img src="{{ asset('uploads/app/'.env('APP_LOGO')) }}" class="img-responsive"> -->
            </div>
            <div class="login">
                <div class="auth-heading mt-15">
                    <h2>Welcome Back</h2>
                    <!-- <p>A beatiful and powerful system crafted specifically for income and expense.</p> -->
                </div>
                <div class="auth-form">
                        <form method="POST" action="{{ route('login') }}">
						 @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required="">
                                   
									 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input type="password"  class="form-control @error('password') is-invalid @enderror"  name="password" placeholder="Password" required="">
									  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        @if ( env('GOOGLE_reCAPTCHA') == "Enabled" )
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="g-recaptcha" data-sitekey="{{ env('reCAPTCHA_SITE_KEY') }}"></div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                 
                                  @if (Route::has('password.request'))
                                    <a class="auth-switch pull-right mt-10 text-muted text-thin" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                    <button type="submit" class="btn btn-primary">Login Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if ( env('SOCIAL_LOGIN') == "Enabled" ) 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted text-thin">Or login with;</p>
                        </div>
                        <div class="col-md-6">
                          <!--<a href="" class="auth-btn btn btn-block" style="background:#1877f2;border-color:#1877f2;color: #fff;">Facebook</a>-->
                          <div class="fb-login-button" data-width="" scope="public_profile,email" onlogin="checkLoginState();" data-size="medium" data-button-type="login_with" data-auto-logout-link="false" data-use-continue-as="false"></div>
                        </div>
                        <div class="col-md-6">
                          <a href="{{ $google_login_url }}" class="auth-btn btn btn-block" style="background:#ea4335;border-color:#ea4335;color: #fff;">Google</a>
                        </div>
                    </div>
                </div>
                @endif
                 
                <div class="">

               
                     @if (Route::has('register'))
                                   <p>Dont's have an account  <a class="btn btn-link" href="{{ route('register') }}">Create an account</a></p>
                               
                            @endif
                </div>
                
            </div>
            <div class="forgot">
                <div class="auth-heading mt-15">
                    <h2>Forgot password</h2>
                    <p>Don't worry if you forgot your password, enter your email and you can reset it.</p>
                </div>
                <div class="auth-form">
                    <form class="simcy-form" action="{{ url('Auth@forgot') }}" data-parsley-validate="" method="POST" loader="true">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                                    <input type="hidden" name="csrf-token" value="{{csrf_token()}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block">Reset Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="">
                  <p class="text-muted text-thin mt-40">Remembered your password? <a href="" class="auth-switch text-primary" show=".login">Login Now</a></p>
                </div>
            </div>
            <div class="twofactor">
                <div class="auth-heading mt-15">
                    <h2>Two Factor</h2>
                    <p>Enter the 6 digit sent to your phone number <strong class="twofactor-phone">***234</strong>.</p>
                </div>
                <div class="auth-form">
                    <form class="simcy-form" action="{{ url('Auth@twofactorvalidation') }}" data-parsley-validate="" method="POST" loader="true">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Six Digit Code</label>
                                    <input type="number" class="form-control just-number" name="twofactor_code" placeholder="Six Digit Code" required="">
                                    <input type="hidden" name="twofactor_id">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block">Validate Code</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="">
                  <p class="text-muted text-thin mt-40">Didn't get code? <a href="" class="text-primary resend send-to-server-click"  data="userid:" url="{{ url('Auth@twofactorresend') }}" loader="true">Resend</a></p>
                </div>
            </div>
            @if ( env('NEW_ACCOUNTS') == "Enabled" ) 
            <div class="register">
                <div class="auth-heading mt-15">
                    <h2>Create an account</h2>
                    <p>A beatiful and powerful system crafted specifically for expense and income tracking.</p>
                </div>
                <div class="auth-form">
                    <form class="simcy-form" action="{{ url('Auth@signup') }}"  data-parsley-validate="" method="POST" loader="true">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" required="">
                                    <input type="hidden" name="subscriber" value="{{ $subscriber->id }}">
                                    <input type="hidden" name="csrf-token" value="{{csrf_token()}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control phone-input required"  placeholder="Phone Number" required>
                                    <input class="hidden-phone" type="hidden" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block">Create Account</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="">
                  <p class="text-muted text-thin mt-40">Already have an account? <a href="" class="auth-switch text-primary" show=".login">Login Now</a></p>
                </div>
            </div>
            @endif
    </div>
    <p class="copyright text-thin text-muted"> &copy; {{ date("Y") }} {{ env("APP_NAME") }} <span>•</span> All Rights Reserved.</p>
</div>

    <script>
        facebookAuthUrl = '{{ url("Auth@facebookauth") }}';
    </script>
    <!-- scripts -->
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js//jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/simcify.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.3/js/intlTelInput.min.js"></script>
    <!-- custom scripts -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/fb.js')}}"></script>
</body>
</html>




