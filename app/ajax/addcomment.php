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
		require_once 'app/functions/send.php';

		$this->out = array(
			"Error" => array(
				"Code"=>1, 
				"Text"=>"მოხდა შეცდომა !",
				"Details"=>"!"
			)
		);

		$commentId = filter_var(functions\request::index("POST","commentId"), FILTER_SANITIZE_NUMBER_INT);
		$firstname = strip_tags(functions\request::index("POST","firstname"));
		$organization = strip_tags(functions\request::index("POST","organization"));
		$email = strip_tags(functions\request::index("POST","email"));
		$comment = strip_tags(functions\request::index("POST","comment"));
		$csrf = strip_tags(functions\request::index("POST","csrf"));
		$lang = strip_tags(functions\request::index("POST","lang"));

		switch ($lang) {
			case 'en':
				$error1 = "All Fields are required !";
				$error2 = "Error !";
				$error3 = "Comment exceeds the maximum !";
				$error4 = "The operation was successful !";
				break;
			case 'ru':
				$error1 = "All Fields are required !";
				$error2 = "Error !";
				$error3 = "Comment exceeds the maximum !";
				$error4 = "The operation was successful !";
				break;
			
			default:
				$error1 = "მოხდა შეცდომა, ყველა ველი სავალდებულოა !";
				$error2 = "მოხდა შეცდომა !";
				$error3 = "კომენტარის ტექსტი აღემატება დაშვებულს !";
				$error4 = "ოპერაცია შესრულდა წარმატებით !";
				break;
		}

		if($commentId=="" || $firstname=="" || $organization=="" || $email=="" || $comment=="" || $lang=="" || $csrf=="")
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
		}else if(strlen($comment) > 500){
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>$error3,
					"Details"=>"!"
				)
			);
		}else{
			$send = new functions\send(); 

			$a["sendTo"] = Config::RECIEVER_EMAIL; 
			$a["subject"] = "DCFTA - Legislation Comment";

			$a["body"] = sprintf(
				"<strong>Name</strong>: %s<br />", 
				$firstname
			);
			$a["body"] .= sprintf(
				"<strong>Organization</strong>: %s<br />", 
				$organization
			);
			$a["body"] .= sprintf(
				"<strong>Email</strong>: %s<br />", 
				$email
			);

			$a["body"] .= sprintf(
				"<strong>Message</strong>:<br />%s<br />", 
				$comment
			);

			$file = new Database("file", array(
				"method"=>"selectFilesPathById",  
				"idx"=>$commentId,  
				"type"=>"module",
				"lang"=>$lang  
			));
			$get = $file->getter(); 
			$link = Config::PUBLIC_FOLDER.$get; 

			$a["body"] .= sprintf(
				"<strong>File</strong>:<br /><a href=\"%s\">File</a>", 
				$link
			);

			$sended = $send->index($a);

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
						"Text"=>$error4,
						"Details"=>""
					)
				);
			}else{
				$this->out = array(
					"Error" => array(
						"Code"=>1, 
						"Text"=>$error2,
						"Details"=>""
					)
				);
			}
		}
		return $this->out;	
	}
}