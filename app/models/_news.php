<?php 
class _news
{
	public $data; 

	public function index()
	{
		require_once("app/functions/string.php"); 
		$sting = new functions\string();
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
					$image = $pic[0]['path'];
				}else{
					$image = "/public/filemanager/noimage.png";
				}

				$out .= "<section class=\"col s12 m6 l6\">\n";
				$out .= "<section class=\"newsBox\">\n";
				$out .= "<a href=\"".Config::WEBSITE.$_SESSION['LANG']."/read/".$value['idx']."/test-test"."\">\n";
				$out .= "<section class=\"imageBox\">\n";
				$out .= "<img src=\"".$image."\" width=\"100%\" alt=\"\" />\n";
				$out .= "</section>\n";
				$out .= "<section class=\"data\">\n";
				$out .= "<p>News</p>\n";
				$out .= "<p>".date("M d, Y", $value['date'])."</p>\n";
				$out .= "</section>\n";
				$out .= "<section class=\"title\">".$sting->cut(html_entity_decode($value['title']),60)."</section>\n";
				$out .= "<section class=\"text\">".$sting->cut(strip_tags($value['description']),160)."</section>\n";
				$out .= "</a>\n";
				$out .= "</section>\n";
				$out .= "</section>\n";
			}
		}		
		
		return $out; 
	}
}