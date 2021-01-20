<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Examsreport;
use App\Models\Coursechapter;
use App\Models\Coursesenrolled;
use App\Models\Studentexamresult;
use App\Models\StudentLectureStatus;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function coursepreview($id){       
        $user = Auth::user();
        if($user == ''){
            return redirect('login');
        }
        $course = Course::find($id);    
        $courseenrolled = Coursesenrolled::where(['student' => $user->id, 'course' => $id])->first();   
        $related_courses=Course::where("coursecategory_id",$course->coursecategory_id)->where('id','!=',$id)->take(10)->get();
        if(!empty($courseenrolled||$user->role=='admin')){
            
            $chapters = Coursechapter::where('course', $id)->get();
            $exams = Exam::where(['course' => $course->id, 'status' => 'Published'])->get();
            if(empty($course) || empty($chapters) || empty($user)){
                return view('error404');
            }
            return view('course/coursePreview', ['related_courses' => $related_courses, 'courseenrolled'=> $courseenrolled ,'user' => $user, 'chapters' => $chapters, 'course' => $course, 'exams' => $exams]);            
        }else{
            return view('error404');
        }
    }
 /**
     * Complete a course
     * 
     * @return Json
     */
    public function complete($user, $courseid) {
        $completed = array();
        $lectures = Lecture::where("course", $courseid)->get();
        $completedLectures = StudentLectureStatus::where("course_id", $courseid)->where("user_id", $user->id)->get();
        foreach($completedLectures as $lecture){
            $completed[] = $lecture->lecture_id;
        }

        foreach($lectures as $lecture){
            if(!in_array($lecture->id, $completed)){
                return false; 
            }
        }
        Coursesenrolled::where("course", $courseid)->where("student", $user->id)->update(array('completed_on' => date("Y-m-d"), 'status' => "Complete"));
    }

    public function lecture(Request $request){
     
        $user = Auth::user();
        $response = array(
            "success" => false,
            "message" => '',
            "data" => '',
        );
        $Mylecture = Lecture::where('id',$request->id)->first(); 
      
        if(!isset($request->chapterId)){
         $request->chapterId = $Mylecture->chapter ;
        }
        if($request->chapterId){
            $studentLecStatus = new StudentLectureStatus();
            $status = $studentLecStatus->where(['user_id' => $user->id, 'chapter_id' => $request->chapterId, 'lecture_id' => $request->id])->first();
            if($status == ""){
                $studentLecStatus->user_id = $user->id;
                $studentLecStatus->chapter_id = $request->chapterId;
                $studentLecStatus->lecture_id = $request->id;
                $studentLecStatus->course_id = $request->course_id;
                $studentLecStatus->study_status = 'Completed';
                $studentLecStatus->status = 'Completed';
                $studentLecStatus->save();
            }else{
                $status->update(['course_id' => $request->course_id]);
            }
                        
        } 
        self::complete($user,  $Mylecture->course);
        $lecture = Lecture::find($request->id);
        if(!empty($lecture)){
            if($lecture->type == 'link'){
                $data = '<div class="banner_img" style=" background: url('.url('images/banner-img.jpg').')">
                <a target="_blank" href="'.$lecture->content.'" class="btn btn-info text-light">Visit Link</a></div>';
                $response['success'] = true;
                $response['message'] = "data found";
                $response['data'] = $data;
            }else if($lecture->type == 'video'){
                $data = '<video width="100%" height="400" controls autoplay>
                                <source src="'.asset("uploads/course/".$lecture->content).'" type="video/mp4">
                                <source src="video/mov_bbb.ogg" type="video/ogg">
                        </video>';
               $response['success'] = true;
                $response['type'] = $lecture->content;
                $response['data'] = $data;
            }else if($lecture->type == 'pdf'){
                $data = '<iframe width="100%" height="600" src="'.asset("uploads/course/".$lecture->content).'"></iframe>';                    
                $response['success'] = true;
                $response['message'] = "data found";
                $response['data'] = $data;
            }else if($lecture->type == 'text'){
                $data ='<p>'.nl2br($lecture->content).'</p>';
                                     
                $response['success'] = true;
                $response['message'] = "data found";
                $response['data'] = $data;
            }else if($lecture->type == 'videolink'){
                $data = "<iframe id='iframe1' width='100%' height='400' style='background: #000;' src='$lecture->content' frameborder='0'
                allow='accelerometer; picture-in-picture allow='autoplay; fullscreen' allowfullscreen=''></iframe>";                    
                $response['success'] = true; 
                $response['message'] = "data found";
                $response['data'] = $data;
            }
            else{
                $data = '<h3>This chapter has no Lectures</h3>';                        
                $response['success'] = false;
                $response['message'] = "Data not Found";
                $response['data'] = $data;
            }
            $response['type'] = $lecture->type; 
            $response['description'] = nl2br($lecture->description); 
            $response['title'] =$lecture->title;
            return \Response::json($response);
        }
        
    }

    // public function lectureStatus(Request $request){
    //     $user = Auth::user();
    //     $response = array(
    //         "success" => false,
    //         "message" => '',
    //     );
    //     $studentLecStatus = new StudentLectureStatus();
    //     $status = $studentLecStatus->where(['student' => $user->id, 'chapter_id' => $request->chapterId, 'lecture_id' => $request->id])->first();
    //     if($status == ""){
    //         $studentLecStatus->student = $user->id;
    //         $studentLecStatus->chapter_id = $request->chapterId;
    //         $studentLecStatus->lecture_id = $request->id;
    //         $studentLecStatus->study_status = 'Completed';
    //         $studentLecStatus->status = 'Completed';
    //         $studentLecStatus->save();
            
    //         $response['success'] = True;
    //         $response['message'] = "Data Found";
    //     }
    //     return \Response::json($response);
    // }

    public function exam($examid){        
        $user = Auth::user();
        $exam = Exam::find($examid);
        if(empty($exam)){
            return redirect('error404');
        }
        $course = Course::find($exam->course);
        $questions = Question::where('exam', $exam->id)->orderBy('indexing', 'asc')->get(); 
        $attempt = Examsreport::where(['student' => $user->id, 'exam' => $exam->id])->count();
        $lastattempt = Examsreport::where(['student' => $user->id, 'exam' => $exam->id])->orderBy('id', 'desc')->first();

        return view('examroom', compact('user', 'exam', 'course', 'questions', 'attempt', 'lastattempt'));
    }

    public function saveExam(Request $request){        
        $user = Auth::user();
        $isCorrect = "no";
        $exam = Exam::find($request->examid);
        $totalQuestions = count($request->question);
        
        foreach($request->question as $ques_id){
            $question = Question::find($ques_id);
            $allAnswers = json_decode($question->answers);
            $correctAnswers = json_decode($question->correct);
            $studentAnswer = $request->answer[$ques_id];          
            // $answer = array_intersect($studentAnswer, $correctAnswers);
            if($studentAnswer == $correctAnswers){
                $answer = true;
            }else{
                $answer = false;
            }
            if($answer){
                $isCorrect = $correctlyAnswered[] = "yes";
            }else{
                $isCorrect = "no";
            }
            
            if($user->role != "admin"){
                $studentResult = new Studentexamresult();                
                $studentResult->course = $question->course;
                $studentResult->exam = $question->exam;
                $studentResult->student = $user->id;
                $studentResult->question = $question->question;
                $studentResult->indexing = $question->indexing;
                $studentResult->answer = json_encode($studentAnswer);
                $studentResult->correct = $isCorrect;
                $studentResult->save();                
            }            
        }
        if(isset($correctlyAnswered)){
            if (count($correctlyAnswered) > 0) {
                $score = round((count($correctlyAnswered) / $totalQuestions) * 100);
            }else{
                $score = 0;
            }
        }else{
            $score = 0;
        }
        
        if($user->role != "admin"){
            $examReport = new Examsreport();
            $examReport->student = $user->id;
            $examReport->course = $exam->course;
            $examReport->exam = $exam->id;
            $examReport->totalQuestions = $totalQuestions;
            $examReport->correctlyAnswered = (isset($correctlyAnswered)?count($correctlyAnswered):0);
            $examReport->score = $score;
            $examReport->save();            
        }   
        // return redirect()->back()->with("success", "You Scored ".$score."%");
        return response()->json(responder("success", "You Scored ".$score."%", "Your exam was marked and you answered ".(isset($correctlyAnswered)?count($correctlyAnswered):0)." out of ".$totalQuestions." questions correctly.", "reload()"));
    }
}