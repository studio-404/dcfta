<?php 
class _mainnews
{
	public $data;
	public $inside;

	public function index()
	{
		$out = "";
		if(count($this->data)){
			if(isset($this->inside) && $this->inside=="true"){
				$ourData = $this->data;
			}else{
				$ourData = $this->data[0];
			}
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
					$image
				);
			}
			$out .= sprintf(
				"<section class=\"justTitle\">%s</section>", 
				$ourData['title']
			);
			$out .= sprintf(
				"<section class=\"mainText\">%s</section>", 
				html_entity_decode($ourData['description'])
			);
		}

		return $out;
	}
}