<?php 
class changeLanguageVisibility
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
		require_once 'app/functions/request.php';

		$this->out = array(
			"Error" => array(
				"Code"=>1, 
				"Text"=>"მოხდა შეცდომა !",
				"Details"=>"!"
			)
		);

		$visibility = functions\request::index("POST","visibility");
		$idx = functions\request::index("POST","idx");

		if($visibility != "" && $idx != ""){

			$language = new Database('language', array(
				"method"=>"updateVisibility",
				"visibility"=>$visibility,
				"idx"=>$idx 
			));
			$result = $language->getter();
			if($result==1){
				$this->out = array(
					"Error" => array(
						"Code"=>0, 
						"Text"=>"",
						"Details"=>""
					),
					"Success" => array(
						"Code"=>1,
						"Text"=>"ოპერაცია შესრულდა წარმატებით !",
						"Details"=>""
					)
				);	
			}
		}

		return $this->out;
	}
}