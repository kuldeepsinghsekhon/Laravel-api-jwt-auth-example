 @extends('layouts.app')

 @section('contents')
 <link href="{{ asset('css/stripe-payment.css')}}" rel="stylesheet">
     <div class="training_sec">
         <div class="container">
             <div class="row">
                 <div class="col-md-8 player-cont">
				     @if (isset($enrolledCourse))
						  @if($enrolledCourse->count()>0)
											  <div class="banner_thumbnail">
								<img src="/images/video-img.jpg">			
								<a href="{{'/coursepreview/'.$course->id}}" id="banner-play">
									<div class="banner-play-icon" data-play-percent="" style="left: -120px;opacity: 1;">		
										<div class="banner-play-label">View This Course</div>
									</div>
								</a>
							</div>
                            @else
                                <div class="video-container embed-responsive embed-responsive-16by9">
                                    @if($course->videotype == 'video' && !empty($course->video))
                                        <video width="100%" controls>
                                            <source src="{{ URL::to('/').'/uploads/course/course/'.$course->video }}" type="video/mp4">
                                        Your browser does not support HTML5 video.
                                        </video>
                                        @elseif($course->videotype == 'youtubelink' && !empty($course->youtubelink))
                                        <iframe width="100%" height="315" src="{{ $course->youtubelink }}" frameborder="0"
                                        allow="accelerometer; picture-in-picture; fullscreen" allowfullscreen=''></iframe>
                                    @endif
                                </div>
                                <div class="blur_offscreen" style='display: none;'>
                                    <img src="/images/video-img.jpg">
                                    <div class="blur_txt">
                                    <h1>Watch the full course on Learn It Now</h1>
                                    <p>Start your free month on Learn It Now, which now features 100% of Lynda.com courses. Develop in-demand skills with access to thousands of expert-led courses on business, tech and creative topics.</p>
                                    <!-- <a class="enroll-now" data-gyft="3301" data-id="{{ $course->id}}"
                                                data-price="{{ $course->price}}" href="">
                                    Enroll Now</a> -->
                                    <a class="enroll-now2"  data-toggle="modal" @auth data-target="#enrollnow2" @endauth @guest data-target="#createaccount" @endguest href="">Enroll Now</a>
                                    </div>
                                </div>
                            
						  @endif
				 	
                    @else
                    <div class="video-container embed-responsive embed-responsive-16by9">
                                    @if($course->videotype == 'video' && !empty($course->video))
                                        <video width="100%" controls>
                                            <source src="{{ URL::to('/').'/uploads/course/course/'.$course->video }}" type="video/mp4">
                                        Your browser does not support HTML5 video.
                                        </video>
                                        @elseif($course->videotype == 'youtubelink' && !empty($course->youtubelink))
                                        <iframe width="100%" height="315" src="{{ $course->youtubelink }}" frameborder="0"
                                        allow="accelerometer; picture-in-picture; fullscreen" allowfullscreen=''></iframe>
                                    @endif
                                </div>
				<div class="blur_offscreen" style='display: none;'>

			<img src="/images/video-img.jpg">
			<div class="blur_txt">
			<h1>Watch the full course on Learn It Now</h1>
			<p>Start your free month on Learn It Now, which now features 100% of Lynda.com courses. Develop in-demand skills with access to thousands of expert-led courses on business, tech and creative topics.</p>
			<!-- <a class="enroll-now" data-gyft="3301" data-id="{{ $course->id}}"
                         data-price="{{ $course->price}}" href="">
            Enroll Now</a> -->
            <a class="enroll-now2"  data-toggle="modal" @auth data-target="#enrollnow2" @endauth @guest data-target="#createaccount" @endguest href="">
	        Enroll Now</a>
			</div> 
			</div>
			
			@endif
                    <!--<div class="video_container">
                        <div class="video_player_wrap">
                            <video width="400" controls>
                                <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                                <source src="https://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg">
                                Your browser does not support HTML video.
                            </video>
                        </div>
                    </div>-->
					<div class="video-description">
						<section class="section-module">
							<h4 id="video-desc-heading" data-text="About this video">About this video</h4>
							<div id="video-description-text">
                            {!! html_entity_decode($course->aboutvideo) !!}
                            </div>
						</section>
					</div>



                     <div class=" overview_cunt">
                         <div class=" tab-container">
							<nav class="course-tabs">
								<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
										href="#nav-home" role="tab" aria-controls="nav-home"
										aria-selected="true">Overview</a>
									<!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">View Offline</a>
									<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Exercise Files</a>	-->
								</div>
							</nav>
                             <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                 <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                     <div class="section-module">
                                         <div class="row">
											<div class=" col-md-3  course-meta">
												<div class="author-thumb">
												<h5>Author</h5>
												<a href="">
													<img src="{{ '/uploads/instructor/' . $course->getInstructor($course->instructor)->image }}">
												</a>
												<span> {{ $course->getInstructor($course->instructor)->name }} </span>
												</div>
											</div>
											<div class="col-md-9  course-description">
												<h6>Released</h6><span id="release-date">{{ date_format($course->created_at,"m/d/Y") }}</span>
												<div class="description">
                                                {!! html_entity_decode($course->description) !!}
												</div>
											</div>


                                             <!-- <div class=" col-md-3">
                                                 <div class="course-info-stat-cont">
                                                     <span class="course-info-stat skill-levels clearfix">
                                                         <span class="beginner active"></span>
                                                         <span class="intermediate"></span>
                                                         <span class="advanced"></span>
                                                     </span>
                                                     <h6>Skill Level <strong>Beginner</strong></h6>
                                                 </div>
                                                 <div class="course-info-stat-cont duration">
                                                     <span class="course-info-stat">3h 54m</span>
                                                     <h6>Duration</h6>
                                                 </div>
                                                 <div class="course-info-stat-cont viewers">
                                                     <span id="course-viewers" class="course-info-stat">2,746</span>
                                                     <h6>Views</h6>
                                                 </div>
                                             </div> -->

                                         </div>
                                     </div>
                                 </div>



                                 <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">

                                     <div class="section-module">

                                         <a href="" class="offline_sec enroll-now" data-gyft="3301"
                                             data-id="{{ $course->id }}" data-price="{{ $course->price }}">

                                             <img src="/images/pc.png">
                                             <div class="headline">View courses offline with a Premium Membership</div>
                                             <p>Sign up for a Premium Membership to download courses for Internet-free
                                                 viewing.</p>
                                             <p>Watch offline with your iOS, Android, or desktop app.</p>
                                             <button class="am-link btn btn-lg btn-action">Start My Free Month</button>
                                             <p class="footnote">After signing up, download the course here or from the
                                                 iOS/Android App.</p>
                                         </a>
                                     </div>


                                 </div>
                                 <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                     aria-labelledby="nav-contact-tab">
                                     <div class="content locked">
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <div class="headline">Access exercise files with a premium membership.
                                                 </div>
                                                 <p>All file sizes are estimates</p>
                                                 <ul class="exercise-files-popover">
                                                     <li role="presentation">
                                                         <span role="link">
                                                             <i class="fa fa-lock" aria-hidden="true"></i>

                                                             <span class="exercise-name">
                                                                 Ex_Files_Photoshop_2021_EssT_Design.zip
                                                             </span>
                                                             <span class="file-size">(869.5MB)</span>
                                                         </span>
                                                     </li>
                                                 </ul>
                                             </div>
                                             <div class="col-md-6">
                                                 <div class="files locked">

                                                     <div class="tab_upgrade">
                                                         <i class="fa fa-upload" aria-hidden="true"></i>

                                                         <div class="discover">
                                                             Discover the enhanced<br>learning experience
                                                         </div>
                                                         <a class="am-link btn btn-lg btn-action enroll-now"
                                                             data-gyft="3301" data-id="{{ $course->id }}"
                                                             data-price="{{ $course->price }}">Enroll Now</a>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>



                             </div>






                         </div>



                     </div>


                   <!--  <div id="course-tags" class="section-module">
                         <div class="tags subject-tags software-tags">
                             <h5>Skills covered in this course</h5>
                             <a href=""><em>Masking + Compositing</em></a>
                             <a href=""><em>Design</em></a>
                             <a href=""><em>Illustration</em></a>
                             <a href=""><em>Photography</em></a>
                             <a href=""><em>Raw Processing</em></a>
                             <a href=""><em>Retouching</em></a>
                             <a href=""><em>Photoshop</em></a>


                         </div>
                     </div>-->

                 </div>


                 <div class="col-md-4 sidebar-col">
                     <div id="sidebar-container">
                         <div class="btm_right_courses">
                             <div class="card_detail">
                                 <div class="related_sec">
                                     <h2><strong>Related Courses</strong></h2>
                                 </div>


                                 <div class="suggested-courses">
                                     <ul>
									 @if($related_courses->count()>0)
									 @foreach ($related_courses as $related_course)
									 <li>
                                             <div class="card_detail_left">
                                                 <div class="card_detail_img">
                                                     <img width="80" height="80"src="/uploads/course/images/{{ $related_course->image }}">
                                                 </div>
                                                 <div class="card_hover_txt">
                                                     <a href="{{url('/course').'/'.$related_course->id}}"><span>Preview Course</span></a>
                                                 </div>
                                             </div>
                                             <div class="card_detail_txt">
                                                <a href="{{url('/course').'/'.$related_course->id}}"> <h1>{{ $related_course->name }}</h1></a>
                                                 <p>with {{ $related_course->getInstructor($related_course->instructor)->name }} </p>
                                                <!-- <ul>
                                                     <li>2h 55m</li>
                                                     <li>Beginner</li>--->
                                                 
                                             </div>
                                         </li>
										
									@endforeach
									@else
										<h5 class="pl-3">No related course</h5>
                                      @endif   
                                    </ul>
                                     


                                 </div>
                             </div>

                         </div>
                     </div>

                  


                     <div class="contents_sec">
                         <nav class="contant_tab">
                             <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                 <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-cont"
                                     role="tab" aria-controls="nav-home" aria-selected="true">Contents</a>
                                
                             </div>
                         </nav>
                         <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                             <div class="tab-pane fade show active" id="nav-cont" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                 <div class="bottom_sec">
                                     <div class="section-module section-content">
                                         <ul class=" course-toc">
                                            
                                            @foreach($chapters as $key => $chapter)
                                            <li>
                                                 <div class="chapter_rw">
                                                     <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                     <h4>{{ $key + 1}}. {{ $chapter->title }}</h4>
                                                 </div>
                                                 <ul class="toc-items data-toc" style="display:none;">
                                                 @foreach($chapter->lectures as $lecture)
                                                     <li class="lecture-item">
                                                        <div class="lecture-title row">
                                                        <div class="col-10 col-sm-10 title">
                                                         <i class="fa fa-lock" aria-hidden="true"></i>
                                                         <a href="javascript:void(0)" class="item-name">{{$lecture->title}}</a>
                                                         <span class="video-duration">1m 20s</span>
                                                         </div><div class="col-2 col-sm-2 eye">
                                                         
                                                         </div>
                                                         </div>
                                                     </li>
                                                @endforeach
                                                 </ul>

                                             </li>
                                            @endforeach
                                             <!-- <li>
                                                 <div class="chapter_rw">
                                                     <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                     <h4>1. Designing with Smart Objects</h4>
                                                 </div>
                                                 <ul class="toc-items" style="display:none;">
                                                     <li>
                                                         <i class="fa fa-lock" aria-hidden="true"></i>

                                                         <a href="" class="item-name">Welcome to the Photoshop training
                                                             series</a>
                                                         <span class="video-duration">1m 20s</span>
                                                     </li>
       
                                                 </ul>

                                             </li>

                                             <li>
                                                 <div class="chapter_rw">
                                                     <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                     <h4>2. Creative Transformations for Designers</h4>
                                                 </div>
                                                 <ul class="toc-items" style="display:none;">
                                                     <li>
                                                         <a href="" class="item-name">Welcome to the Photoshop training
                                                             series</a>
                                                         <span class="video-duration">1m 20s</span>
                                                     </li>
                                                     <li>
                                                         <a href="" class="item-name">Welcome to the Photoshop training
                                                             series</a>
                                                         <span class="video-duration">1m 20s</span>
                                                     </li>

                                                    </ul>

                                             </li> -->
                                          

                                         </ul>
                                     </div>
                                 </div>
                             </div>





                             <!-- <div class="tab-pane fade" id="nav-pro" role="tabpanel" aria-labelledby="nav-profile-tab">
                                 <div id="notes-content" class="section-module">
                                     <div class="container-fluid notes-cta">
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <h3>Take notes with your new membership!</h3>
                                                 <p><span class="notes-icon notebook-field"></span>Type in the entry box,
                                                     then click Enter to save your note.</p>
                                                 <p><span class="notes-icon notebook-preview"><span>1:30</span></span>Press
                                                     on any video thumbnail to jump immediately to the timecode shown.</p>
                                                 <p><span
                                                         class="notes-icon notebook-download"><span>&nbsp;</span>&nbsp;</span>Notes
                                                     are saved with you account but can also be exported as plain text, MS
                                                     Word, PDF, Google Doc, or Evernote.</p>
                                                 <p><a href="" class="am-link btn tracking btn-action ga enroll-now"
                                                         data-gyft="3301" data-id="{{ $course->id }}"
                                                         data-price="{{ $course->price }}">Enroll Now</a></p>
                                                 <span class="clearfix"></span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div> -->

                         </div>

                     </div>

                     </div>






                 </div>



             </div>

         </div>

         @if (isset($enrolledCourse))
						  @if($enrolledCourse->count()==0)
             <div class="start_month">
                 <div class="bottom_wrap">
                     <h4>Start My Free Month</h4>
                     <p>Start your free month on Learn It Now, which now features 100% of Lynda.com courses. Develop
                         in-demand skills with access to thousands of expert-led courses on business, tech and creative
                         topics.</p>
                     <p>
                         <a class="enroll-now" href="#" data-gyft="3301" data-id="{{ $course->id }}"
                             data-price="{{ $course->price }}">Enroll Now</a>
                     </p>
                 </div>

             </div>
         @endif
		 @else
			 <div class="start_month">
                 <div class="bottom_wrap">
                     <h4>Start My Free Month</h4>
                     <p>Start your free month on Learn It Now, which now features 100% of Lynda.com courses. Develop
                         in-demand skills with access to thousands of expert-led courses on business, tech and creative
                         topics.</p>
                     <p>
                         <a class="enroll-now" href="#" data-gyft="3301" data-id="{{ $course->id }}"
                             data-price="{{ $course->price }}">Enroll Now</a>
                     </p>
                 </div>

             </div>
		 @endif

     </div>



     <div class="modal fade" id="createaccount" role="dialog">
         <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
               
                

                     <div class="modal-body">
                                       <div class="form-group">
                             <div class="row">
                                 <div class="col-md-12">
						 <a href="{{url('/register')}}" class="btn btn-success btn-block">Create an account</a>
						    </div>
                             </div>
                         </div>
						                          <div class="form-group">
                             <div class="row">
                                 <div class="col-md-12">
                                    
                                 <a href="{{url('/login')}}" class="btn btn-warning btn-block">Already have account</a>

                                 </div>
                             </div>
                         </div>
                        <!-- <div class="form-group">
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>First Name</label>
                                     <input type="text" class="form-control" name="name" placeholder="First Name"
                                         required="">
                                     @csrf
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>Last Name</label>
                                     <input type="text" class="form-control" name="lname" placeholder="Last Name"
                                         required="">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>Date of Birth</label>
                                     <input type="date" class="form-control" name="dob" required="">
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>Email Address</label>
                                     <input type="email" class="form-control" name="email" placeholder="Email Address"
                                         required="">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>Phone Number</label>
                                     <input type="text" class="form-control phone-input required" placeholder="Phone Number"
                                         required>
                                     <input class="hidden-phone" type="hidden" name="phone">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>Password</label>
                                     <input type="password" class="form-control" name="password" placeholder="Password"
                                         required="">
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col-md-12">
                                     <label>password-confirm</label>
                                     <input type="password" class="form-control" name="password-confirm"
                                         placeholder="password-confirm" required="">
                                 </div>
                             </div>
                         </div>
                     </div>-->
                   
             </div>

         </div>
     </div>
