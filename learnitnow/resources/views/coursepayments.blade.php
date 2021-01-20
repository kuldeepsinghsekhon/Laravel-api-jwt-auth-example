 @extends('layouts.app')

 @section('contents')

 <div class="container">
<div class="row">
<div class="page-heading">
                <a class="btn btn-default pull-right ml-5" href="/courses/enrolled/"><span><i class="mdi mdi-certificate"></i></span> My Purchases </a>
                <div class="heading-content">
            <div class="user-image">
                                <img src="https://icanswap.com/assets/images/avatar.png" class="img-circle img-responsive">
                            </div>
            <div class="heading-title">
                <h2>Welcome back, kuldeep singh</h2>
                <p>These are course payments made.</p>
            </div>
        </div>
    </div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                                                        <div class="table-responsive longer">
                      <table class="table display blackdollar-datatable" id="datatable" style="display: table;">
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
						  @if($payments) 
						                       
										   @foreach($payments as $payment )
										   <tr>
											  <td  class="text-center">{{$payment->id}}</td>
											   <td  class="text-center">{{$payment->course}}</td>
											   <td  class="text-center">{{$payment->user}}</td>
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
	@endsection