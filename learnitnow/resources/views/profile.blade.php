@extends('layouts.app')
@section('contents')
    <div class="container">
        @include('message')
        <div class="row">
        <div class="heading-content">
            <!-- <div class="user-image">
                @if(empty(Auth::user()->avatar))
                <img src="{{ asset('uploads/avatar/avatar.png') }}" class="img-circle img-responsive">
                @else
                <img src="{{ asset('uploads/avatar/'.Auth::user()->avatar) }}" class="img-circle img-responsive">
                @endif
            </div> -->
            <div class="heading-title">
                <h2>Welcome back, {{$user->name}} {{$user->lname}}</h2>
                <p>This is your profile settings page.</p>
            </div>
        </div>            
        </div>
        <div class="row mt-2">            
            <div class="col-md-4">
                <div class="card">
                    <ul>    
                        <li><a class="text-decoration-none text-dark font-weight-bold rounded" href="javascript:void(0)" id="profile">Profile</a></li>
                        {{-- <li><a class="text-decoration-none text-dark font-weight-bold rounded" href="javascript:void(0)">Advisor Form</a></li>
                        <li><a class="text-decoration-none text-dark font-weight-bold rounded" href="javascript:void(0)">Quickstart</a></li> --}}
                        <li><a class="text-decoration-none text-dark font-weight-bold rounded" href="javascript:void(0)" id="transactions">My Transactions</a></li>
                        <li><a class="text-decoration-none text-dark font-weight-bold rounded" href="javascript:void(0)" id="security">Security</a></li>
                        
                    </ul>  
                </div>  
            </div>
            <!--Curriculum-->
            <div class="col-md-8">
                <div class="card">
                    <div class="row bg-light p-5 rounded" id="profile-form">
                        <div class="col-md-8">
                            <h3>Profile</h3>
                            <p class="text-muted text-thin">Update your personal information</p>
                            <form class="simcy-form" action="{{ url('/update/profile')}}"  method="POST" loader="true" data-parsley-validate enctype="multipart/form-data" novalidate>
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Profile picture</label>
                                            
                                            @if( !empty($user->avatar) )
                                                    <input type="file" name="avatar" class="croppie" default="{{ asset('uploads/avatar/'.$user->avatar) }}" crop-width="200" crop-height="200" accept="image/*">
                                                    @else
                                                    <input type="file" name="avatar" class="croppie" crop-width="200" crop-height="200" accept="image/*">
                                                    @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>First name</label>
                                            <input type="text" class="form-control" name="fname" value="{{ $user->name }}" placeholder="First name" required>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Last name</label>
                                            <input type="text" class="form-control" name="lname" value="{{ $user->lname }}" placeholder="Last name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="divider"></div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Email address</label>
                                            <input type="email" class="form-control send-to-server-change" name="email" value="{{ $user->email }}" url="{{ url('Settings@checkemailifexist') }}" loader="true" placeholder="Email address" required>                                            
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Phone Number</label></br>
                                            {{--<input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Phone Number" size="10" required>
                                             <input class="hidden-phone" type="hidden" name="phone" value="{{ $user->phone }}"> --}}
                                            <input type="text" class="form-control phone-input required" value="{{ $user->phone }}" placeholder="Phone Number" required>
                                            <input class="hidden-phone" type="hidden" name="phone" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Address</label>
                                            <input type="text" class="form-control" value="{{ $user->address }}" name="address"  placeholder="Address" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" value="{{ $user->city }}" placeholder="City" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>State</label>
                                            <select class="form-control select2" name="state">
                                                @foreach($states as $state)
                                                <option value="{{ $state->state }}" @if($user->state == $state->state) selected @endif>{{ $state->state }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Zip Code</label>
                                            <input type="number" minlength="5" class="form-control just-number" name="zip" value="{{ $user->zip }}" placeholder="Zip" required>
                                        </div>
                                    </div>
                                </div>    
                                <div>
                                    <button class="btn btn-success" type="submit">Save Changes</button>
                                </div>
                            </form>    
                        </div>
                    </div>
                    <div class="row bg-light p-5" id="security-form" style="display: none">
                        <div class="col-md-7">
                            <h3>Security </h3>
                            <p class="text-muted text-thin">Update your account password here</p>
                            <form class="validatedForm" action="{{ url('/update/password')}}"  method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{$user->id}}">                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Current password</label>
                                            <input type="password" class="form-control" id="curr_pass" name="curr_pass" value="" placeholder="Current password" required>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>New password</label>
                                            <input type="password" class="form-control" id="new_pass" name="new_pass" value="" placeholder="New password"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Confirm password</label>
                                            <input type="password" class="form-control" id="conf_pass" name="conf_pass" placeholder="Confirm password" value="" onfocusout="myFunction()" required>                                            
                                        </div>                                        
                                    </div>
                                </div>
                                <div >
                                    <span id="pass_error" class="text-danger"></span>
                                </div>    
                                <div>
                                    <button class="btn btn-success" type="submit" id="pass_btn">Save Changes</button>
                                </div>
                            </form>    
                        </div>
                    </div>
                    <div id="transaction-table" class="row bg-light p-5 transaction" style="display: none">
                            <div class="col-md-12">
                                <h3>Transactions</h3>
                                <p class="text-muted text-thin">These are course payments made.</p>
                    
                                <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive longer">
                                        <table class="table display blackdollar-datatable" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Paid By</th>
                                                    <th>Course</th>
                                                    <th>Amount</th>
                                                    <th>Cert Code</th>
                                                    <th>Paid On</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($payments)> 0 )
                                                @foreach($payments as $index => $payment)
                                                <tr>
                                                    <td><label class="badge">{{ $index + 1 }}</label></td>
                                                    <td><strong>{{ $user->name }} {{ $user->lname }}</strong><br><span>Ref #{{ $payment->reference }}</span></td>
                                                    <td><strong class="text-primary">{{$payment->course->name}}</strong><br><span>{{$payment->course->type}}</span></td>
                                                    <td><strong>${{$payment->amount}}</strong><br><span>Amount</span></td>
                                                    <td><strong>{{$payment->enrollment_key}}</strong><br><span>Cert Code</span></td>
                                                    <td><strong>{{date('M d, Y', strtotime($payment->billing_date))}}</strong><br><span>Paid On</span></td>
                                                    <td>
                                                        @if($payment->status == 'Success')
                                                        <strong class="text-primary"><i class="mdi mdi-checkbox-blank-circle"></i> Success</strong>
                                                        @else
                                                        <strong class="text-danger"><i class="mdi mdi-checkbox-blank-circle"></i> Failed</strong>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                    <tr>
                                                    <td colspan="6" class="text-center"> It's empty here </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                       

                    </div>                                  
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#security').click(function(){
            $('#profile-form').hide();
            $('#transaction-table').hide();
            $('#security-form').show();
        });

        $('#profile').click(function(){
            $('#security-form').hide();
            $('#transaction-table').hide();
            $('#profile-form').show();
        });
        $('#transactions').click(function(){
            $('#security-form').hide();
            $('#profile-form').hide();
            $('#transaction-table').show();             
        });
    });    
</script>

<script>
    function myFunction() {
        var new_pass = $('#new_pass').val();
        var conf_pass = $('#conf_pass').val();            
        console.log(new_pass);
        console.log(conf_pass);
        if(conf_pass != new_pass){
            $('#new_pass').css('border-color', 'red')
            $('#conf_pass').css('border-color', 'red')
            $('#pass_error').text('Password and New Password are not same.');
            $('#pass_btn').prop('disabled', true);
        }else{
            $('#new_pass').css('border-color', '')
            $('#conf_pass').css('border-color', '')
            $('#pass_error').text('');
            $('#pass_btn').prop('disabled', false);
        }

    }
</script>