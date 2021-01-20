<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Coursepayment;
use App\Models\Coursecategory;
use App\Models\Coursesenrolled;
use App\Models\Coursechapter;
use App\Models\Lecture;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $courses = Course::where('status','Published');
        $categories = Coursecategory::orderBy('id','desc')->take(5)->get();
        foreach($categories as $category){
            $category->course =Course::where('coursecategory_id','=',$category->id)->get();
            
        }
        return view('courses', compact('user', 'courses','categories'));
    }

    public function index2()
    {   
        $courses = Course::latest()->paginate(8);
        $categories = Coursecategory::all();
        return view('courses_old', compact('courses','categories'));
    }

    public function get()
    {   $user = Auth::user();
        $categories = Coursecategory::all();
        $instructors= array();
        $courses = Course::where('status','Published')->latest()->paginate(8);
       // dd($courses);
        return view('course.index', compact('user', 'categories', 'instructors', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Course_categories =array();
        $countCourse_categories =array();
        $instructor =array();
        return view('course.create', compact('Course_categories','countCourse_categories','instructor'));
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
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $title="Single Course";        
        $course=Course::find($id);
        $chapters = Coursechapter::where('course',$course->id)->orderBy("indexing")->get();
        foreach($chapters as $chapter){
            $chapter->lectures= Lecture::where('chapter', $chapter->id)->orderBy("indexing")->get();
           
        }
        
        $related_courses=Course::where("coursecategory_id",$course->coursecategory_id)->where('id','!=',$id)->get();
		//dd($related_courses);
		if($user){
        $enrolledCourse = Coursesenrolled::where(['student'=>$user->id,"course"=>$id])->get();
		 return view('course.show',compact("course", "chapters", "title" , "user","enrolledCourse","related_courses"));
		}else{
				 return view('course.show',compact("course", "chapters", "title" , "user","related_courses"));

		}	
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
    public function search(Request $request) {
           $name=$request->get('name');
           $category=$request->get('category');

           $categories = Coursecategory::all();
         if($category != 0 && $name != ''){
            $courses = Course::where('name','like','%'.$name.'%')->orwhere('coursecategory_id','=', $category)->paginate(8);
             return view('courses_old', compact('courses','categories'));
         }
         elseif($category == 0 && $name != ''){
            $courses = Course::where('name','like','%'.$name.'%')->paginate(8);
             return view('courses_old', compact('courses','categories'));
         }
         elseif($category != 0 && $name == ''){
            $courses = Course::where('coursecategory_id','=', $category)->paginate(8);
             return view('courses_old', compact('courses','categories'));
         }
         else{
            $courses = Course::paginate(8);
              return view('courses_old', compact('courses','categories'));
         }     
    } 

    // public function mycourses_(){
    //     $user = Auth::user();
    //     if(!empty($user)){
    //         $userCourse = Coursesenrolled::where('student', $user->id)->get();
    //         $myCourses = [];
    //         foreach($userCourse as $courses){
    //             $eachCourse = Course::where('id', $courses->course)->latest()->paginate(1);
    //             if(!empty($eachCourse)){
    //                 $myCourses[] = $eachCourse;
    //             }
    //         }
    //         return view('mycourses', ['usercourse' => $userCourse, 'myCourses' => $myCourses, 'user' => $user]);
    //     }
    //     else{
    //         return redirect('/login');
    //     }    
    // }

    public function payments() {
    $title = 'Course Payments';
    $user = Auth::user();
    /* if(isset($_GET['type']) && $_GET['type'] == "masterclass"){
        if ($user->role == "admin" || $user->role == "subscriber") {
            $payments = Database::table('allaccesspayments')->where("subscriber", $user->id)->orderBy("id", false)->get();
        }else{
            $payments = Database::table('allaccesspayments')->where("user", $user->id)->orderBy("id", false)->get();
        }
        foreach($payments as $payment){
            $payment->user = Database::table('users')->where("id", $payment->user)->first();
        }
    }else{ */
        if ($user->role == "admin" || $user->role == "subscriber") {
            $payments = Coursepayment::all();
        }else{
            //$payments = c::table('coursepayments')->where("user", $user->id)->orderBy("id", false)->get();
        }
        foreach($payments as $payment){
            $payment->course = Course::find($payment->course);
            $payment->user = User::find($payment->user);
        } 
    //},compact("user", "title","payments")
    return view('coursepayments',compact("payments"));
    }

    public function enroll(Request $request)
    {   
        // dd($request); 
        $user = Auth::user();
        //$subscriber = Auth::subscriber($user);
        $enrollment_key = rand(111111,999999);
        $course = Course::where('id',$request->courseid)->first();
        $price = (float)$course->price; // + (float)env('GYFT_PRICE');
		$corseid=$request->courseid;
		Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $res=Stripe\Charge::create ([
                "amount" => $price* 100,
                "currency" => "inr",
                "source" => $request->token,
                "description" => "Test payment from hardiktech.com." 
        ]);
			$data = array(
            'student'=>$user->id,
            'enrollment_key'=>$enrollment_key,
            'course'=>$request->courseid
        ); 
		if($res->status=='succeeded'){
			$reference=121212;
					$dataTrans=array("subscriber"=>$user->id,"course"=>$request->courseid,"amount"=>$price,"status"=>"Success","user"=>$user->id,"reference"=>$res->created,"response"=>$res,"enrollment_key"=>$enrollment_key);
			Coursepayment::create($dataTrans);
         Coursesenrolled::create($data); 
         $response['courseid'] = $corseid;
         $response['res'] = $res;
         return \Response::json($response);
			// return response()->json(responder("success", "", "", "redirect('".url('/course',['id'=>$corseid])."', true)", false));
		 
		}else{
				return response()->json(responder("fialed", "", "", "redirect('".url('/course',['id'=>$corseid])."', true)", false));

		}
        
    }
    public function stripe(Request $request)
    {
		$token=$request->stripeToken;
        $price=555;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $res=Stripe\Charge::create ([
                "amount" => $price* 100,
                "currency" => "inr",
                "source" => $token,
                "description" => "Test payment from hardiktech.com." 
        ]);
        dd($res);
            return ;
    }
    public function stripeview()
    {
        return view('stripetest');
    }


    public function mycourses(){
        $user = Auth::user();
        if(!empty($user)){
            $userCourse = Coursesenrolled::join('courses', 'courses.id', '=', 'course')->where('student', $user->id)->paginate(4);
            return view('newmyCourses', ['usercourse' => $userCourse, 'user' => $user]);
        }
        else{
            return redirect('/login');
        }    
    }
    
    /**
     * check if user qualifies for certificate
     * 
     * @return Json
     */
    public function certificate(Request $request)
    {
        $user = Auth::user();
        $course = DB::table("courses")->where("id", $request->courseid)->first();
        $enrollment = DB::table("coursesenrolleds")->where("course", $request->courseid)->where("student", $user->id)->first();
        
        
        if ($enrollment->status == "Pending") {
            return response()->json(responder("warning", "Hmmm", "Please complete the course to get a certificate"));
        }else {
            $exams = DB::table("exams")->where(["course"=> $request->courseid, "status"=>'Published'])->count();
            $completedExams = DB::table("examsreports")->where("course", $request->courseid)->where("student", $user->id)->count();
            if($completedExams < $exams ){
                return response()->json(responder("warning", "Hmmm", "You've got some pending exams, Please take them to get a certificate"));
            }
        }
        return response()->json(responder("success", "", "", "redirect('".url('/course/viewcertificate/'.$enrollment->id)."', true)", false));
    }
    /**
     * View certificate
     * 
     * @return Json
     */
    public function viewcertificate($enrollmentid) {
        
        $user = Auth::user();
        $enrollment = DB::table("coursesenrolleds")->where("id", $enrollmentid)->where("student", $user->id)->first();
        if (empty($enrollment) || $enrollment->status == "Pending") {
            return view("error/erorr404");
        }
        $course = DB::table("courses")->where("id", $enrollment->course)->first();

        $title = "Certificate for ".$course->name;
        return view('certificate', compact("user","title","enrollment","course"));
    }
    public function genratecertificate($enrollmentid)
    {
        $user = Auth::user();
        $enrollment = DB::table("coursesenrolleds")->where("id", $enrollmentid)->where("student", $user->id)->first();
        if (empty($enrollment) || $enrollment->status == "Pending") {
            return view("error/erorr404");
        }
        $course = DB::table("courses")->where("id", $enrollment->course)->first();

        $title = "Certificate for ".$course->name;
        $pdf = PDF::loadView('ajax.certificate_pdf',compact("user","title","enrollment","course"));
        return $pdf->download('certificate.pdf'); 
    }
	 /*   public function stripecharge($source, $amount, $description) {
        
        $subscriber = Auth::subscriber(Auth::user());
       // print_r($subscriber);die;
        if(!empty($subscriber->stripe_publishable_key) && !empty($subscriber->stripe_publishable_key)){
            \Stripe\Stripe::setApiKey($subscriber->stripe_secret_key);
        }else{
            \Stripe\Stripe::setApiKey(env("STRIPE_SECRET_KEY"));
        }
        try{
            $customer = \Stripe\Customer::create(array(
                'name' => $subscriber->fname.''.$subscriber->lname,
                'description' => 'test description',
                'email' => $subscriber->email,
                'source' => $token,
                "address" => ["city" => $subscriber->email, "country" => 'US', "line1" => $subscriber->address, "line2" => '', "postal_code" => $subscriber->zip, "state" => $subscriber->state]
            ));
            $card = \Stripe\Customer::createSource(
                $customer->id,
                ['source' => 'tok_visa']
              );
            $charge = \Stripe\Charge::create([
              "amount" => $amount * 100,
              'customer' => $customer->id, 
              "currency" => "usd",
              "description" => $description
            ]);
            
        }catch(\Exception $e){
            return response()->json(responder("error", "Hmmm!", $e->getMessage()));
        }
        
        return $charge; 
    }*/

    
    
}
