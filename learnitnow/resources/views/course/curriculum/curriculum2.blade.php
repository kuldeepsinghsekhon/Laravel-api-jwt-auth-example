@extends('layouts.admin')
@section('content')
<!-- <div class="loading-overlay" style="background-color:rgba(298, 294, 290, 0.9);"><div class="loader-box"><div class="circle-loader"></div></div></div> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" integrity="sha256-f/v2ew/bb0v4el1ALE7bOoXGUDWGk2k+dkPLo3JPhLw=" crossorigin="anonymous" />

<!-- Main content -->
<div class="container">
    <div class="page-heading">
        <a target="__blank"class="btn btn-primary pull-right ml-5" href="{{ url('/coursepreview',['courseid'=>$Course->id]) }}"><span><i class="mdi mdi-airplay"></i></span> Preview Course </a>
        <a class="btn btn-default pull-right ml-5" href="{{ url('admin/course/show',['courseid'=>$Course->id]) }}"><span><i class="mdi mdi-arrow-left"></i></span>Back  </a>
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
                <p>Curriculum builder for name.</p>
            </div>
        </div>
    </div>

    <div class="row">
        
        <!--Curriculum-->
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                 
                <h4>Chapters</h4>
                <p class="text-muted mb-0">A chapter can contain multiple lectures, a lecture could be video, downloads, link, pdfs or text.</p>
              </div>
              <div class="card-body">
                <form class="landa-content-form pulk" action="{{ url('updatecontent') }}" data-parsley-validate method="POST" loader="true" enctype="multipart/form-data">
                @csrf 
                <input type="hidden" name="course" value="{{ $Course->id }}">
                <div class="online-classes-list">
                    <div class="panel-group chapter-holder" id="accordion">
                      
                      @if (count($chapters) > 0)
                        @foreach ($chapters as $index => $chapter)
                      <!-- single chapter -->
                      <div class="panel panel-default chapter">
                        <div class="panel-heading">
                          <div class="chapter-drag"><i class="mdi mdi-drag"></i></div>
                            <a href="" class="btn btn-default btn-sm pull-right manage-class delete-item" data-id="{{ $chapter->id }}" data-csrf="{{ csrf_token() }}" data-type="chapter" title="Delete chapter"><i class=" mdi mdi-delete"></i></a>
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#chapter{{ $chapter->id }}">
                            <span class="indexing">{{ $index + 1 }}.)</span>  <span class="panel-label">{{ $chapter->title }} </span> </a>
                          </h4>
                        </div>
                        <div id="chapter{{ $chapter->id }}" class="panel-collapse collapse chapter-body">
                          <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Chapter Title</label>
                                            <input type="text" class="form-control chapter-title" name="chaptertitle[]" value="{{ $chapter->title }}" placeholder="Chapter Title" required>
                                            <input type="hidden" name="chapterid[]" value="{{ $chapter->id }}">
                                            <input type="hidden" class="chapter-indexing" name="indexing[]" value="{{ $chapter->indexing }}">
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Chapter Description</label>
                                            <textarea class="form-control" name="description[]" placeholder="Chapter Description" rows="3" required>{{ $chapter->description }}</textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="divider"></div>
                            <p>Below are lectures of this chapter</p>
                            <div class="panel-group chapter-lecture-holder" id="lecture-accordion">
                              @if (!empty($chapter->lectures))
                                @foreach ($chapter->lectures as $key => $lecture)
                                    <!-- single link lecture -->
                                    <div class="panel panel-default lecture">
                                       <div class="panel-heading">
                                          <div class="chapter-drag"><i class="mdi mdi-drag"></i></div>
                                          <a href="" class="btn btn-default btn-sm pull-right manage-class delete-item" data-type="lecture" data-id="{{ $lecture->id }}" title="Delete Lecture"><i class=" mdi mdi-delete"></i></a> 
                                          <h4 class="panel-title">
                                             <a data-toggle="collapse" data-parent="#lecture-accordion" href="#lecture{{ $lecture->id }}">

                                                  @if ( $lecture->type == "link" )
                                                <div class="lecture-type"><i class=" mdi mdi-link-variant"></i> </div>
                                                   @elseif ( $lecture->type == "text" )
                                                <div class="lecture-type"><i class=" mdi mdi-clipboard-text"></i> </div>
                                                   @elseif ( $lecture->type == "downloads" )
                                                <div class="lecture-type"><i class=" mdi mdi-cloud-download"></i> </div>
                                                   @elseif ( $lecture->type == "pdf" )
                                                <div class="lecture-type"><i class=" mdi mdi-file-pdf-box"></i> </div>
                                                   @elseif ( $lecture->type == "video" )
                                                <div class="lecture-type"><i class=" mdi mdi-play-circle"></i> </div>
                                                   
                                                   @elseif ( $lecture->type == "videolink" )
                                                <div class="lecture-type"><i class=" mdi mdi-play-circle"></i> </div>
                                                   @endif
                                                <span class="indexing">{{ $key + 1 }}.)</span>   <span class="panel-label">{{ $lecture->title }}</span>
                                             </a>
                                          </h4>
                                       </div>
                                       <div id="lecture{{ $lecture->id }}" class="panel-collapse collapse lecture-body">
                                          <div class="panel-body">
                                             <div class="form-group">
                                                <div class="row">
                                                   <div class="col-md-12"> <label>Lecture Title</label> 
                                                    <input type="text" class="form-control chapter-title" name="title{{ $chapter->indexing }}[]" original-name="title" placeholder="Lecture Title" value="{{ $lecture->title }}" required><input type="hidden" class="lecture-indexing" name="lectureindexing{{ $chapter->indexing }}[]" original-name="lectureindexing" value="{{ $lecture->indexing }}"> <input type="hidden" name="lectureid{{ $chapter->indexing }}[]" original-name="lectureid"  value="{{ $lecture->id }}"> @if( $lecture->type != 'videolink') <input type="hidden" name="type{{ $chapter->indexing }}[]" original-name="type" value="{{ $lecture->type }}"> @else <input type="hidden" name="type{{ $chapter->indexing }}[]" original-name="type" value="video"> @endif
                                                    @if ( $lecture->type == "downloads" || $lecture->type == "pdf" )
                                                    <input type="file" class="hidden" name="content{{ $chapter->indexing }}[]" original-name="content" value="null">
                                                     <input type="hidden" name="content{{ $chapter->indexing }}[]" original-name="content" value="null"> 
                                                    @endif
                                                    @if ( $lecture->type == "text" || $lecture->type == "link" )
                                                    <input type="file" class="hidden" name="content{{ $chapter->indexing }}[]" original-name="content" value="null">
                                                     @endif
                                                  </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="row">
                                                   <div class="col-md-12"> <label>Lecture Description</label> <textarea class="form-control" name="description{{ $chapter->indexing }}[]" original-name="description" placeholder="Lecture Description" rows="3" required>{{ $lecture->description }}</textarea> </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="row">
                                                  @if ( $lecture->type == "link" )
                                                   <div class="col-md-12"> <label>Enter link/URL</label> <input type="url" class="form-control" name="content{{ $chapter->indexing }}[]" original-name="content" placeholder="Enter link/URL" value="{{ $lecture->content }}" required> </div>
                                                   @elseif ( $lecture->type == "text" )
                                                   <div class="col-md-12"> <label>Lecture Text body</label> <textarea class="form-control summernote" name="content{{ $chapter->indexing }}[]" original-name="content" placeholder="Lecture Description" rows="6" required>{{ $lecture->content }}</textarea> </div>
                                                   @elseif ( $lecture->type == "downloads" )
                                                   <div class="col-md-12"> <label>Resource to download</label> <a href="{{ url('Course@download') }}?file={{ $lecture->content }}" class="btn btn-default btn-block"><i class=" mdi mdi-cloud-download"></i> Download Resource</a></div>
                                                   @elseif ( $lecture->type == "pdf" )
                                                   <div class="col-md-12"> <label>Uploaded PDF</label><a href="{{ url('Course@download') }}?file={{ $lecture->content }}" class="btn btn-default btn-block"><i class=" mdi mdi-cloud-download"></i> Download PDF</a></div>
                                                   @elseif ( $lecture->type == "video" )
                                                   <div class="col-md-12"> <label>Enter Video link\/URL</label> <input type="url" pattern="https?://.+" class="form-control video-link" name="content{{ $chapter->indexing }}[]" original-name="content" placeholder="Enter link/URL" value= @if( $lecture->type == 'videolink' ){{ $lecture->content }} @endif> </div>
                                                   <div class="col-md-12"> <label>Upload Video</label> <input type="file" class="dropify upload" name="content{{ $chapter->indexing }}[]" original-name="content" placeholder="Upload Video" data-allowed-file-extensions="mp4" accept="video/*"> <span class="text-xs">Only <strong>mp4</strong> extensions allowed </span>  </div>
                                                 
                                                   <div class="col-md-12"> <label>Uploaded Video</label><a href="{{ url('Course@download') }}?file={{ $lecture->content }}" class="btn btn-default btn-block"><i class=" mdi mdi-cloud-download"></i> Download Video</a> </div>
                                                   @elseif ( $lecture->type == "videolink" )
                                                   <div class="col-md-12"> <label>Enter Video link\/URL</label> <input type="url" pattern="https?://.+" class="form-control video-link" name="content{{ $chapter->indexing }}[]" value="{{ $lecture->content }}" original-name="content" placeholder="Enter link/URL"> </div>
                                                    <div class="col-md-12"> <label>Upload Video</label> <input type="file" class="dropify" name="content{{ $chapter->indexing }}[]" original-name="content" placeholder="Upload Video" data-allowed-file-extensions="mp4" accept="video/*"><input type="file" class="hidden" name="content{{ $chapter->indexing }}[]" original-name="content" value="null"> <span class="text-xs">Only <strong>mp4</strong> extensions allowed </span>  </div>
                                                   @endif
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- end lecture -->
                                @endforeach
                              @else
                              <div class="empty-section">
                                <i class="mdi mdi-clipboard-text"></i>
                                <h5>No lectures here, add a new one below!</h5>
                              </div>
                              @endif
                            </div>
                            <div class="lecture-buttons-holder">
                              <p class="text-thin text-muted mb-5">Add another lecture</p>
                              <div class="btn-group btn-group-justified">
                                <a href="" class="btn btn-default add-lecture" data-type="video"><i class=" mdi mdi-play-circle"></i> Video</a>
                                <a href="" class="btn btn-default add-lecture" data-type="downloads"><i class=" mdi mdi-cloud-download"></i> Downloads</a>
                                <a href="" class="btn btn-default add-lecture" data-type="link"><i class=" mdi mdi-link-variant"></i> Link</a>
                                <a href="" class="btn btn-default add-lecture" data-type="pdf"><i class=" mdi mdi-file-pdf-box"></i> PDF</a>
                                <a href="" class="btn btn-default add-lecture" data-type="text"><i class=" mdi mdi-note-text"></i> Text</a>
                              </div>
                          
                            </div>
                        </div>
                        </div>
                      </div>
                        @endforeach
                      @else
                      <div class="empty-section empty-chapter"><i class="mdi mdi-clipboard-text"></i><h5>No chapters here, add a new one!</h5></div>
                      @endif
                    </div>

                    <!-- here -->
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-12 mt-15 adds">
                            <button class="btn btn-primary btn-icon" type="submit"><i class=" mdi mdi-content-save"></i> Save Changes</button>
                            <button class="btn btn-default btn-icon add-chapters" data-toggle="modal" data-target="#createchapterr" type="button"><i class=" mdi mdi-plus-circle-outline"></i> Add Chapter</button>
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
<div class="modal fade" id="createchapter" role="dialog">
  <div class="modal-dialog">
       <!--Modal content--> 
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Create a chapter</h4>
             
          </div>
          <form class="simcy-form" action="{{ url('/course/create/online/content') }}" data-parsley-validate="" loader="true" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="course" value="{{ $Course->id }}">
          
            <input type="hidden" class="chapter-indexing" name="indexing" value="{{ count($chapters) + 1 }}">
              <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                      <div class="col-md-12">
                          <label>Chapter Title</label>
                          <input type="text" class="form-control" name="chaptertitle" placeholder="Chapter Title" required="">
                          
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-12">
                        <label>Chapter Title</label>
                        <textarea class="form-control" name="description" placeholder="Chapter Description" required=""></textarea>
                      </div>
                  </div>
              </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!--<div class="modal-footer">-->
                
              <!--</div>-->
          </form>
      </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script type="text/javascript">
        var deleteSectionUrl = "{{ url('/course/delete/content') }}";
        var sectionsUrl = "{{ url('Course@sections') }}";
    </script>


    <!-- scripts -->
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js//jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/simcify.min.js')}}"></script>
    <!-- custom scripts -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/builder.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.min.js" integrity="sha256-Q4K0T9IUORjpebn9dIu9szj2Rgn7GmLF+S3RjgM8aXw=" crossorigin="anonymous"></script>
    
    <script> 
  $(document).ready(function(){
    videolink();

    $("input.video-link").each(function(){
      if($(this).val() != ''){
        $(this).parent().siblings().find("input[type='file'].dropify").prop('required', false);
        $(this).parent().siblings().find("input[type='file'].dropify").prop('disabled', true);
        $(this).parent().siblings().find("input[type='file'].dropify").parents('.dropify-wrapper').css('opacity','0.3');
    }
      
    });

  });
  $('.add-lecture').on('click', function(){
    setTimeout(() => {
    videolink();
    
  }, 1000);
  });
  $('.add-chapters').on('click', function(){
    setTimeout(() => {
    $('.add-lecture').on('click', function(){
    setTimeout(() => {
    videolink();
  }, 1000);
  });
}, 1000);
  });
 function videolink(){
  
    $("input.video-link").bind("change keyup", function(){
      if($(this).val() == ''){
        $(this).closest(".panel-body").find("input[type='file'].dropify").not('.upload').prop('required', true);
        $(this).closest(".panel-body").find("input[type='file'].dropify").prop('disabled', false);
        var name =$(this).closest(".panel-body").find("input[type='file'].dropify").attr('name');
        $(this).closest(".panel-body").find("input[type='file'].dropify").parents('.dropify-wrapper').next('input.hidden[type=file]').remove();
        $(this).closest(".panel-body").find("input[type='file'].dropify").parents('.dropify-wrapper').css('opacity','1');
      } else{
        $(this).closest(".panel-body").find("input[type='file'].dropify").prop('required', false);
        $(this).closest(".panel-body").find("input[type='file'].dropify").prop('disabled', true);
        var name =$(this).closest(".panel-body").find("input[type='file'].dropify").attr('name');
       // $(this).closest(".panel-body").find("input[type='file'].dropify").parents('.dropify-wrapper').append(($('input.hidden[type=file]').length > 0) ? '' : '<input type="file" class="hidden" name="'+name+'" original-name="content" value="null">');
      
          if($(this).closest(".panel-body").find("input[type='file'].dropify").parents('.dropify-wrapper').siblings('input.hidden[type=file]').length == 0)
          {
            $(this).closest(".panel-body").find("input[type='file'].dropify").parents('.dropify-wrapper').after('<input type="file" class="hidden" name="'+name+'" original-name="content" value="null">');
          }

        $(this).closest(".panel-body").find("input[type='file'].dropify").parents('.dropify-wrapper').css('opacity','0.3');
      }
     });
 }
</script>
  
</body>
</html>
@endsection