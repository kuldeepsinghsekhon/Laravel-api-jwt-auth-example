<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
class LogoutController extends Controller
{
    public function index(){

    	 Session::flush();
    Auth::logout();
    return Redirect::to("/");
    }
}
