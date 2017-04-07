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

		$input_subject = strip_tags(functions\request::index("POST","input_subject")); 
		$input_name = strip_tags(functions\request::index("POST","input_name"));
		$input_organization = strip_tags(functions\request::index("POST","input_organization"));
		$input_email = strip_tags(functions\request::index("POST","input_email"));
		$input_phone = strip_tags(functions\request::index("POST","input_phone"));
		$input_comment = strip_tags(functions\request::index("POST","input_comment"));
		$lang = strip_tags(functions\request::index("POST","lang"));
		$csrf = strip_tags(functions\request::index("POST","csrf"));


		switch ($lang) {
			case 'en':
				$error1 = "Please fill required fields !";
				$error2 = "Error !";
				$error4 = "The operation was successful !";
				break;
			case 'ru':
				$error1 = "Please fill required fields !";
				$error2 = "Error !";
				$error4 = "The operation was successful !";
				break;
			
			default:
				$error1 = "მოხდა შეცდომა, გთხოვთ შეავსოთ სავალდებულო ველები !";
				$error2 = "მოხდა შეცდომა !";
				$error4 = "ოპერაცია შესრულდა წარმატებით !";
				break;
		}

		if($input_subject=="" || $input_name=="" || $input_email=="" || $input_phone=="" || $input_comment=="" || $csrf=="")
		{
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>$error1,
					"Details"=>"!"
				)
			);
		}else if($_SESSION['protect_x']!=$csrf)
		{
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>$error2,
					"Details"=>"!"
				)
			);
		}else{
			$send = new functions\send(); 

			$a["sendTo"] = Config::RECIEVER_EMAIL; 
			$a["subject"] = $input_subject;
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
						"Text"=>$error4,
						"Details"=>"!"
					)
				);
			}else{
				$this->out = array(
					"Error" => array(
						"Code"=>1, 
						"Text"=>$error2,
						"Details"=>"!"
					)
				);
			}
		}	
		return $this->out;		
	}
}