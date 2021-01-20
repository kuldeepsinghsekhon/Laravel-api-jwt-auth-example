@extends('layouts.app')
@section('contents')

	
	<div class="sign_in_page">
	<div class="container">
	<div class="row">
	<div  class="sign_in_sec col-md-12">
	<div class="org-signin">
	<p class="extra-space">
		<a href="" ><i class="fa fa-angle-left" aria-hidden="true"></i>
</a>Sign in with Learnitnow.com account
	</p>
	
	<form method="POST" action="{{ route('login') }}">
        @csrf
    @error('email')
         <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
         </span>
     @enderror
	<input id="email-address" type="email" name="email" class="form-control login-field @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Username (it may be your email address)" required autofocus="">
	<!-- <a href="" class="need-help ga">Need Help?</a> -->
    <input type="password"  class="form-control login-field @error('password') is-invalid @enderror"  name="password" placeholder="Password" required="">								  
    <button id="username-submit" type="submit" class="btn btn-block btn-lg btn-primary disabled" data-qa="qa_submit_username"  style="pointer-events: all; cursor: pointer;">Continue</button>
	</form>
    @if (Route::has('password.request'))
                                    <a class="auth-switch pull-right mt-10 text-muted text-thin" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
	</div>
	</div>
	</div>
	</div>
	</div>
			
	
	@endsection
	




