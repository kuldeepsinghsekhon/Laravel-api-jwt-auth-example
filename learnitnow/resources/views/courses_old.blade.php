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
<div class="container">
        
    <div class="courses_search">
            <form action="{{ route('courses.search') }}" method="get">
              <div class="row">
              
                 <div class="col-md-4">
                 <label> </label>
                   <select class="form-control" name="category">
                     @if(!empty($categories))
                     {{ Request::get('category') }}
                     @foreach($categories as $category)
                     <option value="{{ $category->id }}" <?php if($category->id == Request::get('category')){ echo 'selected'; } ?> >{{ $category->name }}</option>
                     @endforeach
                     @else
                     <option value="0">Un-Categorized</option>
                     @endif
                   </select>
                 </div>
                 <div class="col-md-6">
                 <label> </label>
                   <input id="serchfilter" class="form-control" name='name' type="text" placeholder="Search">
                 </div>
                 <div class="col-md-2">
                 <label> </label>
                   <button type="submit" class="form-control">Search</button>
                 </div>
              </div>
            </form>
    </div>
           
      <div id="courses" class="row pagify-parent">
            
        @if(!empty($courses))
       @if(count($courses) > 0)
          @foreach($courses as $course)
              <div class="col-lg-3 col-md-4 col-xs-6 thumb filter retratos"> 
                 <a href="{{ url('course/'.$course->id) }}">
                  <div class="tab_img">
                        <img src="{{ asset('uploads/course/images/'.$course->image) }}">
                  </div></a>
                  <div class="tab_txt">
                    <!-- <span>SITXFSA002</span> -->
                    <a href="{{ url('course/'.$course->id) }}"><h1>{{$course->name}}</h1></a>
                    <ul class="list-group">
                    	 <li> By: {{ $course->getInstructor($course->instructor)->name }}</li>
				               <li>Released {{ date('d M, Y', strtotime($course->created_at))}}</li>
			              </ul>
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
            @endif

        </div>
 

</div>
        @if(!empty($courses))
        <div class="container">
          <div class="row text-center">
            <div class="link_btn">
              {{ $courses->links() }}
            </div>
          </div>
        </div>
        @endif

@endsection
