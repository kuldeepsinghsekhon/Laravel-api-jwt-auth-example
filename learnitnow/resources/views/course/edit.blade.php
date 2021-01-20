@include('layouts.admin')
@section('contents')
<div class="container">
<div class="row">

<div class="col-lg-12 order-lg-1">
    <div id="tabs-1" class="tabs-card">
        <div class="card">
            <div class="card-header">
                <h5 class=" h6 mb-0">{{__('Basic Setting')}}</h5>
            </div>
            <div class="card-body">
            <form action="{{ route('course.update', $course->id)}}" method="post" id='updateCertify' enctype='multipart/form-data'>
            @csrf
            @method('PUT')
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Certify Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Certify Name" value="{{$course->name}}" required="">
                            <input type="hidden" name="type" value="Regular">
                            <input type="hidden" name="certifyId" class="form-control" placeholder="Certify Name" value="{{$course->id}}" required="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12" style="display: inline-flex;">

                            <input type="checkbox" name="pennfoster" value="1" class="" @if($course->pennfoster == 1) checked @endif />
                            &nbsp;&nbsp;&nbsp;&nbsp;<label  class="form-control-label">Penn Foster</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6" style="display: inline-flex;">
                            <input type="checkbox" id="checkbox" name="boardcertified" value="1" class=""  @if($course->boardcertified == 1) checked @endif />
                            &nbsp;&nbsp;&nbsp;&nbsp;<label  class="form-control-label">Board Certified</label>
                        </div>
                    </div>
                </div>

                <div class="form-group responsefield">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Prerequisites</label>
                            <input type="text" id="showthis" name="prerequisites" class="form-control" value="{{$course->prerequisites}}" placeholder="Prerequisites ">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Degree Name</label>
                            <input type="text" name="degree" class="form-control" placeholder="Degree Name" value="{{$course->degree}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-control-label">Specialization</label>
                            <input type="text" name="specialization" class="form-control" placeholder="Specialization" value="{{$course->specialization}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-control-label">Certification</label>
                            <input type="text" name="certification" class="form-control" placeholder="Certification" value="{{$course->certification}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-control-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="Published" @if($course->status == 'Published') selected  @endif>Published</option>
                                <option value="Unpublished" @if($course->status == 'Unpublished') selected @endif>Unpublished</option>
                            </select>
                        </div>
                       
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-control-label">Price ($)</label>
                            <input type="number" class="form-control" name="price" placeholder="Price ($)" required value="{{$course->price}}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-control-label">Sale Price ($)</label>
                            <input type="number" class="form-control" name="sale_price" placeholder="Sale Price ($)" value="{{$course->sale_price}}">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-control-label">Duration</label>
                            <input type="number" name="duration" step="1" class="form-control just-number" placeholder="Duration"
                                   required="" value="{{$course->duration}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-control-label">Period</label>
                            <select name="period" class="form-control" required="">
                                <option value="Days"  @if($course->period == 'Days') selected  @endif>Days</option>
                                <option value="Weeks"  @if($course->period == 'Weeks') selected  @endif>Weeks</option>
                                <option value="Months"  @if($course->period == 'Months') selected  @endif>Months</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-control-label">Category</label>
                            <select class="form-control" name="category">
                                <!--<option value="0">Select Catrgory</option>-->
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $course->category) selected  @endif>{{$category->name}}</option>
                                @endforeach

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
                                @foreach($instructors as $_instructor)
                                <option value="{{ $_instructor->id }}"  @if($_instructor->id == $course->instructor) selected  @endif>{{ $_instructor->name }}</option>
                                @endforeach
                                <option value="1" selected>Demo</option>
                                
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label"> Type Image/Video</label>
                            <select id="" class="form-control" name="viewtype" >
                                <option value="image"  @if($course->viewtype == 'image') selected  @endif>Image</option>
                                <option value="video" @if($course->viewtype == 'video') selected  @endif>Video</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Cover Image</label>

                            @if(!empty($course->image))
                            
                            <input type="file" name="image" class="custom-input-file croppie" default="{{asset('storage')}}/certify/{{ $course->image }}" crop-width="600" crop-height="600"  accept="image/*">
                            @else
                            <input type="file" name="image" class="custom-input-file croppie" crop-width="600" crop-height="600"  accept="image/*" required="" >
                            @endif    
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Video Type</label>
                            <select id="videotype" class="form-control" name="videotype" required="">
                                <option value="video"  @if($course->videotype == 'video') selected  @endif>Video</option>
                                <option value="youtubelink"  @if($course->videotype == 'youtubelink') selected  @endif>Youtube Link</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="youtubelink">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label"> Youtube Link</label>
                            <input type="text" name="youtubelink" class="form-control" value="{{$course->youtubelink}}">
                        </div>
                    </div>
                </div>

                <div class="form-group uploadvideo" id="videolink">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Upload Video</label>

                            <input type="file" class="form-control dropify" placeholder="Upload video File" name="videofile"  accept="video/mp4" value="{{$course->videofile}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label">Course Description</label>
                            <textarea class="form-control" id="summary-ckeditor" name="description" placeholder="Certify Description" rows="5"
                                      required>{{$course->description}}</textarea>
                        </div>
                    </div>
                </div>
            <div class="text-right mr-4 pb-3">
                <button type ='submit' class ='btn btn-sm btn-primary rounded-pill'>Update</button>
                <a href="{{ url('/admincourse') }}">
                    <button type="button" class="btn btn-sm btn-secondary rounded-pill">{{__('Back')}}</button>
                </a>
            </div>
        </form> 
            </div>
        </div>
    </div>