</div>
<div class="modal fade" id="enrollnow2" tabindex="-1" role="dialog">
   <div class="modal-dialog fullscreen" role="document">
      <div class="modal-content">
         <div class="modal-body p-0">
            <div class="container-fluid">
              <div class="form-content">
               <div class="row">
                  <div class="col-md-7 order-last order-md-1" style="padding-bottom: 80px;">
                     <div class="row pl-4 mt-4 d-none d-md-block">
                        <h2 class="title">Learn It Now</h2>
                        <p><span>Course </span><i class="fa fa-angle-right" aria-hidden="true"></i> <span> Payment</span></p>
                     </div>
                     <div class="example example5" id="example-5">
                        <div class="globalContent">
                           <main>
                              <section class="container-lg">
                                 <div class="cell example example5 pb-10" id="example-5">
                                    <form action="{{ url('/course/enroll')}}" method="post" id="payment-form">
                                       @csrf
                                       <input type="hidden" name="courseid" value="{{ $course->id }}">
                                       <input type="hidden" name="price" value="{{ $course->price }}">
                                       <!-- <div id="example5-paymentRequest">
                                          Stripe paymentRequestButton Element inserted here
                                          </div> -->
                                       <fieldset>
                                          <h5 class="title">Contact Information</h5>
                                          <div class="row form-row">
                                             <div class="field form-group col-md-6">
                                                <!-- <label for="example5-email" data-tid="elements_examples.form.email_label">Email</label> -->
                                                <input id="example5-email" name="email" data-tid="elements_examples.form.email_placeholder" class="input form-control" type="text" placeholder="janedoe@gmail.com" required="" autocomplete="email">
                                             </div>
                                             <div class="field form-group col-md-6">
                                                <!-- <label for="example5-phone" data-tid="elements_examples.form.phone_label">Phone</label> -->
                                                <input id="example5-phone" name="phone" data-tid="elements_examples.form.phone_placeholder" class="input form-control" type="text" placeholder="(941) 555-0123" required="" autocomplete="tel">
                                             </div>
                                          </div>
                                          <h5 Class="title">Billing Information</h5>
                                          <!-- <legend class="card-only" data-tid="elements_examples.form.pay_with_card">Pay with card</legend> -->
                                          <!-- <legend class="payment-request-available" data-tid="elements_examples.form.enter_card_manually">Or enter card details</legend> -->
                                          <div class="row form-row">
                                             <div class="field form-group col-md-6">
                                                <!-- <label for="example5-name" data-tid="elements_examples.form.name_label">Name</label> -->
                                                <input id="example5-name" name='name' data-tid="elements_examples.form.name_placeholder" class="input form-control" type="text" placeholder="First Name" required="" autocomplete="given-name">
                                             </div>
                                             <div class="field form-group col-md-6">
                                                <!-- <label for="example5-name" data-tid="elements_examples.form.name_label">Name</label> -->
                                                <input id="example5-lname" name='lname' data-tid="elements_examples.form.name_placeholder" class="input form-control" type="text" placeholder="Last Name" required="" autocomplete="family-name">
                                             </div>
                                          </div>
                                          <div data-locale-reversible>
                                             <div class="field form-group">
                                                <!-- <label for="example5-address" data-tid="elements_examples.form.address_label">Address</label> -->
                                                <input id="example5-address" name="address_line1" data-tid="elements_examples.form.address_placeholder" class="form-control input" type="text" placeholder="Address" required="" autocomplete="address-line1">
                                             </div>
                                             <div class="field form-group">
                                                <!-- <label for="example5-city" data-tid="elements_examples.form.city_label">City</label> -->
                                                <input id="example5-city" name="address_city" data-tid="elements_examples.form.city_placeholder" class="form-control input" type="text" placeholder="City" required="" autocomplete="address-level2">
                                             </div>
                                             <div class="row form-row" data-locale-reversible>
                                                <div class="form-group col-md-6">
                                                   <label class="field__label" for="inputState">Country</label>
                                                   <select id="example5-country" name="address_country" class="form-control">
                                                      <option selected="selected" disabled>--Select Country--</option>
                                                      <option data-code="AF" value="Afghanistan">Afghanistan</option>
                                                      <option data-code="AX" value="Aland Islands">Åland Islands</option>
                                                      <option data-code="AL" value="Albania">Albania</option>
                                                      <option data-code="DZ" value="Algeria">Algeria</option>
                                                      <option data-code="AD" value="Andorra">Andorra</option>
                                                      <option data-code="AO" value="Angola">Angola</option>
                                                      <option data-code="AI" value="Anguilla">Anguilla</option>
                                                      <option data-code="AG" value="Antigua And Barbuda">Antigua &amp; Barbuda</option>
                                                      <option data-code="AR" value="Argentina">Argentina</option>
                                                      <option data-code="AM" value="Armenia">Armenia</option>
                                                      <option data-code="AW" value="Aruba">Aruba</option>
                                                      <option data-code="AU" value="Australia">Australia</option>
                                                      <option data-code="AT" value="Austria">Austria</option>
                                                      <option data-code="AZ" value="Azerbaijan">Azerbaijan</option>
                                                      <option data-code="BS" value="Bahamas">Bahamas</option>
                                                      <option data-code="BH" value="Bahrain">Bahrain</option>
                                                      <option data-code="BD" value="Bangladesh">Bangladesh</option>
                                                      <option data-code="BB" value="Barbados">Barbados</option>
                                                      <option data-code="BY" value="Belarus">Belarus</option>
                                                      <option data-code="BE" value="Belgium">Belgium</option>
                                                      <option data-code="BZ" value="Belize">Belize</option>
                                                      <option data-code="BJ" value="Benin">Benin</option>
                                                      <option data-code="BM" value="Bermuda">Bermuda</option>
                                                      <option data-code="BT" value="Bhutan">Bhutan</option>
                                                      <option data-code="BO" value="Bolivia">Bolivia</option>
                                                      <option data-code="BA" value="Bosnia And Herzegovina">Bosnia &amp; Herzegovina</option>
                                                      <option data-code="BW" value="Botswana">Botswana</option>
                                                      <option data-code="BV" value="Bouvet Island">Bouvet Island</option>
                                                      <option data-code="BR" value="Brazil">Brazil</option>
                                                      <option data-code="IO" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                      <option data-code="VG" value="Virgin Islands, British">British Virgin Islands</option>
                                                      <option data-code="BN" value="Brunei">Brunei</option>
                                                      <option data-code="BG" value="Bulgaria">Bulgaria</option>
                                                      <option data-code="BF" value="Burkina Faso">Burkina Faso</option>
                                                      <option data-code="BI" value="Burundi">Burundi</option>
                                                      <option data-code="KH" value="Cambodia">Cambodia</option>
                                                      <option data-code="CM" value="Republic of Cameroon">Cameroon</option>
                                                      <option data-code="CA" value="Canada">Canada</option>
                                                      <option data-code="CV" value="Cape Verde">Cape Verde</option>
                                                      <option data-code="BQ" value="Caribbean Netherlands">Caribbean Netherlands</option>
                                                      <option data-code="KY" value="Cayman Islands">Cayman Islands</option>
                                                      <option data-code="CF" value="Central African Republic">Central African Republic</option>
                                                      <option data-code="TD" value="Chad">Chad</option>
                                                      <option data-code="CL" value="Chile">Chile</option>
                                                      <option data-code="CN" value="China">China</option>
                                                      <option data-code="CX" value="Christmas Island">Christmas Island</option>
                                                      <option data-code="CC" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                      <option data-code="CO" value="Colombia">Colombia</option>
                                                      <option data-code="KM" value="Comoros">Comoros</option>
                                                      <option data-code="CG" value="Congo">Congo - Brazzaville</option>
                                                      <option data-code="CD" value="Congo, The Democratic Republic Of The">Congo - Kinshasa</option>
                                                      <option data-code="CK" value="Cook Islands">Cook Islands</option>
                                                      <option data-code="CR" value="Costa Rica">Costa Rica</option>
                                                      <option data-code="HR" value="Croatia">Croatia</option>
                                                      <option data-code="CW" value="Curaçao">Curaçao</option>
                                                      <option data-code="CY" value="Cyprus">Cyprus</option>
                                                      <option data-code="CZ" value="Czech Republic">Czechia</option>
                                                      <option data-code="CI" value="Côte d'Ivoire">Côte d’Ivoire</option>
                                                      <option data-code="DK" value="Denmark">Denmark</option>
                                                      <option data-code="DJ" value="Djibouti">Djibouti</option>
                                                      <option data-code="DM" value="Dominica">Dominica</option>
                                                      <option data-code="DO" value="Dominican Republic">Dominican Republic</option>
                                                      <option data-code="EC" value="Ecuador">Ecuador</option>
                                                      <option data-code="EG" value="Egypt">Egypt</option>
                                                      <option data-code="SV" value="El Salvador">El Salvador</option>
                                                      <option data-code="GQ" value="Equatorial Guinea">Equatorial Guinea</option>
                                                      <option data-code="ER" value="Eritrea">Eritrea</option>
                                                      <option data-code="EE" value="Estonia">Estonia</option>
                                                      <option data-code="SZ" value="Eswatini">Eswatini</option>
                                                      <option data-code="ET" value="Ethiopia">Ethiopia</option>
                                                      <option data-code="FK" value="Falkland Islands (Malvinas)">Falkland Islands</option>
                                                      <option data-code="FO" value="Faroe Islands">Faroe Islands</option>
                                                      <option data-code="FJ" value="Fiji">Fiji</option>
                                                      <option data-code="FI" value="Finland">Finland</option>
                                                      <option data-code="FR" value="France">France</option>
                                                      <option data-code="GF" value="French Guiana">French Guiana</option>
                                                      <option data-code="PF" value="French Polynesia">French Polynesia</option>
                                                      <option data-code="TF" value="French Southern Territories">French Southern Territories</option>
                                                      <option data-code="GA" value="Gabon">Gabon</option>
                                                      <option data-code="GM" value="Gambia">Gambia</option>
                                                      <option data-code="GE" value="Georgia">Georgia</option>
                                                      <option data-code="DE" value="Germany">Germany</option>
                                                      <option data-code="GH" value="Ghana">Ghana</option>
                                                      <option data-code="GI" value="Gibraltar">Gibraltar</option>
                                                      <option data-code="GR" value="Greece">Greece</option>
                                                      <option data-code="GL" value="Greenland">Greenland</option>
                                                      <option data-code="GD" value="Grenada">Grenada</option>
                                                      <option data-code="GP" value="Guadeloupe">Guadeloupe</option>
                                                      <option data-code="GT" value="Guatemala">Guatemala</option>
                                                      <option data-code="GG" value="Guernsey">Guernsey</option>
                                                      <option data-code="GN" value="Guinea">Guinea</option>
                                                      <option data-code="GW" value="Guinea Bissau">Guinea-Bissau</option>
                                                      <option data-code="GY" value="Guyana">Guyana</option>
                                                      <option data-code="HT" value="Haiti">Haiti</option>
                                                      <option data-code="HM" value="Heard Island And Mcdonald Islands">Heard &amp; McDonald Islands</option>
                                                      <option data-code="HN" value="Honduras">Honduras</option>
                                                      <option data-code="HK" value="Hong Kong">Hong Kong SAR China</option>
                                                      <option data-code="HU" value="Hungary">Hungary</option>
                                                      <option data-code="IS" value="Iceland">Iceland</option>
                                                      <option data-code="IN" value="India">India</option>
                                                      <option data-code="ID" value="Indonesia">Indonesia</option>
                                                      <option data-code="IQ" value="Iraq">Iraq</option>
                                                      <option data-code="IE" value="Ireland">Ireland</option>
                                                      <option data-code="IM" value="Isle Of Man">Isle of Man</option>
                                                      <option data-code="IL" value="Israel">Israel</option>
                                                      <option data-code="IT" value="Italy">Italy</option>
                                                      <option data-code="JM" value="Jamaica">Jamaica</option>
                                                      <option data-code="JP" value="Japan">Japan</option>
                                                      <option data-code="JE" value="Jersey">Jersey</option>
                                                      <option data-code="JO" value="Jordan">Jordan</option>
                                                      <option data-code="KZ" value="Kazakhstan">Kazakhstan</option>
                                                      <option data-code="KE" value="Kenya">Kenya</option>
                                                      <option data-code="KI" value="Kiribati">Kiribati</option>
                                                      <option data-code="XK" value="Kosovo">Kosovo</option>
                                                      <option data-code="KW" value="Kuwait">Kuwait</option>
                                                      <option data-code="KG" value="Kyrgyzstan">Kyrgyzstan</option>
                                                      <option data-code="LA" value="Lao People's Democratic Republic">Laos</option>
                                                      <option data-code="LV" value="Latvia">Latvia</option>
                                                      <option data-code="LB" value="Lebanon">Lebanon</option>
                                                      <option data-code="LS" value="Lesotho">Lesotho</option>
                                                      <option data-code="LR" value="Liberia">Liberia</option>
                                                      <option data-code="LY" value="Libyan Arab Jamahiriya">Libya</option>
                                                      <option data-code="LI" value="Liechtenstein">Liechtenstein</option>
                                                      <option data-code="LT" value="Lithuania">Lithuania</option>
                                                      <option data-code="LU" value="Luxembourg">Luxembourg</option>
                                                      <option data-code="MO" value="Macao">Macao SAR China</option>
                                                      <option data-code="MG" value="Madagascar">Madagascar</option>
                                                      <option data-code="MW" value="Malawi">Malawi</option>
                                                      <option data-code="MY" value="Malaysia">Malaysia</option>
                                                      <option data-code="MV" value="Maldives">Maldives</option>
                                                      <option data-code="ML" value="Mali">Mali</option>
                                                      <option data-code="MT" value="Malta">Malta</option>
                                                      <option data-code="MQ" value="Martinique">Martinique</option>
                                                      <option data-code="MR" value="Mauritania">Mauritania</option>
                                                      <option data-code="MU" value="Mauritius">Mauritius</option>
                                                      <option data-code="YT" value="Mayotte">Mayotte</option>
                                                      <option data-code="MX" value="Mexico">Mexico</option>
                                                      <option data-code="MD" value="Moldova, Republic of">Moldova</option>
                                                      <option data-code="MC" value="Monaco">Monaco</option>
                                                      <option data-code="MN" value="Mongolia">Mongolia</option>
                                                      <option data-code="ME" value="Montenegro">Montenegro</option>
                                                      <option data-code="MS" value="Montserrat">Montserrat</option>
                                                      <option data-code="MA" value="Morocco">Morocco</option>
                                                      <option data-code="MZ" value="Mozambique">Mozambique</option>
                                                      <option data-code="MM" value="Myanmar">Myanmar (Burma)</option>
                                                      <option data-code="NA" value="Namibia">Namibia</option>
                                                      <option data-code="NR" value="Nauru">Nauru</option>
                                                      <option data-code="NP" value="Nepal">Nepal</option>
                                                      <option data-code="NL" value="Netherlands">Netherlands</option>
                                                      <option data-code="NC" value="New Caledonia">New Caledonia</option>
                                                      <option data-code="NZ" value="New Zealand">New Zealand</option>
                                                      <option data-code="NI" value="Nicaragua">Nicaragua</option>
                                                      <option data-code="NE" value="Niger">Niger</option>
                                                      <option data-code="NG" value="Nigeria">Nigeria</option>
                                                      <option data-code="NU" value="Niue">Niue</option>
                                                      <option data-code="NF" value="Norfolk Island">Norfolk Island</option>
                                                      <option data-code="MK" value="North Macedonia">North Macedonia</option>
                                                      <option data-code="NO" value="Norway">Norway</option>
                                                      <option data-code="OM" value="Oman">Oman</option>
                                                      <option data-code="PK" value="Pakistan">Pakistan</option>
                                                      <option data-code="PS" value="Palestinian Territory, Occupied">Palestinian Territories</option>
                                                      <option data-code="PA" value="Panama">Panama</option>
                                                      <option data-code="PG" value="Papua New Guinea">Papua New Guinea</option>
                                                      <option data-code="PY" value="Paraguay">Paraguay</option>
                                                      <option data-code="PE" value="Peru">Peru</option>
                                                      <option data-code="PH" value="Philippines">Philippines</option>
                                                      <option data-code="PN" value="Pitcairn">Pitcairn Islands</option>
                                                      <option data-code="PL" value="Poland">Poland</option>
                                                      <option data-code="PT" value="Portugal">Portugal</option>
                                                      <option data-code="QA" value="Qatar">Qatar</option>
                                                      <option data-code="RE" value="Reunion">Réunion</option>
                                                      <option data-code="RO" value="Romania">Romania</option>
                                                      <option data-code="RU" value="Russia">Russia</option>
                                                      <option data-code="RW" value="Rwanda">Rwanda</option>
                                                      <option data-code="WS" value="Samoa">Samoa</option>
                                                      <option data-code="SM" value="San Marino">San Marino</option>
                                                      <option data-code="ST" value="Sao Tome And Principe">São Tomé &amp; Príncipe</option>
                                                      <option data-code="SA" value="Saudi Arabia">Saudi Arabia</option>
                                                      <option data-code="SN" value="Senegal">Senegal</option>
                                                      <option data-code="RS" value="Serbia">Serbia</option>
                                                      <option data-code="SC" value="Seychelles">Seychelles</option>
                                                      <option data-code="SL" value="Sierra Leone">Sierra Leone</option>
                                                      <option data-code="SG" value="Singapore">Singapore</option>
                                                      <option data-code="SX" value="Sint Maarten">Sint Maarten</option>
                                                      <option data-code="SK" value="Slovakia">Slovakia</option>
                                                      <option data-code="SI" value="Slovenia">Slovenia</option>
                                                      <option data-code="SB" value="Solomon Islands">Solomon Islands</option>
                                                      <option data-code="SO" value="Somalia">Somalia</option>
                                                      <option data-code="ZA" value="South Africa">South Africa</option>
                                                      <option data-code="GS" value="South Georgia And The South Sandwich Islands">South Georgia &amp; South Sandwich Islands</option>
                                                      <option data-code="KR" value="South Korea">South Korea</option>
                                                      <option data-code="SS" value="South Sudan">South Sudan</option>
                                                      <option data-code="ES" value="Spain">Spain</option>
                                                      <option data-code="LK" value="Sri Lanka">Sri Lanka</option>
                                                      <option data-code="BL" value="Saint Barthélemy">St. Barthélemy</option>
                                                      <option data-code="SH" value="Saint Helena">St. Helena</option>
                                                      <option data-code="KN" value="Saint Kitts And Nevis">St. Kitts &amp; Nevis</option>
                                                      <option data-code="LC" value="Saint Lucia">St. Lucia</option>
                                                      <option data-code="MF" value="Saint Martin">St. Martin</option>
                                                      <option data-code="PM" value="Saint Pierre And Miquelon">St. Pierre &amp; Miquelon</option>
                                                      <option data-code="VC" value="St. Vincent">St. Vincent &amp; Grenadines</option>
                                                      <option data-code="SD" value="Sudan">Sudan</option>
                                                      <option data-code="SR" value="Suriname">Suriname</option>
                                                      <option data-code="SJ" value="Svalbard And Jan Mayen">Svalbard &amp; Jan Mayen</option>
                                                      <option data-code="SE" value="Sweden">Sweden</option>
                                                      <option data-code="CH" value="Switzerland">Switzerland</option>
                                                      <option data-code="TW" value="Taiwan">Taiwan</option>
                                                      <option data-code="TJ" value="Tajikistan">Tajikistan</option>
                                                      <option data-code="TZ" value="Tanzania, United Republic Of">Tanzania</option>
                                                      <option data-code="TH" value="Thailand">Thailand</option>
                                                      <option data-code="TL" value="Timor Leste">Timor-Leste</option>
                                                      <option data-code="TG" value="Togo">Togo</option>
                                                      <option data-code="TK" value="Tokelau">Tokelau</option>
                                                      <option data-code="TO" value="Tonga">Tonga</option>
                                                      <option data-code="TT" value="Trinidad and Tobago">Trinidad &amp; Tobago</option>
                                                      <option data-code="TN" value="Tunisia">Tunisia</option>
                                                      <option data-code="TR" value="Turkey">Turkey</option>
                                                      <option data-code="TM" value="Turkmenistan">Turkmenistan</option>
                                                      <option data-code="TC" value="Turks and Caicos Islands">Turks &amp; Caicos Islands</option>
                                                      <option data-code="TV" value="Tuvalu">Tuvalu</option>
                                                      <option data-code="UM" value="United States Minor Outlying Islands">U.S. Outlying Islands</option>
                                                      <option data-code="UG" value="Uganda">Uganda</option>
                                                      <option data-code="UA" value="Ukraine">Ukraine</option>
                                                      <option data-code="AE" value="United Arab Emirates">United Arab Emirates</option>
                                                      <option data-code="GB" value="United Kingdom">United Kingdom</option>
                                                      <option data-code="US" value="United States">United States</option>
                                                      <option data-code="UY" value="Uruguay">Uruguay</option>
                                                      <option data-code="UZ" value="Uzbekistan">Uzbekistan</option>
                                                      <option data-code="VU" value="Vanuatu">Vanuatu</option>
                                                      <option data-code="VA" value="Holy See (Vatican City State)">Vatican City</option>
                                                      <option data-code="VE" value="Venezuela">Venezuela</option>
                                                      <option data-code="VN" value="Vietnam">Vietnam</option>
                                                      <option data-code="WF" value="Wallis And Futuna">Wallis &amp; Futuna</option>
                                                      <option data-code="EH" value="Western Sahara">Western Sahara</option>
                                                      <option data-code="YE" value="Yemen">Yemen</option>
                                                      <option data-code="ZM" value="Zambia">Zambia</option>
                                                      <option data-code="ZW" value="Zimbabwe">Zimbabwe</option>
                                                   </select>
                                                </div>
                                                <div class="field form-group col-md-6">
                                                   <!-- <label for="example5-state" data-tid="elements_examples.form.state_label">State</label> -->
                                                   <input id="example5-state" name="address_state" data-tid="elements_examples.form.state_placeholder" class="form-control input empty" type="text" placeholder="City" required="" autocomplete="address-level1">
                                                </div>
                                                <!-- <div class="field form-group col-md-4"> -->
                                                <!-- <label for="example5-zip" data-tid="elements_examples.form.postal_code_label">ZIP</label> -->
                                                <!-- <input id="example5-zip" name="address_zip" data-tid="elements_examples.form.postal_code_placeholder" class="form-control input empty" type="text" placeholder="94107" required="" autocomplete="postal-code">
                                                   </div> -->
                                             </div>
                                          </div>
                                          <div class="row form-row">
                                             <div class="field from-group col-md-12">
                                                <!-- <label for="example5-card" data-tid="elements_examples.form.card_label">Card</label> -->
                                                <div id="example5-card" class="form-control input"></div>
                                                <div id="card-element">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row align-items-center mt-3 mb-3">
                                             <div class="col-sm-6">
                                                <a href="" class="pull-left" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left" aria-hidden="true"></i> Return Back</a>
                                             </div>
                                             <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary" data-tid="elements_examples.form.pay_button">Pay ({{ '$'.$course->price }})</button>
                                             </div>
                                          </div>
                                       </fieldset>
                                       <div class="error" role="alert">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                                             <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
                                             <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
                                          </svg>
                                          <span class="message"></span>
                                       </div>
                                       <div id="card-errors"></div>
                                    </form>
                                    <!-- <div class="success">
                                       <div class="icon">
                                         <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                           <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
                                           <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
                                         </svg>
                                       </div>
                                       <h3 class="title" data-tid="elements_examples.success.title">Payment successful</h3>
                                       <p class="message"><span data-tid="elements_examples.success.message">Token: </span><span class="token"></span></p>
                                       <a class="reset" href="#">
                                         <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                           <path fill="#000000" d="M15,7.05492878 C10.5000495,7.55237307 7,11.3674463 7,16 C7,20.9705627 11.0294373,25 16,25 C20.9705627,25 25,20.9705627 25,16 C25,15.3627484 24.4834055,14.8461538 23.8461538,14.8461538 C23.2089022,14.8461538 22.6923077,15.3627484 22.6923077,16 C22.6923077,19.6960595 19.6960595,22.6923077 16,22.6923077 C12.3039405,22.6923077 9.30769231,19.6960595 9.30769231,16 C9.30769231,12.3039405 12.3039405,9.30769231 16,9.30769231 L16,12.0841673 C16,12.1800431 16.0275652,12.2738974 16.0794108,12.354546 C16.2287368,12.5868311 16.5380938,12.6540826 16.7703788,12.5047565 L22.3457501,8.92058924 L22.3457501,8.92058924 C22.4060014,8.88185624 22.4572275,8.83063012 22.4959605,8.7703788 C22.6452866,8.53809377 22.5780351,8.22873685 22.3457501,8.07941076 L22.3457501,8.07941076 L16.7703788,4.49524351 C16.6897301,4.44339794 16.5958758,4.41583275 16.5,4.41583275 C16.2238576,4.41583275 16,4.63969037 16,4.91583275 L16,7 L15,7 L15,7.05492878 Z M16,32 C7.163444,32 0,24.836556 0,16 C0,7.163444 7.163444,0 16,0 C24.836556,0 32,7.163444 32,16 C32,24.836556 24.836556,32 16,32 Z"></path>
                                         </svg>
                                       </a>
                                       </div> -->
                                 </div>
                              </section>
                           </main>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5 order-first order-md-2" style="border-left: 1px solid #e1e1e1; background: #FAFAFA">
                     <div class="row">
                        <div class="col-md-12">
                           <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                           <div class="row pl-4 mt-4 mb-3 d-block d-md-none">
                              <h2 class="title">Learn It Now</h2>
                              <p><span>Course </span><i class="fa fa-angle-right" aria-hidden="true"></i> <span> Payment</span></p>
                           </div>
                        </div>
                     </div>
                     <div class="row  align-items-center">
                        <div class="col-sm-3"><img class="img-thumbnail" width="100px" height="100px" src="{{ url('/uploads/course/images/'.$course->image)}}"></div>
                        <div class="col-sm-6">
                           <h6>
                           <span class="title">{{ $course->name }}</span>
                           <h6>
                        </div>
                        <div class="col-sm-3"><span class="price pull-right">{{$course->price}}</span></div>
                     </div>
                     <hr/>
                     <div class="row">
                        <div class="col-sm-4">Subtotal</div>
                        <div class="col-sm-8"><span class="price pull-right">{{$course->price}}</span></div>
                     </div>
                     <hr/>
                     <div class="row">
                        <div class="col-sm-4">
                           <h6>Total</h6>
                        </div>
                        <div class="col-sm-8 pull-right">
                           <h6 class="price pull-right h6">{{$course->price}}</h6>
                        </div>
                     </div>
                  </div>
               </div>
              </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="enrollnow" role="dialog">
         <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
                     <div class="globalContent">
    <main>
    <section class="container-lg">
