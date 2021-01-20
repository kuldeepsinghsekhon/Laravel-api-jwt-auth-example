 @extends('layouts.app')

 @section('contents')
    <div class="banner_sec">
         <div class="banner_img">
             <img src="{{ asset('images/banner-img.jpg') }}">
         </div>
         <div class="container">
            <div class="banner_txt">
                <p>Start Learning Today</p> 
                @if (empty($user))
                <a href="{{ url('register') }}" class="btn">Enroll Now!</a>
                @endif
            </div>                 
         </div>
    </div>

    <div class="center_imgs">
        <div class="container">
            @if (!empty($category))
            <div class="row">                    
                    @php
                        $lastkey = count($category);
                        $last_key = $lastkey - 1; 
                    @endphp                
                    @foreach ($category as $key => $categories) 
                        @if ($key === 0)
                            <div class="col-md-5">
                                <div class="entroll_sec">
								<div class="hero_overlay"></div>
                                    <a href="{{ url('/category/'.$categories->id) }}">
                                        <div class="img_sec">
                                            <img src="{{ asset('uploads/category/thumbnail/'.$categories->thumbnail) }}">
                                        </div>
                                        <div class="img_txt_mid"> <span>{{$categories->name}}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            @if ($key == 1)
                            <div class="col-md-7">
                                <div class="row">
                            @endif                        
                                <div class="col-md-6">
                                    <div class="entroll_sec en_sec">
									<div class="hero_overlay"></div>
                                        <a href="{{ url('/category/'.$categories->id) }}">
                                            <div class="img_sec">
                                                <img src="{{ asset('uploads/category/thumbnail/'.$categories->thumbnail) }}">
                                            </div>
                                            <div class="img_txt_mid"> <span>{{ $categories->name}}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>    
                            @if ($key == $last_key)
                                </div>
                            </div>    
                            @endif
                        @endif
                    @endforeach                         
            </div>
                @if (empty($user))
                <div class="center_btn"> <a href="{{ url('register') }}" class="btn">Enroll Now!
                </a>
                </div>    
                @endif            
            @endif
        </div>
    </div>
    
    {{-- <div class="center_imgs">
        <div class="container">            
            <div class="row">
                <div class="col-md-5">
                     <div class="entroll_sec">
                         <a href="{{ url('/category/1') }}">
                             <div class="img_sec">
                                 <img src="{{ asset('images/hospital.jpg') }}">
                             </div>
                             <div class="img_txt_mid"> <span>Hospitality</span>
                             </div>
                         </a>
                     </div>
                </div>
                <div class="col-md-7">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="entroll_sec en_sec">
                                 <a href="{{ url('/category/77') }}">
                                     <div class="img_sec">
                                         <img src="{{ asset('images/construction.jpg') }}">
                                     </div>
                                     <div class="img_txt_mid"> <span>Construction</span>
                                     </div>
                                 </a>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="entroll_sec en_sec">
                                 <a href="{{ url('/category/82') }}">
                                     <div class="img_sec">
                                         <img src="{{ asset('images/food_safe.jpg') }}">
                                     </div>
                                     <div class="img_txt_mid"> <span>Food and Safety</span>
                                     </div>
                                 </a>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="entroll_sec en_sec">
                                 <a href="{{ url('/category/80') }}">
                                     <div class="img_sec">
                                         <img src="{{ asset('images/sec.jpg') }}">
                                     </div>
                                     <div class="img_txt_mid"> <span>Security</span>
                                     </div>
                                 </a>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="entroll_sec en_sec">
                                 <a href="{{ url('/category/83') }}">
                                     <div class="img_sec">
                                         <img src="{{ asset('images/first_aid.jpg') }}">
                                     </div>
                                     <div class="img_txt_mid"> <span>First Aid</span>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>            
            <div class="center_btn"> <a href="{{ url('register') }}" class="btn">Enroll Now!
                </a>
            </div>
        </div>
    </div> --}}
    
     <div class="jumbotron text-center" style="margin-bottom:0; background-color: #FBFCFF;">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12">
                     <h1 class="top_head">Browse Our Top Courses</h1>

                     <div align="center">
                         @if (!empty($category))
                            <div class="tab_s" align="center">
                                 <button class="btn  active filter-button" data-filter="todo">All</button>
                                 @foreach ($category as $_category)
                                    <button class="btn  filter-button" data-filter="{{ $_category->slug }}">{{ $_category->name }}</button>
                                 @endforeach
                            
                            </div>
                         @endif


                        <div class="row">
							@if (!empty($cources))
                                @foreach ($cources as $course)
                                
                                
                                    <div class="col-lg-3 col-md-4 col-xs-6 thumb filter {{ $course->getCategory($course->coursecategory_id)->slug }}">
                                    <a href="{{ url('course/'.$course->id ) }}">
                                    <div class="tab_img">
                                            <img src="{{ asset('uploads/course/images/'.$course->image) }}">
                                        </div>
                                        <div class="tab_txt">
                                            <!--<span>SIT30616</span>-->
                                            <h1>{{ ucwords($course->name) }}</h1>
                                            <!--<ul>
                                                <li>{{ $course->duration }} {{ $course->period }}</li>
                                                <li><b>592,814</b> Views</li>
                                            </ul>-->
                                        </div>
                                        </a>
                                    </div>
                                
                           		
								@endforeach
							@endif
                            
						</div>
                     </div>
                 </div>
             </div>

             <div class="dropdown_menu">
                 <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Browse All Top Courses</button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
					@if (!empty($all_categories))
                               
						@foreach($all_categories as $cat)
                         <a class="dropdown-item" href="{{url('/category').'/'.$cat->id}}">{{$cat->name}}</a>
                         @endforeach
						 @endif
                     </div>
                 </div>
             </div>
         </div>
     </div>







     <div class="center_btm">
         <div class="container">
             <h1>Stay Sharp. Get ahead with Learning Paths.</h1>
             <div class="row">
             @foreach ($all_categories as $key => $category) 
                 <div class="col-md-3">
                     <div class="learn_sec">
                         <div class="hero_overlay"></div>
                         <div class="learn_img">
                             <img src="{{ asset('uploads/category/thumbnail/'.$category->thumbnail) }}">
                         </div>
                         <div class="learn_txt"> <a href="{{url('/category').'/'.$cat->id}}">@php echo wordwrap(" $category->name ",20,"<br>\n");@endphp</a>
                         </div>
                     </div>
                 </div>
            @endforeach
                 <!-- <div class="col-md-3">
                     <div class="learn_sec">
                         <div class="learn_img">
                             <img src="{{ asset('images/learn_img_2.jpg') }}">
                         </div>
                         <div class="learn_txt"> <span>Language of Leaders</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="learn_sec">
                         <div class="learn_img">
                             <img src="{{ asset('images/learn_img_3.jpg') }}">
                         </div>
                         <div class="learn_txt"> <span>Coaching Excellence</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="learn_sec">
                         <div class="learn_img">
                             <img src="{{ asset('images/learn_img_4.jpg') }}">
                         </div>
                         <div class="learn_txt"> <span>Time Max</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="learn_sec">
                         <div class="learn_img">
                             <img src="{{ asset('images/learn_img_5.jpg') }}">
                         </div>
                         <div class="learn_txt"> <span>Motivation & Mindset</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="learn_sec">
                         <div class="learn_img">
                             <img src="{{ asset('images/learn_img_6.jpg') }}">
                         </div>
                         <div class="learn_txt"> <span>High Performance Teams</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="learn_sec">
                         <div class="learn_img">
                             <img src="{{ asset('images/learn_img_7.jpg') }}">
                         </div>
                         <div class="learn_txt"> <span>Exceptional CX</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="learn_sec">
                         <div class="learn_img">
                             <img src="{{ asset('images/learn_img_8.jpg') }}">
                         </div>
                         <div class="learn_txt"> <span>Behaviours of Peak<br>
                                 Performance (DISC)</span>
                         </div>
                     </div>
                 </div> -->
                 <div class="dropdown_menu">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Browse All Top Courses</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                        @if (!empty($all_categories))
                                
                            @foreach($all_categories as $cat)
                            <a class="dropdown-item" href="{{url('/category').'/'.$cat->id}}">{{$cat->name}}</a>
                            @endforeach
                            @endif
                        </div>
                    </div>
                 </div>
                 
             </div>
         </div>
     </div>
     <div class="lower_sec">
         <div class="overlay"></div>
         <div class="lower_img">
             <img src="{{ asset('images/lower_img.jpg') }}">
         </div>
         <div class="container">
             <div class="lower_txt">
                 <h1>Onsite Group Training</h1>
                 <p>Train your staff fast and efficiently. Book onsite group training at your workplace
                     <br>or at our Sydney Training Centre.
                </p>
                @if (empty($user))
                 <a href="{{ url('register') }}" class="btn">Enroll Now!   </a>
                @endif  
             </div>
         </div>
     </div>




     <div class="btm_slider">
         <div class="container">
             <h1 class="review_hd">Student Training Reviews</h1>
             <div class="row align-items-center">
                 <div class="col">
                     <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                         <div class="carousel-inner">
                             <div class="carousel-item active">
                                 <div class="row align-items-center">
                                     <div class="col-md-5 ">
                                         <img class="d-block img-fluid" src="{{ asset('images/slider_img.jpg') }}"
                                             alt="First slide">
                                     </div>
                                     <div class="col-md-7 ">
                                         <div class="crou_txt">
                                             <div class="rating"> <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                             </div>
                                             <p><span><i class="fa fa-quote-left" aria-hidden="true"></i></span>Easily
                                                 accessible location in Norwest Business
                                                 <br>Park, I found their RCG course to be very
                                                 <br>interesting. I have since secured a position in
                                                 <br>hospitality as a gaming attendant-definitely
                                                 <br>recommend!<span><i class="fa fa-quote-right"
                                                         aria-hidden="true"></i></span>
                                             </p>
                                             <span>- Peter</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="carousel-item ">
                                 <div class="row align-items-center">
                                     <div class="col-md-5 ">
                                         <img class="d-block img-fluid" src="{{ asset('images/slider_img.jpg') }}"
                                             alt="First slide">
                                     </div>
                                     <div class="col-md-7 ">
                                         <div class="crou_txt">
                                             <div class="rating"> <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                             </div>
                                             <p><span><i class="fa fa-quote-left" aria-hidden="true"></i></span>Easily
                                                 accessible location in Norwest Business
                                                 <br>Park, I found their RCG course to be very
                                                 <br>interesting. I have since secured a position in
                                                 <br>hospitality as a gaming attendant-definitely
                                                 <br>recommend!<span><i class="fa fa-quote-right"
                                                         aria-hidden="true"></i></span>
                                             </p>
                                             <span>-Peter</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="carousel-item ">
                                 <div class="row align-items-center">
                                     <div class="col-md-5">
                                         <img class="d-block img-fluid" src="{{ asset('images/slider_img.jpg') }}"
                                             alt="First slide">
                                     </div>
                                     <div class="col-md-7">
                                         <div class="crou_txt">
                                             <div class="rating"> <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                                 <span><i class="text-warning fa fa-star"></i></span>
                                             </div>
                                             <p><span><i class="fa fa-quote-left" aria-hidden="true"></i></span>Easily
                                                 accessible location in Norwest Business
                                                 <br>Park, I found their RCG course to be very
                                                 <br>interesting. I have since secured a position in
                                                 <br>hospitality as a gaming attendant-definitely
                                                 <br>recommend!<span><i class="fa fa-quote-right"
                                                         aria-hidden="true"></i></span>
                                             </p>
                                             <span>-Peter</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <ol id="myCarousel-indicators" class="carousel-indicators">
                                 <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                                 <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                                 <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                             </ol>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>




     <div class="client_sec">
         <div class="conatiner">
             <div class="client_head">
                 <h1>Partners & Clients</h1>
             </div>
             <div class="client_para">
                 <p>HINSW has assisted many organisations and government departments to achieve their training goals. As
                     well as offering places
                     <br>in our fully equipped class rooms we can customise our courses to suit the needs of our clients,
                     delivering training onsite at their
                     <br>preferred location and fitting in with work schedules. Some of our valuable partners include:
                 </p>
             </div>
             <div class="client_images">
                 <img class="img-fluid" src="{{ asset('images/client_img_1.png') }} ">
                 <img class="img-fluid" src="{{ asset('images/client_img_2.png') }} ">
                 <img class="img-fluid" src="{{ asset('images/client_img_3.png') }} ">
                 <img class="img-fluid" src="{{ asset('images/client_img_4.png') }} ">
             </div>
         </div>
     </div>
         
 @endsection
