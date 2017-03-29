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
			$description = strip_tags($getter['description']);
			$keywords = strip_tags($getter['keywords']);
		}else if(isset($getter[0]['title'])){
			$title = strip_tags($getter[0]['title']); 
			$description = strip_tags($getter[0]['description']); 
			$keywords = strip_tags($getter[0]['keywords']); 
		}else{
			$title = "";
			$description = "";
			$keywords = "";
		}

		$out = "<!DOCTYPE html>\n";
		$out .= "<html>\n";
		$out .= "<head>\n";
		$out .= "<meta charset=\"utf-8\">\n";
		$out .= "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
		$out .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\n";
		$out .= sprintf("<title>%s - DCFTA</title>\n", strip_tags($title));

		/* SEO TAGS START*/
		$out .= sprintf("<meta name=\"keywords\" content=\"%s\" />\n", $keywords);
		$out .= "<meta property=\"fb:app_id\" content=\"\" />\n";
		$out .= sprintf("<meta property=\"og:title\" content=\"%s\" />\n", $title);
		$out .= "<meta property=\"og:type\" content=\"website\" />\n";
		$out .= "<meta property=\"og:url\" content=\"\"/>\n";
		$out .= "<meta property=\"og:image\" content=\"\" />\n";
		$out .= "<link rel=\"image_src\" type=\"image/jpeg\" href=\"http://coolshop.ge/public/img/share.jpg\" />\n";
		$out .= "<meta property=\"og:image:width\" content=\"600\" />\n";
		$out .= "<meta property=\"og:image:height\" content=\"315\" />\n";
		$out .= "<meta property=\"og:site_name\" content=\"\" />\n";
		$out .= sprintf("<meta property=\"og:description\" content=\"%s\"/>\n", $description);
		$out .= "<link rel=\"icon\" type=\"image/ico\" href=\"\" />\n";
		/* SEO TAGS END*/

		$out .= sprintf(
			"<script src=\"%sjs/web/jquery-3.1.1.min.js\" type=\"text/javascript\"></script>\n",
			$this->public 
		);
		$out .= sprintf(
			"<script src=\"%sjs/web/materialize.min.js\" type=\"text/javascript\"></script>\n", 
			$this->public 
		);	

		$out .= sprintf(
			"<script src=\"%sjs/web/readmore.min.js\" type=\"text/javascript\"></script>\n", 
			$this->public
		);

		$out .= sprintf(
			"<script src=\"%sjs/web/script.js\" type=\"text/javascript\"></script>\n", 
			$this->public
		);

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