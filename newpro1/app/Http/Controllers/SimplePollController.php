<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Log;
use App\SimplePollModel;
use Illuminate\Support\Facades\Session;

class SimplePollController extends Controller
{
    //
    
	public function add_simple_poll(Request $request)
	{
// 		Log::error($request->poll_options);
// 		Log::error($request->poll_type);
// 		Log::error($request->question);
		
		
		$pollObject=new SimplePollModel($request->poll_options,$request->poll_type,$request->question,'');
		$id=$pollObject->insertsimplepoll();

	}
	
	
	public function display_simple_poll($id)
	{
		$pollObject=new SimplePollModel('','','',$id);
		$polldetails=$pollObject->displaysimplepoll();
		
		Session::put('simplepolldetails',$polldetails);
		return view('simplepoll/executepoll',compact('polldetails'));
	}
	
	public function execute_simple_poll(Request $request)
	{	
		$pollObject=new SimplePollModel($request->selected_poll_options,'','',$request->selected_poll_ids);
		$polldetails=$pollObject->executesimplepoll();

// 		Session::put('simplepolldetails',$polldetails);
 		//return view('welcome');
	}
}
