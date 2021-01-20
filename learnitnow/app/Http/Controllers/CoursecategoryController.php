<?php

namespace App\Http\Controllers;

use App\Models\Coursecategory;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CoursecategoryController extends Controller
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
        // $categories = DB::table('coursecategories')->join('courses', 'coursecategories.id', '=', 'courses.category')->get();
        foreach($categories as $category){
            $category->courses = Course::where("coursecategory_id", $category->id)->count();
        }
        return view('course.category.index', compact('categories', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Coursecategory;
        $slug = Self::slugify($request->input('name'));
        $count = Coursecategory::where('slug', '=',$slug)->count();
        if($count > 0){
            $slug .= '-'.$count;
        }
        if (!empty($request->image)) {
            $base64_encode = $request->image;
            $folderPath = public_path()."/uploads/category/";
            $image_parts = explode(";base64,", $base64_encode);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $image = "category" . uniqid() . '.' . $image_type;                
            $file = $folderPath . $image;
            file_put_contents($file, $image_base64);
        } 
        if (!empty($request->thumbnail)) {
            $base64_encode = $request->thumbnail;
            $folderPath = public_path()."/uploads/category/thumbnail/";
            $image_parts = explode(";base64,", $base64_encode);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $thumbnail = "thumbnail" . uniqid() . '.' . $image_type;                
            $file = $folderPath . $thumbnail;
            file_put_contents($file, $image_base64);
        } 
        $data['name'] = $request->input('name');
        $data['image'] = $image;
        $data['thumbnail'] = $thumbnail;
        $data['slug'] = $slug;
        
        $data->save();
        return response()->json(responder("success", "Category Added", "Category successfully added", "reload()"));
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coursecategory  $coursecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Coursecategory $coursecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coursecategory  $coursecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Coursecategory $coursecategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coursecategory  $coursecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!empty($request->image)) {
            $base64_encode = $request->image;
            $folderPath = public_path()."/uploads/category/";
            $image_parts = explode(";base64,", $base64_encode);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $image = "category" . uniqid() . '.' . $image_type;                
            $file = $folderPath . $image;
            file_put_contents($file, $image_base64);
            $data['image'] = $image;
        }
        if (!empty($request->thumbnail)) {
            $base64_encode = $request->thumbnail;
            $folderPath = public_path()."/uploads/category/thumbnail/";
            $image_parts = explode(";base64,", $base64_encode);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $thumbnail = "thumbnail" . uniqid() . '.' . $image_type;                
            $file = $folderPath . $thumbnail;
            file_put_contents($file, $image_base64);
            $data['thumbnail'] = $thumbnail;
        } 
        $data['name'] = $request->name;
        Coursecategory::where('id','=',$request->categoryid)->update($data);
        return response()->json(responder("success", "Category Updated", "Category successfully updated.", "reload()"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coursecategory  $coursecategory
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $course = Course::where('coursecategory_id',$request->categoryid)->count();
        if($course > 0){
            return response()->json(responder("error", "Oops", "This Category has ($course) courses. It can not be deleted.!"));
        }
        dd('g');
        Coursecategory::where('id','=',$request->categoryid)->delete();
        return response()->json(responder("success", "Category Deleted", "Category successfully deleted", "reload()"));
    }

    public function updateview(Request $request)
    {
        $category = Coursecategory::where('id', $request->categoryid)->first();
        return view('ajax.coursecategory',compact('category'));
    }

    public function coursesByCategory($id){
		
		        $category = Coursecategory::where('id', $id)->first();
				$categories = Coursecategory::withCount(['courses'])->get();
	//dd($categories);
        $courses = Course::where('coursecategory_id', $id)->paginate();  
		
        return view('coursebycategory', ['courses' => $courses,"category"=>$category,"categories"=>$categories]);
    }
	
/* 	   public function coursesByCategoryAjax($id){
		



        $courses = Course::where('coursecategory_id', $id)->paginate();  
		
        return view('coursebycategory', ['courses' => $courses,"category"=>$category,"categories"=>$categories]);
    } */
	function coursesByCategoryAjax(Request $request)
    {
      if($request->ajax()){
            $skip=$request->skip;
            $take=6;
            $products=Course::where('coursecategory_id',$request->category_id)->skip($skip)->take($take)->get();
            return response()->json($products);
        }else{
            return response()->json('Direct Access Not Allowed!!');
        }
	 }

    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

}
