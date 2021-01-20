@extends('layouts.app')
@section('contents')
    <div class="container">
        <div class="row">
            <div class="d-flex mt-5">
                <div><img src="{{ asset('assets/images/avatar.png')}}" alt="" height="80px"></div>
                <div class="ml-2">
                    <h2>Welcome back, {{ $user->name }}</h2>
                    <p>Learn General Sciences</p>
                </div>
            </div>            
        </div>
        <div class="row">            
            <div class="col-md-3">
                <div class="card">
                  <div class="card-header">
                    <h4>Table of contents</h4>
                  </div>
                  <div class="card-body">
                    <div class="toc-list">                        
                        @if ( count($chapters) > 0)
                          @foreach ($chapters as $chapterindex => $chapter)
                          <!-- single chapter -->
                          <div class="chapters-list">
                            <small class="text-xs text-thin">Chapter {{ $chapterindex + 1 }}:</small>
                              <h6> <strong class="">{{ $chapter->title }}</strong></h6>
                              @php 
                                $lectures = $chapter->getLectures();
                              @endphp
                              <ul>
                              @if (!empty($lectures) || count($lectures) > 0)
                                @foreach ($lectures as $key => $lecture)                                                                
                                  <li class="lecture-item" data-id="{{ $lecture->id }}">                                  
                                    <div class="lecture-complete"><i class=" mdi mdi-checkbox-multiple-marked-circle"></i> </div>
                                        @if ( $lecture->type == "link" )
                                    <div class="chapter-class-type"><i class=" mdi mdi-link-variant"></i> </div>
                                        @elseif ( $lecture->type == "text" )
                                    <div class="chapter-class-type"><i class=" mdi mdi-clipboard-text"></i> </div>
                                       @elseif ( $lecture->type == "downloads" )
                                    <div class="chapter-class-type"><i class=" mdi mdi-cloud-download"></i> </div>
                                       @elseif ( $lecture->type == "pdf" )
                                    <div class="chapter-class-type"><i class=" mdi mdi-file-pdf-box"></i> </div>
                                       @elseif ( $lecture->type == "video" || $lecture->type == "videolink" )
                                    <div class="chapter-class-type"><i class=" mdi mdi-play-circle"></i> </div>
                                       @endif
                                    <a href="javascript:void(0)" id="lecture_{{ $lecture->id }}" class="lecture" data-id="{{ $lecture->id }}" data-content="{{ $lecture->content }}">{{ $lecture->title }}</a>
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
                        <div class="empty-section empty-chapter"><i class="mdi mdi-clipboard-text"></i><h5>No chapters here yet!</h5></div>
                        @endif
                    </div>
                  </div>
                </div>
            </div>
            <!--Curriculum-->
            <div class="col-md-9">
                <div class="card">
                {{-- <div class="card-header">
                    <a class="btn btn-info pull-right ml-5 next-lecture" href="javascript:void(0)" style="display: none;">Next <i class=" mdi mdi-arrow-right"></i> </a>
                    <a class="btn btn-info pull-right previous-lecture" href="javascript:void(0)" style="display: none;"><i class=" mdi mdi-arrow-left"></i> Previous</a>
                    <h4>Learn</h4>
                </div> --}}
                <div class="card-body p-0 player-canvas lecture_section">
                    <h1>{{ $course->name }}</h1>
                    <small>{{ strip_tags($course->description) }}</small><hr>
                    <br>                    
                    <a class="btn btn-success start_course text-light text-decoration-none" id="start_section">Start Course</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">   
  $(document).ready(function(){
    $('.lecture').click(function(){
      $('.next-lecture').show();
      $('.lecture').removeClass('active');
      
      $('.previous-lecture').show();
      var id = jQuery(this).attr('data-id');
      // console.log(id);
      $.ajax({
        url: "{{URL('lecture')}}",
        data: {"_token": "{{ csrf_token() }}", "id" : id },
        type: 'POST',
        cache: false,
        success: function (response) {
          if(response.success==true){
            $('.lecture_section').html(response.data);
          }
        },        
        error: function (xhr, ajaxOptions, thrownError) {

        }
      });
    });

    $('#start_section').click(function(){
      $('.next-lecture').show();
      $('.previous-lecture').show();
      var id = $('.lecture').attr('data-id');
      $.ajax({
        url: "{{URL('lecture')}}",
        data: {"_token": "{{ csrf_token() }}", "id" : id },
        type: 'POST',
        cache: false,
        success: function (response) {
          if(response.success==true){
            $('.lecture_section').html(response.data);
          }
        },        
        error: function (xhr, ajaxOptions, thrownError) {

        }
      });
    });    

  });


</script>