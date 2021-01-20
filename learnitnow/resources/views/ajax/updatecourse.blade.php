
                <div class="modal-body">
                        @csrf
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Course Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $course->name }}" placeholder="Course Name" required="">
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <div class="row">
                          <div class="col-md-12" style="display: inline-flex;">
                            <input type="checkbox" name="pennfoster" @if( $course->pennfoster == "1"  ) checked  @endif value="1" class=""/> 
                            &nbsp;&nbsp;&nbsp;&nbsp;Penn Foster
                          </div>
                        </div>
                      </div>
                      
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-6" style="display: inline-flex;">
                            <input type="checkbox" value="1" id="checkbox" name="boardcertified" @if( $course->boardcertified == "1"  ) checked  @endif  class=""/> 
                            &nbsp;&nbsp;&nbsp;&nbsp;Board Certified
                          </div>
                        
                        </div>
                      </div>
               
                     
                    <!-- <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label>CE Credits</label>
                            <input type="number" value="{{ $course->cecredit }}" name="cecredit" class="form-control" placeholder="CE Credits" >
                          </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Degree Name</label>
                            <input type="text" value="{{ $course->degree }}" name="degree" class="form-control" placeholder="Degree Name" >
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                            <label>Specialization</label>
                            <input type="text" value="{{ $course->specialization }}" name="specialization" class="form-control" placeholder="Specialization" >
                          </div>
                          <div class="col-md-6">
                            <label>Certification</label>
                            <input type="text" value="{{ $course->certification }}" name="certification" class="form-control" placeholder="Certification" >
                          </div>
                        </div>
                    </div>
                      
                      
                      
                         <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <label>Price ($)</label>
                            <input type="number" name="price" class="form-control" value="{{ $course->price }}" step="0.01" data-parsley-pattern="^[0-9]*\.[0-9]{2}$" placeholder="Price" min="0" required="">
                          </div>
						   <div class="col-md-6">
                                 <label>Sale Price ($)</label>
                                    <input type="number" class="form-control" step="0.01" data-parsley-pattern="^[0-9]*\.[0-9]{2}$" name="sale_price" placeholder="Sale Price ($)" value="{{ $course->sale_price }}" >
                                </div>
                        
                        </div>
                      </div>
					   <div class="form-group">
                        <div class="row">
						  <div class="col-md-6">
                            <label for="email">Status</label>
                            <select class="form-control" name="status">
                                <option value="Published" @if( !empty( $course->status == "Published" ) ) selected @endif >Published</option>
                                <option value="Unpublished" @if( !empty( $course->status == "Unpublished" ) ) selected @endif >Unpublished</option>
                            </select>
                          </div>
                          
                          
                           <!-- <div class="col-md-6">
                              <label>Syndicate</label>
                              <select class="form-control" name="syndicate">
                                  
                                <option value="Enabled" @if( !empty( $course->syndicate == "Enabled" ) ) selected @endif >Enabled</option>
                                
                                <option value="Disabled" @if( !empty( $course->syndicate == "Disabled" ) ) selected @endif >Disabled</option>
                                
                              </select>
                            </div> -->
                            
                            
                            
						</div>
						</div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-4">
                              <label>Duration</label>
                              <input type="number" name="duration" class="form-control just-number" value="{{ $course->duration }}" min="0" placeholder="Duration" required="">
                          </div>
                          <div class="col-md-4">
                              <label>Period</label>
                              <select name="period" class="form-control" required="">
                                  <option value="Days" @if( !empty( $course->period == "Days" ) ) selected @endif>Days</option>
                                  <option value="Weeks" @if( !empty( $course->period == "Weeks" ) ) selected @endif>Weeks</option>
                                  <option value="Months" @if( !empty( $course->period == "Months" ) ) selected @endif >Months</option>
                              </select>
                          </div>
                        <div class="col-md-4">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                @if(!empty($categories))
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($course->coursecategory_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                                @else
                                <option value="0">Un-Categorized</option>
                                @endif
                            </select>
                        </div>
                        </div>
                      </div>
					    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Instructor</label>
                          <select id="" class="form-control" name="instructor" required="">
                           
                            @foreach($instructors as $_instructor)
                            <option value="{{ $_instructor->id }}" @if($course->instructor == $_instructor->id) selected @endif>{{ $_instructor->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
						<div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label> Type Image/Video</label>
                                        <select id="" class="form-control" name="viewtype" required="">
                                             
                                            <option value="image" @if($course->viewtype == 'image') selected @endif  >Image</option>
                                            <option value="video" @if($course->viewtype == 'video') selected @endif  >Video</option>
                                        </select>
                                </div>
                            </div>
                        </div>
					
					
					
                      <!-- <div class="form-group"> -->
                        <!-- <div class="row"> -->
                          <!-- <div class="col-md-12"> -->
                            <!-- <label>Choose your Instructor</label> -->
                            <!-- <select id="" class="form-control" name="instructor" required=""> -->
                              <!-- <option value="image">Select</option> -->
                              <!-- @foreach($instructors as $_instructor) -->
                            
                              <!-- <option value="{{ $_instructor->name }}" @if($course->instructor == $_instructor->name) selected @endif>{{ $_instructor->name }}</option> -->
                              <!-- @endforeach -->
                            <!-- </select> -->
                          <!-- </div> -->
                        <!-- </div> -->
                      <!-- </div> -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                              <label>Cover Image</label>
                              <input type="file" name="image" class="croppie" placeholder="Course Cover Image"  crop-width="400" crop-height="400" accept="image/*" default="{{ asset('uploads/course/images/'.$course->image) }}">
                              <input type="hidden" name="courseid" value="{{ $course->id }}">
                          </div>
                        </div>
                      </div>
					  
					  
					    <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Video Type</label>
                                        <select id="videotypesel" class="form-control" name="videotype" required="">
                                             
                                            <option value="video"  @if($course->videotype == 'video') selected @endif   >Video</option>
                                            <option value="youtubelink"  @if($course->videotype == 'youtubelink') selected @endif  >Embedded Link</option>
                                        </select>
                                </div>
                            </div>
                        </div>
						
						@if( !empty( $course->videotype == "youtubelink" ) )
							 <div class="form-group" id="youtubelinkshow" >
                            <div class="row">
                                <div class="col-md-12">
                                    <label> Embedded Link</label>
                                    <input type="url" pattern="https?://.+" name="youtubelink" class="form-control" value="{{$course->youtubelink}}" placeholder="Embedded Link" required>
                                </div>
                            </div>
                        </div>
   @else
   	 <div class="form-group" id="youtubelinkshow" style="display: none;" >
                            <div class="row">
                                <div class="col-md-12">
                                    <label> Embedded Link</label>
                                    <input type="url" pattern="https?://.+" name="youtubelink" class="form-control" value="{{$course->youtubelink}}" placeholder="Embedded  Link" >
                                </div>
                            </div>
                        </div>
   
						@endif
             @if( !empty($course->videotype == "video" ) )
                        <div class="form-group uploadvideo" id="videolinkshow" >
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Upload Video</label>
                                    <input type="file" class="dropify uploadvideovalue" placeholder="Upload video File" name="videofile" required>
                                      
                                </div>
                            </div>
                        </div>
						 @else
						 <div class="form-group uploadvideo" id="videolinkshow" style="display: none;" >
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Upload Video</label>
                                    <input type="file" class="dropify uploadvideovalue" placeholder="Upload video File" name="videofile" >
                                      
                                </div>
                            </div>
                        </div>
						@endif
            <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>About this Video</label>
                          <textarea class="form-control" name="aboutvideo" placeholder="About this Video" rows="5"
                            required>{{ $course->aboutvideo }}</textarea>
                        </div>
                      </div>
                    </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Course Description</label>
                                    <textarea class="form-control summernote-dynamic" name="description" placeholder="Course Description" rows="5" required>{{ $course->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Free Product</label>
                                    <select class="form-control" name="product">
                                        <option value=""  selected>Select Free Product</option>
                                        @if(!empty($products))
                                        @foreach( $products as $_products)
                                        <option value="{{$_products->id}}" @if($course->product == $_products->id) selected @endif>{{$_products->title}}</option>
                                        @endforeach
                                        @else
                                        It's empty here!!
                                        @endif
                                       
                                    </select>
                                </div>
                               
                            </div>
                        </div> -->
                        
                      <!-- <div class="form-group  ">
                        <div class="row">
                            <div class="col-md-6" style="display: inline-flex;">
                                <input type="checkbox" value="1" id="checkbox" name="authoritylabel" @if( $course->authoritylabel == "1"  ) checked  @endif  class=""/> 
                        &nbsp;&nbsp;&nbsp;&nbsp;Issuing Authority 
                      </div>
                    </div>
                    </div>
                        @if( $course->authoritylabel == "1"  )
                   
                    <div class="form-group logofield">
                        <div class="row">
                          <div class="col-md-12">
                              <label>Issuing Authority Logo</label>
                              <input type="file" name="addlogos" class="croppie" placeholder="Upload Logo"  crop-width="300" crop-height="280" accept="image/*" default="{{ asset('uploads/courses/'.$course->logos) }}">
                              <input type="hidden" name="courseid" value="{{ $course->id }}">
                          </div>
                        </div>
                    </div>
                    @else
                    <div class="form-group logofield" style="display:none;">
                        <div class="row">
                          <div class="col-md-12">
                              <label>Issuing Authority Logo</label>
                              <input type="file" name="addlogos" class="croppie" placeholder="Upload Logo"  crop-width="300" crop-height="280" accept="image/*" >
                              <input type="hidden" name="courseid" value="{{ $course->id }}">
                          </div>
                        </div>
                    </div>
                    @endif -->
                
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                <script type="text/javascript">
                  croppify();
                  var newElement = $("body").find(".uploadvideo");
                  newElement.find(".dropify").dropify();
                </script>
<script>
    $(function () {
        // $('input[name="prerequisites"]').hide();
        // $('.responseinput').hide();
        //show it when the checkbox is clicked
        $('input[name="boardcertified"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('input[name="prerequisites"]').fadeIn();
                $('.responseinput').fadeIn();
            } else {
                $('input[name="prerequisites"]').hide();
                $('.responseinput').hide();
            }
        });
    });
</script>
<script>
    $(function () {
        // $('input[name="prerequisites"]').hide();
        // $('.responseinput').hide();
        //show it when the checkbox is clicked
        $('input[name="authoritylabel"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('input[name="addlogos"]').fadeIn();
                $('.logofield').fadeIn();
            } else {
                $('input[name="addlogos"]').hide();
                $('.logofield').hide();
            }
        });
    });
</script>

       <script>

$('#videotypesel').on('change', function() {
  
  if(this.value == "video") {
    $('#videolinkshow').show();
    $('#youtubelinkshow').hide();
    $("#youtubelinkshow input[name='youtubelink']").prop('required', false);
    $("#videolinkshow input[name='videofile']").prop('required', true);
    
  } else {
    $('#videolinkshow').hide();
    $('#youtubelinkshow').show();
    $("#videolinkshow input[name='videofile']").prop('required', false);
    $("#youtubelinkshow input[name='youtubelink']").prop('required', true);
  }
});
   </script> 

                    <script type="text/javascript">
                        $('.summernote-dynamic').summernote();
                    </script>