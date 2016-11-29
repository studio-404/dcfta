<?php 
class parentModel
{
	public $use_mod;

	public  function index()
	{
		require_once 'app/functions/url.php';
		$url = new functions\url();
		$getUrl = explode("/", $url->getUrl());
		$out = "<div class=\"collection moduleList\">";
		if(count($this->use_mod)):
			$x = 1;
			foreach ($this->use_mod as $val) {
				$active = (isset($getUrl[3]) && $val['type']==$getUrl[3]) ? " active" : "";
				$out .= "<a href=\"/".$_SESSION["LANG"]."/dashboard/modules/".$val['type']."\" class=\"collection-item".$active."\">".$val['title']."</a>";
				$x++;
			}			
		endif;
		$out .= "</div>";
		return $out;
	}
}