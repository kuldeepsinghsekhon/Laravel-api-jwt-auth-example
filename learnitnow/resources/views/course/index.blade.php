@extends('layouts.admin')
@section('content')
<style>
.page-heading {
    overflow: visible; 
    min-height: 83px;
}
.form-group.pagify-syndicate-child {
    padding: 4px 0;
    border-bottom: 1px dashed #e6eaee;
    border-top: 1px dashed #fff;
}
.form-group.pagify-syndicate-child h4 {
    font-weight: 700;
    margin-bottom: 0;
}
.col-md-2.progress_bar { 
    bottom: 13px;
    right: 17px;
}
</style>
<div class="loading-overlay" style="background-color:rgba(298, 294, 290, 0.9);"><div class="loader-box"><div class="circle-loader"></div></div></div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" integrity="sha256-f/v2ew/bb0v4el1ALE7bOoXGUDWGk2k+dkPLo3JPhLw=" crossorigin="anonymous" />

<!-- Main content -->
<div class="container">
    <div class="page-heading">
        @if ( $user->role == "admin")
        <div class="dropdown pull-right">
          <!-- <button class="btn btn-primary dropdown-toggle ml-5" type="button" data-toggle="dropdown"><span><i class="mdi mdi-plus-circle-outline"></i></span>Create Course</button> -->
          <button class="btn btn-primary ml-5" type="button" role="menuitem" data-toggle="modal" data-target="#create"><span><i class="mdi mdi-plus-circle-outline"></i></span> Create Course</button>
        </div>
        <a class="btn btn-default pull-right ml-5" href="{{ url('/admin/instructors') }}"><span><i class="mdi mdi-book-open"></i></span> Instructor </a>
        <a class="btn btn-default pull-right ml-5" href="{{ url('coursecategory') }}"><span><i class="mdi mdi-book-open"></i></span> Categories </a>
        @endif
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
                    <p>Lists of courses.</p>
            </div>
          </div>
    </div>
   
  

    <div class="row">
            <div class="col-md-3">
                <div class="card widget">
                    <div class="widget-title">
                        <h1>@if(!empty($total_courses_both)) {{$total_courses_both}} @else 0 @endif </h1>
                        <p>Courses</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card widget">
                    <div class="widget-title">
                        <h1>@if(!empty($total_student)){{$total_student}} @else 0 @endif</h1>
                        <p>Students</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card widget">
                    <div class="widget-title">
                        <h1>@if(!empty($total_incme))${{$total_incme}} @else $0 @endif</h1>
                        <p>Income</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card widget">
                    <div class="widget-title">
                        <h1>{{0}}</h1>
                        <p>Incomplete</p>
                    </div>
                </div>
            </div>
        </div>
   
    
    
    <div class="row pagify-parent">
        
            @if(isset($courses))
            @foreach($courses as $course)
            <!-- course -->
            <div class="col-md-4 pagify-child">
                <div class="card">
                    <div class="course">
                        <div class="course-image">
                            <img src="{{ asset('uploads/course/images/'.$course->image) }}"  class="img-responsive">
                        </div>
                        <div class="course-info">
                            <div class="course-info-basic">
                                <a target="_blank" href="{{ url('/coursepreview',['courseid'=>$course->id]) }}"><h5>{{$course->name}}</h5></a>
                                <p><strong>Classes: </strong> {{$course->chapters}} Chapter(s) <span>•</span> {{$course->exams }} Exam(s)</p>
                            </div>
                            <div class="course-info-other">
                                <h5 class="pull-right">${{ $course->price }}</h5>
                                <span class="badge badge-primary"><i class="menu-icon mdi mdi-clock-fast"></i> {{$course->duration}} {{$course->period}}</span>
                            </div>
                            <div class="course-info-more"> 

                                <div class="dropdown pull-right">
                                        <span class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="mdi mdi-dots-horizontal"></i> </span>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                         <li role="presentation"><a role="menuitem" href="{{ route('admincourse.show', $course->id) }}"> <i class="mdi mdi-eye"></i> View More</a></li>
                                         
                                          <li role="presentation"><a role="menuitem" class="fetch-display-click" data="courseid:{{ $course->id }}|_token:{{csrf_token()}}" url="<?=url('admin/course/edit');?>" holder=".update-holder" modal="#update" href=""> <i class="mdi mdi-pencil"></i> Edit</a></li><li role="presentation">
                                            <!-- <form action="{{ route('course.destroy',$course->id)}}" method="post" >
                                              @csrf
                                            @method('DELETE')  
                                            <a class="send-to-server-click" href="" onclick="event.preventDefault();
                                                    $(this).closest('form').submit();">
                                       <i class="mdi mdi-delete"></i> {{ __('Delete') }}</a>
                                            </form> -->
                                          
                                            <a href="{{ url('/course/destroy',$course->id)}}" class="send-to-server-click" data="courseid:{{ $course->id }}|_token:{{ csrf_token() }}" url="{{ url('course/destroy')}}" warning-title="Are you sure?" warning-message="This course and all it's data will be deleted." warning-button="Continue" loader="true"><i class="mdi mdi-delete"></i>Delete</a></li>
                                        </ul>
                                </div>
                                <div class="course-instructors">
                                <span class="badge badge-dark" data-toggle="tooltip" data-placement="top" title="{{ $course->students }} Student(s)"><i class="menu-icon mdi mdi-account-multiple-outline"></i> {{ $course->students }}</span>
                                    
                                    <strong class="text-primary"> {{$course->getCategory($course->coursecategory_id)->name}}</strong> 
								
                                </div> 
                            </div>
                          
                       
						</div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12">
                <div class="center-notify">
                    <i class="mdi mdi-alert"></i>
                    <h2>It's empty here!</h2>
                </div>
            </div>
            @endif
        </div>


