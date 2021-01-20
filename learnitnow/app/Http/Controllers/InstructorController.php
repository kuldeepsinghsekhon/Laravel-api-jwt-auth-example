<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Auth;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Instructor";
        $user = Auth::user();
        $viewpage = Instructor::all();
        return view('admin.instructor.index', compact("title", "user","viewpage"));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $user = Auth::user();
        
          //$file = $request->file('image');
		  
		  $data=$request->image;
		 // $fileName = Str::random(32).".jpg";
         $image = 'avatar.png';
		if (!empty($request->image)) {

			$base64_encode = $request->image;
			$folderPath = public_path()."/uploads/instructor/";
			$image_parts = explode(";base64,", $base64_encode);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);
			$image = "instructor" . uniqid() . '.' . $image_type;
			$file = $folderPath . $image;
			file_put_contents($file, $image_base64);  
	}
        
        //if(!empty($_POST)){
            $insertdata = array(
            'user_id'=>$user->id, 
            'image'=>$image, 
            'name'=>$request->name,
            'title'=>$request->title,
            'email'=>$request->email,
            'city'=>$request->city,
            'state'=>$request->state
            );
            Instructor::create($insertdata);
            return response()->json(responder("success", "Instructor Added", "Instructor successfully Inserted", "reload()"));
        //}        
      
    }
    public function dataview(Request $request)
    {
       $datapage =  Instructor::where('id',$request->id)->first();
       return view('ajax.instructorupdate', compact("datapage"));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
	public function intructorupdate(Request $request){
        
        if (!empty($request->image)) {
			$base64_encode = $request->image;
			$folderPath = public_path()."/uploads/instructor/";
			$image_parts = explode(";base64,", $base64_encode);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);
			$image = "instructor" . uniqid() . '.' . $image_type;
			$file = $folderPath . $image;
            file_put_contents($file, $image_base64); 
            Instructor::where('id',$request->id)->update(['image' => $image]); 
	} 
        
    $update = array(
            'name'=>$request->name,
            'title'=>$request->title,
            'email'=>$request->email,
            'city'=>$request->city,
            'state'=>$request->state
            );
        
        Instructor::where('id',$request->id)->update($update);
        return response()->json(responder("success", "Alright", "Instructor successfully Updated", "reload()"));
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $course = Course::where('instructor',$req->id)->count();
        if($course > 0){
            return response()->json(responder("error", "Oops", "This Instructor has ($course) courses. It can not be deleted.!"));
        }
        Instructor::where('id','=',$req->id)->delete();
        return response()->json(responder("success", "Instructor Deleted", "Instructor successfully deleted", "reload()"));
    }
}
