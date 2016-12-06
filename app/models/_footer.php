<?php 
class _footer
{
	public $data;

	public function index()
	{
		$photos = new Database("photos",array(
			"method"=>"selectByParent", 
			"idx"=>$this->data['idx'],  
			"lang"=>$this->data['lang'],  
			"type"=>$this->data['type'] 
		));
		if($photos->getter()){
			$pic = $photos->getter();
			$image = $pic[0]['path'];
			$image2 = $pic[1]['path'];
		}else{
			$image = "/public/filemanager/noimage.png";
		}
		$out = "<footer>\n";
		$out .= "<section class=\"centerWidth\">\n";
		$out .= "<section class=\"row marginBottom55\">\n";
		$out .= "<section class=\"marginminus10\">\n";
		$out .= "<section class=\"col s12 m12 l12\">\n";
		$out .= "<section class=\"col s12 m3 l3\"><a href=\"http://www.eu-nato.gov.ge/ge/eu/cooperation\" target=\"_blank\"><img src=\"".$image."\" alt=\"\" class=\"bigImage\" /></a></section>\n";
		$out .= "<section class=\"col s12 m3 l2\"><a href=\"https://www.giz.de/en/html/index.html\" target=\"_blank\"><img src=\"".$image2."\" alt=\"\" /></a></section>\n";
		$out .= "<section class=\"col s12 m3 l5 mobileMarginTop20\">\n";
		$out .= "<p>".strip_tags($this->data['description'])."</p>\n";
		$out .= "</section>\n";
		$out .= "<section class=\"col s12 m2 l3\"></section>\n";
		$out .= "</section></section></section>\n";
		$out .= "<section class=\"footerText\">\n";
		$out .= "<section class=\"marginminus10\" style=\"margin:0\">\n";
		$out .= "<p class=\"left\">Ministry of Economy and Sustainable Development of Georgia 2016. DCFTA.gov.ge</p>\n";
		$out .= "<p class=\"right\"><a href=\"\"><img src=\"".Config::PUBLIC_FOLDER."img/logo.png\" alt=\"logo\" class=\"logo\" /></a></p>\n";
		$out .= "</section></section></section></footer>\n";

		return $out;
	}
}