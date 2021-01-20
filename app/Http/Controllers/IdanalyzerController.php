<?php

namespace App\Http\Controllers;

use App\Models\Idanalyzer;
use Illuminate\Http\Request;

class IdanalyzerController extends Controller
{
   
    public function store(Request $request)
    {
        
        /* $this->validate($request, [
            'reference' => 'required',
            'response_body' => 'required'
        ]);*/
        $response_body = file_get_contents('php://input');
        $response_array = json_decode($response_body);
        $response_body=serialize($response_body);
        $reference= $request->reference; //$response_array->reference;
        $idanalyzer = new Idanalyzer();
        $idanalyzer->reference = $reference;
        $idanalyzer->response_body = $response_body;
 
        if ($idanalyzer->save())
            return response()->json([
                'success' => true,
                'data' => $response_array,
                'reference'=>$request->reference
            ],200);
        else
            return response()->json([
                'success' => false,
                'message' => 'idanalyzer not Saved'
            ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\idanalyzer  $idanalyzer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $idanalyzer = Idanalyzer::where('reference','=',$request->reference)->first();
           
        if (!$idanalyzer) {
            return response()->json([
                'success' => false,
                'message' => 'Idanalyzer not found '
            ], 200);
        }
 
        return response()->json([
            'success' => true,
            'data' =>array('reference' =>$idanalyzer->reference ,'response_body' =>json_decode(unserialize($idanalyzer->response_body)))
        ], 200);
    }

   
}
