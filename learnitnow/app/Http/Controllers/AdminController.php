<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Exam;

use App\Models\State;
use App\Models\Course;
use App\Models\Coursecategory;
use App\Models\Coursesenrolled;
use App\Models\Coursechapter;
use App\Models\Lecture;
use App\Models\Instructor;
use App\Models\StudentLectureStatus;
use App\Models\Coursepayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $categories = Coursecategory::all();
        $instructors= Instructor::all();
        $courses = Course::latest()->get();
       // dd($courses);
       foreach ($courses as $course) {
        $course->students = DB::table('coursesenrolleds')->where('course', $course->id)->count();
        $course->chapters = DB::table('coursechapters')->where('course', $course->id)->count();
        $course->exams = DB::table('exams')->where('course', $course->id)->where('status', "Published")->count();
        
    }
    $total_student = 0;//$course->students;
    $get_all_enrolled_courses = Coursepayment::all();
    $total_incme = 0;
    foreach($get_all_enrolled_courses as $get_total_paid){
        //$total_incoem = Coursesenrolled::where("course", $get_total_paid->course)->first();
        $total_incme += $get_total_paid->amount;
    } 
    
       $total_courses_both = count($courses);
        return view('course.index', compact('user', 'categories', 'instructors', 'courses',"total_courses_both","total_student","total_incme"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function updatecontent(Request $request) { 
      // dd($request);
        $user  = Auth::user();
        
        $chapters = range(1, count($request->input('chaptertitle')));
      
         foreach($chapters as $index => $chapter){
           
            // save / update chapter details
            $data = array(
                'course' => $request->input('course'),
                'title' => $request->input('chaptertitle')[$index],
                'indexing' => $request->input('indexing')[$index],
                'description' => $request->input('description')[$index]
            );
           
             if (!empty($request->input('chapterid')[$index])) {

               $dataupdate= Coursechapter::where('id',$request->input('chapterid')[$index])->update($data);
                
                $chapterId =  $request->input('chapterid')[$index];
            }else{
                 $datainsert= Coursechapter::insert($data);
                 $chapterId  = DB::getPdo()->lastInsertId();
                 
            }
            $chapterIndex = $index + 1;
            if (!empty($request->input('title'.$chapterIndex))) {
                $lectureCount = range(1, count($request->input('title'.$chapterIndex)));
                foreach($lectureCount as $key => $singleLecture){
                    $content= '';
                    $type = $request->input('type'.$chapterIndex)[$key];
                    if( $type == 'video' && preg_match('#((https?|ftp)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i', $request->input('content'.$chapterIndex)[$key])){
                        $type = 'videolink';
                    }
                    if ($type == "link" || $type == "text" || $type == "videolink") {
                        $content = $request->input('content'.$chapterIndex)[$key];
                    }else{
                        if (isset($request->file('content'.$chapterIndex)[$key])){
                            //dd($request->file('content'.$chapterIndex)[$key]);  
                            $file = $request->file('content'.$chapterIndex)[$key];
                            $extension = $file->getClientOriginalExtension();
                            $content = Str::random(32).".".$extension;
                            // $video = $file->storeAs('course', $content);
                            $file->move(public_path().'/uploads/course', $content);
                        }
                    }
                    $lecture = array(
                        'type' => $type,
                        'chapter' => $chapterId,
                        'course' => $request->input('course'),
                        'title' => $request->input('title'.$chapterIndex)[$key],
                        'indexing' => $request->input('lectureindexing'.$chapterIndex)[$key],
                        'description' => $request->input('description'.$chapterIndex)[$key],
                        'content' => $content
                    );
                    //dd($lecture); 
                    if ($request->input('lectureid'.$chapterIndex)[$key] != '0') {
                        unset($lecture['chapter']);
                        if ($type == "pdf" || $type == "downloads") {
                            unset($lecture['content']);
                        }
                        if ($type == "video" && $lecture['content'] == ''){
                            unset($lecture['content']);
                        } 
                        // if($type == "video" && $lecture['content'] != ''){ 
                        //     $oldvideo =  DB::table('lectures')->where("id", $request->input('lectureid'.$chapterIndex))->first('content');
                        //     if ($oldvideo != '') {
                        //         foreach($oldvideo as $video){
                        //         // File::delete($video['content'], "lectures");
                        //         }
                        //     }
                        // } 
                        
                        DB::table('lectures')->where("id", $request->input('lectureid'.$chapterIndex)[$key])->update($lecture);
                    }else{
                        
                        DB::table('lectures')->insert($lecture);
                    }

                }
            }

        }
       
        return response()->json(responder("success", "Content updated", "Content successfully updated", "reload()"));
    }

    public function courseDeletecontent(Request $req)
    {
        //$delete= Lecture::where('chapter','=',$req->itemId)->delete();
        
        if ($req->itemType == "lecture") {
            $lecture = Lecture::where("id", $req->itemId)->first();
            self::deleteUploads($lecture);
            Lecture::where("id", $req->itemId)->delete();

        }else{
            $chapter = Coursechapter::where('id','=',$req->itemId)->get();
            $lectures = Lecture::where('chapter', $req->itemId)->get();
           
                foreach ($lectures as $lecture) {
                    self::deleteUploads($lecture);
                   Lecture::where("id", $lecture->id)->delete();
                }
            $delete= Coursechapter::where('id','=',$req->itemId)->delete();
        }    
    }

        /**
     * Delete online class uploaded content
     * 
     * @return boolean
     */
    public function deleteUploads($lecture) {
        if ($lecture->type == "pdf" || $lecture->type == "downloads" || $lecture->type == "video") {
            //File::delete($lecture->content, "lectures");
        }
        
        return true;
    }

    public function create()
    {
        
       }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //  dd($request);
        $pennfosterStatus = 0;
        if (isset($_POST['pennfoster'])) {
            if ($_POST['pennfoster'] == 1) {
                $pennfosterStatus = 1;
            }
        }
        $authoritylabel = 0;
        if (isset($_POST['authoritylabel'])) {
            if ($_POST['authoritylabel'] == 1) {
                $authoritylabel = 1;
            }
        }
      
        $image = $request->image;
        //$user = Auth::user();
         //dd($request->all());die();
        if (!empty($request->image)) {
           
                $base64_encode = $request->image;
                $folderPath = public_path()."/uploads/course/images/";
                $image_parts = explode(";base64,", $base64_encode);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $image = "course" . uniqid() . '.' . $image_type;                
                $file = $folderPath . $image;
                file_put_contents($file, $image_base64);
                
            } 

        
        $Course = new Course();
        $Course['name'] = $request->name;
        $Course['image'] = $image;
        $Course['instructor'] = $request->instructor;
        $Course['price'] = $request->price;
        $Course['sale_price'] = $request->sale_price;
        $Course['certification'] = $request->certification;
        $Course['boardcertified'] = $request->boardcertified;
        $Course['degree'] = $request->degree;
        $Course['specialization'] = $request->specialization;
        $Course['description'] = $request->description;
        $Course['duration'] = $request->duration;
        $Course['period'] = $request->period;
        $Course['coursecategory_id'] = $request->category;
        $Course['status'] = $request->status;
        $Course['pennfoster'] = $pennfosterStatus;
        $Course['viewtype'] = $request->viewtype;
        $Course['type'] = $request->type;
        $Course['videotype'] = $request->videotype;
        $Course['youtubelink']  = $request->youtubelink;
        $Course['aboutvideo']  = $request->aboutvideo;
        $Course['authoritylabel'] = $authoritylabel;
        if ($request->videotype == 'video') {
            if (!empty($request->hasFile('videofile'))) {
                // $fileNameToStore = time() . '.' . $request->videofile->getClientOriginalExtension();
                // $video = $request->file('videofile')->storeAs('Course', Str::random(20) . $fileNameToStore);
               

                $file = $request->file('videofile');
                $extension = $file->getClientOriginalExtension();
                $video = "coursevideo" . uniqid() .".".$extension;
                // $video = $file->storeAs('course', $content);
                $file->move(public_path().'/uploads/course/course/', $video);
                $Course['video'] = $video;
            }
        } else {
            $Course['youtubelink'] = $request->youtubelink;
        }
        

        
        $Course->save();
        $courseId =DB::getPdo()->lastInsertId();
        if($courseId){
        return response()->json(responder("success", "Course Added", "Course successfully added", "redirect('".url('/admin/course/show/'.$courseId)."', true)"));
        }else{
            return response()->json(responder("error", "Error!", "Something went wrong!"));

          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    //public function show(Course $course)
    public function show($id)
    {$course = Course::find($id);
        $exams = Exam::where('course', '=', $id)->paginate(5);
        
        foreach ($exams as $key => $exam) {
            $Questions = DB::table('questions')->where('exam', '=', $exam->id)->get();
            $studentCount = DB::table('examsreports')->where('exam', '=', $exam->id)->get();
            $exam->questions = count($Questions);
            $exam->students = count($studentCount);
        }
        $Chapters =  Coursechapter::where('course', '=', $id)->get();
        foreach ($Chapters as $chapter) {
            $chapter->lectures = Lecture::where('chapter',$chapter->id)->orderBy("indexing")->get();
        }

        $students = DB::table('coursesenrolleds')->leftJoin("users", "users.id", 'coursesenrolleds.student')->where('coursesenrolleds.course', $course->id)->addSelect("users.avatar", "users.name", "users.lname", "users.role", "users.id", "coursesenrolleds.student", "coursesenrolleds.created_at", "coursesenrolleds.completed_on")->get();
       
        foreach($students as $student){
            $student->totallectures = lecture::where('course',$course->id)->count();
            $student->completedlectures = StudentLectureStatus::where('course_id',$course->id)->where('user_id',$student->student)->count();
        }
        return view('course.chapters.view', compact('Chapters', 'course', 'exams', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    { 
        
        $categories = Coursecategory::all();
        $instructors= Instructor::all();
        $course = Course::where('id','=',$req->courseid)->first();  
        // dd(view('ajax.updatecourse',compact('course','categories','instructors')));
        return view('ajax.updatecourse',compact('course','categories','instructors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
          $course = Course::where("id", $request->courseid)->first();
           if (!empty($request->file('image'))) {
            //    $upload = File::upload($request->file('image'), "courses", array(
            //        "source" => "base64",
            //        "extension" => "png"
            //    ));
            //    if ($upload['status'] == "success") {
            //        if (!empty($course->image)) {
            //            File::delete($course->image, "courses");
            //        }
            //        Course::where("id",'=', $request->courseid)->update(["image" => $image]);
            //    } 
           }
           if (!empty($request->image)) {
            $base64_encode = $request->image;
            $folderPath = public_path()."/uploads/course/images/";
            $image_parts = explode(";base64,", $base64_encode);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $image = "course" . uniqid() . '.' . $image_type;                
            $file = $folderPath . $image;
            file_put_contents($file, $image_base64);
            Course::where("id",'=', $request->courseid)->update(["image" => $image]);
        } 

           $pennfosterStatus = 0;
           if($request->pennfoster){
            $pennfosterStatus = $request->pennfoster;
               if($request->pennfoster == 1){
                   $pennfosterStatus = 1;
               }
           }
           
           $authoritylabel = 0;
           if($request->authoritylabel){
               if($request->authoritylabel == 1){
                   $authoritylabel = 1;
               }
           }
           $boardcertified = 0;
           if($request->boardcertified){
           $boardcertified = $request->boardcertified;
           }
           $instructor = 0;
           if($request->instructor){
           $instructor = $request->instructor;
           }
           $sale_price = 0;
            if($request->sale_price){
            $sale_price = $request->sale_price;
        }

           $data = array(
               'name' => $request->name,
               'price' => $request->price,
               'sale_price' => $sale_price,
               'certification' => $request->certification,
               'boardcertified' => $boardcertified,
               'degree' => $request->degree,
               'specialization' => $request->specialization,
               'duration' => $request->duration,
               'period' => $request->period,
               'description' => $request->description,
               'coursecategory_id' => $request->category,
               'status' => $request->status,
               'instructor'=>$instructor,
               'videotype' => $request->videotype,
               'aboutvideo'  => $request->aboutvideo,
               'pennfoster' => $pennfosterStatus,
               'authoritylabel' => $authoritylabel
           );
           if ($request->videotype == 'video') {
            if (!empty($request->hasFile('videofile'))) {
                $file = $request->file('videofile');
                $extension = $file->getClientOriginalExtension();
                $video = "coursevideo" . uniqid() .".".$extension;
                // $video = $file->storeAs('course', $content);
                $file->move(public_path().'/uploads/course/course/', $video);
                $data['video'] = $video;
            }
        } else {
            $data['youtubelink'] = $request->youtubelink;
        }
           Course::where("id",'=', $request->courseid)->update($data);
           return response()->json(responder("success", "Alright", "Course successfully updated", "reload()"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    { 
        $course = Course::where('id','=',$req->courseid)->delete();
        return response()->json(responder("success", "Course Deleted", "Course successfully deleted", "redirect('" . url("course") . "')"));
     
    }

    public function courseCurriculum($id)
    { 
        $user=Auth::user();
        $Course = Course::find($id);
        $chapters = Coursechapter::where('course', '=', $Course->id)->orderBy('indexing', 'ASC')->get();
       // dd($chapters);
         foreach ($chapters as $chapter) {
            $chapter->lectures = Lecture::where('chapter', '=', $chapter->id)->orderBy('indexing', 'ASC')->get();
         }
        // echo"<pre>";print_r($chapters);die('hi');
        return view('course.curriculum.curriculum2', compact('user','chapters', 'Course'));
   
    }
    public function courseCurriculumstore(Request $request)
    {
        //dd($request);
        $post = $request->all();
        // echo"<pre>";print_r($post);   die();
        $course = $post['Course'];
        $chapters = array();
        $lectures = array();
        if (isset($post['chapterid'])) {
            for ($i = 0; $i < count($post['chapterid']); $i++) {
                $chapters[$i] = array('id' => $post['chapterid'][$i], 'indexing' => $post['indexing'][$i], 'title' => $post['chaptertitle'][$i], 'description' => $post['chapterdescription'][$i]);
            }
        }
        if (isset($post['lectureid'])) {
            for ($i = 0; $i < count($post['lectureid']); $i++) {
                $lectures[$i] = array('id' => $post['chapterid'][$i], 'indexing' => $post['lectureindexing'][$i], 'title' => $post['lecturetitle'][$i], 'description' => $post['lecturedescription'][$i], 'type' => $post['type'][$i], 'content' => $post['content'][$i]);
            }
        }

        //dd($chapters);
        foreach ($chapters as $key => $chapter) {
            
            $saveChapter = Coursechapter::find($chapter['id']);
            // echo"<pre>";print_r($saveChapter);
            $saveChapter->update($chapter);
        }
        foreach ($lectures as $key => $lecture) {
            $saveLecture = Lecture::find($lecture['id']);
            // echo"<pre>";print_r($saveLecture);
            $saveLecture->update($lecture);
        }

        return back()->with('success', __('Curriculum Updated successfully.'));
   
    }
    public function courseCurriculumcreate(Request $request)
    {
        
        $maxIndex = DB::select('select MAX(indexing) as indexing from coursechapters where course = ' . $request->course_id);
        // echo"<pre>";print_r($maxIndex);die();
        if ($maxIndex[0]->indexing > 0) {
            $indexing = $maxIndex[0]->indexing + 1;
        } else {
            $indexing = 1;
        }

        $CourseChapter = new Coursechapter();
        $CourseChapter['course'] = $request->course_id;
        $CourseChapter['title'] = $request->title;
        $CourseChapter['description'] = $request->description;
        $CourseChapter['indexing'] = $indexing;
        //dd($CourseChapter);
        $CourseChapter->save();
        if ($CourseChapter) {
            return back()->with('success', __('Curriculum Saved successfully.'));
        } else {
            return back()->with('error', __('OopsError.'));
        }
    }
    public function courseChapterdelete($id)
    {
        Coursechapter::where('id','=',$id)->delete();
        return back()->with('success','Chapter Deleted Successfuly');
    }
    public function sections() {
      $json = '{
            "chapter": "<div class=\"panel panel-default chapter newly\"> <div class=\"panel-heading\"> <div class=\"chapter-drag\"><i class=\"mdi mdi-drag\"><\/i><\/div><a href=\"\" class=\"btn btn-default btn-sm pull-right manage-class delete-item\" data-type=\"chapter\" title=\"Delete chapter\"><i class=\" mdi mdi-delete\"><\/i><\/a> <h4 class=\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#chapter1\"> <span class=\"indexing\">1.)<\/span>  <span class=\"panel-label\">New Chapter<\/span> <\/a> <\/h4> <\/div><div id=\"chapter1\" class=\"panel-collapse collapse chapter-body in\"> <div class=\"panel-body\"> <div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Chapter Title<\/label> <input type=\"text\" class=\"form-control chapter-title\" name=\"chaptertitle[]\" placeholder=\"Chapter Title\" required><input type=\"hidden\" class=\"chapter-indexing\" name=\"indexing[]\"> <input type=\"hidden\" name=\"chapterid[]\" value=\"0\"> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Chapter Description<\/label> <textarea class=\"form-control\" name=\"description[]\" placeholder=\"Chapter Description\" rows=\"3\" required><\/textarea> <\/div><\/div><\/div><div class=\"divider\"><\/div><p>Below are lectures of this chapter<\/p><div class=\"chapter-lecture-holder\"> <div class=\"empty-section\"> <i class=\"mdi mdi-clipboard-text\"><\/i> <h5>No lectures here, add a new one below!<\/h5> <\/div><\/div><div class=\"lecture-buttons-holder\"> <p class=\"text-thin text-muted mb-5\">Add another lecture<\/p><div class=\"btn-group btn-group-justified\"> <a href=\"\" class=\"btn btn-default add-lecture\" data-type=\"video\"><i class=\" mdi mdi-play-circle\"><\/i> Video<\/a> <a href=\"\" class=\"btn btn-default add-lecture\" data-type=\"downloads\"><i class=\" mdi mdi-cloud-download\"><\/i> Downloads<\/a> <a href=\"\" class=\"btn btn-default add-lecture\" data-type=\"link\"><i class=\" mdi mdi-link-variant\"><\/i> Link<\/a> <a href=\"\" class=\"btn btn-default add-lecture\" data-type=\"pdf\"><i class=\" mdi mdi-file-pdf-box\"><\/i> PDF<\/a> <a href=\"\" class=\"btn btn-default add-lecture\" data-type=\"text\"><i class=\" mdi mdi-note-text\"><\/i> Text<\/a><\/div><\/div><\/div><\/div><\/div>",
            "lecture": {
                "link": "<div class=\"panel panel-default lecture newly\"> <div class=\"panel-heading\"> <div class=\"chapter-drag\"><i class=\"mdi mdi-drag\"><\/i><\/div><a href=\"\" class=\"btn btn-default btn-sm pull-right manage-class delete-item\" data-type=\"lecture\" title=\"Delete Lecture\"><i class=\" mdi mdi-delete\"><\/i><\/a> <h4 class=\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#lecture-accordion\" href=\"#lecture1\"> <div class=\"lecture-type\"><i class=\" mdi mdi-link-variant\"><\/i> <\/div><span class=\"indexing\">1.)<\/span>   <span class=\"panel-label\">New Lecture<\/span><\/a> <\/h4> <\/div><div id=\"lecture1\" class=\"panel-collapse collapse lecture-body in\"> <div class=\"panel-body\"> <div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Title<\/label> <input type=\"text\" class=\"form-control chapter-title\" name=\"title[]\" original-name=\"title\" placeholder=\"Lecture Title\" required><input type=\"hidden\" class=\"lecture-indexing\" name=\"lectureindexing[]\" original-name=\"lectureindexing\"> <input type=\"hidden\" name=\"lectureid[]\" original-name=\"lectureid\" value=\"0\"> <input type=\"hidden\" name=\"type[]\" original-name=\"type\" value=\"link\"><input type=\"file\" name=\"content[]\" value=\"z:\/null.null\" class=\"hidden\" original-name=\"content\"> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Description<\/label> <textarea class=\"form-control\" name=\"description[]\" original-name=\"description\" placeholder=\"Lecture Description\" rows=\"3\" required><\/textarea> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Enter link\/URL<\/label> <input type=\"url\" class=\"form-control\" name=\"content[]\" original-name=\"content\" placeholder=\"Enter link\/URL\" required> <\/div><\/div><\/div><\/div><\/div><\/div>",
                "text": "<div class=\"panel panel-default lecture newly\"> <div class=\"panel-heading\"> <div class=\"chapter-drag\"><i class=\"mdi mdi-drag\"><\/i><\/div><a href=\"\" class=\"btn btn-default btn-sm pull-right manage-class delete-item\" data-type=\"lecture\" title=\"Delete Lecture\"><i class=\" mdi mdi-delete\"><\/i><\/a> <h4 class=\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#lecture-accordion\" href=\"#lecture2\"> <div class=\"lecture-type\"><i class=\" mdi mdi-note-text\"><\/i> <\/div><span class=\"indexing\">1.)<\/span>   <span class=\"panel-label\">New Lecture<\/span><\/a> <\/h4> <\/div><div id=\"lecture2\" class=\"panel-collapse collapse lecture-body in\"> <div class=\"panel-body\"> <div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Title<\/label> <input type=\"text\" class=\"form-control chapter-title\" name=\"title[]\" original-name=\"title\" placeholder=\"Lecture Title\" required><input type=\"hidden\" class=\"lecture-indexing\" name=\"lectureindexing[]\" original-name=\"lectureindexing\"> <input type=\"hidden\" name=\"lectureid[]\" original-name=\"lectureid\" value=\"0\"> <input type=\"hidden\" name=\"type[]\" original-name=\"type\" value=\"text\"><input type=\"file\" name=\"content[]\" class=\"hidden\" value=\"z:\/null.null\" original-name=\"content\">  <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Description<\/label> <textarea class=\"form-control\" name=\"description[]\" original-name=\"description\" placeholder=\"Lecture Description\" rows=\"3\" required><\/textarea> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Text body<\/label> <textarea class=\"form-control\" name=\"content[]\" original-name=\"content\" placeholder=\"Lecture Description\" rows=\"6\" required><\/textarea> <\/div><\/div><\/div><\/div><\/div><\/div>",
                "downloads": "<div class=\"panel panel-default lecture newly\"> <div class=\"panel-heading\"> <div class=\"chapter-drag\"><i class=\"mdi mdi-drag\"><\/i><\/div><a href=\"\" class=\"btn btn-default btn-sm pull-right manage-class delete-item\" data-type=\"lecture\" title=\"Delete Lecture\"><i class=\" mdi mdi-delete\"><\/i><\/a> <h4 class=\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#lecture-accordion\" href=\"#lecture4\"> <div class=\"lecture-type\"><i class=\" mdi mdi-cloud-download\"><\/i> <\/div><span class=\"indexing\">1.)<\/span>   <span class=\"panel-label\">New Lecture<\/span><\/a> <\/h4> <\/div><div id=\"lecture4\" class=\"panel-collapse collapse lecture-body in\"> <div class=\"panel-body\"> <div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Title<\/label> <input type=\"text\" class=\"form-control chapter-title\" name=\"title[]\" original-name=\"title\" placeholder=\"Lecture Title\" required><input type=\"hidden\" class=\"lecture-indexing\" name=\"lectureindexing[]\" original-name=\"lectureindexing\"> <input type=\"hidden\" name=\"lectureid[]\" original-name=\"lectureid\" value=\"0\"> <input type=\"hidden\" name=\"type[]\" original-name=\"type\" value=\"downloads\"><input type=\"hidden\" name=\"content[]\" value=\"null\" original-name=\"content\">  <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Description<\/label> <textarea class=\"form-control\" name=\"description[]\" original-name=\"description\" placeholder=\"Lecture Description\" rows=\"3\" required><\/textarea> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Upload resource to download<\/label> <input type=\"file\" class=\"dropify\" name=\"content[]\" original-name=\"content\" placeholder=\"Upload resource to download\" data-allowed-file-extensions=\"pdf png doc docx jpg\" required> <span class=\"text-xs\">Only <strong>pdf, png, doc, docx & jpg<\/strong> extensions allowed <\/span> <\/div><\/div><\/div><\/div><\/div><\/div>",
                "pdf": "<div class=\"panel panel-default lecture newly\"> <div class=\"panel-heading\"> <div class=\"chapter-drag\"><i class=\"mdi mdi-drag\"><\/i><\/div><a href=\"\" class=\"btn btn-default btn-sm pull-right manage-class delete-item\" data-type=\"lecture\" title=\"Delete Lecture\"><i class=\" mdi mdi-delete\"><\/i><\/a> <h4 class=\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#lecture-accordion\" href=\"#lecture3\"> <div class=\"lecture-type\"><i class=\" mdi mdi-file-pdf-box\"><\/i> <\/div><span class=\"indexing\">1.)<\/span>   <span class=\"panel-label\">New Lecture<\/span><\/a> <\/h4> <\/div><div id=\"lecture3\" class=\"panel-collapse collapse lecture-body in\"> <div class=\"panel-body\"> <div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Title<\/label> <input type=\"text\" class=\"form-control chapter-title\" name=\"title[]\" original-name=\"title\" placeholder=\"Lecture Title\" required> <input type=\"hidden\" class=\"lecture-indexing\" name=\"lectureindexing[]\" original-name=\"lectureindexing\"> <input type=\"hidden\" name=\"lectureid[]\" original-name=\"lectureid\" value=\"0\"> <input type=\"hidden\" name=\"type[]\" original-name=\"type\" value=\"pdf\"><input type=\"hidden\" name=\"content[]\" original-name=\"content\" value=\"null\"> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Description<\/label> <textarea class=\"form-control\" name=\"description[]\" original-name=\"description\" placeholder=\"Lecture Description\" rows=\"3\" required><\/textarea> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Upload PDF<\/label> <input type=\"file\" class=\"dropify\" name=\"content[]\" original-name=\"content\" data-allowed-file-extensions=\"pdf\" accept=\"application\/pdf\" placeholder=\"Upload PDF\" required>  <span class=\"text-xs\">Only <strong>pdf<\/strong> extensions allowed <\/span> <\/div><\/div><\/div><\/div><\/div><\/div>",
                "video": "<div class=\"panel panel-default lecture newly\"> <div class=\"panel-heading\"> <div class=\"chapter-drag\"><i class=\"mdi mdi-drag\"><\/i><\/div><a href=\"\" class=\"btn btn-default btn-sm pull-right manage-class delete-item\" data-type=\"lecture\" title=\"Delete Lecture\"><i class=\" mdi mdi-delete\"><\/i><\/a> <h4 class=\"panel-title\"> <a data-toggle=\"collapse\" data-parent=\"#lecture-accordion\" href=\"#lecture5\"> <div class=\"lecture-type\"><i class=\" mdi mdi-play-circle\"><\/i> <\/div><span class=\"indexing\">1.)<\/span>   <span class=\"panel-label\">New Lecture<\/span><\/a> <\/h4> <\/div><div id=\"lecture5\" class=\"panel-collapse collapse lecture-body in\"> <div class=\"panel-body\"> <div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Title<\/label> <input type=\"text\" class=\"form-control chapter-title\" name=\"title[]\" original-name=\"title\" placeholder=\"Lecture Title\" required><input type=\"hidden\" class=\"lecture-indexing\" name=\"lectureindexing[]\" original-name=\"lectureindexing\"> <input type=\"hidden\" name=\"lectureid[]\" original-name=\"lectureid\" value=\"0\"> <input type=\"hidden\" name=\"type[]\" original-name=\"type\" value=\"video\"> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Lecture Description<\/label> <textarea class=\"form-control\" name=\"description[]\" original-name=\"description\" placeholder=\"Lecture Description\" rows=\"3\" required><\/textarea> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Enter Video link\/URL<\/label> <input type=\"url\" pattern=\"https?://.+\" class=\"form-control video-link\" name=\"content[]\" original-name=\"content\" placeholder=\"Enter link\/URL\"> <\/div><\/div><\/div><div class=\"form-group\"> <div class=\"row\"> <div class=\"col-md-12\"> <label>Upload Video<\/label> <input type=\"file\" class=\"dropify\" name=\"content[]\" original-name=\"content\" placeholder=\"Upload Video\" data-allowed-file-extensions=\"mp4\" accept=\"video\/*\" required> <span class=\"text-xs\">Only <strong>mp4<\/strong> extensions allowed <\/span>  <\/div><\/div><\/div><\/div><\/div><\/div>"   
            }
        }';
        
        return $json;
    }
    public function profile()
    { 
		$user=Auth::user();
		$user = User::where('id', $user->id)->first();
        $states = State::all();
        return view('admin.setting',compact("user","states"));
    }
    public function profileUpdate(Request $request){
        $user = Auth::user();
        if (!empty($request->avatar)) {
            $base64_encode = $request->avatar;
            $folderPath = public_path()."/uploads/avatar/";
            $image_parts = explode(";base64,", $base64_encode);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $image = "avatar" . uniqid() . '.' . $image_type;                
            $file = $folderPath . $image;
            file_put_contents($file, $image_base64);
            $user->avatar = $image;
        }
        // echo $filename;
        // die('Endherer');
        $user->name = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = '+'.$request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->save();
        return response()->json(responder("success", "Profile Updates", "Profile updates successfully"));
        
    }
    public function passwordUpdate(Request $request){
         $user = Auth::user();  
         if (Hash::check($request->current, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(responder("success", "Alright", "Password successfully updated", "reload()"));
        } else {
            return response()->json(responder("error", "Oops", "You have entered an incorrect password."));
        }
        // $2y$10$cLXCr7FadmwGAypbKakn4ORrcnw8InZDlTJx/Ya4IPF3lVx7arXWG
    }

    public function payments()
    {
        $title = 'Course Payments';
        $user = Auth::user();
            $payments = Coursepayment::all();
            
            foreach($payments as $payment){
                $payment->course = Course::where("id", $payment->course)->first(); 
                $payment->user = User::where("id", $payment->user)->first();
                
            }
            
        return view('course/coursepayment',compact("user", "title","payments")); 
    }
}
