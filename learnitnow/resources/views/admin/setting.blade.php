@include('layouts.admin')
@section('contetns')
<!-- Main content -->
<style>
    .recurrentblack {
        background: #293441;
    }
    input[type="radio"] {

        display: inline-block;
    }
    .currentblack{
        background: #293441;
    }
    ul.form_opt li {
        list-style-type: none;
        float: left;
        margin: 15px;
    }
    .BROADCAST_CALL_TEXTh{
        display:none;
    }
    .BROADCAST_CALL_TEXTv{
        display:block;
    }
    .BROADCAST_CALL_MP3h{
        display:none;
    }
    .BROADCAST_CALL_MP3v{
        display:block;
    }
</style>
<style type="text/css">
    .switch-field {
        display: flex;
        margin-bottom: 36px;
        overflow: hidden;

        width: 130%;
        height: 40px;
        /*padding: 10px;*/
    }
    ul.nav.nav-tabs.int_sec {
        width: 209%;

    }
    .switch-field input {
        position: absolute !important;
        clip: rect(0, 0, 0, 0);
        height: 1px;
        width: 1px;
        border: 0;
        overflow: hidden;
    }

    .switch-field label {
        background-color: #e4e4e4;
        color: rgba(0, 0, 0, 0.6);
        font-size: 14px;
        line-height: 1;
        text-align: center;
        padding: 8px 16px;
        margin-right: -1px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
        transition: all 0.1s ease-in-out;
    }

    .switch-field label:hover {
        cursor: pointer;
    }

    .switch-field input:checked + label {
        background-color:#a5dc86;
        box-shadow: none;
    }

    .switch-field label:first-of-type {
        border-radius: 4px 0 0 4px;
    }

    .switch-field label:last-of-type {
        border-radius: 0 4px 4px 0;
    }

    /* This is just for CodePen. */

    .form {
        max-width: 600px;
        font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;
        font-weight: normal;
        line-height: 1.625;
        margin: 8px auto;
        padding: 16px;
    }

    h2 {
        position: auto;
        font-size: 18px;
        margin-bottom: 8px;
    }
    .switch_fields_sec .switch-field {
        width: 32%;
        display: inline-block;
        height: auto;
    }
    .switch_fields_sec .switch-field span {
        display: block;
        font-weight: 600;
    }
    .switch_fields_sec .switch-field label {
        margin-right: -3px;
    }
</style>
<div class="container">
    <div class="page-heading">
        <a class="btn btn-default pull-right ml-5" href="{{ url('Budget@get') }}" ><span><i class="mdi mdi-adjust"></i></span> Check Budget </a>
        <div class="heading-content">
            <div class="user-image">
                @if(empty(Auth::user()->avatar))
                <img src="{{ asset('uploads/avatar/avatar.png') }}" class="img-circle img-responsive">
                @else
                <img src="{{ asset('uploads/avatar/'.Auth::user()->avatar) }}" class="img-circle img-responsive">
                @endif
            </div>
            <div class="heading-title">
                <h2>Welcome back, {{$user->name}} {{$user->lname}}</h2>
                <p>This is your settings page. Take control!</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="settings-menu">
                <nav class="navbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a data-toggle="tab" href="#profile"><span><i class="mdi mdi-account"></i></span>  Profile</a></li>
                         <!-- <li><a data-toggle="tab" href="#website"><span><i class="mdi mdi-web"></i></span>  Website</a></li>
                         <li><a href="{{ url('Settings@menumanager') }}"><span><i class="mdi mdi-menu"></i></span>  Menu Manager</a></li>
                        <li><a data-toggle="tab" href="#system"><span><i class="mdi mdi-settings"></i></span>  System</a></li> -->
                       
                        <li><a data-toggle="tab" href="#security"><span><i class="mdi mdi-lock"></i></span>  Security</a></li>
                       
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body p-zero">

                    <div class="tab-content settings">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="profile" class="tab-pane fade in active">
                                    <h3>Profile</h3>
                                    <p class="text-muted text-thin">Update your personal information</p>
                                    <form class="simcy-form" action="{{ url('/admin/profile/update')}}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                                        @csrf
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
                                                    <input type="hidden" name="csrf-token" value="{{ csrf_token() }}" />
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
                                                    <!-- <p class="text-muted">https://<span class="subdomain">{{ $user->custom_url }}</span>.myceo.com</p> -->
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Phone Number</label>
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

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            
                        
                        <div id="security" class="tab-pane fade">
                            <h3>Security</h3>
                            <p class="text-muted text-thin">Update your account password here</p>
                            <form class="simcy-form" action="{{ url('/admin/update/password') }}" data-parsley-validate="" loader="true" method="POST">
                           @csrf
                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Current password</label>
                                            <input type="password" class="form-control" name="current" required placeholder="Current password">
                                          </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>New password</label>
                                            <input type="password" class="form-control" name="password" data-parsley-required="true" data-parsley-minlength="6" data-parsley-error-message="Password is too short!" id="newPassword" placeholder="New password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Confirm password</label>
                                            <input type="password" class="form-control" data-parsley-required="true" data-parsley-equalto="#newPassword" data-parsley-error-message="Passwords don't Match!" placeholder="Confirm password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="testemail" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Send Test Email</h4>
            </div>
            <form class="simcy-form" action="{{ url('Settings@sendtestemail') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">

                <div class="modal-body">
                    <p>Fill the details to send test email.</p>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>To</label>
                                <input type="email" class="form-control" name="to" placeholder="To" data-parsley-required="true">
                                <input type="hidden" name="csrf-token" value="{{ csrf_token() }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Enter Subject" data-parsley-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Message</label>
                                <textarea type="text" class="form-control" name="message" placeholder="Enter Message" data-parsley-required="true"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Email</button>
                </div>
            </form>
        </div>

    </div>
