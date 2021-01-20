@extends('layouts.app')
@section('contents')

			<div class="banner_sec">
			<div class="zero_overlay"></div>
		<div class="banner_img">
		@if($category->image)
			<img src="/uploads/category/{{$category->image}}">
		@else
			<img src="/images/course_banner.jpg">
		@endif
			
		</div>
		<div class="course_banner_txt">
			<div class="container">
				
					@guest
							<p>{{$category->name}}</p> <a href="{{ url('/login')}}" class="btn">Enroll Now!
					@endguest
			
				
               </a>
			</div>
		</div>
	</div>
<div class="jumbotron course_jumbo" style="margin-bottom:0; background-color: #FBFCFF;">
	  <div class="container">
	  	<div class="row">
	  		<div class="col-sm-12">
	  		
	  			
	  		
	  			<div class="head_txt" >
				    <span>{{$category->name}}</span>
				   
					</div>

						<div class="row">
							  @foreach($courses as $course)
					            <div class="col-lg-3 col-md-4 col-xs-6 m_tb">
								<a href="{{ url('course/'.$course->id ) }}">
					             <div class="tab_img">
								 <img src="/uploads/course/images/{{$course->image}}">
					            </div>
								
								 <div class="tab_txt">
								 <!-- <span>SIT30616</span> -->
								 <h1>{{$course->name}}</h1>
								 <ul>
								 {{--<li>{{$course->duration}} {{$course->period}}</li>--}}
								 <!--<li><b>592,814</b> Views</li>-->
								 
								 </ul>
					            </div>
								</a>
					            </div>
								@endforeach
					   
						</div>
					
		 
		  </div>
		  
		  <div class="dropdown_menu">
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Show More</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
							@foreach($categories as $categor)
							<a class="dropdown-item" href="{{url('/category').'/'.$categor->id}}">{{$categor->name}}</a>
							@endforeach
							
						</div>
					</div>
				</div>
		</div>
	</div>
	</div>
	
	
	
	<div class="btm_courses">
	<div class="container">
	<div class="row">
	<div class="col-lg-2 col-md-3">
	<div class="btm_left_courses">
	<h1>Topics</h1>

	@foreach($categories as $categor)
	<a href="{{$categor->id}}">{{$categor->name}} ({{$categor->courses_count}})</a>
	@endforeach
	</div>
	</div>
	
	<div class="col-lg-10 col-md-9">
	<div class="btm_right_courses">
	<div class="result_layout">
	<div class="result_count ">
          <strong>Total {{ App\Models\Course::where('coursecategory_id',$category->id)->count() }} </strong>Courses
   </div>

       <div class="to_count ">
          <!--<strong>20,500 </strong>Video Tutorials-->
     </div>
	<!--  <div class="drop_count ">
	  <div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Sort By:</strong> Newest First</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> <a class="dropdown-item" href="#">course 1</a>
							<a class="dropdown-item" href="#">courses are here</a>
							<a class="dropdown-item" href="#">course  are here</a>
						</div>
					</div>
	</div>-->
	
	
	</div>
	
		<div class="card_detail">
		<ul class="product-list">
		 {{ csrf_field() }}
		  @foreach($courses as $course2)
		<li class="product-box r">
			<div class="card_detail_left">
				<div class="card_detail_img">
					<img src="/uploads/course/images/{{$course2->image}}">
				</div>
				<div class="card_hover_txt">
					<a href="{{ url('course/'.$course->id ) }}"><span>Preview Course</span></a>
				</div>
			</div>
			<div class="card_detail_txt">
				<h1><a href="{{ url('course/'.$course->id ) }}">{{$course2->name}}</a></h1>
				<div> {!! strip_tags($course2->excerpt) !!}</div>
			</div>
		</li>
		
		@endforeach
	
		
</ul>
		
		
		</div>
		
		<div class="show_more_detail">
		<a href="" class="load-more btn" data-totalResult="{{ App\Models\Course::where('coursecategory_id',$category->id)->count() }}">Show More</a>
		</div>
	
	
	
	
	
	
	</div>
	</div>
	</div>
	</div>
	</div>
	


		
	
	
<script>
    var main_site="{{ url('/') }}";
	var category_id="{{$category->id}}";
$(document).ready(function(){
	console.log('category_id'+category_id);
	 var _token = $('input[name="_token"]').val();

        $(".load-more").on('click',function(e){
			e.preventDefault();
            var _totalCurrentResult=$(".product-box").length;
            // Ajax Reuqest
            $.ajax({
                url:main_site+'/load-more-courses',
                method:"POST",
                dataType:'json',
					   data:{ _token:_token,skip:_totalCurrentResult,category_id:category_id},
                beforeSend:function(){
                    $(".load-more").html('Loading...');
                },
                success:function(response){
                    var _html='';
                    var image="{{ asset('imgs') }}/";
                    $.each(response,function(index,value){
						console.log(value.name);
						 _html+='<li class="product-box" >';
		 
		 _html+='<div class="card_detail_left">';
		 
		 _html+='<div class="card_detail_img">';
		 _html+='<img src="/uploads/course/images/'+value.image+'" >';
		 _html+='</div>';
		 _html+='<div class="card_hover_txt">';
		 	@if(isset($course))
		 	 _html+='<a href='+"{{ url('course/'.$course->id ) }}"+'>';
		 @endif
		 _html+='<span>Preview Course</span>';
		 _html+='</a>';
		 _html+='</div>';
		 _html+='</div>';
		 _html+='<div class="card_detail_txt">';
		 @if(isset($course))
		 _html+='<a href='+"{{ url('course/'.$course->id ) }}"+'>';
	  @endif
		 _html+='<h1>'+value.name+'</h1>';
		  _html+='</a>';
		 _html+='<p>'+value.description+'</p>';
		 _html+='<ul>';
		 _html+='<li>1h 30m</li>';
		 _html+='<li>Intermediate</li>';
		 _html+='<li>Sep 15, 2020</li>';
		 _html+='</ul>';
		 _html+='</div>';
		
		 _html+='</li>';
                       
                    });
                    $(".product-list").append(_html);
                    // Change Load More When No Further result
                    var _totalCurrentResult=$(".product-box").length;
					console.log('_totalCurrentResult '+_totalCurrentResult);
                    var _totalResult=parseInt($(".load-more").attr('data-totalResult'));
					console.log('_totalResult'+_totalResult);
                    console.log(_totalCurrentResult);
                    console.log(_totalResult);
                    if(_totalCurrentResult==_totalResult){
                        $(".load-more").remove();
                    }else{
                        $(".load-more").html('Load More');
                    }
                }
            });
        });
    });
</script>
@endsection