@include('layouts.admin')

    <!-- Material design icons -->
    <link href="{{ asset('assets/fonts/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <style type="text/css">
      .text-center{
        text-align: center;
      }
    </style>
<!-- Main content -->
@section('contents')
@php 
$user = Auth::user();
@endphp
<div class="container">
    <div class="page-heading">
        <a class="btn btn-default pull-right ml-5" href="{{ url('course') }}"><span><i class="mdi mdi-book-open"></i></span> All Courses </a>
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
                <p>Course: {{$course->name}}.</p>
            </div>
        </div>
    </div>

    <div class="row">
       
        <div class="col-md-12">
        

            <div class="card">
              <div class="card-header">
                 <a class="btn btn-primary pull-right ml-5" href="{{ url('course/curriculum',['course'=>$course->id]) }}"><span><i class="mdi mdi-book-open"></i></span> Manage Curriculum </a>
                 
                <h4>Classes/Lessons</h4>
                <p class="text-muted mb-0">Curriculum for {{$course->name}}</p>
              </div>
              <div class="card-body">
                    @if (count($Chapters) > 0)
                      @foreach ($Chapters as $chapterindex => $chapter)
                    <!-- single chapter -->
                      <div class="chapters-list">
                          <h6>Chapter {{ $chapterindex + 1 }}: <strong class="text-primary">{{ $chapter->title }}</strong></h6>
                          <ul>
                          @if (count($chapter->lectures) >0)
                            @foreach ($chapter->lectures as $key => $lecture)
                              <li>
                                  @if ( $lecture->type == "link" )
                                <div class="chapter-class-type"><i class=" mdi mdi-link-variant"></i> </div>
                                   @elseif ( $lecture->type == "text" )
                                <div class="chapter-class-type"><i class=" mdi mdi-clipboard-text"></i> </div>
                                   @elseif ( $lecture->type == "downloads" )
                                <div class="chapter-class-type"><i class=" mdi mdi-cloud-download"></i> </div>
                                   @elseif ( $lecture->type == "pdf" )
                                <div class="chapter-class-type"><i class=" mdi mdi-file-pdf-box"></i> </div>
                                   @elseif ( $lecture->type == "video" || $lecture->type == "videolink")
                                <div class="chapter-class-type"><i class=" mdi mdi-play-circle"></i> </div>
                                   @endif
                                {{ $lecture->title }}
                            </li>
                            @endforeach
                          @else
                              <li>
                                <div class="chapter-class-type"><i class=" mdi mdi-clipboard-outline"></i></div> 
                                This chapter has no lectures!
                            </li>
                          @endif
                          </ul>
                      </div>
                      @endforeach
                    @else
                      <div class="empty-section">
                        <i class="mdi mdi-clipboard-text"></i>
                        <h5>No curriculum created for this course!</h5>
                      </div>
                    @endif
              </div>
            </div>
        </div>
       
        </div> 


        <!--exams-->
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                 
                  <a class="btn btn-primary pull-right ml-5" href="" data-toggle="modal" data-target="#create"><span><i class="mdi mdi-plus-circle-outline"></i></span> Create Exam </a>
                  
                <h4>Course Exams</h4>
                <p class="text-muted mb-0">Exams for {{$course->name}}</p>
              </div>
              <div class="card-body">
                  @if(!empty($exams))
                    <div class="table-responsive mt-15 longer" style="padding-bottom: 122px;">
                  @else
                    <div class="table-responsive mt-15">
                  @endif
                        <table class="table table-striped mb-0" id="data-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Questions</th>
                                    <th>Status</th>
                                    <th>Completed By</th>
                                    <th class="text-center">Take</th>
                                   <!-- <th>Action</th> -->
                                   
                                </tr>
                                </thead>
                                <tbody>
                                 @if(!empty($exams))
                                     @foreach($exams as $index => $exam)
                                        <tr>
                                            <td><label class="badge">{{ $index + 1 }}</label></td>
                                            <td><strong>{{ $exam->name }}</strong><br><span>Updated on {{date('M d, Y', strtotime($exam->updated_at))}}</span></td>
                                            <td><strong>{{ $exam->questions }}</strong><br><span>Questions</span></td>
                                            @if( $exam->status == "Published" )
                                            <td><strong class="text-primary"><i class="mdi mdi-checkbox-blank-circle"></i> Published</strong></td>
                                            @else
                                            <td><strong class="text-danger"><i class="mdi mdi-checkbox-blank-circle"></i> Unpublished</strong></td>
                                            @endif
                                            <td><strong>{{ $exam->students }}</strong><br><span>Students</span></td>
                                            <!-- <td class="text-center">
                                                <a target="_blank" href="{{ url('/exam'.'/'.$exam->id.'/take') }} " class="btn btn-primary btn-sm btn-icon"><i class=" mdi mdi-file-check"></i> Preview </a>
                                            
                                            </td> -->
                                             <td>
                                                  <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Actions <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">
                                                        <li role="presentation"><a role="menuitem" target="_blank" href="{{ url('/exam'.'/'.$exam->id.'/take') }}" > <i class="mdi mdi-eye"></i>Preview Exam</a></li>
                                                        <li role="presentation"><a role="menuitem" href="{{ url('/admin/exam',['examid'=>$exam->id]) }}"> <i class="mdi mdi-pencil"></i> Exam Editor</a></li>
                                                        <!-- <li role="presentation"><a role="menuitem" href="{{ url('Exam@examstudents',['examid'=>$exam->id]) }}"> <i class="mdi mdi-account-multiple"></i> Students List</a></li> -->
                                                        <li role="presentation"><a role="menuitem" href="" class="send-to-server-click" data="examid:{{ $exam->id }}|csrf-token:{{csrf_token()}}" url="{{ url('Exam@delete') }}" warning-title="Are you sure?" warning-message="This exam will be deleted." warning-button="Delete" loader="true"> <i class="mdi mdi-delete"></i> Delete Exam</a></li>
                                                    </ul>
                                                  </div>
                                              </td>
                                              
                                        </tr>
                                    @endforeach 
                                @else
                                    <tr><td colspan="6" class="text-center">It's empty here.</td></tr>
                                @endif 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        
       <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Students Enrolled</h4>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table display blackdollar-datatable" id="datatable">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Student</th>
                                  <th>Enrolled</th>
                                  <th>Lecture Progress</th>
                                  <th>Completed</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                            @if(!empty($students))
                            @foreach($students as $index => $student)
                              <tr>
                                <td><label class="badge">{{ $index + 1 }}</label></td>
                                  <td><strong>{{ $student->name }} {{ $student->lname }}</strong></td>
                                  <td><strong>{{date('M d, Y', strtotime($student->created_at))}}</strong><br><span>Enrolled On</span></td>
                                  @if(!empty($student->completed_on))
                                  <td><strong>100%</strong><br><span>Completed</span></td>
                                  @else
                                  <td><strong>{{ $student->completedlectures }} / {{ $student->totallectures }}%</strong><br><span>Completed</span></td>
                                  @endif
                                  @if(!empty($student->completed_on))
                                  <td><strong>{{date('M d, Y', strtotime($student->completed_on))}}</strong><br><span>Completed On</span></td>
                                  <td><strong class="text-primary"><i class="mdi mdi-checkbox-blank-circle"></i> Completed</strong></td>
                                  @else
                                  <td><strong>-|-</strong><br><span>Completed On</span></td>
                                  <td><strong class="text-default"><i class="mdi mdi-checkbox-blank-circle"></i> Ongoing</strong></td>
                                  @endif
                                  
                              </tr>
                              @endforeach
                              @else
                                <tr>
                                  <td colspan="5" class="text-center"> It's empty here </td>
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



    <!--create exam-->
    <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Exam</h4>
                </div>
                <form class="simcy-form" action="{{ '/admin/exam/create'}}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <p>Create a new exam.</p>
                        
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Exam Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Exam Name" required="">
                            <input type="hidden" name="course" value="{{$course->id}}">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Exam maximum retakes</label>
                            <input type="number" name="retakes" class="form-control just-number" placeholder="maximum retakes" value="0" min="0" required="">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Exam Description</label>
                            <textarea class="form-control" name="description" placeholder="Exam Description" rows="5" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="https://js.stripe.com/v2/"></script>
    <script>
       
        @if(!empty($subscriber->stripe_publishable_key) && !empty($subscriber->stripe_publishable_key))
        Stripe.setPublishableKey('{{ $subscriber->stripe_publishable_key }}');
        @else
        Stripe.setPublishableKey('{{ env("STRIPE_PUBLISHABLE_KEY") }}');
        @endif
    </script>
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
           @if(!empty($students))
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
