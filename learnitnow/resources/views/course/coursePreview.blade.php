@extends('layouts.app')
@section('contents')
<style>
    .tab-content > .active { opacity: 1;}
    .lectureTrue {color: #b0b0b0;font-size: 21px;}
    .lectureActive {color: #b0b0b0;font-size: 21px;}
   
</style>
    <div class="page-wrapper toggled">
        <div class="finance_div">
            <a href="#" id="toggle-sidebar" class="classroom-sidebar-toggle"><i class="fa fa-bars"></i>Contents</a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <a href="#" id="toggle-sidebar"><i class="fa fa-bars"></i>Contents</a>
                    <div id="close-sidebar">
                        <i class="fa fa-times"></i>
                    </div>
                    <!-- sidebar-search  -->
                    @if ( count($chapters) > 0)
                        <div class="sidebar-menu">
                            <ul>
                            
                        @foreach ($chapters as $chapterindex => $chapter)
                                <li class="sidebar-dropdown" data-id="{{ $chapter->id }}">
                                    <a href="javascript:void(0)"><span>{{ $chapterindex + 1 }} . {{ $chapter->title }}</span></a>
                                    <div class="sidebar-submenu">
                                        @php 
                                            $lectures = $chapter->getLectures();
                                            
                                        @endphp
                                        <ul>
                                            @if (!empty($lectures) || count($lectures) > 0)
                                            @foreach ($lectures as $key => $lecture)                                            
                                                <li>
                                                    <a href="javascript:void(0)" id="lecture_{{ $lecture->id }}" class="lecture @if($chapterindex == 0)active @endif" data-id="{{ $lecture->id }}"  data-chapter="{{ $chapter->id }}" data-course="{{ $chapter->course }}" data-content="{{ $lecture->content }}">{{ $lecture->title }}
                                                     
                                                        <span>
                                                            <!-- <i class="fa fa-check-circle @if($chapter->getLectureStatus($user->id, $chapter->id, $lecture->id) == 'Completed') lectureTrue @endif" id="indexLecture{{ $lecture->id }}" style="float:right;margin-top: 3px;"></i> -->
                                                            <i class="fa @if($chapter->getLectureStatus($user->id, $chapter->id, $lecture->id) == 'Completed')fa-bookmark lectureTrue @else fa-bookmark-o @endif" id="indexLecture{{ $lecture->id }}" style="float:right;margin-top: 3px;" aria-hidden="true"></i> 
                                                        </span>
                                                    </a>
                                                </li>
                                            @endforeach
                                            @else
                                            <li><a href="#">This chapter has no lectures!<i class="fa fa-bookmark-o"
                                                aria-hidden="true"></i></a></li>   
                                            @endif
                                            {{-- <li><a href="#">About Maps for Creative Cloud<i class="fa fa-bookmark-o"
                                                        aria-hidden="true"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                    @else
                        <div class="sidebar-menu">
                            <ul>
                                <li class="sidebar-dropdown">
                                    <a href=""><span>This Course has no Chapters.</span></a>
                                </li>
                            </ul>
                            
                        </div>
                    @endif
                    <!-- sidebar-menu  -->
                </div>
                <!-- sidebar-content  -->
            </nav>
            <!-- sidebar-wrapper  -->
            <main class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="video_sec lecture_section">
                            <div class="banner_img">
                            <style>
                                        .center {
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        height: 100px;
                                        width: 100%;
                                       
                                        }
                                       .loader {
                                        border: 7px solid #f3f3f3; /* Light grey */
                                        border-top: 7px solid #303030; /* Blue */
                                        border-radius: 50%;
                                        width: 50px;
                                        height: 50px;
                                        animation: spin 2s linear infinite;
                                        }
                                        /* Safari */
                                        @-webkit-keyframes spin {
                                        0% { -webkit-transform: rotate(0deg); }
                                        100% { -webkit-transform: rotate(360deg); }
                                        }

                                        @keyframes spin {
                                        0% { transform: rotate(0deg); }
                                        100% { transform: rotate(360deg); }
                                        }
                            </style>
                            <div class="center">
                                        <div class="loader"></div>
                            </div>
                            </div>
                        </div>
                        <div class="lecture_content"></div>
                    </div>
                </div>
                <section id="tabs" class="project-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 nopadding">
                                <nav class="tab_sec">
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active pull-left" id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i
                                                class="fa fa-address-card-o" aria-hidden="true"></i>Overview</a>
                                        <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                            href="#nav-profile" role="tab" aria-controls="nav-profile"
                                            aria-selected="false"><i class="fa fa-window-restore" aria-hidden="true"></i>
                                            Q&A</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                            href="#nav-contact" role="tab" aria-controls="nav-contact"
                                            aria-selected="false"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                                            Notebook</a> -->
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="overview_sec">
                                            <div class="ins_sec">
                                                @if (!empty($course))
                                                <div class="intro_sec">
                                                    <h1>INSTRUCTOR</h1>
                                                    <div class="intro_img">
                                                        <div class="intro_img_left">
                                                            <img src="{{ asset('uploads/instructor/'.$course->getInstructor($course->instructor)->image ) }}">
                                                        </div>
                                                        
                                                        <div class="intro_img_txt">
                                                            <h1>                                                                
                                                                {{ $course->getInstructor($course->instructor)->name }}                                                                 
                                                            </h1>
                                                            <p>                                                               
                                                                {{ $course->getInstructor($course->instructor)->title }}                                                                
                                                            </p>
                                                            <!-- <ul>
                                                                <li>
                                                                    <a href="javascript:void(0)">View on LinkedIn</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0)">Follow on LinkedIn</a>
                                                                </li>
                                                            </ul> -->
                                                        </div>    
                                                        
                                                        
                                                    </div>
                                                </div>
                                                @endif
                                                <!--<div class="course_relate">
                                                    <h1>RELATED TO THIS COURSE</h1>
                                                    <ul>
                                                        <li><i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                                                            Exercise Files<a href="">show all</a>
                                                        </li>
                                                        <li><i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                                                            Certificates<a href="">show all</a>
                                                        </li>
                                                    </ul>
                                                </div>-->
                                            </div>
                                            @if (!empty($course))
                                            <div class="Course details">
                                                <!-- <h1>{{ $course->name }}</h1>
                                                <ul>
                                                    <li>{{ $course->duration }}h</li>
                                                    <li>{{ $course->degree }}</li>
                                                    <li>Released: {{ date_format($course->created_at,"m/d/Y") }}</li>
                                                </ul> -->
                                                <h3 class="lecture-title"></h3>
                                                <p class="lecture-description"></p>
                                            </div>    
                                            @endif

                                            @if (count($exams) > 0)
                                            <div>
                                                <div>
                                                    <h4>Course Exams</h4>
                                                    @if ($course)
                                                    <p>Exams for {{ ucwords($course->name) }}</p>    
                                                    @endif                                                    
                                                    <hr>
                                                </div>
                                                <div class="table-responsive mt-15 longer" style="padding-bottom: 22px;">
                                                    <table class="table table-striped mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Questions</th>
                                                                <!-- <th scope="col">Status</th>
                                                                <th scope="col">Completed By</th> -->
                                                                <th scope="col">Take</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($exams as $key => $exam)
                                                            <tr>
                                                                <th scope="row">{{ $key + 1}}</th>
                                                                <td>{{ ucwords($exam->name) }}</td>
                                                                @php
                                                                    $examQues = $exam->getQuestions();                                                                    
                                                                @endphp
                                                                <td>{{ $examQues->count() }} Questions</td>
                                                                <!-- <td>{{ $exam->status }}</td>
                                                                <td>Students</td> -->
                                                                <td>
                                                                @if($user->role == "admin")
                                                                <a href="{{ url('exam/'.$exam->id.'/take') }}" class="btn btn-primary">Take Exam</a>
                                                                @elseif(!empty($courseenrolled) && $courseenrolled->status == "Complete")
                                                                <a href="{{ url('exam/'.$exam->id.'/take') }}" class="btn btn-primary">Take Exam</a>
                                                                @else
                                                                -|-
                                                                @endif
                                                                   
                                                                </td>
                                                            </tr>    
                                                            @endforeach    
                                                        </tbody>
                                                    </table>
                                                  </div>
                                            </div>    
                                            @else
                                            <span>There's no Exams in this course.</span>
                                            @endif

                                            <div class="col-md-12 text-center">
                                             <a role="menuitem" class="btn btn-success send-to-server-click" data="courseid:{{ $course->id }}|_token:{{ csrf_token() }}" url="{{ url('/course/certificate') }}" loader="true" href="" target="_blank"> <i class="mdi mdi-certificate"></i>Get Certificate</a>
                                            </div>
                                           
                                            <div class="Related_courses">
                                                <h1>Related courses</h1>
                                                @if(count($related_courses) > 0) 
                                                @foreach($related_courses as $related)
                                                <div class="Related_courses_mid">
                                                    <div class="Related_courses_img">
                                                    <a href="{{ url('/course/'.$related->id) }}" target="_blank">
                                                        <img src="/uploads/course/images/{{ $related->image }}">
                                                    </a>
                                                        <!-- <span> 1h 8m</span> -->
                                                    </div>
                                                    <div class="Related_courses_txt">
                                                        <div class="ppl">
                                                            <h1>COURSE</h1>
                                                            <span>popular</span>
                                                        </div>
                                                        <h2>
                                                        <a href="{{ url('/course/'.$related->id) }}" target="_blank">
                                                        {{ $related->name}}</a></h2>
                                                        <!-- <span>3,481 viewers</span> -->
                                                        <!-- <a href="#"><i class="fa fa-bookmark-o"
                                                                aria-hidden="true"></i>Save</a> -->
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <span>There's no related course to display.</span>
                                                @endif
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            <!-- page-content" -->
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(100);
        if (
            $(this)
            .parent()
            .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(100);
            $(this)
                .parent()
                .addClass("active");
        }
    });

</script>
<script>
    $('.carousel').carousel({
        interval: false,
    });

</script>
<script>
    jQuery(function($) {
        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                .parent()
                .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
            $("main.page-content .lecture_content p").animate({ paddingTop: "60px" }, 500 );
        });
        $("#toggle-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
            $("main.page-content .lecture_content p").animate({ paddingTop: "20px" }, 500 );
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function() {        
        $('.lecture').click(function(event) { 
            event.preventDefault()
            $('.next-lecture').show();
            $('.lecture').removeClass('active');
            $(this).addClass('active');
            $('.previous-lecture').show();
            var id = jQuery(this).attr('data-id');
            var chapterId = jQuery(this).attr('data-chapter');
            var CourseId = jQuery('.lecture').attr('data-course');
            var activeIndex = $(this).index();
            console.log(activeIndex);
            $.ajax({
                url: "{{ URL('lecture') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "chapterId": chapterId,
                    "course_id": CourseId
                },
                type: 'POST',
                cache: false,
                success: function(response) {
                    if (response.success == true) {
                        if(response.type == 'link' || response.type == 'text' || response.type == 'download'){
                          
                            $('.lecture_section').next('.lecture_content').html(response.data);
                            $('.lecture_section').removeClass('embed-container');
                            $('.lecture_section').html('');
                            }else{
                            $('.lecture_section').addClass('embed-container');
                            $('.lecture_section').html(response.data);
                            $('.lecture_section').next('.lecture_content').html('');
                        }
                        $('.lecture-title').html(response.title);
                        $('.lecture-description').html(response.description);
                        $("#indexLecture"+id).removeClass('fa-bookmark-o');
                        $("#indexLecture"+id).addClass('fa-bookmark');
                        $("#indexLecture"+id).addClass('lectureActive');
                        setTimeout(function(){ 
                            // $("<link rel='stylesheet' href='{{ asset('css/iframe-style.css')}}'/>").appendTo($('#ifarme1 head');
                           var iframe = document.getElementsByTagName('iframe')[0];
                                iframe.addEventListener("load", function() {
                                        /* the JS equivalent of the answer
                                    *
                                    * var node = document.createElement('style');
                                    * node.appendChild(document.createTextNode('body { background: #fff; }'));
                                    * window.frames[0].document.head.appendChild(node);
                                    */
                                    
                                    // the cleaner and simpler way
                                    window.frames[0].document.body.style.backgroundColor = "#fff";
                                });
                         }, 3000);
                    } 
                },
                error: function(xhr, ajaxOptions, thrownError) {

                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        var id = jQuery('.lecture').attr('data-id');
        var CourseId = jQuery('.lecture').attr('data-course');
        var chapterId = jQuery('.lecture').attr('data-chapter');
        $.ajax({
            url: "{{ URL('lecture') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "chapterId": chapterId,
                "course_id": CourseId
                
            },
            type: 'POST',
            cache: false,
            success: function(response) {
                if (response.success == true) {
                    
                    if(response.type == 'link' || response.type == 'text' || response.type == 'download'){
                        
                            $('.lecture_section').next('.lecture_content').html(response.data);
                            $('.lecture_section').removeClass('embed-container');
                            $('.lecture_section').html('');
                            }else{
                            $('.lecture_section').addClass('embed-container');
                            $('.lecture_section').html(response.data);
                            $('.lecture_section').next('.lecture_content').html('');
                        }
                        $('.lecture-title').html(response.title);
                        $('.lecture-description').html(response.description);
                        $("#indexLecture"+id).addClass('lectureActive');
                    //$('.lecture_section').html(response.data);
                    setTimeout(function(){ 
                        $('.lecture_section').append('<style>iframe div#player { width: 100% !important;}</style>');
                         }, 1000);
            
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {

            }
        });

        
    });
</script>