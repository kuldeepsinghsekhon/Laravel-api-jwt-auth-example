@extends('layouts.admin')
@section('content')
<!-- Main content -->
<div class="container">
    <div class="page-heading">
        <a class="btn btn-primary pull-right ml-5" href="{{ url('exam/'.$exam->id.'/take') }}"><span><i class="mdi mdi-airplay"></i></span> Preview Exam </a>
        <a class="btn btn-default pull-right ml-5" href="{{ url('/admin/course/show/'.$course->id) }}"><span><i class="mdi mdi-arrow-left"></i></span>  </a>
        <div class="heading-content">
            <div class="user-image">
                @if(empty($user->avatar))
                <img src="{{ asset('uploads/avatar/avatar.png') }}" class="img-circle img-responsive">
                @else
                <img src="{{ asset('uploads/avatar/'.$user->avatar) }}" class="img-circle img-responsive">
                @endif
            </div>
            <div class="heading-title">
                <h2>Welcome back, {{$user->name}} {{$user->lname}}</h2>
                <p>Exam for {{$course->name}}.</p>
            </div>
        </div>
    </div>

    <div class="row">
        
        <!--exam info-->
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <label class="pull-right publish-label"><span class="text-muted">Unpublished</span> <input type="checkbox" class="switch send-to-server-change-checkbox" loader="true" url="{{ url('/exam/publish') }}" extradata="examid:{{ $exam->id }}|_token:{{ csrf_token() }}" name="status" value="Published" @if( $exam->status == "Published" ) checked @endif> <span class="text-primary">Published</span></label>
                <h4>Exam Details</h4>
                <p class="text-muted mb-0">These are exam details will be visible to students.</p>
              </div>
              <div class="card-body">
                  <form class="simcy-form" action="{{ url('/admin/exam/update') }}" data-parsley-validate="" method="POST" loader="true">
                        @csrf
                  <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Exam Name</label>
                                        <input type="text" class="form-control class-name" name="name" placeholder="Exam Name" value="{{ $exam->name }}" required>
                                        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="examid" value="{{ $exam->id }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Exam maximum retakes</label>
                                        <input type="number" class="form-control just-number" name="retakes" min="0" placeholder="Exam maximum retakes" value="{{ $exam->retakes }}" required>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Exam Description</label>
                                        <textarea class="form-control" name="description" placeholder="Exam Description" rows="4" required>{{ $exam->description }}</textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <button class="btn btn-default btn-icon pull-right send-to-server-click" data="examid:{{ $exam->id }}|csrf-token:{{csrf_token()}}" href="" url="{{ url('Exam@delete') }}" warning-title="Are you sure?" warning-message="This exam will be deleted." warning-button="Delete" loader="true" type="button"><i class=" mdi mdi-delete"></i> Delete Exam</button>
                                </div>
                            </div>
                        </div>
                    </form>
              </div>
            </div>
        </div>
        
        <!--quistions-->
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                 <a class="btn btn-primary btn-icon pull-right  ml-5 add-question" href=""><i class=" mdi mdi-plus-circle-outline"></i> Add Question</a>
                <h4>Chapters</h4>
                <p class="text-muted mb-0">A chapter can contain multiple lectures, a lecture could be video, downloads, link, pdfs or text.</p>
              </div>
              <div class="card-body">
                    <form class="landa-content-form" action="{{ url('/exam/updatequestions') }}" data-parsley-validate="" method="POST" loader="true" enctype="multipart/form-data">
                   @csrf
                    <input type="hidden" name="exam" value="{{ $exam->id }}">
                    <input type="hidden" name="course" value="{{ $exam->course }}">
                    <div class="online-classes-list">
                        <div class="panel-group chapter-holder" id="accordion">
                          @if (!is_null($questions))
                            @foreach ($questions as $index => $question)
                            <div class="panel panel-default chapter">
                               <div class="panel-heading">
                                  <div class="chapter-drag"><i class="mdi mdi-drag"></i></div>
                                  <a href="" class="btn btn-black btn-sm pull-right manage-class delete-item" data-id="{{ $question->id }}" data-csrf="{{ csrf_token() }}" title="Delete question"><i class=" mdi mdi-delete"></i></a>
                                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#question{{ $question->id }}"> <span class="indexing">{{ $index + 1 }}.)</span> <span class="panel-label">{{ $question->question }}</span> </a></h4>
                               </div>
                               <div id="question{{ $question->id }}" class="panel-collapse collapse chapter-body">
                                  <div class="panel-body">
                                     <div class="form-group">
                                        <div class="row">
                                           <div class="col-md-12"> <label>Enter the question</label> <input type="text" class="form-control chapter-title" name="question[]" placeholder="Enter the question" value="{{ $question->question }}" required><input type="hidden" class="question-indexing" name="indexing[]" value="{{ $question->indexing }}"> <input type="hidden" name="questionid[]" value="{{ $question->id }}"></div>
                                        </div>
                                     </div>
                                     <div class="form-group">
                                        <div class="row">
                                           <div class="col-md-6">
                                              <label>Question type</label> 
                                              <select class="form-control" name="type[]" original-name="type">
                                                 <option value="multiple" @if( !empty( $question->type == "multiple" ) ) selected @endif>Multiple Answers</option>
                                                 <option value="single" @if( !empty( $question->type == "single" ) ) selected @endif>Single Answer</option>
                                              </select>
                                           </div>
                                           <div class="col-md-6">
                                              <label>Required Question</label> 
                                              <select class="form-control" name="required[]" original-name="required">
                                                 <option value="yes" @if( !empty( $question->required == "yes" ) ) selected @endif>Yes</option>
                                                 <option value="no" @if( !empty( $question->required == "no" ) ) selected @endif>No</option>
                                              </select>
                                           </div>
                                        </div>
                                     </div>
                                     <div class="divider"></div>
                                     <p>Below are question choices</p>

                                    <div class="choices-holder row">
                                        @foreach (json_decode($question->answers) as $key => $answer)
                                        <div class="col-md-6 single-answer">
                                            <a href="" class="delete-choice" title="Delete Choice"><i class=" mdi mdi-delete"></i></a> <label> Choice #<span class="indexing">{{ $key + 1 }}</span></label>
                                            <input type="text" class="form-control chapter-title" name="answer{{ $question->indexing }}[]" value="{{ $answer }}" original-name="answer" placeholder="Choice" required>  
                                                <div class="correct-answer-box">
                                                    <input type="checkbox" class="hidden" name="correct{{ $question->indexing }}[]" original-name="correct" value="0" @if(!in_array($answer, json_decode($question->correct) )) checked="" @endif>  
                                                        <input type="checkbox" class="correct-answer" id="choice{{ $question->indexing.$key }}" name="correct{{ $question->indexing }}[]" original-name="correct" value="1" @if(in_array( $answer, json_decode($question->correct) )) checked="" @endif> 
                                                    <label for="choice{{ $question->indexing.$key }}" class="text-xs">This is the correct answer.</label>
                                                </div>
                                        </div>
                                         @endforeach
                                    </div>

                                     <div class="lecture-buttons-holder"> <button class="btn btn-default btn-icon add-choice" type="button"><i class=" mdi mdi-plus-circle-outline"></i> Add another Choice</button></div>
                                  </div>
                               </div>
                            </div>
                            @endforeach
                          @else
                          <div class="empty-section">
                            <i class="mdi mdi-clipboard-text"></i>
                            <h5>No questions here, add a new one below!</h5>
                          </div>
                          @endif
                        </div>

                        <!-- here -->
                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-12 mt-15">
                                <button class="btn btn-primary btn-icon" type="submit"><i class=" mdi mdi-content-save"></i> Save Changes</button>
                                <button class="btn btn-default btn-icon add-question" type="button"><i class=" mdi mdi-plus-circle-outline"></i> Add Question</button>
                              </div>
                          </div>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
        </div>
    </div>


 </div>

    <script type="text/javascript">
        var deletequestionUrl = "{{ url('/exam/deletequestion') }}";
        var sectionsUrl = "{{ url('/exam/sections') }}";
    </script>


    <!-- scripts -->
   
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/simcify.js')}}"></script>
    <!-- custom scripts -->
     <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/exam.js')}}"></script>

    <script>
        $(document).ready(function(){     
            changeQtype();
            $('.add-question').on('click', function(){
                changeQtype();
            });

           function changeQtype(){
           $(".form-group select[name='type[]']").on('change', function() {
               var val = $(this).val();
            if(val == 'single'){
                var sel = $(this).parents('.panel-collapse').find('.correct-answer-box .correct-answer');
                $(this).parents('.panel-collapse').find('.correct-answer-box .correct-answer').each(function(i){  
                    if($(this).is(":checked")){
                    var isCheckedThis = $(this).prop('checked');
                   $(sel).prop('checked',false);
            
                    if (isCheckedThis === true || isUncheckable === true) {
                        $(this).prop('checked', true);
                    }
                    return false;
                }
            }); }
           });
           singlechoice();
           $('.add-choice').on('click', function(){
                 setTimeout(() => {
                    singlechoice();
                 }, 1000); 
            });
    }
    function singlechoice(thisObj){
        $(".correct-answer-box .correct-answer").on('change', function() {
                var val = $(this).parents('.panel-collapse').find(".form-group select[name='type[]']").val();
                var sel =  $(this).parents('.panel-collapse').find('.correct-answer-box .correct-answer');
                       
                if(val == 'single'){
                    $(this).parents('.panel-collapse').find('.correct-answer-box .correct-answer').each(function(e){
                        $(sel).prop('checked',false);
                        $(sel).siblings('.hidden').prop('checked',true);
                    });  
                    $(this).prop('checked',true); 
                } else{
                    // /$(this).prop("checked", !this.prop("checked"));
                    $(this).prop('checked', this.checked);  
                }
            });
     }

    });
    </script>
@endsection