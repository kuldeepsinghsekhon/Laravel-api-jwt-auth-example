<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use  App\Models\Admin;
use Illuminate\Http\Request;
use Auth;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin.login');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login( Request $request )
    {
       //dd($request->all());
       // Validate form data
       $validator = Validator::make($request->all(), [
    'email' => 'required|min:2|max:255',
    'password' => 'required |min:2|max:255'
    //'password' => 'required |min:2|max:255|pwned:150',

]);

if ($validator->fails()) {
    return redirect()->back()->withErrors($validator);
} else {
    
     if ( Auth::guard('admin')->attempt(['email' => $request->post('email'), 'password' => $request->post('password')]) ) {
           return redirect('admin');
        }else{
       return redirect('admin/login')->with('error','Your credentials are incorrect');
        }
}
       

        // Authentication failed, redirect back to the login form
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

    request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        User::create($request->all());

      return redirect()->route('user.create')->with('success','data added');
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
    public function edit(User $user)

    {  
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
     public function destroy(User $user)
    {
        
    }
}
