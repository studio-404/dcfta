<?php 
class _header
{
	public $public;
	public $lang;
	public $pagedata;

	public function index(){
		$getter = $this->pagedata->getter(); 
		if(isset($getter['title'])){
			$title = strip_tags($getter['title']);
		}else if(isset($getter[0]['title'])){
			$title = strip_tags($getter[0]['title']); 
		}else{
			$title = "";
		}

		$out = "<!DOCTYPE html>\n";
		$out .= "<html>\n";
		$out .= "<head>\n";
		$out .= "<meta charset=\"utf-8\">\n";
		$out .= "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
		$out .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\n";
		$out .= sprintf("<title>%s - DCFTA</title>", $title);
		$out .= sprintf(
			"<script src=\"%sjs/web/jquery-3.1.1.min.js\" type=\"text/javascript\"></script>\n",
			$this->public 
		);
		$out .= sprintf(
			"<script src=\"%sjs/web/materialize.min.js\" type=\"text/javascript\"></script>\n", 
			$this->public 
		);	

		$out .= sprintf(
			"<script src=\"%sjs/web/script.js\" type=\"text/javascript\"></script>\n", 
			$this->public
		);

		$out .= "<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">\n";
		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/materialize.min.css\" />\n", 
			$this->public 
		);
		
		$out .= sprintf(
			"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/style.css\" />\n", 
			$this->public
		);

		if($_SESSION['LANG']=="ge"){
			$out .= sprintf(
				"<link rel=\"stylesheet\" type=\"text/css\" href=\"%scss/web/_geo.css\" />\n", 
				$this->public
			);			
		}

		$out .= "</head>\n";
		$out .= "</body>\n";
		return $out;
	}
}