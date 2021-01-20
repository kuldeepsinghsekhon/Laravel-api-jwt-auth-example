@extends('layouts.app')
@section('contents')
<script type="text/javascript" src="components/bootstrap/dist/js/bootstrap.js"></script>
<div class="crousel_center">
   <div class="container my-4">
      <hr class="my-4">
      @php
            $count = 1;
            @endphp
      @foreach($categories as $category)
      
      <!--Carousel Wrapper-->
      <div id="multi-item-example_{{$count}}" class="carousel slide carousel-multi-item" data-ride="carousel">
         <h1 class="top_heading">{{$category->name}} </h1>
         <!--Controls-->
         <div class="controls-top">
            <a class="btn-floating" href="#multi-item-example_{{$count}}" data-slide="prev"><i class="fa fa-chevron-left"></i>Previous</a>
            <a class="btn-floating nxt" href="#multi-item-example_{{$count}}" data-slide="next">Next<i class="fa fa-chevron-right"></i></a>
         </div>
         <!--/.Controls-->
         <!--Slides-->
         <div class="carousel-inner" role="listbox">
            <!--First slide-->
            @php
            $i = 1;
            @endphp
            @foreach($category->course->chunk(5) as $Course)
            
            <div class="carousel-item @if($i==1) active @endif">
               <div class="crousel_sec">
               @foreach($Course as $course)                  
                     <div class="card_items">
                        <a href="{{ url('course/'.$course->id) }}">                        
                        <div class=" card_item_mid mb-2">
                           <div class="thumbnail">
                              <div class="thumbnail_mid">
                                 <div class="crousel_top_img">
                                    <img class="card-img-top" src="{{asset('uploads/course/images/'.$course->image)}}"
                                       alt="Card image cap">
                                 </div>
                                 <div class="crousel_video_icon">
                                    <a href="{{ url('course/'.$course->id) }}"><i class="fa fa-play"></i></a>
                                 </div>
                                 <div class="time "><span> 1h 17m</span></div>
                                 <div class="popular "><span>POPULAR</span></div>
                              </div>
                           </div>
                           <div class="crd_content">
                              <span ><i class="fa fa-play" aria-hidden="true"></i>COURSE</span>
                           <a href="{{ url('course/'.$course->id) }}"> 
                              <h4 class="card-title">{{ ucwords($course->name)}}</h4> </a>
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
           
           
         </div>
         <!--/.Slides-->
      </div>
            @php
            $count++;
            @endphp
      @endforeach
      <!--/.Carousel Wrapper-->
     
   </div>
</div>
<script>
   $('.carousel').carousel({
    interval: false,
   });
</script>
@endsection