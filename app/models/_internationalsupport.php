<?php 
class _internationalsupport
{
	public $data;

	public function index()
	{
		if(count($this->data)){
			require_once("app/functions/string.php"); 
			require_once("app/functions/l.php"); 
			$l = new functions\l(); 
			$string = new functions\string(); 
			foreach($this->data as $value) {
				$title = strip_tags($value['title']);
				$links = str_replace(array(" "), array("-"), $title);
				$photos = new Database("photos",array(
					"method"=>"selectByParent", 
					"idx"=>$value['idx'],  
					"lang"=>$value['lang'],  
					"type"=>$value['type'] 
				));
				if($photos->getter()){
					$pic = $photos->getter();
					$image = Config::WEBSITE.$_SESSION['LANG']."/image/loadimage?f=".Config::WEBSITE_.$pic[0]['path']."&w=340&h=71";
				}else{
					$image = "/public/filemanager/noimage.png";
				}

				$out = "<section class=\"col s12 m6 l4 InternationalSupport\">";
				$out .= "<section class=\"box\">";
				$out .= sprintf(
					"<img src=\"%s\" alt=\"\" />",
					$image
				);
				$out .= "<section class=\"title\">";
				$out .= $title; 
				$out .= "</section>";
				$out .= "<section class=\"text\">";
				$out .= $string->cut(strip_tags($value['description']), 180);
				$out .= "<p class=\"linkWithIcon\">";
				$out .= sprintf(
					"<a href=\"%s\">",
					Config::WEBSITE.$_SESSION['LANG']."/international-support/".$value['idx']."/".urlencode($links) 
				);
				$out .= sprintf(
					"<img src=\"%simg/icon-arrow.png\" alt=\"\" />", 
					Config::PUBLIC_FOLDER
				);
				$out .= sprintf(
					"<span class=\"geo\">%s</span>",
					$l->translate('project')
				);
				$out .= "</a>";
				$out .= "</p>";
				$out .= "<p class=\"linkWithIcon\">";
				$out .= sprintf(
					"<a href=\"%s\" target=\"_blank\">",
					$value['url']
				);
				$out .= sprintf(
					"<img src=\"%simg/icon-link.png\" alt=\"\" />",
					Config::PUBLIC_FOLDER
				);
				$out .= sprintf(
					"<span>%s</span>", 
					$value['url']
				);
				$out .= "</a>";
				$out .= "</p>";
				$out .= "</section>";
				$out .= "</section>";
			}
		}

		return $out;
	}
}