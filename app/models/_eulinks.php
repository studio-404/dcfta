<?php 
class _eulinks
{
	public $data;

	public function index()
	{
		require_once("app/functions/string.php"); 
		$string = new functions\string(); 
		$out = "<ul class=\"usefullLinks\">\n";
		if(count($this->data)){
			foreach($this->data as $value) {
				$photos = new Database("photos",array(
					"method"=>"selectByParent", 
					"idx"=>$value['idx'],  
					"lang"=>$value['lang'],  
					"type"=>$value['type'] 
				));
				if($photos->getter()){
					$pic = $photos->getter();
					$image = $pic[0]['path'];
				}else{
					$image = "/public/filemanager/noimage.png";
				}
				$out .= "<li>\n";
				$out .= sprintf(
					"<a href=\"%s\" class=\"waves-effect waves-light\" target=\"_blank\">\n", 
					$value['url']
				);
				$out .= sprintf(
					"<img src=\"%s\" alt=\"\" />\n", 
					$image 
				);
				$out .= sprintf("<span>%s</span>\n", $string->cut($value['title'], 35));
				$out .= "</a>\n";
				$out .= "</li>\n";
			}
		}

		$out .= "</ul>\n";

		return $out;
	}
}