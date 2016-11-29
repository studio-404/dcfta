<?php
class managerNavigation
{
	public $navigation;
	public $getUrl;

	public function __construct()
	{
		require_once 'app/functions/url.php';
		$url = new functions\url();
		$this->getUrl = $url->getUrl();
	}

	public function index(){
		$nav = sprintf("<ul id=\"nav-mobile\" class=\"right hide-on-med-and-down\">");
		$getUrl = explode("/", $this->getUrl);
		if(isset($getUrl[1]) && isset($getUrl[2])){
			$slug = $getUrl[1]."/".$getUrl[2];
		}else{
			$slug = "";
		}
		
		foreach ($this->navigation as $key => $value) {
			$ex = explode("/", $key);
			$kk = $ex[1]."/".$ex[2];
			$active = ($kk==$slug) ? "class='active'" : "";
			$nav .= sprintf(
				"<li %s><a href=\"/%s\">%s</a></li>",
				$active,
				$key,				
				$value
			);
		}
		$nav .= sprintf("</ul>");

		return ($nav);
	}

	public function footer()
	{
		$nav = sprintf("<ul>");
		$getUrl = explode("/", $this->getUrl);
		if(isset($getUrl[1]) && isset($getUrl[2])){
			$slug = $getUrl[1]."/".$getUrl[2];	
		}else{
			$slug = "";
		}
		
		foreach ($this->navigation as $key => $value) {
			$active = ($key==$slug) ? "class='active'" : "";
			$nav .= sprintf(
				"<li %s><a href=\"/%s\">%s</a></li>",
				$active,
				$key,				
				$value
			);
		}
		$nav .= sprintf("</ul>");

		return ($nav);
	}
}