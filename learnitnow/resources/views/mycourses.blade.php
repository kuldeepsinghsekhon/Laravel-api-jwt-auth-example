@extends('layouts.app')
@section('contents')
    <div class="container">
        
        {{-- <div class="row">
            <div class="mx-3 mt-2">
                <h2>Welcome back, {{ $user->name }}</h2>
                
            </div>            
        </div>         --}}
        {{-- <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            <h1 class="top_heading">Top picks for Aladdin</h1>
            <!--Controls-->
            <div class="controls-top">
                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i>Previous</a>
                <a class="btn-floating nxt" href="#multi-item-example" data-slide="next">Next<i class="fa fa-chevron-right"></i></a>
            </div>
            <!--/.Controls-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <!--First slide-->
                @php
                $i = 1;
                @endphp
                
                @if (!empty($myCourses))
                @foreach ($myCourses as $course)
                    <div class="carousel-item @if($i==1) active @endif">
                    <div class="crousel_sec">
                    @foreach($myCourses as $key => $course)
                        <div class="card_items">
                            <a href="{{ url('coursepreview/'.$course->id) }}">
                            <div class=" card_item_mid mb-2">
                                <div class="thumbnail">
                                <div class="thumbnail_mid">
                                    <div class="crousel_top_img">
                                        <img class="card-img-top" src="{{ asset('images/course/'.$course->image) }}"
                                            alt="Card image cap">
                                    </div>
                                    <div class="crousel_video_icon">
                                        <a href=""><i class="fa fa-play"></i></a>
                                    </div>
                                    <div class="time "><span> 1h 17m</span></div>
                                    <div class="popular "><span>POPULAR</span></div>
                                </div>
                                </div>
                                <div class="crd_content">
                                <span ><i class="fa fa-play" aria-hidden="true"></i>COURSE</span>
                                <h4 class="card-title">{{$course->name}}</h4>
                                <span>By: Sophie Wade</span>
                                <div class="with_hover">
                                    <ul>
                                        <li>Beginner</li>
                                        <li>{{$course->duration}} {{$course->period}}</li>
                                        <li>{{date_format($course->created_at,'M d, Y')}}</li>
                                    </ul>
                                    <div class="img_txt">
                                        <div class="lern_img">
                                            <img src="images/item_img.jpg">
                                        </div>
                                        <div class="lern_txt">
                                            <h1>MICHAEL MACDONALD</h1>
                                            <span>Research and Professor of finance at fearfield</span>
                                        </div>
                                    </div>
                                    <p>The income statement, or P&L, is the financial report investors will scrutinize the most—and with good reason. It’s where all your projections </p>
                                    <div class="viewers_sec">
                                        <div class="viewers_txt">
                                            <span>51,979 viewers</span>
                                        </div>
                                        <div class="save_txt">
                                            <a href=""><i class="fa fa-bookmark-o" aria-hidden="true"></i>save</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    
                    </div>
                    @php
                    $i++;
                    @endphp
                @endforeach
                @else      
                <div class="col-md-12 mb-5">
                    <div class="center-notify">                        
                        <h3 class="text-info text-center"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Courses not available.</h3>
                    </div>
                </div>                
                @endif
            </div>
            <!--/.Slides-->
        </div> --}}
        <div class="row">
            <div class="mx-3 mt-2">
                <h2>Welcome back, {{ $user->name }}</h2>
                <p>List of my courses.</p>
            </div>            
        </div> 
        <div class="page-heading">
            <div id="courses" class="row pagify-parent">                
                @if (!empty($myCourses))
                    @if (count($myCourses) > 0)                        
                        @foreach ($myCourses as $key => $course)
                            
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb filter retratos">
                                <a href="{{ url('coursepreview/'.$course->id) }}">
                                    <div class="tab_img">
                                        <img src="{{ asset('images/' . $course->image) }}">
                                    </div>
                                    <div class="tab_txt">
                                        <span>SITXFSA002</span>
                                        <h1>{{ ucwords($course->name) }}</h1>
                                        <ul>
                                            <li>{{ $course->duration }} {{ $course->period }}</li>
                                            <li><b>592,814</b> Views</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>                            
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <div class="center-notify">
                                <h3 class="text-info"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Courses not available.</h3>
                            </div>
                        </div>
                    @endif
                @else
                <div class="col-md-12 mb-5">
                    <div class="center-notify">                        
                        <h3 class="text-info text-center"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Courses not available.</h3>
                    </div>
                </div>                
                @endif
            </div>            
        </div>
    </div>

    <script>
        $('.carousel').carousel({
         interval: false,
        });
     </script>    
@endsection
