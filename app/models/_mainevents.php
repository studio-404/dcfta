<?php 
class _mainevents
{
	public $data;

	public function index()
	{
		$out = ""; 
		if(count($this->data)){
			$ourData = $this->data;
			$photos = new Database("photos",array(
				"method"=>"selectByParent", 
				"idx"=>$ourData['idx'],  
				"lang"=>$_SESSION['LANG'],  
				"type"=>$ourData['type'] 
			));
			if($photos->getter()){
				$pic = $photos->getter();
				$image = $pic[0]['path'];
				$out .= sprintf(
					"<img src=\"%s\" width=\"350\" height=\"218\" alt=\"\" align=\"left\" style=\"margin: 0 10px 10px 0px\" />", 
					Config::WEBSITE.$_SESSION['LANG']."/image/loadimage?f=".Config::WEBSITE_.$image."&w=350&h=218"
				);
			}
			$out .= sprintf(
				"<section class=\"justTitle\">%s</section>", 
				$ourData['title']
			);
			$out .= sprintf(
				"<section class=\"date\"><span>%s</span></section>", 
				date("M d, Y",$ourData['date'])
			);
			$out .= sprintf(
				"<section class=\"mainText\">%s</section>", 
				html_entity_decode($ourData['description'])
			);
		}
		return $out;
	}
}