<?php 
class _internationalsupport
{
	public $data;

	public function index()
	{
		if(count($this->data)){
			require_once("app/functions/string.php"); 
			require_once("app/functions/l.php"); 
			require_once("app/functions/strip_output.php");
			
			$l = new functions\l(); 
			$string = new functions\string(); 
			$out = "";
			foreach($this->data as $value) {
				$title = $string->cut(strip_tags($value['title']), 100);
				$links = str_replace(array('\'','~','!','@','$','^','*','{','}','[',']','|',';','<','>','\\','..'), "-", $title);

				$out .= "<section class=\"col s12 m6 l4 InternationalSupport\">";
				$out .= "<section class=\"box\">";

				$out .= sprintf(
					"<a href=\"%s%s/international-support/%s/%s\">",
					Config::WEBSITE,
					$_SESSION['LANG'],
					$value['idx'],
					urlencode($links) 
				);

				$out .= "<section class=\"title\">";
				$out .= $title; 
				$out .= "</section>";
				$out .= "<section class=\"text\">";
				$out .= $string->cut(strip_tags($value['description']), 80);
				$out .= "</section>";

				$out .= "</a>";

				$out .= "</section>";
				$out .= "</section>";
			}
		}

		return $out;
	}
}