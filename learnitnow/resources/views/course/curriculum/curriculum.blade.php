@include('layouts.admin')
@section('title')
{{'Chapters'}}
@endsection
@section('action-button')
<a href="{{ url('Course/show/'.$Course->id) }}" id="back" class="btn btn-sm btn-white btn-icon-only rounded-circle ml-2" >
    <span class="btn-inner--icon">Back</span>
</a>

<a style="float:right;" href="{{ url('Course/learnview/'.$Course->id) }}" class="btn btn-sm bg-white btn-icon rounded-pill mr-2 m-0">
    <span class="btn-inner--text text-dark"><i class="fa fa-airplay"></i> {{__(' Preview Course ')}}</span>
</a>

@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('css/switchery/switchery.min.css') }}">
<style>
    .panel.panel-default.chapter {
        border: 1px solid #ddd;
        padding-top: 8px;
        padding-left: 11px;
        margin: 4px;
        background-color: whitesmoke;
        border-radius: 4px;
    }

    .panel.panel-default.lecture {
        border: 1px solid #ddd;
        padding-top: 8px;
        padding-left: 11px;
        margin: 4px;
        background-color: whitesmoke;
        border-radius: 4px;
    }
    .collS{   width: 100%;
              display: inline-block;
              height: 100%;
              margin-top: 5px;
    }
    .collS1{   width: 100%;
              display: inline-block;
              height: 100%;
              margin-top: 5px;
    }
    span.panel-label {
    font-weight: lighter;
    color: #777;
    font-size: 18px;
    }
    .fas.fa-arrows-alt
    {
        cursor: all-scroll;
    }
    
</style>
@endpush
@push('theme-script')
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
@endpush

