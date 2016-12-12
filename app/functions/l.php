<?php 
namespace functions;
class l
{
	public function translate($word)
	{
		$Database = new \Database("modules", array(
			"method"=>"translate", 
			"word"=>$word, 
			"lang"=>$_SESSION['LANG']
		));

		if($Database->getter()){
			return $Database->getter();
		}else{
			return "E";
		}
	}
}