<?php 
class _miniinternationalsupport
{
	public $data;

	public function index()
	{
		$out = "";
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
					$image = Config::WEBSITE.$_SESSION['LANG']."/image/loadimage?f=".Config::WEBSITE_.$pic[0]['path']."&w=230&h=50";
				}else{
					$image = "/public/filemanager/noimage.png";
				}

				$out .= "<section class=\"col s12 m6 l3 InternationalSupport\">";
				
				$title = strip_tags($value['title']);
				$links = str_replace(array(" "), array("-"), $title);

				$out .= sprintf(
					"<a href=\"%s\">",
					Config::WEBSITE.$_SESSION['LANG']."/international-support/".$value['idx']."/".urlencode($links) 
				);
				$out .= "<section class=\"box\" style=\"min-height: auto\">";			
				$out .= sprintf(
					"<img src=\"%s\" alt=\"\" />", 
					$image
				);			
				$out .= "</section>";			
				$out .= "</a>";			
				$out .= "</section>";			
			}
		}		

		return $out;
	}
}