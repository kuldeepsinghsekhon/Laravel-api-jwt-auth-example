@extends('layouts.app')
@section('contents')
    <style>
        .exam-complete i.complete-icon {
            font-size: 62px;
            color: #49cb41;
        }

    </style>
    <div class="container">
        <div class="row page-heading">
            <!-- <div class="d-flex mt-5">
                <div><img src="{{ asset('assets/images/avatar.png') }}" alt="" height="80px"></div>
                <div class="ml-2">
                    <h2>Welcome back, {{ $user->name }}</h2>
                    <p>Exam for {{ $course->name }}</p>
                </div>
            </div> -->

        </div>



        <div class="row my-5">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="exam-title">Exam for {{ $course->name }}</h5>                    
                    </div>
                    <div class="col-sm-6 text-right"><button type="submit" class="btn btn-primary"><a href="{{ url('coursepreview/' . $course->id) }}"
                                class="text-decoration-none text-light"> <i class="mdi mdi-restart"></i> Go Back</a> </button>
                    </div>
                </div>                
                <hr>
            </div>
            <div class="card-body p-5" style="padding-top: 15px !important">
                @if ($attempt > 0)
                    <div class="exam-complete" id="exam-complete">

                        <div class="text-center">
                            <i class="mdi mdi-checkbox-multiple-marked-circle complete-icon"></i>
                            <h3>You sat this exam and scored <span
                                    class="text-success"><strong>{{ $lastattempt->score }}%</strong></span></h3>
                                   
                            @if ($attempt <= $exam->retakes || $user->role == 'admin')
                                <button type="submit" class="btn btn-primary btn-icon retake-exam" id="retake-exam"><i
                                        class="mdi mdi-restart"></i> Retake Exam</button>
                            @else
                            <button class="btn btn-primary btn-icon"><i
                                        class="mdi mdi-restart"></i> No More Retakes</button>
                            @endif
                        </div>
                    </div>
                @endif
                @if ($attempt > 0)
                    <div class="exam-question-section" id="exam-section" style="display: none;">
                    @else
                        <div class="exam-question-section">
                @endif
                <span class="text-muted text-xs">Questions with (<span class="text-danger">*</span>) are required.</span>
                <p>{{ $exam->description }}</p>
                <form class="simcy-form" action="{{ url('exam/save') }}" data-parsley-validate="" method="POST"
                    loader="true">
                    {{ csrf_field() }}
                    <input type="hidden" name="examid" value="{{ $exam->id }}">
                    @if (!empty($questions))
                        @foreach ($questions as $index => $question)
                            <div class="form-group each_question">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="question">{{ $index + 1 }}.) {{ $question->question }}
                                            @if ($question->required == 'yes')
                                                <span class="text-danger">*</span>
                                            @endif
                                        </label>
                                        <input type="hidden" name="question[]" value="{{ $question->id }}">
                                        @foreach ($question->getAnswer() as $key => $choice)
                                            <div class="exam-answer each_answer">
                                                @if ($question->type == 'single')
                                                    <input type="radio" id="choice{{ $index . $key }}"
                                                        class="answer-option{{ $question->id }} correct-answer"
                                                        value="{{ $choice }} " name="answer[{{ $question->id }}][]"
                                                        data-id="{{ $question->required == 'yes' ? 'required' . $question->id : 'optional' . $question->id }}">
                                                @else
                                                    <input type="checkbox" id="choice{{ $index . $key }}"
                                                        class="answer-option{{ $question->id }} correct-answer"
                                                        value="{{ $choice }}" name="answer[{{ $question->id }}][]"
                                                        data-id="{{ $question->required == 'yes' ? 'required' . $question->id : 'optional' . $question->id }}">
                                                @endif
                                                <label for="choice{{ $index . $key }}">{{ $choice }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-icon submit"><i
                                            class="mdi mdi-check-all"></i> Submit for marking</button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="empty-section">
                            <i class="mdi mdi-clipboard-text"></i>
                            <h5>No questions set for this exam!</h5>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click", ".correct-answer", function() {
            if ($(this).is(':checked')) {
                $(this).addClass('clickEdit');
            } else {
                $(this).removeClass('clickEdit');
            }
        });

        $('#retake-exam').click(function() {
            console.log('dfsdfs');
            $('#exam-complete').hide();
            $('#exam-section').show();
        });

        $( ".simcy-form" ).submit(function( event ) {
        event.preventDefault();
        $(".each_question").find('.each_answer').removeClass('errorGengate');
        var totalQuestion = $(".each_question").length;
        totalQuestion = totalQuestion -1;
        for(var i=0;i<=totalQuestion;i++){
            var checkEach = $(".each_question").eq(i).find('.clickEdit').length;
            if(checkEach == 0){
                $(".each_question").eq(i).find('.each_answer').addClass('errorGengate');
            }
        }
        if($(".errorGengate").length){
            toastr.error("Please Select atleast one answer for each question.", "Oops!", {timeOut: null, closeButton: true});
            // alert('select one answer from each question');
            return false;
        }
        });
    });

</script>
