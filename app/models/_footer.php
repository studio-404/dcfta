<?php 
class _footer
{
	public $data;

	public function index()
	{
		require_once("app/functions/l.php");
		require_once("app/functions/strip_output.php");  
		$l = new functions\l(); 
		$photos = new Database("photos",array(
			"method"=>"selectByParent", 
			"idx"=>$this->data['idx'],  
			"lang"=>$this->data['lang'],  
			"type"=>$this->data['type'] 
		));
		if($photos->getter()){
			$pic = $photos->getter();
			$image = strip_output::index($pic[0]['path']);
			$image2 = strip_output::index($pic[1]['path']);
		}else{
			$image = "/public/filemanager/noimage.png";
		}
		$out = "<footer>\n";
		$out .= "<section class=\"centerWidth\">\n";
		$out .= "<section class=\"row marginBottom55\">\n";
		$out .= "<section>\n";
		$out .= "<section class=\"col s12 m12 l12\">\n";
		
		//$out .= "<section class=\"footer-logo1\"><a href=\"http://eu4business.eu/\" target=\"_blank\"><img src=\"".strip_output::index($image)."\" alt=\"\" class=\"bigImage\" /></a></section>\n";

		//$out .= "<section class=\"footer-logo1\"><a href=\"\" target=\"_blank\"><img src=\"".strip_output::index($image2)."\" alt=\"\" class=\"bigImage\" /></a></section>\n";

		//
		
		// $out .= "<section class=\"col s12 m12 l13\"></section>\n";
		$out .= "<section class=\"footerLogos\"> <a href=\"http://eu4business.eu/\" target=\"_blank\"><img src=\"".strip_output::index($image)."\" alt=\"\" width=\"100%\" /></a></section>\n";
		$out .= "<section class=\"footerLogos\"> <a href=\"https://www.giz.de\" target=\"_blank\"><img src=\"".strip_output::index($image2)."\" alt=\"\" width=\"100%\" style=\"width:auto\" /></a></section>\n";
		$out .= "<div style=\"clear:both\"></div>";
		$out .= "<section class=\"footerTextDescription\"><p>".strip_tags($this->data['description'])."</p></section>";


		$out .= "</section></section></section>\n";
		$out .= "<section class=\"footerText\">\n";
		$out .= "<section class=\"marginminus10\">\n";
		$out .= sprintf(
			"<p class=\"left\">%s</p>\n", 
			$l->translate('copyright')
		);
		$out .= sprintf(
			"<p class=\"right\"><a href=\"\"><img src=\"%simg/logo.png\" alt=\"logo\" class=\"logo\" /></a></p>\n",
			Config::PUBLIC_FOLDER
		);
		$out .= "</section></section></section><div style=\"clear:both\"></div></footer>\n";

		return $out;
	}
}