</div>
</div>





<!-- <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/repeater.js') }}"></script>
<script>
$('.list-group-item').on('click', function () {
    var href = $(this).attr('data-href');
    $('.tabs-card').addClass('d-none');
    $(href).removeClass('d-none');
    $('#tabs .list-group-item').removeClass('text-primary');
    $(this).addClass('text-primary');
});

// Remove task stage
$(document).on('click', '.stage-remove-button', function (e) {
    e.preventDefault();
    var ele = $(this);
    var stage_id = ele.parents('.main-stage-tr').children('.stage-input').find('input')[0].value;
    if (!stage_id) {
    ele.next('button').trigger('click');
    } else {
    var stages = ele.attr('data-type');
            var url = '{{ url('stage.tasks', '__stage_id') }}'.replace('__stage_id', stage_id);
    $.ajax({
        url: url,
        success: function (data) {
            if (data == 0) {
                if (confirm('{{ __("Are you sure you want to delete this stage?") }}')) {
                    ele.next('button').trigger('click');
                }
            } else {
                alert('{{ __("There is some tasks in this stage. Please move tasks from this stage.") }}');
            }
        }
    });
    }

}
);

// Task Stage move
var $taskDragAndDrop = $("body .task-stage-repeater tbody").sortable({
    handle: '.task-sort-handler'
});

var $taskRepeater = $('.task-stage-repeater').repeater({
    initEmpty: true,
    defaultValues: {},
    show: function () {
        $(this).slideDown();
    },
    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    },
    ready: function (setIndexes) {
        $taskDragAndDrop.on('drop', setIndexes);
    },
    isFirstItemUndeletable: true
});

var value = JSON.parse($(".task-stage-repeater").attr('data-value'));

if (typeof value != 'undefined' && value.length > 0) {
    $taskRepeater.setList(value);
}

$(document).ready(function () {
    $('#progress_bar').change(function () {
        $('#p_percentage').html($(this).val());
    });

    $('input[type=radio][name=project_progress]').change(function () {
        if (this.value == 'true') {
            $('#progress_bar').removeAttr('disabled');
        } else {
            $('#progress_bar').attr('disabled', true);
        }
    });
})

// change email notification
@if (Auth::user()->type != 'admin')
$(document).on("click", ".email-template-checkbox", function () {
    var chbox = $(this);
    $.ajax({
        url: chbox.attr('data-url'),
        data: {status: chbox.val()},
        type: 'PUT',
        success: function (response) {
            if (response.is_success) {
                show_toastr('Success', response.success, 'success');
                if (chbox.val() == 1) {
                    $('#' + chbox.attr('id')).val(0);
                } else {
                    $('#' + chbox.attr('id')).val(1);
                }
            } else {
                show_toastr('Error', response.error, 'error');
            }
        },
        error: function (response) {
            response = response.responseJSON;
            if (response.is_success) {
                show_toastr('Error', response.error, 'error');
            } else {
                show_toastr('Error', response, 'error');
            }
        }
    })
});
@endif
</script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simcify.min.css') }}">
<script src="{{ asset('assets/js/simcify.min.js') }}"></script>
<script src="{{ asset('assets/libs/dragula/dist/dragula.min.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/repeater.js') }}"></script>
<script>
$(document).ready(function () {
    CKEDITOR.replace('summary-ckeditor');
            @if ($course->videotype == 'youtubelink')
    $('#videotype').val('youtubelink').change();
            @endif
});

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
 -->

