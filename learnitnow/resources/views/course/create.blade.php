
<form class="" action="{{route('course.store')}}" method="POST" enctype = 'multipart/form-data'>
@csrf
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Certify Name</label>
            <input type="text" name="name" class="form-control" placeholder="Certify Name" required="">
            <input type="hidden" name="type" value="Regular">
        </div>
    </div>
</div>


<div class="form-group">
    <div class="row">
        <div class="col-md-12" style="display: inline-flex;">

            <input type="checkbox" name="pennfoster" value="1" class="" />
            &nbsp;&nbsp;&nbsp;&nbsp;<label  class="form-control-label">Penn Foster</label>
        </div>
    </div>
</div>


<div class="form-group">
    <div class="row">
        <div class="col-md-6" style="display: inline-flex;">
            <input type="checkbox" id="checkbox" name="boardcertified" value="1" class="" />
            &nbsp;&nbsp;&nbsp;&nbsp;<label  class="form-control-label">Board Certified</label>
        </div>

    </div>
</div>
<div class="form-group responsefield">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Prerequisites</label>
            <input type="text" id="showthis" name="prerequisites" class="form-control" placeholder="Prerequisites ">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">CE Credits</label>
            <input type="number" name="cecredit" class="form-control" placeholder="CE Credits">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Degree Name</label>
            <input type="text" name="degree" class="form-control" placeholder="Degree Name">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label class="form-control-label">Specialization</label>
            <input type="text" name="specialization" class="form-control" placeholder="Specialization">
        </div>
        <div class="col-md-6">
            <label class="form-control-label">Certification</label>
            <input type="text" name="certification" class="form-control" placeholder="Certification">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label class="form-control-label">Status</label>
            <select class="form-control" name="status">
                <option value="Published">Published</option>
                <option value="Unpublished">Unpublished</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-control-label">Syndicate</label>
            <select class="form-control" name="syndicate">
                <option value="Enabled">Enabled</option>
                <option value="Disabled">Disabled</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label class="form-control-label">Price ($)</label>
            <input type="number" class="form-control" name="price" placeholder="Price ($)" required>
        </div>
        <div class="col-md-6">
            <label class="form-control-label">Sale Price ($)</label>
            <input type="number" class="form-control" name="sale_price" placeholder="Sale Price ($)">
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Commision Points</label>
            <input type="number" class="form-control" name="commision" placeholder="Enter points" required>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label class="form-control-label">Duration</label>
            <input type="number" name="duration" step="1" class="form-control just-number" placeholder="Duration"
                   required="">
        </div>
        <div class="col-md-4">
            <label class="form-control-label">Period</label>
            <select name="period" class="form-control" required="">
                <option value="Days">Days</option>
                <option value="Weeks">Weeks</option>
                <option value="Months">Months</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-control-label">Category</label>
            <select class="form-control" name="category">
                @if($countCourse_categories > 1)
                @foreach($Course_categories as $Course_category)
                @if($Course_category->id == '0')
                <option value="{{$Course_category->id}}" disabled="disabled" >{{$Course_category->name}}</option>
                @else
                <option value="{{$Course_category->id}}">{{$Course_category->name}}</option>
                @endif
                @endforeach
                @else
                @foreach($Course_categories as $Course_category)
                <option value="{{$Course_category->id}}">{{$Course_category->name}}</option>
                @endforeach
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
                <option value="">Select Instructor</option>
                @foreach($instructor as $_instructor)
                <option value="{{ $_instructor->id }}">{{ $_instructor->name }}</option>
                @endforeach
                <option value="1">demo1</option>
                <option value="2">demo2</option>
            </select>
        </div>
    </div>
</div>  

<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label"> Type Image/Video</label>
            <select id="" class="form-control" name="viewtype" required="">
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Cover Image</label>

            <input type="file" name="image" class="custom-input-file croppie" crop-width="600" crop-height="600"  accept="image/*" required="" >       
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Video Type</label>
            <select id="videotype" class="form-control" name="videotype" required="">
                <option value="video">Video</option>
                <option value="youtubelink">Youtube Link</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group" id="youtubelink">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label"> Youtube Link</label>
            <input type="text" name="youtubelink" class="form-control" value="">
        </div>
    </div>
</div>

<div class="form-group uploadvideo" id="videolink">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Upload Video</label>

            <input type="file" class="form-control dropify" placeholder="Upload video File" name="video"  accept="video/mp4" >
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <label class="form-control-label">Course Description</label>
            <textarea  required="" class="form-control" id="summary-ckeditor" name="description" placeholder="Certify Description" rows="5"></textarea>
        </div>
    </div>
</div>
<div class="form-group">
  <div class="row">
    <div class="col-md-12">
      <label>Free Product</label>
      <select class="form-control" name="product">
        <option value="0"  selected>Select Free Product</option>
        <option value="webcamp" >webcamp</option>
        <option value="head phone">head phone</option>
        <option value="mobile">mobile</option>

      </select>
    </div>
  </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-12" style="display: inline-flex;">
            <input type="checkbox" name="authoritylabel" value="1" class="" />
            &nbsp;&nbsp;&nbsp;&nbsp;<label class="form-control-label">Issuing Authority</label>
        </div>
    </div>
</div>

<div class="form-group alllogofield">
    <div class="row">
        <div class="col-md-12">

            <label>Issuing Authority Logo</label>
<input type="file" name="addlogos" class="custom-input-file croppie" crop-width="600" crop-height="600"  accept="image/*" placeholder="Logo" >
        
        </div>
    </div>
</div>

</div>
<div class="text-right">
    <button class="btn btn-sm btn-primary rounded-pill" type = 'submit'>{{__('Create')}}</button>
    <button type="button" class="btn btn-sm btn-secondary rounded-pill" data-dismiss="modal">{{__('Cancel')}}</button>
</div>
</form>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simcify.min.css') }}">
<script src="{{ asset('assets/js/simcify.min.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace('summary-ckeditor');
</script>
<script>
    $(function () {
        $('input[name="prerequisites"]').hide();
        $('.responsefield').hide();
        //show it when the checkbox is clicked
        $('input[name="boardcertified"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('input[name="prerequisites"]').fadeIn();
                $('.responsefield').fadeIn();
            } else {
                $('input[name="prerequisites"]').hide();
                $('.responsefield').hide();
            }
        });
    });
</script> 
<script>
    $(function () {
        $('input[name="addlogos"]').hide();
        $('.alllogofield').hide();
        //show it when the checkbox is clicked
        $('input[name="authoritylabel"]').on('click', function () {
            if ($(this).prop('checked')) {
                $('input[name="addlogos"]').fadeIn();
                $('.alllogofield').fadeIn();
            } else {
                $('input[name="addlogos"]').hide();
                $('.alllogofield').hide();
            }
        });
    });
</script> 

<script>
    $('#youtubelink').hide();
    $('#videotype').on('change', function () {

        if (this.value == "youtubelink") {
            $('#youtubelink').show();
            $('#videolink').hide();
        } else {
            $('#videolink').show();
            $('#youtubelink').hide();
        }
    });

</script>