</div>
<div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Course</h4>
                </div>
                
                <form class="simcy-form" action="{{ route('course.store') }}" data-parsley-validate="" loader="true" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                    <p>Enter course details.</p>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Course Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Course Name" required="">
                        </div>
                      </div>
                    </div>
                

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12" style="display: inline-flex;">
                
                          <input type="checkbox" name="pennfoster" value="1" class="" />
                          &nbsp;&nbsp;&nbsp;&nbsp;Penn Foster
                        </div>
                      </div>
                    </div>
                
                
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6" style="display: inline-flex;">
                          <input type="checkbox" id="checkbox" name="boardcertified" value="1" class="" />
                          &nbsp;&nbsp;&nbsp;&nbsp;Board Certified
                        </div>
                
                      </div>
                    </div>
                    
                
                     <!-- <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>CE Credits</label>
                          <input type="number" name="cecredit" class="form-control" placeholder="CE Credits">
                        </div>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Degree Name</label>
                          <input type="text" name="degree" class="form-control" placeholder="Degree Name">
                        </div>
                        <div class="col-md-6">
                          <label>Specialization</label>
                          <input type="text" name="specialization" class="form-control" placeholder="Specialization">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                       
                        <div class="col-md-6">
                          <label>Certification</label>
                          <input type="text" name="certification" class="form-control" placeholder="Certification">
                        </div>
                        <div class="col-md-6">
                          <label>Status</label>
                          <select class="form-control" name="status">
                            <option value="Published">Published</option>
                            <option value="Unpublished">Unpublished</option>
                          </select>
                        </div>
                      </div>
                    </div>
                
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Price ($)</label>
                          <input type="number" class="form-control" name="price" placeholder="Price ($)" required>
                        </div>
                        <div class="col-md-6">
                          <label>Sale Price ($)</label>
                          <input type="number" class="form-control" name="sale_price" placeholder="Sale Price ($)">
                        </div>
                      </div>
                    </div>
                
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Duration</label>
                          <input type="number" name="duration" step="1" class="form-control just-number" placeholder="Duration"
                            required="">
                        </div>
                        <div class="col-md-4">
                          <label>Period</label>
                          <select name="period" class="form-control" required="">
                            <option value="Days">Days</option>
                            <option value="Weeks">Weeks</option>
                            <option value="Months">Months</option>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <label>Category</label>
                          <select class="form-control" name="category" required>
                            @if(!empty($categories))
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            @else
                            <option value="0">Un-Categorized</option>
                            @endif
                          </select>
                        </div>
                      </div>
