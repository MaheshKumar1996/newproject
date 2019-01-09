<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Log;

class SimplePollModel extends Model
{
	
	protected $fillable = [
			'poll_options','poll_type','question'
	];
	

	protected $poll_options;
	protected $poll_type;
	protected $question;
	//protected $users_id;
	function __construct($poll_options,$poll_type,$question)
	{
		$this->poll_options=$poll_options;
		$this->poll_type=$poll_type;
		$this->question=$question;
	
		//$this->id=$users_id;
	}
	
	function insertsimplepoll()
	{
		$poll_id = 'M'.rand(0,9).rand(100,999).rand(1000,9999).rand(100000,999999);
		
		$id = DB::table('simplepolls')->insert(
				['unique_poll_id' => $poll_id,'owner_id' => '0', 'question' => $this->question, 'options' => $this->poll_options,'option_type'=>$this->poll_type]);
		
	}
}
