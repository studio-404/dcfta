<?php 
class _leftnav
{
	public $data;

	public function index()
	{
		if(count($this->data)){
			$out = "<ul>";	
			foreach($this->data as $value) {
				$active = (isset($_SESSION['URL'][2]) && $_SESSION['URL'][2]==$value['slug']) ? " class='active'" : '';
				$link = Config::WEBSITE.$_SESSION['LANG']."/dcfta-for-bussinness/".$value['slug']; 
				$out .= sprintf(
					"<li><a href=\"%s\"%s>%s</a></li>", 
					$link, 
					$active, 
					strip_tags($value['title'])
				);
			}
			$out .= "</ul>";
		}
		
		return $out;	
	}
}