</div>

</div>

<!--Record Income-->
<div class="modal fade" id="update" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="update-form"></div>
    </div>
</div>

<!--Record Income-->
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category  </h4>
            </div>
            <form class="simcy-form" action="{{ url('Settings@addcategory')}}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 ">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category" placeholder="Category Name" data-parsley-required="true">
                                <input type="hidden" name="csrf-token" value="{{ csrf_token() }} " />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add category</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- scripts -->
     <script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/simcify.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.3/js/intlTelInput.min.js"></script>
<!-- custom scripts -->
<script src="{{asset('assets/js/app.js')}}"></script>






<script>

    @if(env('BROADCAST_CALL_RADIO') == 'file')
    $(document).ready(function(){

        $('#brod_file').trigger('click');

        $("#rfile").removeClass('BROADCAST_CALL_MP3h');
        $("#rfile").addClass('BROADCAST_CALL_MP3v');
    });

    @elseif(env('BROADCAST_CALL_RADIO') == 'text')
    $(document).ready(function(){

        $('#brod_text').trigger('click');

        $("#rtext").removeClass('BROADCAST_CALL_TEXTh');
        $("#rtext").addClass('BROADCAST_CALL_TEXTv');
    });
    @endif



    // @if(env('BROADCAST_CALL_RADIO') == 'file')
    // $(document).ready(function(){

    //   $('#brod_file').trigger('click');

    //          $("#rfile").addClass('BROADCAST_CALL_MP3h');
    //     $("#BROADCAST_CALL_TEXT").css('BROADCAST_CALL_TEXTh');
    // });

    // @elseif(env('BROADCAST_CALL_RADIO') == 'text')
    // $(document).ready(function(){

    //   $('#brod_text').trigger('click');

    //             $("#rtext").removeClass('BROADCAST_CALL_MP3h');
    //     $("#rtext").addClass('BROADCAST_CALL_TEXTv');
    // });
    // @endif




    $(document).ready(function(){

        $('#brod_off').click(function() {
            $("#rtext").hide();
            $("#rfile").hide();
        });

        $('#brod_text').click(function() {
            $("#rtext").show();
            $("#rfile").hide();
            $("#rtext").removeClass('BROADCAST_CALL_TEXTh');
            $("#rtext").addClass('BROADCAST_CALL_TEXTv');

            $("#rfile").removeClass('BROADCAST_CALL_MP3v');
            $("#rfile").addClass('BROADCAST_CALL_MP3h');

            $("#brod_text").removeClass('currentblack');
            $("#brod_text").addClass('current');

            $("#brod_file").addClass('currentblack');
            $("#brod_file").removeClass('current');



            $('#BROADCAST_CALL_FILE').val('');
        });


        $('#brod_file').click(function() {
            $("#rfile").show();
            $("#rtext").hide();
            $("#rtext").removeClass('BROADCAST_CALL_TEXTv');
            $("#rtext").addClass('BROADCAST_CALL_TEXTh');

            $("#rfile").removeClass('BROADCAST_CALL_MP3h');
            $("#rfile").addClass('BROADCAST_CALL_MP3v');

            $("#brod_file").removeClass('currentblack');
            $("#brod_file").addClass('current')

            $("#brod_text").addClass('currentblack');
            $("#brod_text").removeClass('current');

            $('#BROADCAST_CALL_TEXT').val('');
        });
    });



</script>
<script>
    $(document).ready(function(){
        $("#emailgateway").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue =="SMTP"){
                    $('#smtp').show();
                    $('#sendgrid').hide();
                }else{
                    $('#smtp').hide();
                    $('#sendgrid').show();
                }
            });
        }).change();



        $("#bing_speech_subscription_key").keyup(function(){
            $("#daysleft2").hide();
        });
    });
</script>




</body>
</html>
 