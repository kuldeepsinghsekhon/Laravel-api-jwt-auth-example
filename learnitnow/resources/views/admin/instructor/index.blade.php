@extends('layouts.admin')
@section('content')
<!-- Main content -->
<div class="container">
    <div class="page-heading">
        <button class="btn btn-primary pull-right ml-5" type="button" data-toggle="modal" data-target="#create"><span><i class="mdi mdi-plus-circle-outline"></i></span> Add Instructor </button>

		  <a class="btn btn-default pull-right ml-5" href="{{ url('/course') }}"><span><i class="mdi mdi-arrow-left"></i></span>  </a>

        <div class="heading-content">
            <div class="user-image">
                @if(empty(Auth::user()->avatar))
                <img src="{{ asset('uploads/avatar/avatar.png') }}" class="img-circle img-responsive">
                @else
                <img src="{{ asset('uploads/avatar/'.$user->avatar) }}" class="img-circle img-responsive">
                @endif
            </div>
            <div class="heading-title">
                <h2>Welcome back, {{$user->name}} {{$user->lname}}</h2>
                <p>Lists of Instructors.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Instructor</h4>
              </div>
              <div class="card-body">
                  <div class="table-responsive longer">
                      <table class="table display blackdollar-datatable" id="datatable">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Image</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(!empty($viewpage))

                          @foreach($viewpage  as $index => $postinstructor)
                              <tr>
                                <td><label class="badge">{{ $index + 1 }}</label></td>
                                  <td class="text-center">
                                    <img src="{{ asset('/uploads/instructor/'.$postinstructor->image) }}" class="img-responsive table-image">
                                  </td>
                                  <td><strong>{{$postinstructor->name}}</strong></td>
                                  <td><strong>{{$postinstructor->title}}</strong></td>
                                  <td><strong>{{$postinstructor->email}}</strong></td>
                                  <td><strong>{{$postinstructor->city}}</strong></td>
                                  <td><strong>{{$postinstructor->state}}</strong></td>

                                  <td>
                                      <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Actions <span class="caret"></span> </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="c-dropdown__item dropdown-item fetch-display-click" data="id:{{ $postinstructor->id }}|_token:{{csrf_token()}}" url="{{ url('/admin/instructor/dataview') }}" holder=".update-holder" modal="#update" href=""><i class="mdi mdi-pencil"></i> Edit</a></li>
                                            <li><a class="send-to-server-click"  data="id:{{ $postinstructor->id }}|_token:{{csrf_token()}}" url="{{ url('/admin/instructor/delete') }}" warning-title="Are you sure?" warning-message="This category will be deleted." warning-button="Continue" loader="true"><i class="mdi mdi-delete"></i> Delete</a></li>
                                        </ul>
                                      </div>
                                  </td>
                              </tr>
                              @endforeach
                              @else
                                <tr>
                                  <td colspan="4" class="text-center"> It's empty here </td>
                                </tr>
                              @endif
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
        </div>
    </div>
  <!-- footer -->
</div>

    <!--Record Income-->
    <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Instructor</h4>
                </div>
                <form class="simcy-form" action="{{ url('/admin/instructor/insert') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="modal-body">
                        <p>Fill the form below to create a New Instructor.</p>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Instructor logo</label>
                                    <input type="file" name="image" class="croppie" crop-width="90" crop-height="90"  accept="image/*" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="name" required>
                                    <!-- <input type="hidden" name="csrf-token" value="<?=csrf_token();?>" /> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label> City</label>
                                    <input type="text" class="form-control" name="city" placeholder="State" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>State</label>
                                    <input type="text" class="form-control" name="state" placeholder="State" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form> 
            </div>

        </div>
    </div>

    <!-- Update User Modal -->
    <div class="modal fade" id="update" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Instructor</h4>
                </div>
                <form class="update-holder simcy-form" action="{{ url('/admin/instructor/intructorupdate') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                    <div class="loader-box"><div class="circle-loader"></div></div>
                </form>
            </div>

        </div>
    </div>
    
    <!-- scripts -->
    <!-- <script src="assets/js/jquery-3.2.1.min.js"></script> -->   <script src="//code.jquery.com/jquery-1.12.4.js"></script>
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
            @if(!empty($viewpage))
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
@endsection