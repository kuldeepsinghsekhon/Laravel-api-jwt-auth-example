@extends('layouts.app')

@section('contents')
 <div class="sign_in_page">
	<div class="container">
	<div class="row">
	<div  class="sign_up_sec col-md-12">
	<div class="org-signin">
	<p class="extra-space">
		<a href="" ><i class="fa fa-angle-left" aria-hidden="true"></i>
     </a>Create a free account today.
	</p>
   
                                        <form method="POST" action="{{ route('register') }}">
                 @csrf
                       
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  placeholder="First Name" required="">
                                
    <input type="hidden" name="csrf-token" value="{{csrf_token()}}">
                                    <input type="hidden" name="source" value="landing">
									@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control @error('lname') is-invalid @enderror" value="{{ old('lname') }}"  name="lname" placeholder="Last Name" required="">
                               @error('lname')
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
                                    <label>Date of Birth</label>
                                    <input type="date"  class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" name="dob" required="">
									@error('dob')
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
                                    <label>Email Address</label>
                                    <input type="email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Email Address" required="">
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
                                    <label>Phone Number</label>
                                    <input type="text" name="phone"  class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Phone Number" required>
                                    
									@error('phone')
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
                                    <input type="password"  class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Password" required="">
									@error('password')
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
                                    <label>{{ __('Confirm Password') }}</label>
                                    <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password" required="">
									@error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                   
                    <div class="modal-footer">
                    <button id="username-submit" type="submit" class="btn btn-block btn-lg btn-primary disabled" data-qa="qa_submit_username"  style="pointer-events: all; cursor: pointer;">Create</button>
 </div>
                </form>
				</div>
	</div>
	</div>
	</div>
	</div>



@endsection
