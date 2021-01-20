<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coursecategory;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $category = Coursecategory::limit(5)->orderBy('id','desc')->get();
        $cources = Course::where('status','Published')->get();
		$all_categories = Coursecategory::all();
		//dd($categories);
        return view('home', ['category' => $category, 'cources' => $cources, 'user' => $user,'all_categories'=>$all_categories]);
    }

}
