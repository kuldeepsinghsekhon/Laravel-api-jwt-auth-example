<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Examsreport;
use App\Models\Coursechapter;
use App\Models\Coursesenrolled;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function coursepreview($id){       
        $user = Auth::user();
        if($user == ''){
            return redirect('login');
        }
        $courseenrolled = Coursesenrolled::where(['student' => $user->id, 'course' => $id])->first();       
        if(!empty($courseenrolled)){
            $course = Course::find($courseenrolled->course);                
            $chapters = Coursechapter::where('course', $course->id)->get();
            $exams = Exam::where(['course' => $course->id, 'status' => 'Published'])->get();
            if(empty($course) || empty($chapters) || empty($user)){
                return view('error404');
            }
            return view('course/coursePreview', ['user' => $user, 'chapters' => $chapters, 'course' => $course, 'exams' => $exams]);            
        }else{
            return view('error404');
        }
    }

    public function lecture(Request $request){
        $response = array(
            "success" => false,
            "message" => '',
            "data" => '',
        );
        // echo '<pre>'; print_r($request->all()); echo '</pre>'; die('Endherer');
        $lecture = Lecture::find($request->id);
        if(!empty($lecture)){
            if($lecture->type == 'link'){
                $data = '<h1>'.$lecture->title.'</h1>
                    <div>'.$lecture->description.'</div><br><hr>
                    <a target="_blank" href="'.$lecture->content.'" class="btn btn-info text-light">Visit Link</a>';
                $response['success'] = true;
                $response['message'] = "data found";
                $response['data'] = $data;
            }else if($lecture->type == 'video'){
                $data = '<video width="100%" height="400" controls>
                                <source src="'.asset("uploads/course/".$lecture->content).'" type="video/mp4">
                                <source src="video/mov_bbb.ogg" type="video/ogg">
                        </video>';
                        /*'<iframe width="100%" height="600" src="'.asset("assets/uploads/".$lecture->content).'"></iframe>';*/
                $response['success'] = true;
                $response['type'] = $lecture->content;
                $response['data'] = $data;
            }else if($lecture->type == 'pdf'){
                $data = /*'<h1>'.$lecture->title.'</h1>
                        <div>'.$lecture->description.'</div><br><hr>*/
                        '<iframe width="100%" height="600" src="'.asset("uploads/course".$lecture->content).'"></iframe>';                    
                $response['success'] = true;
                $response['message'] = "data found";
                $response['data'] = $data;
            }else if($lecture->type == 'text'){
                $data = /*'<h1>'.$lecture->title.'</h1>
                        <div>'.$lecture->description.'</div><br><hr>*/
                        '<p>'.$lecture->content.'</p>';                    
                $response['success'] = true;
                $response['message'] = "data found";
                $response['data'] = $data;
            }else{
                $data = '<h3>This chapter has no Lectures</h3>';                        
                $response['success'] = false;
                $response['message'] = "Data not Found";
                $response['data'] = $data;
            }
            return \Response::json($response);
        }
        
    }

    public function exam($examid){        
        dd('fdfsf');
        $user = Auth::user();
        $exam = Exam::find($examid);

        echo '<pre>'; print_r($exam); echo '</pre>'; die('Endherer');
        if(empty($exam)){
            return redirect('error404');
        }
        $course = Course::find($exam->course);
        $questions = Question::where('exam', $exam->id)->orderBy('indexing', 'asc')->get(); 
        $attempt = Examsreport::where(['student' => $user->id, 'exam' => $exam->id])->count();
        $lastattempt = Examsreport::where(['student' => $user->id, 'exam' => $exam->id])->orderBy('id', 'desc')->first();        
        return view('examroom', compact('user', 'exam', 'course', 'questions', 'attempt', 'lastattempt'));
        
        
    }
}