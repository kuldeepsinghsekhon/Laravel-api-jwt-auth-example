<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\State;
use App\Models\Course;
use App\Models\Coursepayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user=Auth::user();
		$user = User::where('id', $user->id)->first();
		//print($user);
        $states = State::all();
        $payments = Coursepayment::where('user',$user->id)->get();
            
        foreach($payments as $payment){
            $payment->course = Course::where("id", $payment->course)->first(); 
        }
        return view('profile',compact("user","states","payments"));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }

    public function profileUpdate(Request $request){
        $user = User::find($request->user_id);
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
       // dd(addslashes($request->phone));
        $user->name = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = addslashes($request->phone);
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->save();
        // return redirect()->back()->with('success', 'Profile updated successfully.');
        return response()->json(responder("success", "Alright", "Profile successfully updated", "reload()"));

    }

    public function passwordUpdate(Request $request){
        // echo '<pre>'; print_r($request->all()); echo '</pre>'; die('Endherer');
        $user = User::find($request->user_id);        
        if ($user) {
            $pass = $user->password;
        }
        if (!(Hash::check($request->get('curr_pass'), $pass))) {
            // The passwords matches
            // return redirect()->back()->with("error",
            //     "Your current password does not matched with the password you provided. Please try again.");
                return response()->json(responder("error", "Oops!", "Your current password does not matched!", "reload()"));
        } else {
            $user = User::find($request->user_id);
            $user->password = bcrypt($request->get('new_pass'));
            $user->save();            
           // return redirect()->back()->with("success", "Password changed successfully !");
            return response()->json(responder("success", "Alright", "Password successfully Changed !", "reload()"));

        }
    }
}
