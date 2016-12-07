<?php 
class _navigation
{
	public $data;

	public function index(){
		$out = "<ul>\n";
		if(count($this->data)){
			foreach($this->data as $value) {
				$subNavigation = new Database('page', array(
					"method"=>"select", 
					"cid"=>$value['idx'], 
					"nav_type"=>0, 
					"lang"=>$value['lang'], 
					"status"=>0
				));
				$active = (isset($_SESSION["URL"][1]) && $_SESSION["URL"][1]==$value['slug']) ? " active" : "";
				if($subNavigation->getter()){					
					$out .= sprintf(
						"<li class=\"sub\" data-sub=\"%s\">\n<a href=\"%s\" class=\"slide%s\"><span>%s</span></a> <i class=\"arrow\"></i>\n",
						"i".$value['idx'], 
						Config::WEBSITE.$_SESSION['LANG']."/".$value['slug'], 
						$active, 
						$value['title']  
					);

					$out .= sprintf(
						"<ul class=\"i%d\">\n", 
						$value['idx']
					);
					foreach ($subNavigation->getter() as $val) {
						$out .= sprintf(
							"<li><a href=\"%s\"><span>%s</span></a></li>\n",
							Config::WEBSITE.$_SESSION['LANG']."/".$val['slug'], 
							$val['title']  
						);	
					}
					$out .= "</ul>\n";

					$out .= "</li>\n";
				}else{
					$out .= sprintf(
						"<li><a href=\"%s\" class=\"%s\"><span>%s</span></a></li>\n",
						Config::WEBSITE.$_SESSION['LANG']."/".$value['slug'], 
						$active, 
						$value['title']  
					);	
				}
				
			}				
		}			
		$out .= "</ul>\n";
		
		return $out;
	}
}