<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Log;
use App\SimplePollModel;

class SimplePollController extends Controller
{
    //
    
	public function add_simple_poll(Request $request)
	{
// 		Log::error($request->poll_options);
// 		Log::error($request->poll_type);
// 		Log::error($request->question);
		
		
		$pollObject=new SimplePollModel($request->poll_options,$request->poll_type,$request->question);
		$id=$pollObject->insertsimplepoll();
		exit;
	}
}
