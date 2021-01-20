@extends('layouts.app')
@section('contents')
<div class="sign_in_page">
	<div class="container">
	<div class="row">
	<div  class="sign_in_sec col-md-12">
	<div class="org-signin">
	<p class="extra-space">
		<a href="" ><i class="fa fa-angle-left" aria-hidden="true"></i>
     </a>Forgot Password
	</p>
                      <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                <label>enter your email address to reset your password</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required placeholder="Example@gmail.com" autocomplete="email" autofocus>
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
                                    <button class="btn btn-primary btn-block">Reset Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
	</div>
	</div>
	</div>
	</div>
@endsection
