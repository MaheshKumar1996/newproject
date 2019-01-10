<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Log;
use Illuminate\Support\Facades\Session;

class SimplePollModel extends Model
{
	
	protected $fillable = [
			'poll_options','poll_type','question','poll_id'
	];
	

	protected $poll_options;
	protected $poll_type;
	protected $question;
	protected $poll_id;
	//protected $users_id;
	function __construct($poll_options,$poll_type,$question,$poll_id)
	{
		$this->poll_options=$poll_options;
		$this->poll_type=$poll_type;
		$this->question=$question;
		$this->poll_id=$poll_id;
	
		//$this->id=$users_id;
	}
	
	function insertsimplepoll()
	{
		$poll_id = 'M'.rand(0,9).rand(100,999).rand(1000,9999).rand(100000,999999);
		$poll_options = array_filter(explode('|,|',$this->poll_options));
		$response_array = [];
		foreach($poll_options as $key => $values)
		{
			
				$response_array[$values] = 0;
		}
		
		$response_array = serialize($response_array);
		$id = DB::table('simplepolls')->insert(
				['unique_poll_id' => $poll_id,'owner_id' => '0', 'question' => $this->question, 'options' => $this->poll_options,'option_type'=>$this->poll_type,'results' => $response_array]);
		
	}
	
	function displaysimplepoll()
	{
		$simple_poll_details=DB::table('simplepolls')->where(['unique_poll_id'=>$this->poll_id])->first();
		if($simple_poll_details)
		{
			return (json_decode(json_encode($simple_poll_details), true));
		}
		else{
			echo 'No poll for this id';
		}
	}
	
	
	function executesimplepoll()
	{
		$selected_options = json_decode($this->poll_options);
		$selected_options_id = json_decode($this->poll_id);
		$simple_poll_details = DB::table('simplepolls')->where(['unique_poll_id'=>Session::get('simplepolldetails')['unique_poll_id']])->first();
		$latest_details = json_decode(json_encode($simple_poll_details), true);
		
		$poll_options = array_filter(explode('|,|',$latest_details['options']));
		$final_response_array = unserialize($latest_details['results']);
		$totalvotes = ++$latest_details['total_votes'];
		
		if($latest_details['option_type'] == 'SCQ')
		{
			if (!is_array($selected_options))
			{
				if(in_array($selected_options, $poll_options))
				{
					
					foreach($final_response_array as $key => $values)
					{
						if($selected_options == $key)
						{
							$final_response_array[$key] = ++$values;
							break;
						}

					}
  					$id = DB::table('simplepollvoterslist')->insert(
  							['unique_poll_id' => Session::get('simplepolldetails')['unique_poll_id'],'choice' => $selected_options, 'ip_address' => $_SERVER['REMOTE_ADDR']]);
					
					
 					$final_response_array = serialize($final_response_array);
 					DB::table('simplepolls')->where('unique_poll_id', Session::get('simplepolldetails')['unique_poll_id'])->update(['results' => $final_response_array,'total_votes' => $totalvotes]);
				}
			}
		}
	
		
		
		
		if($latest_details['option_type'] == 'MCQ')
		{
			
			if(count($selected_options) <= count($poll_options))
			{
				
				foreach($final_response_array as $key => $values)
				{
					
					if(in_array($key, $selected_options))
					{
						$final_response_array[$key] = ++$values;
					}

				}
				
				$selected_options = serialize($selected_options);
				$id = DB::table('simplepollvoterslist')->insert(
						['unique_poll_id' => Session::get('simplepolldetails')['unique_poll_id'],'choice' => $selected_options, 'ip_address' => $_SERVER['REMOTE_ADDR']]);
				
				
				$final_response_array = serialize($final_response_array);
				DB::table('simplepolls')->where('unique_poll_id', Session::get('simplepolldetails')['unique_poll_id'])->update(['results' => $final_response_array,'total_votes' => $totalvotes]);
				
				
			}
			
		}

	}
}