@section('contents')
<p style="color:white;">A chapter can contain multiple lectures, a lecture could be video, downloads, link, pdfs or text.</p>
<div class="row">
    {{--Right Side Menu--}}
    {{--Main Part--}}
    <div class="col-lg-12 order-lg-1">
        <div id="tabs-1" class="tabs-card">
            <div class="card">
                <div class="card-header">
                    <center><span style="color: red;display: none;" id="requiredError">!All Fields are Required Check Fields Some Fields are Empty</span></center>
                </div>
                <div class="card-body">
                    <form class="landa-content-form" method="post" action="{{url('course/curriculumStore')}}" data-parsley-validate="" method="POST" loader="true" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="Course" value="{{ $Course->id }}">
                    <div class="online-classes-list">
                        <div class="panel-group chapter-holder" id="accordion">
                            @if (count($chapters))
                            @foreach ($chapters as $index => $chapter)
                            <!-- single chapter -->
                            <div class="panel panel-default chapter" >
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <div class="row">
                                            <div class="col-11">
                                                <a class="text-dark collS collapsed" data-toggle="collapse" data-parent="#accordion" href="#chapter{{ $chapter->id }}">
                                                    <div class="chapter-drag"></div>
                                                    <i class="fas fa-arrows-alt"></i>&nbsp;
                                                    <span class="indexing">{{ $index + 1 }}.)</span>  <span class=" text-dark panel-label">{{ $chapter->title }}</span> 
                                                </a>
                                            </div>
                                            <div class="col-1">
                                                <a href="{{url('course/chapter/delete/'.$chapter->id)}}" style="float:right;outline: auto;margin-right: 6px;" class="text-danger btn btn-default btn-sm pull-right manage-class delete-item" data-id="{{ $chapter->id }}" data-type="chapter" title="Delete chapter"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </h4>

                                </div>
                                <div id="chapter{{ $chapter->id }}" class="panel-collapse chapter-body collapse">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="text-dark">Chapter Title</label>
                                                    <input type="text" class="form-control chapter-title" name="chaptertitle[]" value="{{ $chapter->title }}" placeholder="Chapter Title" required>
                                                    <input type="hidden" name="chapterid[]" value="{{ $chapter->id }}">
                                                    <input type="hidden" class="chapter-indexing" name="indexing[]" value="{{ $chapter->indexing }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="text-dark">Chapter Description</label>
                                                    <textarea class="form-control" name="chapterdescription[]" placeholder="Chapter Description" rows="3" required>{{ $chapter->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="divider"></div>
                                        <p class="text-dark">Below are lectures of this chapter</p>
                                        <div class="panel-group chapter-lecture-holder" id="lecture-accordion">
                                            @if (count($chapter->lectures))
                                            @foreach ($chapter->lectures as $key => $lecture)
                                            <!-- single link lecture -->
                                            <div class="panel panel-default lecture">
                                                <div class="panel-heading">

                                                    <h4 class="panel-title">
                                                        
                                                        <div class="row">
                                                            <div class="col-11">
                                                                <a data-toggle="collapse" class="collS1 text-dark" data-parent="#lecture-accordion" href="#lecture{{ $lecture->id }}">
                                                                    <i class="fas fa-arrows-alt"></i>&nbsp;&nbsp;
                                                                    @if ( $lecture->type == "link" )
                                                                    <i class="fas fa-link"></i>
                                                                    @elseif ( $lecture->type == "text" )
                                                                   <i class="far fa-file-alt"></i>
                                                                    @elseif ( $lecture->type == "downloads" )
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                    @elseif ( $lecture->type == "pdf" )
                                                                    <i class="fas fa-file-pdf"></i>
                                                                    @elseif ( $lecture->type == "video" )
                                                                   <i class=" fa fa-play-circle"></i>
                                                                    @endif
                                                                    <span class="indexing">{{ $key + 1 }}.)</span>
                                                                    <span class=" text-dark panel-label">{{ $lecture->title }}</span>
                                                                </a>
                                                            </div>
                                                            <div class="col-1">
                                                                <a href="" style="float:right;outline: auto; margin-right: 6px;" class=" text-danger btn btn-default btn-sm pull-right manage-class delete-item" data-type="lecture" data-id="{{ $lecture->id }}" title="Delete Lecture">
                                                                <i class="fas fa-trash-alt"></i></a>
                                                            </div>
                                                        </div>
                                                        
                                                    </h4>
                                                </div>
                                                <div id="lecture{{ $lecture->id }}" class="panel-collapse collapse lecture-body">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12"> <label class="text-dark">Lecture Title</label> 
                                                                    <input type="text" class="form-control chapter-title" name="lecturetitle[]" original-name="lecturetitle" value="{{ $lecture->title }}" required><input type="hidden" class="lecture-indexing" name="lectureindexing[]" original-name="lectureindexing" value="{{ $lecture->indexing }}"> <input type="hidden" name="lectureid[]" original-name="lectureid"  value="{{ $lecture->id }}"> <input type="hidden" name="type[]" original-name="type" value="{{ $lecture->type }}"> 
                                                                    <!--<input type="file" class="hidden" name="content[]" original-name="content">-->
                                                                    @if ( $lecture->type == "downloads" || $lecture->type == "video"  || $lecture->type == "pdf" )
                                                                    <input type="hidden" name="content[]" original-name="content" value="{{$lecture->content}}"> 
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12"> <label class="text-dark">Lecture Description</label> <textarea class="form-control" name="lecturedescription[]" original-name="lecturedescription" placeholder="Lecture Description" rows="3" required>{{ $lecture->description }}</textarea> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row text-dark">
                                                                @if ( $lecture->type == "link" )
                                                                <div class="col-md-12"> <label>Enter link/URL</label> <input type="url" class="form-control" name="content[]" original-name="content" placeholder="Enter link/URL" value="{{ $lecture->content }}" required> </div>
                                                                @elseif ( $lecture->type == "text" )
                                                                <div class="col-md-12"> <label>Lecture Text body</label> <textarea class="form-control" name="content[]" original-name="content" placeholder="Lecture Description" rows="6" required>{{ $lecture->content }}</textarea> </div>
                                                                @elseif ( $lecture->type == "downloads" )
                                                                <div class="col-md-12">
                                                                    <a  href="javascript:void(0)" class="btn btn-primary btn-icon rounded-pill mr-2 m-0 uploadNewFile" lectureId="{{$lecture->id}}">
                                                                        <span class="btn-inner--text text-white"><i class="fas fa-cloud-upload-alt"></i> {{__(' Resource to download ')}}</span>
                                                                    </a>
                                                                    <br>
                                                                    <br>
                                                                     <a download href="{{asset('storage')}}/{{ $lecture->content }}"  style="outline:auto;"  class="btn btn-default btn-block"><i class="fas fa-cloud-upload-alt"></i> Download Resource</a></div>
                                                                @elseif ( $lecture->type == "pdf" )
                                                                <div class="col-md-12">
                                                                    <a  href="javascript:void(0)" class="btn btn-primary btn-icon rounded-pill mr-2 m-0 uploadNewFile" lectureId="{{$lecture->id}}">
                                                                        <span class="btn-inner--text text-white"><i class="fas fa-file-pdf"></i> {{__(' Uploaded PDF ')}}</span>
                                                                    </a>
                                                                    <br>
                                                                    <br>
                                                                   <a  download href="{{asset('storage')}}/{{ $lecture->content }}" style="outline:auto;" class="btn btn-default btn-block"><i class=" fas fa-file-pdf"></i> Download PDF</a></div>
                                                                @elseif ( $lecture->type == "video" )
                                                                <div class="col-md-12">
                                                                    <a  href="javascript:void(0)" class="btn btn-primary btn-icon rounded-pill mr-2 m-0 uploadNewFile"  lectureId="{{$lecture->id}}">
                                                                        <span class="btn-inner--text text-white"><i class="fa fa-play-circle"></i> {{__(' Uploaded Video ')}}</span>
                                                                    </a>
                                                                    <br>
                                                                    <br>
                                                                    <a download href="{{asset('storage')}}/{{ $lecture->content }}" style="outline:auto;" class="btn btn-default btn-block"><i class=" fa fa-play-circle"></i> Download Video</a> </div>

                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end lecture -->
                                            @endforeach
                                            @else
                                            <div class="empty-section text-dark">
                                                <i class="fa fa-clipboard-text"></i>
                                                <h5 class="text-dark">No lectures here, add a new one below!</h5>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="lecture-buttons-holder">
                                            <p class="text-thin text-dark text-muted mb-5" style="color:151515;">Add another lecture</p>
                                            <div class="btn-group btn-group-justified">
                                                <a href="javascript:void(0)" modal="#lectureModal" data-toggle="modal" data-target="#lectureModal" class="btn btn-default add-lecture" data-type="video" data-Course="{{$Course->id}}" data-chapter="{{$chapter->id}}"><i class="fa fa-play-circle"></i> Video</a>
                                                <a href="javascript:void(0)" modal="#lectureModal" data-toggle="modal" data-target="#lectureModal" class="btn btn-default add-lecture" data-type="downloads" data-Course="{{$Course->id}}" data-chapter="{{$chapter->id}}"><i class="fas fa-cloud-upload-alt"></i> Downloads</a>
                                                <a href="javascript:void(0)" modal="#lectureModal" data-toggle="modal" data-target="#lectureModal" class="btn btn-default add-lecture" data-type="link" data-Course="{{$Course->id}}" data-chapter="{{$chapter->id}}"><i class="fas fa-link"></i> Link</a>
                                                <a href="javascript:void(0)" modal="#lectureModal" data-toggle="modal" data-target="#lectureModal" class="btn btn-default add-lecture" data-type="pdf" data-Course="{{$Course->id}}" data-chapter="{{$chapter->id}}"><i class="fas fa-file-pdf"></i> PDF</a>
                                                <a href="javascript:void(0)" modal="#lectureModal" data-toggle="modal" data-target="#lectureModal" class="btn btn-default add-lecture" data-type="text" data-Course="{{$Course->id}}" data-chapter="{{$chapter->id}}"><i class=" far fa-file-alt"></i> Text</a>
                                            </div>
                                            <!--<p class="text-thin text-muted mb-5">Add from scorm</p>-->
                                            <!--<div class="row text-center">-->
                                            <!--    <div class="col mt-2">-->
                                            <!--        <select class="custom-select custom-select-lg add-lecture-select" data-type="scorm">-->
                                            <!--            <option selected disabled>SCORM Course</option>-->

                                            <!--        </select>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="empty-section empty-chapter"><i class="fa fa-clipboard-text"></i><h5>No chapters here, add a new one!</h5></div>
                            @endif
                        </div>
                        <br>
                        <!-- here -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 mt-15 btbbb">
                                    <!--<input type="submit" name="save" value="Save" >-->
                                    <!--<a  href="javascript::void(0);" class="btn btn-primary btn-icon rounded-pill mr-2 m-0">-->
                                    <!--    <span class="btn-inner--text text-white"><i class="fa fa-airplay"></i> {{__(' Save Changes ')}}</span>-->
                                    <!--</a>-->
                                    @if (count($chapters))
                                    <button type="submit" class="btn btn-primary rounded-pill" id="SaveCurriculum">Save Changes</button>
                                    @endif
                                    <a  href="javascript:void(0)" modal="#createCurriculum"  class=" add-chapter btn btn-primary btn-icon rounded-pill mr-2 m-0">
                                        <span class="btn-inner--text text-white"><i class="fa fa-airplay"></i> {{__(' Add Chapter ')}}</span>
                                    </a>
                                </div> 
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div id="destroy" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are You Sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> 
            </div> 
            <div class="modal-body">  
                This action can not be undone. Do you want to continue?
            </div>  
            <div class="modal-footer">
                <form action= 'Course/curriculum/distroy' id = 'destroy_CourseCurriculum' enctype= 'multipart/form-data'>
                <input type="hidden" name="destroytype" id="destroytype"  value="">
                <input type="hidden" name="curriculumId" id="curriculumId"  value="">

                <button type="submit" class="btn btn-sm btn-danger rounded-pill" id="">Yes</button>
                </form>
                <button type="button" class="btn btn-sm btn-secondary rounded-pill" id="" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- lecture Modal -->
<div id="lectureModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content"  style="width: 750px;margin-left: -20%;">
            <div class="modal-header">
                <h5 class="modal-title">Create Lecture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> 
            </div> 
            <div class="modal-body">  
              <form action ='Course/lectureSave' id = 'create_lectureSave' enctype ='multipart/form-data'>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Lecture Name</label>
                            <input type="text" class="form-control" name="title" placeholder="Lecture Name" required>
                            <input type="hidden" name="Course_id" id="Course_id"  value="">
                            <input type="hidden" name="chapter_id" id="chapter_id"  value="">
                            <input type="hidden" name="type" id="contentType"  value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Lecture Description</label>
                            <textarea class="form-control" id="summary-ckeditor" name="description" placeholder="Lecture Description" rows="5"
                                      required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12" id="lectureForm">


                        </div>
                    </div>
                </div>

            </div>  
            <div class="modal-footer">

                <button type="submit" class="btn btn-sm btn-primary rounded-pill" id="">Save</button>
                </from>
                <button type="button" class="btn btn-sm btn-secondary rounded-pill" id="" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- lecture file upload Modal -->
<div id="fileUploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content"  style="width: 750px;margin-left: -20%;">
            <div class="modal-header">
                <h5 class="modal-title">Upload Lecture File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> 
            </div> 
            <div class="modal-body">  
                <from action  ='Course/lectureFileSave' id= 'create_lectureFileSave' enctype='multipart/form-data'>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Choose File</label>
                            <input type="file" class="form-control" name="file" accept="video/mp4" placeholder="Lecture File" required>
                            <input type="hidden" name="lectureId" id="lectureId"  value="">
                        </div>
                    </div>
                </div>
            </div>  
            <div class="modal-footer">

                <button type="submit" class="btn btn-sm btn-primary rounded-pill" id="">Save</button>
               </form>
                <button type="button" class="btn btn-sm btn-secondary rounded-pill" id="" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createCurriculum" role="dialog">
        <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                        <h4 class="modal-title">Create Chapter</h4>
            </div>

            <form action="{{ url('course/curriculumCreate') }}" method="post" id='create_curriculum' enctype ='multipart/form-data'>
                @csrf
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Chapter Name</label>
            <input type="text" class="form-control" name="title" placeholder="Chapter Name" required>
            <input type="hidden" name="course_id" value="{{$Course->id}}">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Course Description</label>
            <textarea class="form-control" id="summary-ckeditor" name="description" placeholder="Chapter Description" rows="5"
              required></textarea>
        </div>
    </div>
</div>
<div class="text-right">
    <button type="submit" class ='btn btn-sm btn-primary rounded-pill'>Save</button>
    <button type="button" class="btn btn-sm btn-secondary rounded-pill" data-dismiss="modal">{{__('Cancel')}}</button>
</div>
</form>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>


            
            </div>
        </div>
</div>
<style>
    .hidden{
        display:none;
    }
</style>

@push('script')
<script src="{{ asset('js/builder.js') }}"></script> 
<script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script> 

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function(){

        var sections = {};
//$.getJSON(sectionsUrl, function(json) {
    $.getJSON("https://old.icanswap.com/append", function(json) {
    sections = json;
});
alert(sections);

    $(".btbbb").on("click", ".add-chapter", function (event) {
        event.preventDefault();
        alert("pp");
     console.log(sections);
     event.preventDefault();
    builderReady();
    $(".collapse").collapse("hide");
    $(".chapter-holder").append(sections.chapter);
    $(".chapter-holder").find(".empty-section.empty-chapter").remove();
    chapterCallback();
    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
 })
    });
    setTimeout(function(){ 
    $('.add-lecture').on('click',function(){
        alert(1);
        console.log($(this).data('type').val() );
    });
    },1000);
  
    $( "#SaveCurriculum" ).click(function() {
          setTimeout(function(){ 
                $("#requiredError").show();
                  $('html, body').animate({
                    scrollTop: $("#back").offset().top

                    }, 700);
            },2000);
    });
    
CKEDITOR.replace('summary-ckeditor');
</script>
@endpush
