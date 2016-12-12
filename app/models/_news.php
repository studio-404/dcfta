<?php 
class _news
{
	public $data; 

	public function index()
	{
		require_once("app/functions/string.php"); 
		require_once("app/functions/l.php"); 
		$month = array(
			"ge"=>array(
				"Jan"=>"იან",
				"Feb"=>"თებ",
				"Mar"=>"მარ",
				"Apr"=>"აპრ",
				"May"=>"მაი",
				"Jun"=>"ივნ",
				"Jul"=>"ივლ",
				"Aug"=>"აგვ",
				"Sep"=>"სექ",
				"Oct"=>"ოქტ",
				"Nov"=>"ნოე",
				"Dec"=>"დეკ"
			),
			"en"=>array(
				"Jan"=>"Jan",
				"Feb"=>"Feb",
				"Mar"=>"Mar",
				"Apr"=>"Apr",
				"May"=>"May",
				"Jun"=>"Jun",
				"Jul"=>"Jul",
				"Aug"=>"Aug",
				"Sep"=>"Sep",
				"Oct"=>"Oct",
				"Nov"=>"Nov",
				"Dec"=>"Dec"
			),
			"ru"=>array(
				"Jan"=>"янв",
				"Feb"=>"фев",
				"Mar"=>"мар",
				"Apr"=>"апр",
				"May"=>"май",
				"Jun"=>"июн",
				"Jul"=>"июл",
				"Aug"=>"авг",
				"Sep"=>"сен",
				"Oct"=>"окт",
				"Nov"=>"ноя",
				"Dec"=>"дек"
			)
		);
		$l = new functions\l(); 
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
					$image = Config::WEBSITE.$_SESSION['LANG']."/image/loadimage?f=".Config::WEBSITE_.$pic[0]['path']."&w=383&h=235";
				}else{
					$image = "/public/filemanager/noimage.png";
				}
				$title = $value['title'];
				$titleUrl = str_replace(array(" "), "-", $title); 

				$out .= "<section class=\"col s12 m6 l6\">\n";
				$out .= "<section class=\"newsBox\">\n";
				$out .= "<a href=\"".Config::WEBSITE.$_SESSION['LANG']."/news/".$value['idx']."/".$titleUrl."\">\n";
				$out .= "<section class=\"imageBox\">\n";
				$out .= "<img src=\"".$image."\" width=\"100%\" alt=\"\" />\n";
				$out .= "</section>\n";
				$out .= "<section class=\"data\">\n";
				$out .= sprintf(
					"<p>%s</p>\n",
					$l->translate('singlenews')
				);
				$str = str_replace(date("M", $value['date']), $month[$_SESSION['LANG']][date("M", $value['date'])], date("M d, Y", $value['date']));
				$out .= "<p>".$str."</p>\n";
				$out .= "</section>\n";
				$out .= "<section class=\"title\">".$sting->cut(html_entity_decode($title),60)."</section>\n";
				$out .= "<section class=\"text\">".$sting->cut(strip_tags($value['description']),160)."</section>\n";
				$out .= "</a>\n";
				$out .= "</section>\n";
				$out .= "</section>\n";
			}
		}		
		
		return $out; 
	}
}