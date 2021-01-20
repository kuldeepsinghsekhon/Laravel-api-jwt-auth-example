@include('layouts.admin')
<body>
@section('contents')
<!-- Main content -->
<div class="container">
    <div class="page-heading">
        <div class="heading-content">
            <div class="user-image">
                @if(empty($user->avatar))
                <img src="{{ asset('assets/images/avatar.png') }}" class="img-circle img-responsive">
                @else
                <img src="{{ asset('uploads/avatar/'.$user->avatar) }}" class="img-circle img-responsive">
                @endif
            </div>
            <div class="heading-title">
                <h2>Welcome back, {{$user->fname}} {{$user->lname}}</h2>
                <p>These are course payments made.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
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
                            @if(!empty($payments))
                            @foreach($payments as $index => $payment)
                              <tr>
                                <td><label class="badge">{{ $index + 1 }}</label></td>
                                  <td><strong>{{ $payment->user->name }} {{ $payment->user->lname }}</strong><br><span>Ref #{{ $payment->reference }}</span></td>
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



    <!-- scripts -->
    <!-- <script src="assets/js/jquery-3.2.1.min.js"></script> -->
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js//jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/simcify.min.js')}}"></script>
    <!-- custom scripts -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            @if(!empty($payments))
            startTable('#datatable');
            $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5'
                ]
            });
            @endif
            finishTable('#datatable');
        });

    </script>
</body>
</html>
