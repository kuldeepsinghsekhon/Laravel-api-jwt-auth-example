@include('layouts.admin')
@section('contents')
    <div class="container">
        @include('message')
        <div class="row">
            <div class="d-flex mt-5">
                <div><img src="{{ asset('assets/images/avatar.png')}}" alt="" height="80px"></div>
                <div class="ml-2">
                    <h2>Welcome back, {{ $user->name }}</h2>
                    <p>This is your settings page. Take control!</p>
                </div>
            </div>            
        </div>
        <div class="row mt-2">            
            <div class="col-md-4">
                <div class="card">
                    <ul>    
                        <li><a class="text-decoration-none text-dark font-weight-bold rounded" href="javascript:void(0)" id="profile">Profile</a></li>
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
                            <form class="" action="{{ url('/update/profile')}}"  method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Profile picture</label>
                                            
                                            @if( !empty($user->avtar) )
                                            <div class="p-2">
                                                <img src="{{ asset($user->avtar) }}" alt="image" width="100" height="100">                                                
                                            </div>
                                            <div>
                                                <input type="file" name="avatar" >    
                                            </div>
                                            @else
                                            <input type="file" name="avatar" >
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
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Phone Number" size="10" required>
                                            {{-- <input class="hidden-phone" type="hidden" name="phone" value="{{ $user->phone }}"> --}}
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
                </div>
            </div>
        </div>
        <hr>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script type="text/javascript">
      var deleteSectionUrl = "{{ url('/course/delete/content') }}";
      var sectionsUrl = "{{ url('Course@sections') }}";
  </script>


  <!-- scripts -->
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js//jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('assets/js/simcify.min.js')}}"></script>
  <!-- custom scripts -->
  <script src="{{asset('assets/js/app.js')}}"></script>
  <script src="{{asset('assets/js/builder.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#security').click(function(){
            $('#profile-form').hide();
            $('#security-form').show();
        });

        $('#profile').click(function(){
            $('#security-form').hide();
            $('#profile-form').show();
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
</body>
</html>
