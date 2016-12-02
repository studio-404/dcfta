<?php 
class file_system
{
	public $out; 
	
	public function __construct()
	{
		require_once 'app/core/Config.php';
		if(!isset($_SESSION[Config::SESSION_PREFIX."username"]))
		{
			exit();
		}
	}
	
	public function index(){
		require_once 'app/core/Config.php';
		require_once 'app/functions/request.php';

		$this->out = array(
			"Error" => array(
				"Code"=>1, 
				"Text"=>"მოხდა შეცდომა !",
				"Details"=>"!"
			)
		);

		$random = functions\request::index("POST","random");
		$path = functions\request::index("POST","path");
		$item = functions\request::index("POST","item");
		$output = false;

		if($random=="" || $path=="")
		{
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>"ყველა ველი სავალდებულოა !",
					"Details"=>"!"
				)
			);
		}else{
			if(!isset($item)){
				$Database = new Database('file', array(
						'method'=>'add', 
						'random'=>$random, 
						'path'=>$path
				));
			}else{
				$Database = new Database('file', array(
						'method'=>'addSub', 
						'random'=>$random, 
						'path'=>$path, 
						'item'=>$item  
				));
			}
			$output = $Database->getter();
		}

		if($output){
			$this->out = array(
				"Error" => array(
					"Code"=>0, 
					"Text"=>"",
					"Details"=>""
				),
				"Success"=>array(
					"Code"=>1, 
					"Text"=>"ოპერაცია შესრულდა წარმატებით !",
					"Details"=>"", 
					"insert_id"=>$output 
				)
			);
		}else{
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>"ოპერაციის შესრულებისას დაფიქსირდა შეცდომა !",
					"Details"=>""
				)
			);
		}

		return $this->out;
	}
}