<div class="cell example example5" id="example-5">
<form action="{{ url('/course/enroll')}}" method="post" id="payment-form">
   
        @csrf
        <input type="hidden" name="courseid" value="{{ $course->id }}">
        <input type="hidden" name="price" value="{{ $course->price }}">
          <!-- <div id="example5-paymentRequest">
            Stripe paymentRequestButton Element inserted here
          </div> -->
          <h4 class="modal-title">BILLING INFORMATION</h4>
          <fieldset>
            
            <!-- <legend class="card-only" data-tid="elements_examples.form.pay_with_card">Pay with card</legend> -->
            <!-- <legend class="payment-request-available" data-tid="elements_examples.form.enter_card_manually">Or enter card details</legend> -->
            <div class="row">
              <div class="field">
                <label for="example5-name" data-tid="elements_examples.form.name_label">Name</label>
                <input id="example5-name" name='name' data-tid="elements_examples.form.name_placeholder" class="input" type="text" placeholder="Jane Doe" required="" autocomplete="name">
              </div>
            </div>
            <div class="row">
              <div class="field">
                <label for="example5-email" data-tid="elements_examples.form.email_label">Email</label>
                <input id="example5-email" name="email" data-tid="elements_examples.form.email_placeholder" class="input" type="text" placeholder="janedoe@gmail.com" required="" autocomplete="email">
              </div>
              <div class="field">
                <label for="example5-phone" data-tid="elements_examples.form.phone_label">Phone</label>
                <input id="example5-phone" name="phone" data-tid="elements_examples.form.phone_placeholder" class="input" type="text" placeholder="(941) 555-0123" required="" autocomplete="tel">
              </div>
            </div>
            <div data-locale-reversible>
              <div class="row">
                <div class="field">
                  <label for="example5-address" data-tid="elements_examples.form.address_label">Address</label>
                  <input id="example5-address" name="address_line1" data-tid="elements_examples.form.address_placeholder" class="input" type="text" placeholder="185 Berry St" required="" autocomplete="address-line1">
                </div>
              </div>
              <div class="row" data-locale-reversible>
                <div class="field">
                  <label for="example5-city" data-tid="elements_examples.form.city_label">City</label>
                  <input id="example5-city" name="address_city" data-tid="elements_examples.form.city_placeholder" class="input" type="text" placeholder="San Francisco" required="" autocomplete="address-level2">
                </div>
                <div class="field">
                  <label for="example5-state" data-tid="elements_examples.form.state_label">State</label>
                  <input id="example5-state" name="address_state" data-tid="elements_examples.form.state_placeholder" class="input empty" type="text" placeholder="CA" required="" autocomplete="address-level1">
                </div>
                <div class="field">
                  <label for="example5-zip" data-tid="elements_examples.form.postal_code_label">ZIP</label>
                  <input id="example5-zip" name="address_zip" data-tid="elements_examples.form.postal_code_placeholder" class="input empty" type="text" placeholder="94107" required="" autocomplete="postal-code">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="field">
                <label for="example5-card" data-tid="elements_examples.form.card_label">Card</label>
                <div id="example5-card" class="input"></div>
                <div id="card-element">
                </div>
              </div>
            </div>
            <button type="submit" data-tid="elements_examples.form.pay_button">Pay ({{ '$'.$course->price }})</button>
          </fieldset>
          <div class="error" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
              <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
              <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
            </svg>
            <span class="message"></span></div>
            <div id="card-errors"></div>
          
        </form>
        <div class="success">
          <div class="icon">
            <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
              <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
            </svg>
          </div>
          <h3 class="title" data-tid="elements_examples.success.title">Payment successful</h3>
          <p class="message"><span data-tid="elements_examples.success.message">Token: </span><span class="token"></span></p>
          <a class="reset" href="#">
            <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <path fill="#000000" d="M15,7.05492878 C10.5000495,7.55237307 7,11.3674463 7,16 C7,20.9705627 11.0294373,25 16,25 C20.9705627,25 25,20.9705627 25,16 C25,15.3627484 24.4834055,14.8461538 23.8461538,14.8461538 C23.2089022,14.8461538 22.6923077,15.3627484 22.6923077,16 C22.6923077,19.6960595 19.6960595,22.6923077 16,22.6923077 C12.3039405,22.6923077 9.30769231,19.6960595 9.30769231,16 C9.30769231,12.3039405 12.3039405,9.30769231 16,9.30769231 L16,12.0841673 C16,12.1800431 16.0275652,12.2738974 16.0794108,12.354546 C16.2287368,12.5868311 16.5380938,12.6540826 16.7703788,12.5047565 L22.3457501,8.92058924 L22.3457501,8.92058924 C22.4060014,8.88185624 22.4572275,8.83063012 22.4959605,8.7703788 C22.6452866,8.53809377 22.5780351,8.22873685 22.3457501,8.07941076 L22.3457501,8.07941076 L16.7703788,4.49524351 C16.6897301,4.44339794 16.5958758,4.41583275 16.5,4.41583275 C16.2238576,4.41583275 16,4.63969037 16,4.91583275 L16,7 L15,7 L15,7.05492878 Z M16,32 C7.163444,32 0,24.836556 0,16 C0,7.163444 7.163444,0 16,0 C24.836556,0 32,7.163444 32,16 C32,24.836556 24.836556,32 16,32 Z"></path>
            </svg>
          </a>
        </div>

      </div>
      </section>
    </main>
  </div>
                    </div>
            
        </div>
