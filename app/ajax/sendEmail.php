<?php 
class sendEmail
{
	public $out; 
	
	public function __construct()
	{
		
	}
	
	public function index(){
		require_once 'app/core/Config.php';
		require_once 'app/functions/request.php';
		require_once 'app/functions/send.php';

		$this->out = array(
			"Error" => array(
				"Code"=>1, 
				"Text"=>"მოხდა შეცდომა !",
				"Details"=>"!"
			)
		);

		$input_subject = functions\request::index("POST","input_subject");
		$input_name = functions\request::index("POST","input_name");
		$input_organization = functions\request::index("POST","input_organization");
		$input_email = functions\request::index("POST","input_email");
		$input_phone = functions\request::index("POST","input_phone");
		$input_comment = functions\request::index("POST","input_comment");
		$csrf = functions\request::index("POST","csrf");

		if($input_subject=="" || $input_name=="" || $input_organization=="" || $input_email=="" || $input_phone=="" || $input_comment=="" || $csrf=="")
		{
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>"მოხდა შეცდომა, ყველა ველი სავალდებულოა !",
					"Details"=>"!"
				)
			);
		}else if($_SESSION['protect_x']!=$csrf)
		{
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>"მოხდა შეცდომა !",
					"Details"=>"!"
				)
			);
		}else{
			$send = new functions\send(); 

			$a["sendTo"] = Config::RECIEVER_EMAIL; 
			$a["subject"] = "Heu";
			$a["body"] = sprintf(
				"<strong>Subject</strong>: %s<br />", 
				$input_subject
			);
			$a["body"] .= sprintf(
				"<strong>Name</strong>: %s<br />", 
				$input_name
			);
			$a["body"] .= sprintf(
				"<strong>Organization</strong>: %s<br />", 
				$input_organization
			);
			$a["body"] .= sprintf(
				"<strong>Email</strong>: %s<br />", 
				$input_email
			);
			$a["body"] .= sprintf(
				"<strong>Phone</strong>: %s<br />", 
				$input_phone
			);
			$a["body"] .= sprintf(
				"<strong>Message</strong>:<br />%s", 
				$input_comment
			);

			$sended = $send->index($a);
			if($sended)
			{
				$this->out = array(
					"Error" => array(
						"Code"=>0, 
						"Text"=>"",
						"Details"=>"!"
					),
					"Success" => array(
						"Code"=>1, 
						"Text"=>"ოპერაცია წარმატებით შესრულდა !",
						"Details"=>"!"
					)
				);
			}else{
				$this->out = array(
					"Error" => array(
						"Code"=>1, 
						"Text"=>"მოხდა შეცდომა !",
						"Details"=>"!"
					)
				);
			}
		}	
		return $this->out;		
	}
}