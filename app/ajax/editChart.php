<?php 
class editChart
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
		require_once 'app/functions/makeForm.php';
		require_once 'app/functions/request.php';
		require_once 'app/functions/string.php';

		$this->out = array(
			"Error" => array(
				"Code"=>1, 
				"Text"=>"მოხდა შეცდომა !",
				"Details"=>"!"
			)
		);

		$id = functions\request::index("POST","id");
		$lang = functions\request::index("POST","lang");

		if($id == "" || $lang=="")
		{
			$this->out = array(
				"Error" => array(
					"Code"=>1, 
					"Text"=>"მოხდა შეცდომა !",
					"Details"=>"!"
				)
			);
		}else{
			$Database = new Database('chart', array(
					'method'=>'selectById', 
					'id'=>$id, 
					'lang'=>$lang
			));
			$output = $Database->getter();


			$form = functions\makeForm::open(array(
				"action"=>"?",
				"method"=>"post",
				"id"=>"" 
			));

			$form .= functions\makeForm::inputText(array(
				"placeholder"=>"დასახელება", 
				"id"=>"title", 
				"name"=>"title",
				"class"=>"validate", 
				"value"=>$output['title']
			));

			$form .= functions\makeForm::label(array(
				"id"=>"longDescription", 
				"for"=>"pageText", 
				"name"=>"აღწერა",
				"require"=>""
			));

			$form .= functions\makeForm::textarea(array(
				"id"=>"pageText",
				"name"=>"pageText",
				"placeholder"=>"აღწერა",
				"value"=>$output['text']
			));


			$form .= functions\makeForm::label(array(
				"id"=>"tooltipLabel", 
				"for"=>"tooltip", 
				"name"=>"თულთიპი (tooltip)",
				"require"=>""
			));
			$form .= functions\makeForm::textarea(array(
				"id"=>"tooltip",
				"name"=>"tooltip",
				"placeholder"=>"",
				"value"=>$output['tooltip']
			));

			$form .= functions\makeForm::close();

			
			$this->out = array(
				"Error" => array(
					"Code"=>0, 
					"Text"=>"ოპერაცია შესრულდა წარმატებით !",
					"Details"=>""
				),
				"form" => $form,
				"attr" => "formChartEdit('".$id."','".$lang."')"
			);	
		}

		

		return $this->out;
	}
}