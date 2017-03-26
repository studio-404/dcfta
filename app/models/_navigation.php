<?php 
class _navigation
{
	public $data;

	public function index(){
		require_once("app/functions/strip_output.php");
		$out = "<ul>\n";
		if(count($this->data)){
			foreach($this->data as $value) {
				$subNavigation = new Database('page', array(
					"method"=>"select", 
					"cid"=>(int)$value['idx'], 
					"nav_type"=>0, 
					"lang"=>strip_output::index($value['lang']), 
					"status"=>0
				));
				$active = (isset($_SESSION["URL"][1]) && $_SESSION["URL"][1]==$value['slug']) ? " active" : "";
				if(!isset($_SESSION["URL"][1]) && $value['slug']=="home"){
					$active = "active";
				}
				if($subNavigation->getter()){				
					$parentSlug = (isset($value['redirect'])) ? $value['redirect'] : $value['slug'];	
					$out .= sprintf(
						"<li class=\"sub\" data-sub=\"i%s\">\n<a href=\"%s%s/%s\" class=\"slide%s\"><span>%s</span></a> <i class=\"arrow\"></i>\n",
						(int)$value['idx'], 
						Config::WEBSITE,
						strip_output::index($_SESSION['LANG']),
						strip_output::index($parentSlug), 
						strip_output::index($active), 
						strip_output::index($value['title'])
					);

					$out .= sprintf(
						"<ul class=\"i%d\">\n", 
						(int)$value['idx']
					);
					foreach ($subNavigation->getter() as $val) {
						$subSlug = (isset($val['redirect']) && $val['redirect']!="") ? $val['redirect'] : $val['slug'];
						$out .= sprintf(
							"<li><a href=\"%s%s/%s/%s\"><span>%s</span></a></li>\n",
							Config::WEBSITE,
							strip_output::index($_SESSION['LANG']),
							strip_output::index($value['slug']), 
							strip_output::index($subSlug), 
							strip_output::index($val['title'])  
						);	
					}
					$out .= "</ul>\n";

					$out .= "</li>\n";
				}else{
					$out .= sprintf(
						"<li><a href=\"%s%s/%s\" class=\"%s\"><span>%s</span></a></li>\n",
						Config::WEBSITE,
						strip_output::index($_SESSION['LANG']),
						strip_output::index($value['slug']), 
						strip_output::index($active), 
						strip_output::index($value['title'])
					);	
				}
				
			}				
		}			
		$out .= "</ul>\n";
		
		return $out;
	}
}