</div>


 <!-- scripts -->
 <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/simcify.min.js')}}"></script>
<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script>
 <script>
   

     $('.lecture-item').on('click',function(){
      $('.lecture-item').removeClass('currentItem');
        $(this).addClass('currentItem');
        $(this).find('.eye').html('<i class="fa fa-eye" aria-hidden="true"></i>');
        $('.blur_offscreen').show();
        $('.video-container').hide();
        $('html, body').animate({
        scrollTop: $(".blur_offscreen").offset().top
    }, 1000);
     });
 </script>
<script>
// Stripe API Key
var stripekey="{{env('STRIPE_KEY')}}";
var stripe = Stripe(stripekey);

function registerElements(elements, exampleName) {
  var formClass = '.' + exampleName;
  var example = document.querySelector(formClass);

  var form = example.querySelector('form');
  var resetButton = example.querySelector('a.reset');
  var error = form.querySelector('.error');
  var errorMessage = error.querySelector('.message');

  function enableInputs() {
    Array.prototype.forEach.call(
      form.querySelectorAll(
        "input[type='hidden'], input[type='text'], input[type='email'], input[type='tel']"
      ),
      function(input) {
        input.removeAttribute('disabled');
      }
    );
  }

  function disableInputs() {
    Array.prototype.forEach.call(
      form.querySelectorAll(
        "input[type='text'], input[type='email'], input[type='tel']"
      ),
      function(input) {
        input.setAttribute('disabled', 'true');
      }
    );
  }

  function triggerBrowserValidation() {
    // The only way to trigger HTML5 form validation UI is to fake a user submit
    // event.
    var submit = document.createElement('input');
    submit.type = 'submit';
    submit.style.display = 'none';
    form.appendChild(submit);
    submit.click();
    submit.remove();
  }

  // Listen for errors from each Element, and show error messages in the UI.
  var savedErrors = {};
  elements.forEach(function(element, idx) {
    element.on('change', function(event) {
      if (event.error) {
        error.classList.add('visible');
        savedErrors[idx] = event.error.message;
        errorMessage.innerText = event.error.message;
      } else {
        savedErrors[idx] = null;

        // Loop over the saved errors and find the first one, if any.
        var nextError = Object.keys(savedErrors)
          .sort()
          .reduce(function(maybeFoundError, key) {
            return maybeFoundError || savedErrors[key];
          }, null);

        if (nextError) {
          // Now that they've fixed the current error, show another one.
          errorMessage.innerText = nextError;
        } else {
          // The user fixed the last error; no more errors.
          error.classList.remove('visible');
        }
      }
    });
  });

  // Listen on the form's 'submit' handler...
  form.addEventListener('submit', function(e) {
    e.preventDefault();

    // Trigger HTML5 validation UI on the form if any of the inputs fail
    // validation.
    var plainInputsValid = true;
    Array.prototype.forEach.call(form.querySelectorAll('input'), function(
      input
    ) {
      if (input.checkValidity && !input.checkValidity()) {
        plainInputsValid = false;
        return;
      }
    });
    if (!plainInputsValid) {
      triggerBrowserValidation();
      return;
    }

    // Show a loading screen...
    example.classList.add('submitting');

    // Disable all inputs.
    disableInputs();

    // Gather additional customer data we may have collected in our form.
    var fname = form.querySelector('#' + exampleName + '-name');
    var lname = form.querySelector('#' + exampleName + '-lname');
    var name = fname.value+' '+lname.value;
    var address1 = form.querySelector('#' + exampleName + '-address');
    var city = form.querySelector('#' + exampleName + '-city');
    var state = form.querySelector('#' + exampleName + '-state');
    var zip = form.querySelector('#' + exampleName + '-zip');
    var country = form.querySelector('#' + exampleName + '-country');
    var _token = $('input[name="_token"]').val();
   
    var additionalData = {
      name: name ? name : undefined,
      address_line1: address1 ? address1.value : undefined,
      address_city: city ? city.value : undefined,
      address_state: state ? state.value : undefined,
      address_zip: zip ? zip.value : undefined,
      address_country: country ? country.value : undefined,
    };

    // Use Stripe.js to create a token. We only need to pass in one Element
    // from the Element group in order to create a token. We can also pass
    // in the additional customer data we collected in our form.
    stripe.createToken(elements[0], additionalData).then(function(result) {
      // Stop loading!
      example.classList.remove('submitting');

      if (result.token) {
        // If we received a token, show the token ID.
        //example.classList.add('submitted');
       stripeTokenHandler(result.token.id, example);
    console.log('token-'+ _token); 
console.log(result.token.id);
      } else {
        // Otherwise, un-disable inputs.
        enableInputs();
      }
    });
    
  });

  resetButton.addEventListener('click', function(e) {
    e.preventDefault();
    // Resetting the form (instead of setting the value to `''` for each input)
    // helps us clear webkit autofill styles.
    form.reset();

    // Clear each Element.
    elements.forEach(function(element) {
      element.clear();
    });

    // Reset error state as well.
    error.classList.remove('visible');

    // Resetting the form does not un-disable inputs, so we need to do it separately:
    enableInputs();
    example.classList.remove('submitted');
  });
}

