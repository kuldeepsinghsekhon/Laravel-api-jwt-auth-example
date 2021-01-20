<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use App\Models\Course;
use Illuminate\Http\Request;
use Auth;
class ExamController extends Controller
{
    /**
     * Curriculum manager
     * 
     * @return \Pecee\Http\Response
     */
    public function sections() {
        $json = '{
            "choice": "<div class=\"col-md-6 single-answer\"> <a href=\"\" class=\"delete-choice\" title=\"Delete Choice\"><i class=\" mdi mdi-delete\"><\/i><\/a> <label> Choice #<span class=\"indexing\">1<\/span><\/label> <input type=\"text\" class=\"form-control\" name=\"answer[]\" original-name=\"answer\" placeholder=\"Choice\" required><div class=\"correct-answer-box\"><input type=\"checkbox\" class=\"hidden\" name=\"correct[]\" original-name=\"correct\" checked value=\"0\"> <input type=\"checkbox\" class=\"correct-answer\" id=\"choice\" name=\"correct[]\" original-name=\"correct\"  value=\"1\"> <label for=\"choice\" class=\"text-xs\">This is the correct answer<\/label><\/div><\/div>",
            "question": "<div class=\"panel panel-default chapter newly\"><div class=\"panel-heading\"><div class=\"chapter-drag\"><i class=\"mdi mdi-drag\"><\/i><\/div> <a href=\"\" class=\"btn btn-default btn-sm pull-right manage-class delete-item\" data-type=\"chapter\" title=\"Delete question\"><i class=\" mdi mdi-delete\"><\/i><\/a><h4 class=\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#chapter1\"> <span class=\"indexing\">1.)<\/span> <span class=\"panel-label\">New Question<\/span> <\/a><\/h4><\/div><div id=\"chapter1\" class=\"panel-collapse collapse chapter-body in\"><div class=\"panel-body\"><div class=\"form-group\"><div class=\"row\"><div class=\"col-md-12\"> <label>Enter the question<\/label> <input type=\"text\" class=\"form-control chapter-title\" name=\"question[]\" placeholder=\"Enter the question\" required><input type=\"hidden\" class=\"question-indexing\" name=\"indexing[]\"> <input type=\"hidden\" name=\"questionid[]\" value=\"0\"><\/div><\/div><\/div><div class=\"form-group\"><div class=\"row\"><div class=\"col-md-6\"> <label>Question type<\/label> <select class=\"form-control\" name=\"type[]\" original-name=\"type\"><option value=\"multiple\">Multiple Answers<\/option><option value=\"single\">Single Answer<\/option> <\/select><\/div><div class=\"col-md-6\"> <label>Required Question<\/label> <select class=\"form-control\" name=\"required[]\" original-name=\"required\"><option value=\"yes\">Yes<\/option><option value=\"no\">No<\/option> <\/select><\/div><\/div><\/div><div class=\"divider\"><\/div><p>Below are question choices<\/p><div class=\"choices-holder row\"><div class=\"col-md-6 single-answer\"> <a href=\"\" class=\"delete-choice\" title=\"Delete Choice\"><i class=\" mdi mdi-delete\"><\/i><\/a> <label> Choice #<span class=\"indexing\">1<\/span><\/label> <input type=\"text\" class=\"form-control\" name=\"answer[]\" original-name=\"answer\" placeholder=\"Choice\" required><div class=\"correct-answer-box\"> <input type=\"checkbox\" class=\"hidden\" name=\"correct[]\" original-name=\"correct\" checked value=\"0\"> <input type=\"checkbox\" class=\"correct-answer\" id=\"choice\" name=\"correct[]\" original-name=\"correct\"  value=\"1\"> <label for=\"choice\" class=\"text-xs\">This is the correct answer<\/label><\/div><\/div><div class=\"col-md-6 single-answer\"> <a href=\"\" class=\"delete-choice\" title=\"Delete Choice\"><i class=\" mdi mdi-delete\"><\/i><\/a> <label> Choice #<span class=\"indexing\">2<\/span><\/label> <input type=\"text\" class=\"form-control\" name=\"answer[]\" original-name=\"answer\" placeholder=\"Choice\" required><div class=\"correct-answer-box\"> <input type=\"checkbox\" class=\"hidden\" name=\"correct[]\" original-name=\"correct\" checked value=\"0\"> <input type=\"checkbox\" class=\"correct-answer\" id=\"choice\" name=\"correct[]\" original-name=\"correct\"  value=\"1\"> <label for=\"choice\" class=\"text-xs\">This is the correct answer<\/label><\/div><\/div><div class=\"col-md-6 single-answer\"> <a href=\"\" class=\"delete-choice\" title=\"Delete Choice\"><i class=\" mdi mdi-delete\"><\/i><\/a> <label> Choice #<span class=\"indexing\">3<\/span><\/label> <input type=\"text\" class=\"form-control\" name=\"answer[]\" original-name=\"answer\" placeholder=\"Choice\" required><div class=\"correct-answer-box\"> <input type=\"checkbox\" class=\"hidden\" name=\"correct[]\" original-name=\"correct\" checked value=\"0\"> <input type=\"checkbox\" class=\"correct-answer\" id=\"choice\" name=\"correct[]\" original-name=\"correct\"  value=\"1\"> <label for=\"choice\" class=\"text-xs\">This is the correct answer<\/label><\/div><\/div><div class=\"col-md-6 single-answer\"> <a href=\"\" class=\"delete-choice\" title=\"Delete Choice\"><i class=\" mdi mdi-delete\"><\/i><\/a> <label> Choice #<span class=\"indexing\">4<\/span><\/label> <input type=\"text\" class=\"form-control\" name=\"answer[]\" original-name=\"answer\" placeholder=\"Choice\" required><div class=\"correct-answer-box\"> <input type=\"checkbox\" class=\"hidden\" name=\"correct[]\" original-name=\"correct\" checked value=\"0\"> <input type=\"checkbox\" class=\"correct-answer\" id=\"choice\" name=\"correct[]\" original-name=\"correct\"  value=\"1\"> <label for=\"choice\" class=\"text-xs\">This is the correct answer<\/label><\/div><\/div><\/div><div class=\"lecture-buttons-holder\"> <button class=\"btn btn-default btn-icon add-choice\" type=\"button\"><i class=\" mdi mdi-plus-circle-outline\"><\/i> Add another Choice<\/button><\/div><\/div><\/div><\/div>"
        }';
        return $json;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		//print_r($request->name);
				$user   = Auth::user();				
            $exam = Exam::create(['name' => $request->name,'description' => $request->description,'retakes' => $request->retakes,'course' => $request->course]);
			$examid=$exam->id;
	return response()->json(responder("success", "", "", "redirect('".url('/admin/exam',['examid'=>$examid])."', true)", false));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show($examid)
    {
       // echo $exam;
		$user   = Auth::user();
        $title = "Exam Builder";
        $exam = Exam::find($examid);
         if (empty($exam) ) {
				//return view("error/erorr404");
        //sdd('empty');
		} 
        $course = Course::where('id', $exam->course)->first();

        $questions = Question::where('exam',$exam->id)->get(); 
		
        foreach ($questions as $key => $question) {
			//dd($question->answers);
                //dd(array_combine(["new1","Test 1","hujjhu","dg"],["1","1","0","0"]));
            //  foreach (array_combine(json_decode($question->answers), json_decode($question->correct)) as $answer => $correct){
			//     $question->choices = (object) array("answer" => $answer, "correct" => $correct);
            // } 
            // foreach (json_decode($question->answers) as $answer){
            //         $question->choices = (object)$answer;
            //     } 
            //    foreach (json_decode($question->correct) as $correct){
            //         $question->correct=(object) $correct;
            //     } 
            }
       return view('admin.exam.exambuilder', compact("user", "course","exam","questions","title"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data['name']= $request->name;
        $data['description']=$request->description;
        $data['retakes']=$request->retakes;
        Exam::where('id',$request->examid)->update($data);
        return response()->json(responder("success", "Exam updated", "Exam successfully updated", false));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
    public function deletequestion(Request $req) {
        // $Q = Question::where("id", $req->itemId)->first();
        // $allQ = Question::where('exam',$Q->exam)->get();
        // foreach($allQ as $question)
        // {
        //     if($question->indexing > $Q->indexing)
        //     { 
        //     $index = $question->indexing - 1;
        //     Question::where("id", $question->id)->update(['indexing'=>$index]);
        //     }
        // }
        Question::where("id", $req->itemId)->delete();
      //  return response()->json(responder("success", "Questions Deleted", "Questions successfully Deleted", "reload()"));
        return true;
    }

     /**
     * Update online class content
     * 
     * @return Json
     */
    public function updatequestions(Request $request) {
       //dd($request);
        $user  = Auth::user();
        $questions = range(1, count($request->question));
        
      // print_r($_POST['correct'.$questionIndex]);die;
        foreach($questions as $index => $question){ 
            $questionIndex = $index + 1;
            $correctAnswer=array();
            foreach(array_combine($request->input('answer'.$questionIndex), $request->input('correct'.$questionIndex)) as $answer => $correct )
            {
                if($correct == 1){
                $correctAnswer[] = $answer;
                }
            }
            $data = array(
                'course' => $request->course,
                'exam' => $request->exam,
                'question' => $request->question[$index],
                'indexing' => $request->indexing[$index],
                'required' => $request->required[$index],
                'type' => $request->type[$index],
                'answers' => json_encode($request->input('answer'.$questionIndex)),
                'correct' => json_encode($correctAnswer)
            );
         
            if (!empty($request->questionid[$index])) {
                Question::where("id", $request->questionid[$index])->update($data);
            }else{
                Question::insert($data);
            }
        }
        return response()->json(responder("success", "Questions updated", "Questions successfully updated", "reload()"));
    }
    /**
     * publish exam
     * 
     * @return Json
     */
    public function publish(Request $request) {
        
        $exam = Exam::where("id", $request->examid)->first();
        if (empty($request->status)) {
            $status = "Unpublished";
        }else {
            $status = "Published";
        }
        $data = array(
            'status' => $status
        );
        Exam::where("id", $request->examid)->update($data);
        return response()->json(responder("success", "Alright", "Exam successfully updated"));
    }
    
}