</div>
					  
					  <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Instructor</label>
                          <select id="" class="form-control" name="instructor" required="">
                            @foreach($instructors as $_instructor)
                            <option value="{{ $_instructor->id }}">{{ $_instructor->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>          
                    <!-- <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label> Type Image/Video</label>
                          <select id="" class="form-control" name="viewtype" required="">
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                          </select>
                        </div>
                      </div>
                    </div> -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Cover Image</label>
                          <input type="file" name="image" class="croppie" placeholder="Course Cover Image" crop-width="300"
                            crop-height="280" accept="image/*" required="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Video Type</label>
                          <select id="videotype" class="form-control" name="videotype" required="">
                            <option value="video">Video</option>
                            <option value="youtubelink">Embedded Link</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group" id="youtubelink">
                      <div class="row">
                        <div class="col-md-12">
                          <label> Embedded Link</label>
                          <input type="url" pattern="https?://.+" name="youtubelink" class="form-control" value="">
                        </div>
                      </div>
                    </div>
                
                    <div class="form-group uploadvideo" id="videolink">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Upload Video</label>
                          <input type="file" class="dropify uploadvideofile" placeholder="Upload video File" name="videofile" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>About this Video</label>
                          <textarea class="form-control" name="aboutvideo" placeholder="About this Video" rows="5"
                            required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Course Description</label>
                          <textarea class="form-control summernote" name="description" placeholder="Course Description" rows="5"
                            required></textarea>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Free Product</label>
                          <select class="form-control" name="product">
                            <option value="" disabled selected>Select Free Product</option>
                            @if(!empty($products))
                            @foreach( $products as $_products)
                            <option value="{{$_products->id}}">{{$_products->title}}</option>
                            @endforeach
                            @else
                            It's empty here!!
                            @endif
                          </select>
                        </div>
                      </div>
                    </div> -->
                
                    <!-- <div class="form-group">
                      <div class="row">
                        <div class="col-md-12" style="display: inline-flex;">
                          <input type="checkbox" name="authoritylabel" value="1" class="" />
                          &nbsp;&nbsp;&nbsp;&nbsp;Issuing Authority
                        </div>
                      </div>
                    </div> -->
                
                    <!-- <div class="form-group alllogofield">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Issuing Authority Logo</label>
                          <input type="file" name="addlogos" class="croppie" placeholder="Logo" crop-width="300" crop-height="280"
                            accept="image/*">
                        </div>
                      </div>
                    </div> -->
                
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Course</button>
                  </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Update course Modal -->
    <div class="modal fade" id="update" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Course</h4>
                </div>
                <form class="update-holder simcy-form" action="{{ url('/admin/course/update') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
                    <div class="loader-box"><div class="circle-loader"></div></div>
                </form>
            </div>

        </div>
    </div>
   

    <!-- scripts -->
     <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js//jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/simcify.js')}}"></script>
    <!-- custom scripts -->
     <script src="{{asset('assets/js/app.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.min.js" integrity="sha256-Q4K0T9IUORjpebn9dIu9szj2Rgn7GmLF+S3RjgM8aXw=" crossorigin="anonymous"></script>
    
    <script> 
        
    $(document).ready(function(){
        $(".pagify-parent").pagify(12, ".pagify-child");
        $(".pagify-syndicate").pagify(12, ".pagify-syndicate-child");
        hideLoader();
    });
    </script>
    
                        
<script>
       $(function () {
        $('input[name="prerequisites"]').hide();
        $('.responsefield').hide();
        //show it when the checkbox is clicked
        $('input[name="boardcertified"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('input[name="prerequisites"]').fadeIn();
                $('.responsefield').fadeIn();
            } else {
                $('input[name="prerequisites"]').hide();
                $('.responsefield').hide();
            }
        });
    });
   </script> 
   <script>
       $(function () {
        $('input[name="addlogos"]').hide();
        $('.alllogofield').hide();
        //show it when the checkbox is clicked
        $('input[name="authoritylabel"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('input[name="addlogos"]').fadeIn();
                $('.alllogofield').fadeIn();
            } else {
                $('input[name="addlogos"]').hide();
                $('.alllogofield').hide();
            } 
        });
    });
   </script> 
   <script type="text/javascript">
      $(document).ready(function() {    
        $('.summernote').summernote();
        });
   </script>
   
  <script>
    $('#youtubelink').hide();
$('#videotype').on('change', function() {
  
  if(this.value == "youtubelink") {
    $('#youtubelink').show();
    $("#youtubelink input[name='youtubelink']").prop('required', true);
    $("#videolink input[name='videofile']").prop('required', false);
    $('#videolink').hide();
  } else {
    $('#videolink').show();
    $("#youtubelink input[name='youtubelink']").prop('required', false);
    $("#videolink input[name='videofile']").prop('required', true);
    $('#youtubelink').hide();
  }
});



   </script> 
@endsection