// Simple localization
const isStripeDev = window.location.hostname === 'stripe.dev';
const localeIndex = isStripeDev ? 2 : 1;
window.__exampleLocale = window.location.pathname.split('/')[localeIndex] || 'en';
const urlPrefix = isStripeDev ? '/elements-examples/' : '/';

document.querySelectorAll('.optionList a').forEach(function(langNode) {
  const langValue = langNode.getAttribute('data-lang');
  const langUrl = langValue === 'en' ? urlPrefix : (urlPrefix + langValue + '/');

  if (langUrl === window.location.pathname || langUrl === window.location.pathname + '/') {
    langNode.className += ' selected';
    langNode.parentNode.setAttribute('aria-selected', 'true');
  } else {
    langNode.setAttribute('href', langUrl);
    langNode.parentNode.setAttribute('aria-selected', 'false');
  }
});
(function() {
  "use strict";

  var elements = stripe.elements({
    // Stripe's examples are localized to specific languages, but if
    // you wish to have Elements automatically detect your user's locale,
    // use `locale: 'auto'` instead.
    locale: window.__exampleLocale
  });

  /**
   * Card Element
   */
  var card = elements.create("card", {
    iconStyle: "solid",
    style: {
      base: {
        iconColor: "#007bff",
        color: "#8898aa",
        fontWeight: 400,
        fontFamily: "Helvetica Neue, Helvetica, Arial, sans-serif",
        fontSize: "16px",
        fontSmoothing: "antialiased",

        "::placeholder": {
          color: "#8898aa"
        },
        ":-webkit-autofill": {
          color: "#8898aa"
        }
      },
      invalid: {
        iconColor: "#eb1c26",
        color: "#eb1c26"
      }
    }
  });
  card.mount("#example5-card");

  /**
   * Payment Request Element
   */
  var paymentRequest = stripe.paymentRequest({
    country: "US",
    currency: "usd",
    total: {
      amount: 2500,
      label: "Total"
    },
    requestShipping: true,
    shippingOptions: [
      {
        id: "free-shipping",
        label: "Free shipping",
        detail: "Arrives in 5 to 7 days",
        amount: 0
      }
    ]
  });
  paymentRequest.on("token", function(result) {

    console.log('token-');
colsole.log(result.token);

    var example = document.querySelector(".example5");
    example.querySelector(".token").innerText = result.token.id;
    // example.classList.add("submitted");
    // result.complete("success");
  });

  var paymentRequestElement = elements.create("paymentRequestButton", {
    paymentRequest: paymentRequest,
    style: {
      paymentRequestButton: {
        theme: "light"
      }
    }
  });

  paymentRequest.canMakePayment().then(function(result) {
    if (result) {
      document.querySelector(".example5 .card-only").style.display = "none";
      document.querySelector(
        ".example5 .payment-request-available"
      ).style.display =
        "block";
      paymentRequestElement.mount("#example5-paymentRequest");
    }
  });

  registerElements([card], "example5");
})();

// Send Stripe Token to Server
function stripeTokenHandler(token, example) {
  event.preventDefault()
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
// Add Stripe Token to hidden input
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'token');
    hiddenInput.setAttribute('value', token);
    form.appendChild(hiddenInput);
// Submit form
var loader = true;
showLoader();
$.ajax({
            type: 'post',
            url: $("form#payment-form").attr("action"),
            data: $('form#payment-form').serialize(),
            success: function (response) {
              console.log(response.courseid);
              hideLoader();
              swal({
                title: "Successful",
                text: "Course Enrolled.",
                type: "success"
                }, function() {
                  window.location="https://learnitnow.com.au/coursepreview/"+response.courseid;              
                });
            },
            error: function(e, i, n) {
            hideLoader();
            swal({
                title: "Oops..!",
                text: "Somthing went wrong!",
                type: "error"
                });
            }
          });

        //   $.post($("form").attr("action"), $('form').serialize(), function(data){
        //     // Display the returned data in browser
        //     console.log(data);
        // });

    // form.submit();
}
</script>

 <!--HEADER-SCROLL-FIXED-END-->
 @endsection
