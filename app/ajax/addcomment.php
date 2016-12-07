<?php 
class addcomment
{
	public $out; 
	
	public function __construct()
	{
		
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

		$commentId = filter_var(functions\request::index("POST","commentId"), FILTER_SANITIZE_NUMBER_INT);
		$firstname = functions\request::index("POST","firstname");
		$organization = functions\request::index("POST","organization");
		$email = functions\request::index("POST","email");
		$comment = functions\request::index("POST","comment");
		$lang = functions\request::index("POST","lang");

		if($commentId=="" || $firstname=="" || $organization=="" || $email=="" || $comment=="" || $lang=="")
		{
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>"მოხდა შეცდომა, ყველა ველი სავალდებულოა !",
					"Details"=>"!"
				)
			);
		}else{
			$Database = new Database("comments", array(
				"method"=>"insert",
				"commentId"=>$commentId, 
				"firstname"=>$firstname, 
				"organization"=>$organization, 
				"email"=>$email, 
				"comment"=>$comment, 
				"lang"=>$lang  
			));
			if($Database->getter()){
				$this->out = array(
					"Error" => array(
						"Code"=>0, 
						"Text"=>"",
						"Details"=>""
					),
					"Success"=>array(
						"Code"=>1, 
						"Text"=>"ოპერაცია შესრულდა წარმატებით !",
						"Details"=>""
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
		}
		return $this->out;	
	}
}