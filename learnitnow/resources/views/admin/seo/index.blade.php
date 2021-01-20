@extends('layouts.admin')

@section('content')
<!-- Main content -->
<div class="container">
    <div class="page-heading">
            <button class="btn btn-primary pull-right ml-5" type="button" data-toggle="modal" data-target="#create"><span><i class="mdi mdi-plus-circle-outline"></i></span> New Meta Data</button>
            <a class="btn btn-default pull-right ml-5" href="{{ url('/overview') }}"><span><i class="mdi mdi-arrow-left"></i></span> Back </a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>SEO</h4>
              </div>
              <div class="card-body">
                  <div class="table-responsive longer">
                      <table class="table display" id="datatable">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Meta Title</th>
                                  <th>Page URL</th>
                                  <th>Meta Keywords</th>
                                  <th>Meta Description</th>                                  
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            @if(!empty($metadata))
                            @foreach($metadata as $index => $data)
                              <tr>
                                <td><label class="badge">{{ $index + 1 }}</label></td>
                                  <td><strong>{{$data->meta_title}}</strong></td>
                                  <td><p>{{$data->page_url}}</p></td>
                                  <td><p class="text-primary">{{$data->meta_keywords}}</p></td>
                                  <td><p class="text-primary">{{$data->meta_description}}</p></td>
                                  <td>
                                      @if($data->id == 0)
                                      -|-
                                      @else
                                      <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Actions <span class="caret"></span> </button>
                                        <ul class="dropdown-menu">
                                         
                                            <li><a class="c-dropdown__item dropdown-item fetch-display-click" data="metaid:{{ $data->id }}|_token:{{csrf_token()}}" url="{{ url('/admin/seo/edit') }}" holder=".update-holder" modal="#update" href=""><i class="mdi mdi-pencil"></i> Edit</a></li>
                                            <li><a class="send-to-server-click"  data="metaid:{{ $data->id }}|_token:{{ csrf_token() }}" url="{{ url('/admin/seo/delete') }}" warning-title="Are you sure?" warning-message="This Meta Data will be deleted." warning-button="Continue" loader="true"><i class="mdi mdi-delete"></i> Delete</a></li>
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
                    <h4 class="modal-title">Add New Meta Data</h4>
                </div>
                <form class="simcy-form" action="{{ url('/admin/seo/store') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <p>Create new Meta Data.</p>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" placeholder="Meta Title" required>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Page URL</label>
                                    <input type="text" class="form-control" name="page_url" placeholder="Page URL" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Keywords</label>
                                    <textarea class="form-control summernote-dynamic" name="meta_keywords" placeholder="Meta Keywords" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Meta Description</label>
                                    <textarea class="form-control summernote-dynamic" name="meta_description" placeholder="Meta Description" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Meta Data</button>
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
                    <h4 class="modal-title">Update Meta Data</h4>
                </div>
                <form class="update-holder simcy-form" action="{{ url('/admin/seo/update') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
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
            @if(!empty($metadata))
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