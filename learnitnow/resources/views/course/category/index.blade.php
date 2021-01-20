@extends('layouts.admin')

@section('content')
<!-- Main content -->
<div class="container">
    <div class="page-heading">
            <button class="btn btn-primary pull-right ml-5" type="button" data-toggle="modal" data-target="#create"><span><i class="mdi mdi-plus-circle-outline"></i></span> New Category </button>
            <a class="btn btn-default pull-right ml-5" href="{{ url('course') }}"><span><i class="mdi mdi-arrow-left"></i></span> Back </a>
           
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
                <p>Lists of Categories.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Course Categories</h4>
              </div>
              <div class="card-body">
                  <div class="table-responsive longer">
                      <table class="table display" id="datatable">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Courses</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            @if(!empty($categories))
                            @foreach($categories as $index => $category)
                              <tr>
                                <td><label class="badge">{{ $index + 1 }}</label></td>
                                  <td><strong>{{$category->name}}</strong><br><span>Created on {{date('M d, Y', strtotime($category->created_at))}}</span></td>
                                  <td><p class="text-primary">{{$category->courses}} courses(s)</p></td>
                                  <td>
                                      @if($category->id == 0)
                                      -|-
                                      @else
                                      <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Actions <span class="caret"></span> </button>
                                        <ul class="dropdown-menu">
                                         
                                            <li><a class="c-dropdown__item dropdown-item fetch-display-click" data="categoryid:{{ $category->id }}|csrf-token:{{csrf_token()}}" url="{{ url('/coursecategory/updateview') }}" holder=".update-holder" modal="#update" href=""><i class="mdi mdi-pencil"></i> Edit</a></li>
                                            <li><a class="send-to-server-click"  data="categoryid:{{ $category->id }}|csrf-token:{{ csrf_token() }}" url="{{ url('/coursecategory/delete') }}" warning-title="Are you sure?" warning-message="This category will be deleted." warning-button="Continue" loader="true"><i class="mdi mdi-delete"></i> Delete</a></li>
                                        </ul>
                                      </div>
                                      @endif
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



</div>



    <!--Record Income-->
     <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog"> 
             <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Course Category</h4>
                </div>
                <form class="simcy-form" action="{{ url('/coursecategory/store') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <p>Create a new category.</p>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Category Banner Image </label>
                                    <input type="file" name="image" class="croppie" crop-width="1366" crop-height="319"  accept="image/*" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Category Thumbnail Image </label>
                                    <input type="file" name="thumbnail" class="croppie" crop-width="385" crop-height="175"  accept="image/*" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Category Name" required>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <!-- Update User Modal -->
    <div class="modal fade" id="update" role="dialog">
        <div class="modal-dialog">
        !-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Course Category</h4>
                </div>
                <form class="update-holder simcy-form" action="{{ url('/coursecategory/update') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                    <div class="loader-box"><div class="circle-loader"></div></div>
                </form>
            </div>

        </div>
    </div>


     <!-- scripts -->
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
       
                $('a#edit-category').on('click', function(){ 
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                   
                    $('#updateCat-id').val(id);
                    $('#updateCat-val').val(name);
                });
           
        });

        $(document).ready(function() {
            @if(!empty($categories))
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
@endsection