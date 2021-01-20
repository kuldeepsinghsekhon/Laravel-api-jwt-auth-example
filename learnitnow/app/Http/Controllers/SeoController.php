<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seo;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = Auth::user();
        $metadata = Seo::all();
        return view('admin.seo.index', compact('user','metadata'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Seo();
        $data['meta_title']=$request->meta_title;
        $data['page_url']=$request->page_url;
        $data['meta_keywords']=$request->meta_keywords;
        $data['meta_description']=$request->meta_description;
        $data->save();
        $courseId =DB::getPdo()->lastInsertId();
        if($courseId){
        return response()->json(responder("success", "Meta Data Added", "Meta Data successfully added", "reload()"));
        }else{
            return response()->json(responder("error", "Error!", "Something went wrong!"));

          }
    }
    public function edit(Request $request)
    {
        $metadata = Seo::where('id', $request->metaid)->first();
        return view('ajax.seoupdate',compact('metadata'));
    }
    public function update(Request $request)
    {
        $data['meta_title']=$request->meta_title;
        $data['page_url']=$request->page_url;
        $data['meta_keywords']=$request->meta_keywords;
        $data['meta_description']=$request->meta_description;
        Seo::where("id",'=', $request->id)->update($data);
        return response()->json(responder("success", "Alright", "Meta Data successfully updated", "reload()"));

    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    { 
        $course = Seo::where('id','=',$req->metaid)->delete();
        return response()->json(responder("success", "Meta Data Deleted", "Meta data successfully deleted", "reload()"));
     
    }

}