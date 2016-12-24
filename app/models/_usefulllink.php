<?php 
class _usefulllink
{
	public $data;
	public $column;

	public function index()
	{
		require_once("app/functions/string.php"); 
		$string = new functions\string(); 
		$nums = count($this->data);
		$out = "";
		if($nums){
			$devide = ceil($nums / 3);

			$first = array_slice($this->data, 0, $devide);
			// echo "<pre>";
			// print_r($this->data);
			// echo "</pre>";
			$second = array_slice($this->data, $devide, $devide);
			$third = array_slice($this->data, ($devide+$devide), $devide);
			
			$out .= "<section class=\"col s12 m4 l4\">";
			$out .= "<ul class=\"usefullLinks\">";
			if(count($first))
			{
				foreach($first as $value)
				{
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
					// $out .= sprintf("<div>%s</div>\n", $string->cut($value['title'], 20));
					$out .= sprintf("<div>%s</div>\n", $value['title']);
					$out .= "</a>\n";
					$out .= "</li>\n";					
				}
			}
			$out .= "</ul>";
			$out .= "</section>";


			$out .= "<section class=\"col s12 m4 l4\">";
			$out .= "<ul class=\"usefullLinks\">";
			if(count($second))
			{
				foreach($second as $value)
				{
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
					// $out .= sprintf("<div>%s</div>\n", $string->cut($value['title'],20));
					$out .= sprintf("<div>%s</div>\n", $value['title']);
					$out .= "</a>\n";
					$out .= "</li>\n";					
				}
			}
			$out .= "</ul>";
			$out .= "</section>";

			$out .= "<section class=\"col s12 m4 l4\">";
			$out .= "<ul class=\"usefullLinks\">";
			if(count($third))
			{
				foreach($third as $value)
				{
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
					// $out .= sprintf("<div>%s</div>\n", $string->cut($value['title'],20));
					$out .= sprintf("<div>%s</div>\n",$value['title']);
					$out .= "</a>\n";
					$out .= "</li>\n";					
				}
			}
			$out .= "</ul>";
			$out .= "</section>";
		}
		
		return $out;
	}
}