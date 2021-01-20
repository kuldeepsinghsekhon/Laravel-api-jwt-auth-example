@extends('layouts.app')
@section('contents')
<style>
   .link_btn .justify-between.flex-1 {
   margin-bottom: 20px;
   }
   .link_btn span.relative.z-0.inline-flex.shadow-sm.rounded-md {
   display: none;
   }
</style>
<div class="list_view_sec">
   <div class="container">
		@if ( $usercourse->count() > 0)
		@foreach ($usercourse as $key => $courses)
		@php $_course = $courses->getCourse(); @endphp                            
		@if (!empty($_course))
		<div class="list_sec">
			<div class="list_left">
				<div class="list_top_img">
				<img class="" src="{{ asset('uploads/course/images/'.$_course->image) }}" alt="Card image cap">
				</div>
				<div class="list_video_icon">
				<a href="{{ url('coursepreview/'.$_course->id) }}"><i class="fa fa-play"></i></a>
				</div>
				<!-- <div class="time "><span> 1h 17m</span></div> -->
			</div>
			<div class="list_right">
				<span><i class="fa fa-play" aria-hidden="true"></i>COURSE</span>
				<h2><a href="{{ url('coursepreview/'.$_course->id) }}">{{ ucwords($_course->name) }}</a></h2>
				<ul>
				<li> By: <a href="" > {{ $_course->getInstructor($_course->instructor)->name }} </a></li>
				<li>Released {{$_course->created_at}}</li>
				</ul>
				<div class="progess_bar_sec">
				<div class="progess_bar_left">
					<div class="progess_bar">
						<!--<progress max="100" value="14.000000000000002" class="progress-element" aria-valuetext="Current value: 14" style="--offset-value:14%;">
							Current value: 14-->
						</progress>
					</div>
					<div class="progess_bar_duration">
						<span>
							<!--1h 7m 16s left-->
						</span>
					</div>
				</div>
				<div class="share_action">
					<!--<ul>
						<li><a href=""><i class="fa fa-share" aria-hidden="true"></i>Share</a></li>
						<li><div class="dropdown">
											<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Save</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style=""> <a class="dropdown-item" href="#">course 1</a>
												<a class="dropdown-item" href="#">courses are here</a>
												<a class="dropdown-item" href="#">course  are here</a>
											</div>
										</div></li>
						
						</ul>-->
				</div>
				</div>
			</div>
		</div>
		@endif
		@endforeach
		{{-- @else --}}
		{{-- 
		<div class="col-md-12">
			<div class="center-notify">
				<h3 class="text-info"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Courses not available.</h3>
			</div>
		</div>
		--}}
		{{-- @endif --}}
		@else
		<div class="col-md-12 mb-5">
			<div class="center-notify">
				<h3 class="text-info text-center"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Courses not available.</h3>
			</div>
		</div>
		@endif
	</div>
	</div>
	<div class="container">
		<div class="row text-center">
			<div class="link_btn">
				{{ $usercourse->links() }}
			</div>
		</div>
	</div>
</div>
@endsection