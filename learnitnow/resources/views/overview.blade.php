@extends('layouts.admin')
@section('content')

    <!-- Main content -->
    <div class="container">
        <div class="page-heading">
     
            <div class="heading-content">
                <div class="user-image">
                @if(empty(Auth::user()->avatar))
                <img src="{{ asset('uploads/avatar/avatar.png') }}" class="img-circle img-responsive">
                @else
                <img src="{{ asset('uploads/avatar/'.Auth::user()->avatar) }}" class="img-circle img-responsive">
                @endif
            </div>
            <div class="heading-title">
                <h2>Welcome back, {{Auth::user()->name}} {{Auth::user()->lname}}</h2>
                    <p>This is your {{ env('APP_NAME') }} dashboard. Overview of everything.</p>
                </div>
            </div>
  

             
           
        </div>

      
    @php
    $stats =array();
    $stats['percentage'] = 99;
    $stats['income'] = 99;
    $stats['expenses'] = 99;
    $stats['savings'] = 99;
    $stats['expenseTransactions'] = 99;
    $stats['expensePercentage'] = 99;
    $stats['incomeTransactions'] = 99;
    $stats['incomePercentage'] = 99;
    $stats['expensePercentage'] = 99;
    $admin ='';
    $user=Auth::user();
    function money($a =null){
        return true; 
    }
    @endphp
    <!-- for bids mentor  -->
        @if(Auth::user()->role != "admin")
       
        @endif 

        <div class="row overview-widgets">
            <div class="col-md-4">
                <!-- <div class="card bg-green text-white">
                
                  <div class="card-header">
                    <h4 class="text-white">Budget Status</h4>
                  </div>
                  <div class="card-body">
                    <div class="insight-card text-center">

                      <h3>Looking Good, {{ Auth::user()->name }}!</h3>
                      
                      
                     @if(!empty($user->credit)) 
                    <p>You have {{$user->credit}} meeting room credit.</p>
                     @else
                         <p>You have 0 meeting room credit.</p>
                     @endif
                     
                      @if($stats['percentage'] > 100)
                      <p>You have spent {{ money($stats['spent']) }} which is {{ $stats['percentage'] - 100 }}% more than your expected monthly budget. Nothing left to spend :( </p>
                      @else
                      <p>You have spent {{ $stats['percentage'] }} % of your expected monthly budget. You still have {{ 100 - $stats['percentage'] }} % to go. </p>
                      @endif
                      <a href="{{ url('Budget@get') }}" >Adjust Budget <span><i class="mdi mdi-hand-pointing-right"></i></span></a>
                    </div>
                  </div>
                </div> -->
            </div>
            <div class="col-md-4">
                <!-- <div class="card">
                    <div class="card-header">
                        <h4>Transactions</h4>
                    </div>
                    <div class="card-body overflow">
                        <div class="transaction-amount">
                           
                            <div class="transaction-amount-item">
                                <div class="transaction-icon">
                                    <i class="mdi mdi-checkbox-blank-circle text-primary"></i>
                                </div>
                                <div class="transaction-info">
                                    <strong>{{ money($stats['income']) }}</strong>
                                    <span>Income</span>
                                </div>
                            </div>
                            <div class="transaction-amount-item">
                                <div class="transaction-icon">
                                    <i class="mdi mdi-checkbox-blank-circle text-danger"></i>
                                </div>
                                <div class="transaction-info">
                                    <strong>{{ money($stats['expenses']) }}</strong>
                                    <span>Expenses</span>
                                </div>
                            </div>
                            <div class="transaction-amount-item">
                                <div class="transaction-icon">
                                    <i class="mdi mdi-checkbox-blank-circle text-info"></i>
                                </div>
                                <div class="transaction-info">
                                    <strong>{{ money($stats['savings']) }}</strong>
                                    <span>Savings</span>
                                </div>
                            </div>
                        </div>

                        <div class="transaction-visual">
                            <div id="transactions" style="height: 200px"></div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-md-4">
                <!-- <div class="card">
                    <div class="card-header">
                        <h4>Budget Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="transaction-progress">
                            <div class="item mt-5">
                                <strong class="pull-right">{{ $stats['expenseTransactions'] }} Transactions</strong>
                                <p class="text-muted"> <i class="mdi mdi-checkbox-blank-circle-outline text-info"></i> Expenses</p>
                                <div class="progress progress-bar-primary-alt">
                                    <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width:{{ $stats['expensePercentage'] }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <strong class="pull-right">{{ $stats['incomeTransactions'] }} Transactions</strong>
                                <p class="text-muted"> <i class="mdi mdi-checkbox-blank-circle-outline text-primary"></i> Income</p>
                                <div class="progress progress-bar-success-alt">
                                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width:{{ $stats['incomePercentage'] }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row transaction-links">
                                <div class="col-md-12">
                                    <p class="text-center view-all-transaction">View all transaction records</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('Expenses@get') }}" class="btn btn-danger btn-block" type="button"> Expenses</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('Income@get') }}" class="btn btn-primary btn-block" type="button"> Income</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="row">

            <!-- stat 1 -->
            <div class="col-md-3">
                <div class="card widget">
                    <div class="widget-title">
                        <h1>00</h1>
                        <p>Courses Income</p>
                    </div>
                </div>
            </div>
           
            <!-- stat 1 -->
            <div class="col-md-3">
                <div class="card widget">
                    <div class="widget-title">
                        <h1>00</h1>
                        <p>Pending Tasks</p>
                    </div>
                </div>
            </div>
           
            <!-- stat 1 -->
            <div class="col-md-3">
                <div class="card widget">
                    <div class="widget-title">
                        <h1>{{$total_incme}}</h1>
                        <p>All-Access Income</p>
                    </div>
                </div>
            </div>

            <!-- stat 1 -->
            <div class="col-md-3">
                <div class="card widget">
                    <div class="widget-title">
                        <h1>{{$total_student}}</h1>
                        <p>All-Access Users</p>
                    </div>
                </div>
            </div>
    

    </div>

    <!--Add Account-->
    <div class="modal fade" id="verifyprofile" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content text-center">
                <div class="modal-body verify-profile-modal">
                    <div class="verify-icon">
                        <i class="mdi mdi-check"></i>
                    </div>
                    <h1>Profile Verification!</h1>
                    <p>Would you like to get started on your profile verification?</p>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default skip-verification">Later</button>
                                    <a href="{{ url('Verify@get') }}" class="btn btn-primary">Let's Get Started</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
    
    
    @if($user->role == "mentor" && $user->certified_mentor == "No" && isset($overview['certifications']) && empty($overview['certifications']))
    <!--import record-->
    <div class="modal fade" id="certified" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Get Certified </h4>
                </div>
                <form class="simcy-form" action="{{ url('Mentor@getCertified') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                    
                    <div class="modal-body">
                        <p>Get certified today as a {{ mentormodule($user, "Mentor") }}</p>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Upload your certification documents</label>
                                    <div class="box">
                                        <input type="file" name="documents[]" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" accept="application/pdf" multiple required/>
                                        <label for="file-7"><span>Upload your certification documents</span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Message to reviewer</label>
                                    <textarea class="form-control" name="message" placeholder="Message to reviewer" rows="8" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Application</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    @endif

    <!--Add Account-->
    <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Account</h4>
                </div>
                <form class="simcy-form" action="{{ url('Overview@createaccount') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <p>Create a new account.</p>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="i.e Paypal">
                                    <input type="hidden" name="csrf-token" value="<?=csrf_token();?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Account balance</label>
                                    <span class="input-prefix">22</span>
                                    <input type="number" class="form-control prefix" step="0.01" data-parsley-pattern="^[0-9]*\.[0-9]{2}$" name="balance" placeholder="Account balance">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Type</label>
                                    <select class="form-control select2" name="type">
                                        <option value="Cash">Cash</option>
                                        <option value="Bank">Bank</option>
                                        <option value="Card">Card</option>
                                        <option value="E-Wallet">E-Wallet</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <label>Status</label>
                                    <select class="form-control select2" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Account</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
    
        <!-- view edit modal -->
    <div class="modal fade" id="update" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="update-form"></div>
      </div>
    </div>
    <!-- scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js//jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/simcify.min.js') }}"></script>
    <script src="{{ asset('assets/js/echarts.min.js') }}"></script>
    <!-- custom scripts -->
    <script src="{{ asset('assets/js/overview.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script type="text/javascript">
    
        @if($user->verified == "No" && !isset($_COOKIE['verify']) && !empty(env("BING_API")) && env('VERIFICATION_STATUS') == "Enabled")
        $("#verifyprofile").modal("show");
        @endif

        // doughnut
        var totalIncome = {{ $stats['income'] }},
            totalExpenses = {{ $stats['expenses'] }},
            totalSavings = {{ $stats['savings'] }},
            currency = "",
            reportsUrl = "";

      // graph
      var labels = 44;
      var income = 78;
      var expenses = 55;
      
    </script>
        <script>
      $(document).ready(function () {
        $('.test2').click(function () {
                
        //      alert("kkk");
                
                 window.open("https://myceo.comm/dialing/","mywin","width=320,height=560,screenX=0,left=430,menubar=no,screenY=50,top=70,status=yes,menubar=yes");
                });
                
                    });
    </script>
@endsection