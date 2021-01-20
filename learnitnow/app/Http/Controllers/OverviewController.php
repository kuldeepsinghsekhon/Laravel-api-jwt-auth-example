<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Coursecategory;
use App\Models\Coursesenrolled;
use App\Models\Coursechapter;
use App\Models\Coursepayment;
use App\Models\Lecture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $total_student = User::where('role','subscriber')->count();
    $get_all_enrolled_courses = Coursepayment::all();
    $total_incme = 0;
    foreach($get_all_enrolled_courses as $get_total_paid){
        //$total_incoem = Coursesenrolled::where("course", $get_total_paid->course)->first();
        $total_incme += $get_total_paid->amount;
    } 
    
       
        //return view('overview',compact("user","accounts","categories","title","stats","reports","messages","requests","admin","overview","user_askmyceo_sub","user_askmyceo_mentor","user_askmyceo_mentee","conctent","pricing_plan","tasks_user_assigned","noticefor_giftapi","bid_request_user"));
        return view('overview',compact("user","total_student","total_incme"));
    } 
}