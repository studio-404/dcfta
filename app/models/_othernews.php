<?php 
class _othernews
{
	public $data; 
	public $count; 

	public function index()
	{
		$out = "";
		$this->count = count($this->data);
		if($this->count)
		{
			require_once("app/functions/string.php"); 
			$sting = new functions\string();
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

			$slice = (isset($this->data[1])) ? array_slice($this->data, 1, 4) : $this->data;
			$out .= '<div class="othernews-box">';
			$i = 1;
			foreach ($slice as $value) {
				$photos = new Database("photos",array(
					"method"=>"selectByParent", 
					"idx"=>$value['idx'],  
					"lang"=>$_SESSION['LANG'],  
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
				$theUrl = Config::WEBSITE.$_SESSION['LANG']."/news/".$value['idx']."/".$titleUrl;

				$out .= "<section class=\"col s12 m6 l6 news-item\">";
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
				$out .= sprintf(
					"<p>%s</p>\n",
					$l->translate('singlenews')
				);
				$str = str_replace(date("M", $value['date']), $month[$_SESSION['LANG']][date("M", $value['date'])], date("M d, Y", $value['date']));
				$out .= "<p>".$str."</p>\n";
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
				if(($i%2) == 0){
					$out .= "<div style=\"clear:both\"></div>";
				}
				$i++;
			}
			$out .= '</div>';
			$out .= '<input type="hidden" name="counterVals" id="counterVals" value="'.$this->count.'" />';
			$out .= "<section class=\"col s12 m12 l12 loadergif\" style=\"text-align: center; margin-top: 30px; display:none\"><img src=\"/public/img/ajax-loader.gif\" style=\"width:40px;\" align=\"center\" /></section>";
		}
		return $out;
	}
}