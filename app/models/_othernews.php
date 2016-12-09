<?php 
class _othernews
{
	public $data; 

	public function index()
	{
		$out = "";
		if(count($this->data))
		{
			require_once("app/functions/string.php"); 
			$sting = new functions\string();

			$slice = (isset($this->data[1])) ? array_slice($this->data, 1, 4) : $this->data;
			foreach ($slice as $value) {
				$photos = new Database("photos",array(
					"method"=>"selectByParent", 
					"idx"=>$value['idx'],  
					"lang"=>$_SESSION['LANG'],  
					"type"=>$value['type'] 
				));
				if($photos->getter()){
					$pic = $photos->getter();
					$image = $pic[0]['path'];
				}else{
					$image = "/public/filemanager/noimage.png";
				}

				$title = $value['title'];
				$titleUrl = str_replace(array(" "), "-", $title);
				$theUrl = Config::WEBSITE.$_SESSION['LANG']."/news/".$value['idx']."/".$titleUrl;

				$out .= "<section class=\"col s12 m6 l6\">";
				$out .= "<section class=\"newsBox\">";
				$out .= sprintf(
					"<a href=\"%s\">", 
					$theUrl
				);
				$out .= "<section class=\"imageBox\">";
				$out .= sprintf(
					"<img src=\"%s\" width=\"%s\" alt=\"\" />", 
					$image,
					"100%"
				);
				$out .= "</section>";
				$out .= "<section class=\"data\">";
				$out .= "<p>News</p>";
				$out .= "<p>Jan 7, 2016</p>";
				$out .= "</section>";
				$out .= sprintf(
					"<section class=\"title\">%s</section>", 
					$sting->cut(html_entity_decode($title),60)
				);
				$out .= sprintf(
					"<section class=\"text\">%s</section>", 
					$sting->cut(strip_tags($value['description']),160)
				);
				$out .= "</a>";
				$out .= "</section>";
				$out .= "</section>";
			}
		}
		return $out;
	}
}